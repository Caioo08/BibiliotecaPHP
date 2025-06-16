<?php

namespace App\Controller;

use App\Model\{ Categoria, Livro, Autor };
use Exception;

final class LivroController extends Controller
{
    public static function index() : void
    {
        parent::isProtected(); 

        $model = new Livro();
        
        try {
            $model->getAllRows();

        } catch(Exception $e) {
            $model->setError("Ocorreu um erro ao buscar os livros:");
            $model->setError($e->getMessage());
        }

        parent::render('Livro/lista_livro.php', $model); 
    } 

    public static function cadastro() : void
    {
        parent::isProtected(); 

        $model = new Livro();

        echo "Estou onde quero";

        var_dump($model->Id_Autores);
        
        try
        {
            if(parent::isPost())
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Titulo = $_POST['titulo'];
                $model->Id_Categoria = $_POST['id_categoria'];
                $model->Isbn = $_POST['isbn'];
                $model->Ano = $_POST['ano'];
                $model->Editora = $_POST['editora'];
                $model->Id_Autores = $_POST['autor'];
                $model->save();

                parent::redirect("/livro");

            } else {
    
                if(isset($_GET['id']))
                {              
                    $model = $model->getById( (int) $_GET['id'] );
                }
            }

        } catch(Exception $e) {

            $model->setError($e->getMessage());
        }

        $model->rows_categorias = new Categoria()->getAllRows();

        $model->rows_autores = new Autor()->getAllRows();

        parent::render('Livro/form_livro.php', $model);        
    } 
    
    public static function delete() : void
    {
        parent::isProtected(); 

        $model = new Livro();
        
        try 
        {
            $model->delete( (int) $_GET['id']);
            parent::redirect("/livro");

        } catch(Exception $e) {
            $model->setError("Ocorreu um erro ao excluir o livro:");
            $model->setError($e->getMessage());
        } 
        
        parent::render('Livro/lista_livro.php', $model);  
    }
}