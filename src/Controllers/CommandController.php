<?php

namespace App\Controllers;

use App\Core\MonologLogger;
use Monolog\Logger;
use TelegramBot\Api\Client;
use TelegramBot\Api\InvalidJsonException;
use TelegramBot\Api\Types\Update;

class CommandController extends BaseController
{
    /** @var Client */
    protected $bot;
    /** @var Logger */
    protected $logger;

    /**
     * CommandController constructor.
     * @param Client $bot
     * @throws InvalidJsonException
     */
    public function __construct(Client $bot)
    {
        $this->bot = $bot;
        $this->logger = MonologLogger::getLogInstance();

        //перечисление всех команд
        $this->start();
        $this->ping();
        $this->help();
        $this->orderTicket();
        $this->text();

        $this->bot->run();
    }

    private function start(): void
    {
        $bot = $this->bot;
        $this->logger->info('Command start');

        $bot->command(
            'start',
            function ($message) use ($bot) {
                $answer = $this->render('start.php');
                $bot->sendMessage($message->getChat()->getId(), $answer);
            }
        );
    }

    private function ping(): void
    {
        $bot = $this->bot;
        $this->logger->info('Command ping');

        $bot->command(
            'ping',
            function ($message) use ($bot) {
                $answer = $this->render('ping.php');
                $bot->sendMessage($message->getChat()->getId(), $answer);
            }
        );
    }

    private function help(): void
    {
        $bot = $this->bot;
        $this->logger->info('Command help');

        $bot->command(
            'help',
            function ($message) use ($bot) {
                $answer = $this->render('help.php');
                $bot->sendMessage($message->getChat()->getId(), $answer);
            }
        );
    }

    private function orderTicket(): void
    {
        $bot = $this->bot;
        $this->logger->info('Command orderTicket');

        $bot->command(
            'order_ticket',
            function ($message) use ($bot) {
                $answer = $this->render('help.php');
                $bot->sendMessage($message->getChat()->getId(), $answer);

            }
        );


    }

    private function text(): void
    {
        $bot = $this->bot;
        $bot->on(
            function (Update $update) use ($bot) {
                $message = $update->getMessage();
                $id = $message->getChat()->getId();
                $bot->sendMessage($id, 'Your message: ' . $message->getText());
            },
            function () {
                return true;
            }
        );
    }

}