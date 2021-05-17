<?php
$botToken = "";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, True);

$text = $update['message']['text'];
$chatId = $update['message']['chat']['id'];
$userId = $update['message']['from']['id'];
$msgId = $update['message']['message_id'];
$animation = $update['message']['file_id'];
$queryText = $update['callback_query']['data'];
$queryUserId = $update['callback_query']['from']['id'];
$queryMsgId = $update['callback_query']['message']['message_id'];
$inlineQuery = $update['inline_query']['query'];
$inlineId = $update['inline_query']['id'];
$inlineUserId = $update['inline_query']['from']['id'];

function sendMessage($chatId, $text) {
    $url = $GLOBALS[website]."/sendMessage?chat_id=$chatId&parse_mode=HTML&text=".urlencode($text);
    file_get_contents($url);
}

function sendAnimation($chatId, $animation) {
    $url = $GLOBALS[website]."/sendAnimation?chat_id=$chatId&animation=$animation&parse_mode=HTML&text=".urlencode($text);
    file_get_contents($url);
}

function answerInlineQuery($queryUserId, $chatId, $queryText) {
    $results = [[
        "type" => "gif",
        "id" => "0",
        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/parrot.gif",
        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/parrot.gif",
        ],
        [
            "type" => "gif",
            "id" => "1",
            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/aussieparrot.gif",
            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/aussieparrot.gif",
            ],
            [
                "type" => "gif",
                "id" => "2",
                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/shuffleparrot.gif",
                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/shuffleparrot.gif",
                ],
                [
                    "type" => "gif",
                    "id" => "3",
                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/partyparrot.gif",
                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/partyparrot.gif",
                    ],
                    [
                        "type" => "gif",
                        "id" => "4",
                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/ultrafastparrot.gif",
                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/ultrafastparrot.gif",
                        ],
                        [
                            "type" => "gif",
                            "id" => "5",
                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/dealwithitparrot.gif",
                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/dealwithitparrot.gif",
                            ],
                            [
                                "type" => "gif",
                                "id" => "6",
                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/moonwalkingparrot.gif",
                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/moonwalkingparrot.gif",
                                ],
                                [
                                    "type" => "gif",
                                    "id" => "7",
                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/christmasparrot.gif",
                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/christmasparrot.gif",
                                    ],
                                    [
                                        "type" => "gif",
                                        "id" => "8",
                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/aussiecongaparrot.gif",
                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/aussiecongaparrot.gif",
                                        ],
                                        [
                                            "type" => "gif",
                                            "id" => "9",
                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/donutparrot.gif",
                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/donutparrot.gif",
                                            ],
                                            [
                                                "type" => "gif",
                                                "id" => "10",
                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/angryparrot.gif",
                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/angryparrot.gif",
                                                ],
                                                [
                                                    "type" => "gif",
                                                    "id" => "11",
                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/bluntparrot.gif",
                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/bluntparrot.gif",
                                                    ],
                                                    [
                                                        "type" => "gif",
                                                        "id" => "12",
                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/mardigrasparrot.gif",
                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/mardigrasparrot.gif",
                                                        ],
                                                        [
                                                            "type" => "gif",
                                                            "id" => "13",
                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/flyingmoneyparrot.gif",
                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/flyingmoneyparrot.gif",
                                                            ],
                                                            [
                                                                "type" => "gif",
                                                                "id" => "14",
                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/opensourceparrot.gif",
                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/opensourceparrot.gif",
                                                                ],
                                                                [
                                                                    "type" => "gif",
                                                                    "id" => "15",
                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/gothparrot.gif",
                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/gothparrot.gif",
                                                                    ],
                                                                    [
                                                                        "type" => "gif",
                                                                        "id" => "16",
                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/sadparrot.gif",
                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/sadparrot.gif",
                                                                        ],
                                                                        [
                                                                            "type" => "gif",
                                                                            "id" => "17",
                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/slowparrot.gif",
                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/slowparrot.gif",
                                                                            ],
                                                                            [
                                                                                "type" => "gif",
                                                                                "id" => "18",
                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/dealwithitnowparrot.gif",
                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/dealwithitnowparrot.gif",
                                                                                ],
                                                                                [
                                                                                    "type" => "gif",
                                                                                    "id" => "19",
                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/thumbsupparrot.gif",
                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/thumbsupparrot.gif",
                                                                                    ],
                                                                                    [
                                                                                        "type" => "gif",
                                                                                        "id" => "20",
                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/sleepingparrot.gif",
                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/sleepingparrot.gif",
                                                                                        ],
                                                                                        [
                                                                                            "type" => "gif",
                                                                                            "id" => "21",
                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/stableparrot.gif",
                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/stableparrot.gif",
                                                                                            ],
                                                                                            [
                                                                                                "type" => "gif",
                                                                                                "id" => "22",
                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/evilparrot.gif",
                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/evilparrot.gif",
                                                                                                ],
                                                                                                [
                                                                                                    "type" => "gif",
                                                                                                    "id" => "23",
                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/beretparrot.gif",
                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/beretparrot.gif",
                                                                                                    ],
                                                                                                    [
                                                                                                        "type" => "gif",
                                                                                                        "id" => "24",
                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/birthdaypartyparrot.gif",
                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/birthdaypartyparrot.gif",
                                                                                                        ],
                                                                                                        [
                                                                                                            "type" => "gif",
                                                                                                            "id" => "25",
                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/invisibleparrot.gif",
                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/invisibleparrot.gif",
                                                                                                            ],
                                                                                                            [
                                                                                                                "type" => "gif",
                                                                                                                "id" => "26",
                                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/sushiparrot.gif",
                                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/sushiparrot.gif",
                                                                                                                ],
                                                                                                                [
                                                                                                                    "type" => "gif",
                                                                                                                    "id" => "27",
                                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/sintparrot.gif",
                                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/sintparrot.gif",
                                                                                                                    ],
                                                                                                                    [
                                                                                                                        "type" => "gif",
                                                                                                                        "id" => "28",
                                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/portalorangeparrot.gif",
                                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/portalorangeparrot.gif",
                                                                                                                        ],
                                                                                                                        [
                                                                                                                            "type" => "gif",
                                                                                                                            "id" => "29",
                                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/middleparrot.gif",
                                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/middleparrot.gif",
                                                                                                                            ],
                                                                                                                            [
                                                                                                                                "type" => "gif",
                                                                                                                                "id" => "30",
                                                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/congaparrot.gif",
                                                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/congaparrot.gif",
                                                                                                                                ],
                                                                                                                                [
                                                                                                                                    "type" => "gif",
                                                                                                                                    "id" => "31",
                                                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/copparrot.gif",
                                                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/copparrot.gif",
                                                                                                                                    ],
                                                                                                                                    [
                                                                                                                                        "type" => "gif",
                                                                                                                                        "id" => "32",
                                                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/sassyparrot.gif",
                                                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/sassyparrot.gif",
                                                                                                                                        ],
                                                                                                                                        [
                                                                                                                                            "type" => "gif",
                                                                                                                                            "id" => "33",
                                                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/beerparrot.gif",
                                                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/beerparrot.gif",
                                                                                                                                            ],
                                                                                                                                            [
                                                                                                                                                "type" => "gif",
                                                                                                                                                "id" => "34",
                                                                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/gentlemanparrot.gif",
                                                                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/gentlemanparrot.gif",
                                                                                                                                                ],
                                                                                                                                                [
                                                                                                                                                    "type" => "gif",
                                                                                                                                                    "id" => "35",
                                                                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/wendyparrot.gif",
                                                                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/wendyparrot.gif",
                                                                                                                                                    ],
                                                                                                                                                    [
                                                                                                                                                        "type" => "gif",
                                                                                                                                                        "id" => "36",
                                                                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/discoparrot.gif",
                                                                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/discoparrot.gif",
                                                                                                                                                        ],
                                                                                                                                                        [
                                                                                                                                                            "type" => "gif",
                                                                                                                                                            "id" => "37",
                                                                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/scienceparrot.gif",
                                                                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/scienceparrot.gif",
                                                                                                                                                            ],
                                                                                                                                                            [
                                                                                                                                                                "type" => "gif",
                                                                                                                                                                "id" => "38",
                                                                                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/jediparrot.gif",
                                                                                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/jediparrot.gif",
                                                                                                                                                                ],
                                                                                                                                                                [
                                                                                                                                                                    "type" => "gif",
                                                                                                                                                                    "id" => "39",
                                                                                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/pumpkinparrot.gif",
                                                                                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/pumpkinparrot.gif",
                                                                                                                                                                    ],
                                                                                                                                                                    [
                                                                                                                                                                        "type" => "gif",
                                                                                                                                                                        "id" => "40",
                                                                                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/pirateparrot.gif",
                                                                                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/pirateparrot.gif",
                                                                                                                                                                        ],
                                                                                                                                                                        [
                                                                                                                                                                            "type" => "gif",
                                                                                                                                                                            "id" => "41",
                                                                                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/portalblueparrot.gif",
                                                                                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/portalblueparrot.gif",
                                                                                                                                                                            ],
                                                                                                                                                                            [
                                                                                                                                                                                "type" => "gif",
                                                                                                                                                                                "id" => "42",
                                                                                                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/reverseparrot.gif",
                                                                                                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/reverseparrot.gif",
                                                                                                                                                                                ],
                                                                                                                                                                                [
                                                                                                                                                                                    "type" => "gif",
                                                                                                                                                                                    "id" => "43",
                                                                                                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/boredparrot.gif",
                                                                                                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/boredparrot.gif",
                                                                                                                                                                                    ],
                                                                                                                                                                                    [
                                                                                                                                                                                        "type" => "gif",
                                                                                                                                                                                        "id" => "44",
                                                                                                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/reversecongaparrot.gif",
                                                                                                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/reversecongaparrot.gif",
                                                                                                                                                                                        ],
                                                                                                                                                                                        [
                                                                                                                                                                                            "type" => "gif",
                                                                                                                                                                                            "id" => "45",
                                                                                                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/fastparrot.gif",
                                                                                                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/fastparrot.gif",
                                                                                                                                                                                            ],
                                                                                                                                                                                            [
                                                                                                                                                                                                "type" => "gif",
                                                                                                                                                                                                "id" => "46",
                                                                                                                                                                                                "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/dadparrot.gif",
                                                                                                                                                                                                "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/dadparrot.gif",
                                                                                                                                                                                                ],
                                                                                                                                                                                                [
                                                                                                                                                                                                    "type" => "gif",
                                                                                                                                                                                                    "id" => "47",
                                                                                                                                                                                                    "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/confusedparrot.gif",
                                                                                                                                                                                                    "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/confusedparrot.gif",
                                                                                                                                                                                                    ],
                                                                                                                                                                                                    [
                                                                                                                                                                                                        "type" => "gif",
                                                                                                                                                                                                        "id" => "48",
                                                                                                                                                                                                        "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/congapartyparrot.gif",
                                                                                                                                                                                                        "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/congapartyparrot.gif",
                                                                                                                                                                                                        ],
                                                                                                                                                                                                        [
                                                                                                                                                                                                            "type" => "gif",
                                                                                                                                                                                                            "id" => "49",
                                                                                                                                                                                                            "gif_url" => "https://cultofthepartyparrot.com/parrots/hd/mustacheparrot.gif",
                                                                                                                                                                                                            "thumb_url" => "https://cultofthepartyparrot.com/parrots/hd/mustacheparrot.gif",
                                                                                                                                                                                                            ],
    ];
    $results = json_encode($results, True);
    $url = $GLOBALS[website]."/answerInlineQuery?inline_query_id=$queryUserId&results=$results&cache_time=0&switch_pm_text=Go&switch_pm_parameter=123";
    file_get_contents($url);
}

if($text == "/start") {
    sendMessage($chatId, "Welcome to the party parrots Telegram bot! 🦜 You can search for a parrot by calling @PartyParrotsBot and entering a name (e.g. conga line). Enjoy! 🎉");
}

if($text == "/help") {
    function keyboardHelp($chatId, $animation, $caption) {
        $url = $GLOBALS[website]."/sendAnimation?chat_id=$chatId&animation=$animation&caption=$caption&parse_mode=HTML&text=".urlencode($text);
        file_get_contents($url);
    }
    keyboardHelp($chatId, "https://cultofthepartyparrot.com/parrots/hd/parrot.gif", "This bot supports so called inline messages which means that you can message @PartyParrotsBot in any chat, group or channel and look for your desired parrot (https://cultofthepartyparrot.com/).\nCheck out the .gif to see it in action.\n\nThe source can be found on GitHub (https://github.com/Crazy-Marvin/PartyParrotsTelegramBot). Feel free to contact me with feedback and questions.\n\nParty Parrot is based on Sirocco (https://www.youtube.com/watch?v=9T1vfsHYiKY), the hardest partying parrot ever.");
}

if($update['inline_query']) {
    answerInlineQuery($inlineId, $inlineUserId, $inlineQuery);
}
?>