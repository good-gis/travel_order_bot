<?php

require_once 'src/bootstrap.php';

use App\Controllers\CommandController;
use TelegramBot\Api\Client;

try {
    $bot = new Client($_ENV['TELEGRAM_TOKEN']);
    $controller = new CommandController($bot);
    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}

