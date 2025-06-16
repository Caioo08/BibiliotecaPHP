<?php

namespace App\DAO;

use App\Model\Emprestimo;

final class EmprestimoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Emprestimo $model) : Emprestimo
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Emprestimo $model) : Emprestimo
    {
        $sql = "INSERT INTO emprestimo (id_usuario, id_aluno, id_livro, data_emprestimo, data_devolucao) 
                VALUES 
                (?, ?, ?, ?, ?) ";
        $stmt = parent::$conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->Id_Usuario);
        $stmt->bindValue(2, $model->Id_Aluno);
        $stmt->bindValue(3, $model->Id_Livro);
        $stmt->bindValue(4, $model->Data_Emprestimo);
        $stmt->bindValue(5, $model->Data_Devolucao);

        $stmt->execute();

        $model->Id = parent::$conexao->lastInsertId();
        
        return $model;
    }

    public function update(Emprestimo $model) : Emprestimo
    {
        $sql = "UPDATE emprestimo 
                SET id_aluno=?, id_livro=?, data_emprestimo=?, data_devolucao=? 
                WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Id_Aluno);
        $stmt->bindValue(2, $model->Id_Livro);
        $stmt->bindValue(3, $model->Data_Emprestimo);
        $stmt->bindValue(4, $model->Data_Devolucao);
        $stmt->bindValue(5, $model->Id);
        $stmt->execute();
        
        return $model;
    }


    public function selectById(int $id) : ?Emprestimo
    {
        $sql = "SELECT * FROM emprestimo WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $model = $stmt->fetchObject("App\Model\Emprestimo");

        $model->Dados_Aluno = new AlunoDAO()->selectById($model->Id_Aluno);
        $model->Dados_Livro = new LivroDAO()->selectById($model->Id_Livro);

        return $model;
    }

    public function select() : array
    {
        $sql = "SELECT * FROM emprestimo ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->execute();

        $arr_emprestimos = $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Emprestimo");

        foreach($arr_emprestimos as $item)
        {
            $item->Dados_Aluno = new AlunoDAO()->selectById($item->Id_Aluno);
            $item->Dados_Livro = new LivroDAO()->selectById($item->Id_Livro);
        }
        
        return $arr_emprestimos;
    }
    
    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM emprestimo WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);  
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}