<?php

namespace App\Controller;

use App\Model\Aluno;

use Exception;

final class AlunoController extends Controller
{
    public static function index() : void
    {
        parent::isProtected();

        $model = new Aluno();

        try{
            $model->getAllRows();
        }catch(Exception $e){
            $model->setError("Ocorreu um erro ao buscar os alunos:");
            $model->setError($e->getMessage());
        }

        parent::render('Aluno/lista_aluno.php', $model);
    }

    
}