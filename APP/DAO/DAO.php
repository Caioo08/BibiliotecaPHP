<?php

namespace App\DAO;

use PDO;

abstract class DAO extends PDO
{
    protected static $conexao = null;

    public function __construct()
    {
        // mysql:host=localhost:3307;dbname=biblioteca
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" 
             . $_ENV['db']['database'];

        if (self::$conexao == null) 
        {
            self::$conexao = new PDO(
                $dsn,
                $_ENV['db']['user'],
                $_ENV['db']['pass'],
                [
                    PDO::ATTR_PERSISTENT => true,                    
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
                ]
            ); // Fecha construtor da classe PDO 
        } // Fecha if
    } // Fecha construtor da classe DAO
} // Fecha classe