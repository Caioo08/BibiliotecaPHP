<?php

namespace App\Dao;

use App\Model\categoria;

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
        $sql = "INSERT INTO Categoria (nome,ra,curso) VALUES (?,?,?) ";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->RA);
        $stmt->bindValue(3, $model->Curso);
        $model->Id = parent::$conexao->lastInsertId();
        $stmt->execute();

        return $model;
    }

    public function update(Categoria $model) : Categoria
    {
        $sql = "UPDATE categoria SET nome=?, ra=?, curso=? WHERE id=?"/

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->RA);
        $stmt->bindValue(3, $model->Curso);
        $stmt->bindValue(4, $model->Id);
        $stmt->execute();

        return $stmt;
    }

    public function selectById(int $id) : ?Categoria
    {
        $sql = "SELECT * FROM categoria WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1,$id);
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
        $stmt->bindValue(1,$id);
        return $stmt->execute();
    }
}
?>