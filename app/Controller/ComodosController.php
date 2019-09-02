<?php
namespace App\Controller;

use App\Models\ComodosModel\ComodosModel;

class ComodosController extends Controller
{
    protected $id;
    protected $nome;
    protected $idmenu;

    public function listaComodos()
    {
        $model = new ComodosModel();
        return $model->listAll();
    }

    public function create()
    {
        $this->layout();
        $this->render('comodos', 'create');
    }

    public function save()
    {
        $model = new ComodosModel();

        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            if ($model->save($nome) == "salvo com sucesso!") {
                return header("location: ../configuracao");
            } else {
                return header("location: comodos/create");
            }
        }
    }

    public function update()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $model = new ComodosModel();

        if ($id != null) {
            if ($model->update($id, $nome) == "atualizado com sucesso!") {

                return header("location: ../configuracao");
            } else {
                return header("location: ../configuracao");
            }
        }
    }

    public function showedit($id)
    {
        $model = new ComodosModel();
        $dados = $model->listById($id);
        $this->id = $dados['id'];
        $this->nome = $dados['descricao'];
        $this->layout();
        $this->render('comodos', 'editacomodo');
    }

    public function delete($id)
    {
        $model = new ComodosModel();
        if ($model->delete($id) == "excluido com sucesso!") {
            return header("location: ../../configuracao");
        } else {
            return header("location: ../../configuracao");
        }
    }
}
