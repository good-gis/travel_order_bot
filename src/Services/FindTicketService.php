<?php

namespace App\Services;

use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\Update;

class FindTicketService
{
    public function findTicket(Client $bot)
    {
        //запросить название города - аэропорта вылета
        //запросить название города - аэропорт прилета
        //получить название города вылета и прилета
        //получить из БД код города аэропорта вылета и прилета
        //спросить дату вылета

        //отправить запрос в яндекс, получить результат и отправить в telegram
    }
}