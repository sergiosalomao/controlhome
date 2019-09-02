<?php
namespace App\Controller;

use App\Models\ComponentesModel\ComponentesModel;

class ComponentesController extends Controller
{
    protected $id;
    protected $descricao;
    protected $tipo;
    protected $codigo;
    protected $idcomodo;

    public function show($idcomodo)
    {
        $this->idcomodo = $idcomodo;
        $_SESSION['idcomodo'] = $idcomodo;
        $this->render('componentes','componentes');
    }

    public function create($idcomodo)
    {
        $this->idcomodo = $idcomodo;
        $this->render('componentes', 'create');
    }


    public function save()
    {
        $model = new  ComponentesModel();
        $dados = [];
        $dados['idcomodo'] = $_POST['idcomodo'];
        $dados['tipo'] = $_POST['tipo'];
        $dados['descricao'] = $_POST['descricao'];
        $dados['codigo'] = $_POST['codigo'];
        
        if ($model->save($dados) == "salvo com sucesso!") {
                return header("location: ../componentes/show/{$_POST['idcomodo']}");
            } else {
                return header("location: create");
            }
    }

    public function update()
    {
        $dados = [];
        $dados['id'] = $_POST['id'];
        $dados['tipo'] = $_POST['tipo'];
        $dados['descricao'] = $_POST['descricao'];
        $dados['codigo'] = $_POST['codigo'];
        
        $model = new ComponentesModel();
    
            if ($model->update($dados) == "atualizado com sucesso!") {
               
                return header("location: show/{$_SESSION['idcomodo']}");
            } else {
                return header("location: show/{$_SESSION['idcomodo']}");
            }
    }

    public function edit($id)
    {
        $this->idcomodo = $_SESSION['idcomodo'];
        $model = new ComponentesModel();
        $dados = $model->listById($id);
        $this->id = $dados['id']; 
        $this->descricao = $dados['descricao']; 
        $this->codigo = $dados['codigo']; 
        $this->tipo = $dados['tipo']; 
        $this->render('componentes', 'editacomponente');
    }

    public function delete($id)
    {
        $model = new ComponentesModel();
        if ($model->delete($id) == "excluido com sucesso!") {
            return header("location: ../show/{$_SESSION['idcomodo']}");
        } else {
            return header("location: ../show/{$_SESSION['idcomodo']}");
        }
    }
}
