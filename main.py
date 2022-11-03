import os
import requests
from random import shuffle, choice

from fuzzywuzzy import fuzz

import telebot
from telebot.types import InlineQueryResultGif
from telebot.types import InlineKeyboardMarkup
from telebot.types import InlineKeyboardButton
from telebot.types import InputTextMessageContent
from telebot.types import InlineQueryResultArticle

API_TOKEN = os.getenv("API_TOKEN")
FEEDBACK_URL = "https://forms.gle/P1k1VnoBNS2GtYhy5"

MIN_MATCH_PERCENT = 50
BASE_URL = "https://cultofthepartyparrot.com/"

bot = telebot.TeleBot(API_TOKEN, parse_mode="HTML")

def match(query, data):

    if fuzz.ratio(query, data) >= MIN_MATCH_PERCENT:

        return True

    return False

def searchParrot(parrot, limit=10):
    response = requests.get(BASE_URL + "parrots.json").json()

    results = []

    for _ in response:

        if match(parrot.lower(), _["name"].lower()):

            results.append(_)

    shuffle(results)

    return results[:limit]


@bot.message_handler(commands=["start"])
def start(message):
    bot.send_message(message.chat.id, "<b>Bot started!</b>")

@bot.message_handler(commands=["help"])
def help(message):
    bot.send_message(message.chat.id, "<b>Help message :)</b>")

@bot.message_handler(commands=["contact"])
def contact(message):
    contact_info = '''
        <b>CONTACT :\n\
        \n➤ Telegram: https://t.me/Marvin_Marvin\n\
        \n➤ E-Mail: marvin@poopjournal.rocks\n\
        \n➤ Issue: https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/issues\n\
        \n➤ Source: https://github.com/Crazy-Marvin/PartyParrotsTelegramBot</b>
    '''

    bot.send_message(message.chat.id, contact_info)

@bot.message_handler(commands=["feedback"])
def feedback(message):

    bot.send_message(message.chat.id, FEEDBACK_URL)

@bot.message_handler(commands=["parrot"])
def parrot(message):

    response, results = requests.get(BASE_URL + "parrots.json").json(), []

    for _ in response:  results.append(_)

    randomParrot = choice(results)

    gif, hd = randomParrot.get("gif"), randomParrot.get("hd")
    name, tip = randomParrot.get("name"), randomParrot.get("tip")

    link = BASE_URL + f"parrots/{(hd or gif)}"

    if tip: tip = f'<code>{tip}</code>'    

    bot.send_animation(message.chat.id, link, caption=tip)

@bot.inline_handler(func=lambda query: True)
def inline_qr(query):
    try:
        parrots, results = searchParrot(query.query), []

        for parrot in parrots:

            gif, hd = parrot.get("gif"), parrot.get("hd")
            name, tip = parrot.get("name"), parrot.get("tip")

            link = BASE_URL + f"parrots/{(hd or gif)}"

            if tip: tip = f'<code>{tip}</code>'

            results.append(InlineQueryResultGif(
                name, link, link, title=name, caption=tip, parse_mode="HTML"))

        if results == []:
            print("Error!")
            results.append(InlineQueryResultArticle("parrot", "No parrots found! :(",
                InputTextMessageContent("<b>Cult of the Party Parrot! 🦜\nPARTY OR DIE! 😎</b>", 
                parse_mode="HTML"), reply_markup=InlineKeyboardMarkup().row(
                    InlineKeyboardButton("Check out more parrots!", url=BASE_URL))))

        bot.answer_inline_query(query.id, results, 1,
            switch_pm_text="Cult of the Party Parrot! 🦜", switch_pm_parameter="start")

    except Exception as e:
        print(e)

bot.infinity_polling(skip_pending=True)
