<?php

namespace App\DAO;

use App\Model\Livro;

final class LivroDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Livro $model) : Livro
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }


    public function insert(Livro $model) : Livro
    {
        parent::$conexao->beginTransaction();
        
        $sql = "INSERT INTO livro (id_categoria, titulo, ano, editora, isbn) VALUES (?, ?, ?, ?, ?) ";      
        $stmt = parent::$conexao->prepare($sql);    
        $stmt->bindValue(1, $model->Id_Categoria);
        $stmt->bindValue(2, $model->Titulo);
        $stmt->bindValue(3, $model->Ano);
        $stmt->bindValue(4, $model->Editora);
        $stmt->bindValue(5, $model->Isbn);
        $stmt->execute();
        $model->Id = parent::$conexao->lastInsertId();

        foreach($model->Id_Autores as $item)
        {
            $sql = "INSERT INTO livro_autor_assoc (id_livro, id_autor) VALUES (?, ?) ";      
            $stmt = parent::$conexao->prepare($sql);    
            $stmt->bindValue(1, $model->Id);
            $stmt->bindValue(2, $item);
            $stmt->execute();
        }

        parent::$conexao->commit();
        
        return $model;
    }

    public function update(Livro $model) : Livro
    {
        parent::$conexao->beginTransaction();

        $sql = "UPDATE livro 
                SET id_categoria=?, titulo=?, ano=?, editora=?, isbn=?
                WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Id_Categoria);
        $stmt->bindValue(2, $model->Titulo);
        $stmt->bindValue(3, $model->Ano);
        $stmt->bindValue(4, $model->Editora);
        $stmt->bindValue(5, $model->Isbn);
        $stmt->bindValue(6, $model->Id);
        $stmt->execute();

        $sql = "DELETE FROM livro_autor_assoc WHERE id_livro = ? ";      
        $stmt = parent::$conexao->prepare($sql);    
        $stmt->bindValue(1, $model->Id);
        $stmt->execute();

        foreach($model->Id_Autores as $item)
        {
            $sql = "INSERT INTO livro_autor_assoc (id_livro, id_autor) VALUES (?, ?) ";      
            $stmt = parent::$conexao->prepare($sql);    
            $stmt->bindValue(1, $model->Id);
            $stmt->bindValue(2, $item);
            $stmt->execute();
        }

        parent::$conexao->commit();
        
        return $model;
    }

    public function selectById(int $id) : ?Livro
    {
        $sql = "SELECT * FROM livro WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $model = $stmt->fetchObject("App\Model\Livro");

        $sql = "SELECT * FROM livro_autor_assoc WHERE id_livro=? ";
        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $livro_autores_assoc = $stmt->fetchAll(DAO::FETCH_CLASS);

        foreach($livro_autores_assoc as $item)
            $model->Id_Autores[] = $item->Id_Autor;

        return $model;
    }


    public function select() : array
    {
        $sql = "SELECT * FROM livro ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Livro");
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM livro WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}