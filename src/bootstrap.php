<?php

use App\Core\DotenvLoader;
use App\Core\MonologLogger;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

$dotenv = new DotenvLoader();
$monologLogger = new MonologLogger();
