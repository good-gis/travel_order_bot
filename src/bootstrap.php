<?php

use App\Configs\DotenvLoader;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

$dotenv = new DotenvLoader();
