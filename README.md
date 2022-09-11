[![Telegram Party Parrots Bot](https://img.shields.io/badge/Telegram-Bot-blue?logo=telegram)](https://t.me/PartyParrotsBot/)
[![GitHub Actions](https://github.com/Crazy-Marvin/PartyParrtosTelegramBot/actions/workflows/ci.yml/badge.svg)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/actions/workflows/ci.yml)
![healthchecks.io](https://img.shields.io/endpoint?url=https%3A%2F%2Fhealthchecks.io%2Fbadge%2F396c7d03-faf7-4562-9f83-1194d0%2Fn-TwoPva%2FPartyParrots.shields)
[![License](https://img.shields.io/github/license/Crazy-Marvin/PartyParrotsTelegramBot)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/blob/trunk/LICENSE)
[![Last commit](https://img.shields.io/github/last-commit/Crazy-Marvin/PartyParrotsTelegramBot.svg?style=flat)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/commits)
[![Releases](https://img.shields.io/github/downloads/Crazy-Marvin/PartyParrotsTelegramBot/total.svg?style=flat)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/releases)
[![Latest tag](https://img.shields.io/github/tag/Crazy-Marvin/PartyParrotsTelegramBot.svg?style=flat)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/tags)
[![Issues](https://img.shields.io/github/issues/Crazy-Marvin/PartyParrotsTelegramBot.svg?style=flat)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/issues)
[![Pull requests](https://img.shields.io/github/issues-pr/Crazy-Marvin/PartyParrotsTelegramBot.svg?style=flat)](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/pulls)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/d6eb9ee5488548dca0536ecd93e16ae0)](https://www.codacy.com/gh/Crazy-Marvin/PartyParrotsTelegramBot/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Crazy-Marvin/PartyParrotsTelegramBot&amp;utm_campaign=Badge_Grade)
[![Dependabot](https://badgen.net/badge/icon/dependabot?icon=dependabot&label)](https://python.org/)
[![Snyk Vulnerabilities for GitHub Repo](https://img.shields.io/snyk/vulnerabilities/github/Crazy-Marvin/PartyParrotsTelegramBot)](https://app.snyk.io/org/crazymarvin/project/e58b3418-2609-4731-b629-6812069fdb73)
[![Telegram Party Parrots Bot](https://img.shields.io/badge/Python-yellow?logo=python)](https://t.me/PartyParrotsBot/)

# Party Parrots Telegram Bot

Now you can easily access the party parrots in Telegram! 🦜

This bot supports so called inline messages which means that you can message @PartyParrotsBot in any chat, group or channel and look for your [desired parrot](https://cultofthepartyparrot.com/). 
Check out the .gif to see it in action. 

__TO DO: put .gif here__

Huge thank yous go to [Sirocco](https://www.youtube.com/watch?v=9T1vfsHYiKY), the [Cult of the Party Parrot](https://github.com/jmhobbs/cultofthepartyparrot.com) and [Dany](https://github.com/dsluijk/PartyParrotBot).

### Requirements

- Token from [@Botfather](https://telegram.me/botfather) (don't forget to enable the inline mode)
- SSL certificate (I recommend [Let's Encrypt](https://letsencrypt.org/))
- Webserver running [Python](https://www.python.org) (tested with [Apache](https://httpd.apache.org/) & [NGINX](https://www.nginx.com/) but others should work too)
- [Parrot source](https://cultofthepartyparrot.com/parrots.json)
- Google Cloud service account credentials (JSON) for accessing Google Sheets API & Google Drive API
- [Sentry](https://docs.sentry.io/platforms/python/) key (optional)
- [Healthchecks](https://healthchecks.io/#php) URL (optional)

### Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

More details and contact info can be found in the [CONTRIBUTING.md](https://github.com/Crazy-Marvin/PartyParrotsTelegramBot/blob/trunk/.github/CONTRIBUTING.md)

### License

[MIT License](https://choosealicense.com/licenses/mit/)
