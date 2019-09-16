<?php

namespace App\Controller;

use App\Models\UsuariosModel\UsuariosModel;

class LoginController extends Controller
{
    protected $id_usuario;
    protected $nome;
    protected $email;
    protected $senha;
    protected $tipo;
    protected $mac;
    protected $idmenu;

    public function listaUsuarios()
    {
        $objUsuarios = new UsuariosModel();
        return $objUsuarios->listAll();
    }

    public function login()
    {
        $this->layout();
        $this->render('login', 'login');
    }

    public function autentica()
    {
        $objUsuarios = new UsuariosModel();
        $usuario = $objUsuarios->LocalizaUsuario($_POST['email']);      
       
     
        if (password_verify($_POST['senha'],  $usuario['senha'])) {
          $_SESSION['autenticado'] = true;
          $_SESSION['usuario'] = $usuario['nome'];
          return header("location: ./..");
          
        }
        else
        {
            $_SESSION['autenticado'] = false;
            return header("location: ./..");
        }


    }


    public function logout()
    {
    
        $_SESSION['autenticado'] = false;
            return header("location: ./..");
        


    }

  
}
