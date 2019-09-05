<?php
namespace App\Controller;

use App\Models\UsuariosModel\UsuariosModel;

class UsuariosController extends Controller
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

    public function create()
    {
        $this->layout();
        $this->render('usuarios', 'create');
    }

    public function save()
    {
        $objUsuarios = new UsuariosModel();
        if (isset($_POST['nome'])) {

            if ($objUsuarios->save($_POST) == "salvo com sucesso!") {
                return header("location: ../../configuracao/usuarios");
            } else {
                return header("location: usuarios/create");
            }
        }
    }

    public function update()
    {
       $objUsuarios = new UsuariosModel();
       
        if ($_POST['id_usuario'] != null) {
            if ($objUsuarios->update($_POST) == "atualizado com sucesso!") {

                return header("location: ../../configuracao/usuarios");
            } else {
                return header("location: ../../configuracao/usuarios");
            }
        }
    }

    public function showedit($id)
    {
        $objUsuarios = new UsuariosModel();
        $dados = $objUsuarios->listById($id);
        
        $this->id_usuario = $dados['id_usuario'];
        $this->nome = $dados['nome'];
        $this->email = $dados['email'];
        $this->senha = $dados['senha'];
        $this->tipo = $dados['tipo'];
        $this->mac = $dados['mac'];
        
        $this->layout();
        $this->render('usuarios', 'edit');
    }

    public function delete($id)
    {
        $objUsuarios = new UsuariosModel();
        if ($objUsuarios->delete($id) == "excluido com sucesso!") {
            return header("location: ../../../configuracao/usuarios");
        } else {
            return header("location: ../../configuracao/usuarios");
        }
    }
}
