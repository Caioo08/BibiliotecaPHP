<?php

namespace App\Controller;

use App\Model\Model;

abstract class Controller
{
    final protected static function isProtected() : void
    {
        if(!isset($_SESSION['usuario_logado']))
            header("Location: /login");
    }

    final protected static function render(string $view, ?Model $model) : void
    {
        include VIEWS . "/$view";
    }

    final protected static function isPost() : bool
    {
        return $_SERVER['REQUEST_METHOD'] == "POST";
    }

    final protected static function redirect(string $route) : void
    {
        header("Location: $route");
    }
}