<?php

require_once 'src/bootstrap.php';

use App\Controllers\CommandController;
use TelegramBot\Api\Client;
use TelegramBot\Api\InvalidJsonException;

$bot = new Client($_ENV['TELEGRAM_TOKEN']);

try {
    $controller = new CommandController($bot);
} catch (InvalidJsonException $e) {
}

