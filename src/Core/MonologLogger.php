<?php

namespace App\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MonologLogger
{
    /** @var Logger */
    protected static $uniqueLog;

    /**
     * MonologLogger constructor.
     */
    public function __construct()
    {
        static::$uniqueLog = new Logger('debug');
        static::$uniqueLog->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/logs/debug.log', Logger::INFO));
    }

    public static function getLogInstance(): Logger
    {
        if (is_null(static::$uniqueLog)) {
            static::$uniqueLog = new Logger('debug');
            static::$uniqueLog->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/logs/debug.log', Logger::INFO));
            return static::$uniqueLog;
        }

        return static::$uniqueLog;
    }
}