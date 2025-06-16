<?php

namespace App\Model;

use App\DAO\EmprestimoDAO;
use Exception;

final class Emprestimo extends Model
{
    public ?int $Id = null;
    public ?int $Id_Usuario = null;
    public ?int $Id_Livro = null;
    public ?int $Id_Aluno = null;

    public ?string $Data_Devolucao = null;
    public ?string $Data_Emprestimo = null;

    public ?Aluno $Dados_Aluno = null;
    public ?Livro $Dados_Livro = null;

    public array $rows_livros = [];
    public array $rows_alunos = [];


    function save() : Emprestimo
    {
         return new EmprestimoDAO()->save($this);
    }



    function getById(int $id) : ?Emprestimo
    {
        return new EmprestimoDAO()->selectById($id);
    }



    function getAllRows() : array
    {
        $this->rows = new EmprestimoDAO()->select();

        return $this->rows;
    }


    function delete(int $id) : bool
    {
        return new EmprestimoDAO()->delete($id);
    }
}