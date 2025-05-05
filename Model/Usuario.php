<?php

namespace App\Model;

use App\DAO\UsuarioDAO;
use Exception;

final class Usuario extends Model
{
    public ?int $Id = null;

    public ?string $Nome
    {
        set{
            if(strlen($value)<3)
                throw new Exception("Nome deve ter no mínimo 3 caracteres.");

                $this->Nome = $value;
        }
        get => $this->Nome ?? null;
    }

    public ?string $Email
    {
        set{
            if(empty($value))
                throw new Exception("Preencha o Email");

            $this->Email = $value;
        }

        get=> $this->Email ?? null;
    }

    public ?string $Senha
    {
        set{
            if(strlen($value)<3)
                throw new Exception("Senha deve ter no mínimo 3 caracteres.");
                $this->Senha = $value;
        }

        get => $this->Senha ?? null;
    }

    function save() : Usuario
    {
        return new UsuarioDAO()->save($this);
    }

    function getById(int $id) : ?Usuario
    {
        return new UsuarioDAO()->selectById($id);
    }

    function getAllRows() : array
    {
        $this->rows = new UsuarioDAO()->select();

        return $this->rows;
    }
    
    function delete(int $id) : bool
    {
        return new UsuarioDAO()->delete($id);
    }
}

?>