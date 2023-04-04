import os
import gspread
import requests
from random import shuffle, choice

from dotenv import load_dotenv
load_dotenv()

from fuzzywuzzy import fuzz

import telebot
from telebot.types import InlineQueryResultGif
from telebot.types import InlineKeyboardMarkup
from telebot.types import InlineKeyboardButton
from telebot.types import InputTextMessageContent
from telebot.types import InlineQueryResultArticle

from oauth2client.service_account import ServiceAccountCredentials

FEEDBACK_URL = os.getenv("forms_url")

MIN_MATCH_PERCENT = 50
BASE_URL = "https://cultofthepartyparrot.com/"

GIF = "CgACAgQAAxkBAAM-ZCxVhZuyyp7xCHUXa3yODIiWh2cAAuwCAAKK2QxTy2T3R_ahpVEvBA"
STICKER = 'CAACAgIAAxkBAANAZCxVrOtV9-YNwy1MJbdQC-JIw7AAApsBAAK6wJUFlwkHcwsoZlYvBA'

API_TOKEN = os.getenv("API_KEY")

scope = [
    "https://spreadsheets.google.com/feeds",
    "https://www.googleapis.com/auth/spreadsheets",
    "https://www.googleapis.com/auth/drive.file",
    "https://www.googleapis.com/auth/drive",
]

bot = telebot.TeleBot(API_TOKEN, parse_mode="HTML")
creds = ServiceAccountCredentials.from_json_keyfile_name("creds.json", scope)
client = gspread.authorize(creds)

database = client.open("DATABASE").worksheet("PARTY PARROT BOT")
analytics = client.open("ANALYTICS").worksheet("PARTY PARROT BOT")

def add_logs(cell):
    analytics.update_acell(cell,
        str(int(analytics.acell(cell).value) + 1).replace("'", " "))

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

    add_logs("F3")
    col = database.col_values(1)

    if str(message.chat.id) not in col:
        database.append_row([message.chat.id])
        analytics.update_acell('F10', str(len(col) + 1))

    bot.send_message(message.chat.id, "<i>🦜 PARTY OR DIE 🦜\n\
        \nTag @PartyParrotsBot in any chat (1:1 or group) to start a party and search for the right parrot(s)! 🥳</i>")
    bot.send_animation(message.chat.id, GIF)

@bot.message_handler(commands=["help"])
def help(message):
    add_logs("F7")
    bot.send_message(message.chat.id, '''
        Thanks for using the Party Parrots Telegram bot.\n\
        \nAfter starting the bot with /start you will be able to tag @PartyParrotsBot in any 1:1 or group chat and search for the right parrot(s).\n\
        \nIf you would like to contact me send /contact.\n\
        \nFeedback is very appreaciated by filling out a Google form which the bot will send you after sending him /feedback.\n\
        \nThe source is available on https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/.\n\nHave fun! 🥳''')

@bot.message_handler(commands=["contact"])
def contact(message):
    add_logs("F6")
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
    add_logs("F5")
    bot.send_message(message.chat.id, FEEDBACK_URL)
    bot.send_sticker(message.chat.id, STICKER)

@bot.message_handler(commands=["parrot"])
def parrot(message):
    add_logs("F4")
    response, results = requests.get(BASE_URL + "parrots.json").json(), []

    for _ in response:  results.append(_)

    randomParrot = choice(results)

    gif, hd = randomParrot.get("gif"), randomParrot.get("hd")
    name, tip = randomParrot.get("name"), randomParrot.get("tip")

    link = BASE_URL + f"parrots/{(hd or gif)}"

    if tip: tip = f'<code>{tip}</code>'    

    bot.send_animation(message.chat.id, link, caption=tip)

@bot.message_handler(commands=["logs"])
def logs(message):

    if message.chat.id in [os.getenv("my_id") or os.getenv('analyst_id')]:
        bot.send_document(message.chat.id, os.getenv('spreadsheet_url'))

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
            results.append(InlineQueryResultArticle("parrot", "No parrots found! :(",
                InputTextMessageContent("<b>Cult of the Party Parrot! 🦜\nPARTY OR DIE! 😎</b>", 
                parse_mode="HTML"), reply_markup=InlineKeyboardMarkup().row(
                    InlineKeyboardButton("Check out more parrots!", url=BASE_URL))))

        bot.answer_inline_query(query.id, results, 1,
            switch_pm_text="Cult of the Party Parrot! 🦜", switch_pm_parameter="start")

    except Exception as e:
        print(e)

bot.infinity_polling(skip_pending=True)
