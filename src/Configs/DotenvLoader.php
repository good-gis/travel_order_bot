<?php

namespace App\Configs;

use Dotenv\Dotenv;

/**
 * Class DotenvLoader
 * @package App\Configs
 */
class DotenvLoader
{
    /** @var Dotenv */
    public $dotenv;

    /**
     * DotenvLoader constructor.
     */
    public function __construct()
    {
        $this->dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $this->dotenv->load();
        $this->checkRequiredVariables();
    }

    private function checkRequiredVariables(): void
    {
        $this->dotenv->required('TELEGRAM_TOKEN')->notEmpty();
    }

}