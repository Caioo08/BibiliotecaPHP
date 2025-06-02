<?php

namespace App\Model;

use App\DAO\LoginDAO;

final class Login
{
    public $Id, $Email, $Senha, $Nome;

    public function logar() : ?Login
    {
        return new LoginDAO()->autenticar($this);
    }
}