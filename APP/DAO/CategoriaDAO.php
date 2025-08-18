<?php

namespace App\DAO;

use App\Model\Categoria;

final class CategoriaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Categoria $model) : Categoria
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Categoria $model) : Categoria
    {
        $sql = "INSERT INTO categoria (descricao) VALUES (?) ";

        $stmt = parent::$conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->Descricao);

        $stmt->execute();

        $model->Id = parent::$conexao->lastInsertId();
        
        return $model;
    }

    public function update(Categoria $model) : Categoria
    {
        $sql = "UPDATE categoria SET descricao=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Descricao);
        $stmt->bindValue(2, $model->Id);
        $stmt->execute();
        
        return $model;
    }


    public function selectById(int $id) : ?Categoria
    {
        $sql = "SELECT * FROM categoria WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Categoria");
    }


    public function select() : array
    {
        $sql = "SELECT * FROM categoria ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Categoria");
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM categoria WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}