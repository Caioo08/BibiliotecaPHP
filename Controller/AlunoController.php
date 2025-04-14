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
    public static function cadastro() : void
    {
        parent::isProtected(); 

        $model = new Aluno();
        
        try
        {
            if(parent::isPost())
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model->RA = $_POST['ra'];
                $model->Curso = $_POST['curso'];
                $model->save();

                parent::redirect("/aluno");

            } else {
    
                if(isset($_GET['id']))
                {              
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {

            $model->setError($e->getMessage());
        }

        parent::render('Aluno/form_aluno.php', $model);        
    } 
    public static function delete() : void
    {
        parent::isProtected(); 

        $model = new Aluno();
        
        try 
        {
            $model->delete( (int) $_GET['id']);
            parent::redirect("/aluno");

        } catch(Exception $e) {
            $model->setError("Ocorreu um erro ao excluir o aluno:");
            $model->setError($e->getMessage());
        } 
        
        parent::render('Aluno/lista_aluno.php', $model);  
    }
    
}//Fim da classe