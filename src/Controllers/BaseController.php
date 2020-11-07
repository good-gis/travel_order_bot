<?php

namespace App\Controllers;

abstract class BaseController
{
    public function render(string $view, $data = ''): string
    {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/src/Views/' . $view;
        $view = ob_get_clean();
        return $view;
    }
}