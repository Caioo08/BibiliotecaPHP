<?php 

namespace App\DAO;
use PDO;
abstract  class DAO extends PDO{
    protected static $conexao = null;
    public function __construct(){
    $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

    if (self::$conexao == null){
        self::$conexao = new PDO($dns, $_ENV['db']['user'], $_ENV['db']['pass'],
        [
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES uft8mb4'
        ]); //fecha contrutor de clasee PDO//
    }//fecha if
    }//fecha construtor da classe DAO
}//fecha classe