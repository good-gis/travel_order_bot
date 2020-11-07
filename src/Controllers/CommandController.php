<?php

namespace App\Controllers;

use TelegramBot\Api\Client;

class CommandController extends BaseController
{
    /** @var Client */
    protected $bot;

    /**
     * CommandController constructor.
     * @param Client $bot
     */
    public function __construct(Client $bot)
    {
        $this->bot = $bot;
        $this->start();
        $this->ping();
    }


    public function start(): void
    {
        $bot = $this->bot;
        $bot->command('start', function ($message) use ($bot) {
            $answer = $this->render('start');
            $bot->sendMessage($message->getChat()->getId(), $answer);
        });
    }

    public function ping(): void
    {
        $bot = $this->bot;
        $bot->command('ping', function ($message) use ($bot) {
//            $answer = $this->render('start');
            $bot->sendMessage($message->getChat()->getId(), '123');
        });
    }
}