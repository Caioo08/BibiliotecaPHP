<?php

namespace App\DAO;

use App\Model\Autor;

final class AutorDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Autor $model) : Autor
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Autor $model) : Autor
    {
        $sql = "INSERT INTO autor (nome, data_nascimento, cpf) VALUES (?, ?, ?) ";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Data_Nascimento);
        $stmt->bindValue(3, $model->CPF);
        $stmt->execute();

        $model->Id = parent::$conexao->lastInsertId();
        
        return $model;
    }

    public function update(Autor $model) : Autor
    {
        $sql = "UPDATE autor SET nome=?, data_nascimento=?, cpf=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Data_Nascimento);
        $stmt->bindValue(3, $model->CPF);
        $stmt->bindValue(4, $model->Id);
        $stmt->execute();
        
        return $model;
    }

    public function selectById(int $id) : ?Autor
    {
        $sql = "SELECT * FROM autor WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Autor");
    }


    public function select() : array
    {
        $sql = "SELECT * FROM autor ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Autor");
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM autor WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}