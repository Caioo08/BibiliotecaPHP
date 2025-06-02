<?php

namespace App\Dao;

use App\Model\Usuario;

final class UsuarioDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Usuario $model) : Usuario
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Usuario $model) : Usuario
    {
        $sql = "INSERT INTO usuario (nome,email,senha) VALUES (?,?,?) ";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Email);
        $stmt->bindValue(3, $model->Senha);
        $model->Id = parent::$conexao->lastInsertId();
        $stmt->execute();

        return $model;
    }

    public function update(Usuario $model) : Usuario
    {
        $sql = "UPDATE usuario SET nome=?, email=?, senha=? WHERE id=?"/

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Email);
        $stmt->bindValue(3, $model->Senha);
        $stmt->bindValue(4, $model->Id);
        $stmt->execute();

        return $stmt;
    }

    public function selectById(int $id) : ?Usuario
    {
        $sql = "SELECT * FROM usuario WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Usuario");
    }

    public function select() : array
    {
        $sql = "SELECT * FROM usuario ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Usuario");
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM usuario WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        return $stmt->execute();
    }
}
?>