<?php

namespace App\Controller;

use App\Models\ComponentesModel\ComponentesModel;

class ComponentesController extends Controller
{
    protected $id_componente;
    protected $descricao;
    protected $tipo;
    protected $codigo;
    protected $id_ambiente;

    public function show($id_ambiente)
    {
       $this->id_ambiente = $id_ambiente;
        $_SESSION['id_ambiente'] = $id_ambiente;
        $this->layout();
        $this->render('componentes', 'componentes');
    }

    public function create($id_ambiente)
    {
        $this->id_ambiente = $id_ambiente;
        $this->layout();
        $this->render('componentes', 'create');
    }


    public function save()
    {
        $model = new  ComponentesModel();
        $dados = [];
        $dados['id_ambiente'] = $_POST['id_ambiente'];
        $dados['tipo'] = $_POST['tipo'];
        $dados['descricao'] = $_POST['descricao'];
        $dados['codigo'] = $_POST['codigo'];

        if ($model->save($dados) == "salvo com sucesso!") {
            return header("location: ../componentes/show/{$_POST['id_ambiente']}");
        } else {
            return header("location: create");
        }
    }

    public function update()
    {
        $dados = [];
        $dados['id_componente'] = $_POST['id_componente'];
        $dados['tipo'] = $_POST['tipo'];
        $dados['descricao'] = $_POST['descricao'];
        $dados['codigo'] = $_POST['codigo'];
        $model = new ComponentesModel();
        if ($model->update($dados) == "atualizado com sucesso!") {
            return header("location: show/{$_SESSION['id_ambiente']}");
        } else {
            return header("location: show/{$_SESSION['id_ambiente']}");
        }
    }

    public function edit($id)
    {
        $this->id_componente = $_SESSION['id_componente'];
        $objComponentes = new ComponentesModel();
        $dados = $objComponentes->listById($id);
        $this->id_componente = $dados['id_componente'];
        $this->descricao = $dados['descricao'];
        $this->codigo = $dados['codigo'];
        $this->tipo = $dados['tipo'];
        $this->layout();
        $this->render('componentes', 'editacomponente');
    }

    public function delete($id)
    {
        $this->layout();
        $objComponentes = new ComponentesModel();
        if ($objComponentes->delete($id) == "excluido com sucesso!") {
            return header("location: ../show/{$_SESSION['id_ambiente']}");
        } else {
            return header("location: ../show/{$_SESSION['id_ambiente']}");
        }
    }

    public function atualizaStatus($idcomponente)
    {
        $dados = [];
        $dados['id_componente'] = $idcomponente;
        
        var_dump($idcomponente);
        
        $model = new ComponentesModel();
        if ($model->updateStatus($dados) == "atualizado com sucesso!") {
            return header("location: show/{$_SESSION['id_ambiente']}");
        } else {
            return header("location: show/{$_SESSION['id_ambiente']}");
        }
    }
}
