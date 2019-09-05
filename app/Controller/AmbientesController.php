<?php
namespace App\Controller;

use App\Models\AmbientesModel\AmbientesModel;

class AmbientesController extends Controller
{
    protected $id_ambiente;
    protected $nome;
    protected $idmenu;

    public function listaAmbientes()
    {
        $objAmbientes = new AmbientesModel();
        return $objAmbientes->listAll();
    }

    public function create()
    {
        $this->layout();
        $this->render('ambientes', 'create');
    }

    public function save()
    {
        $objAmbientes = new AmbientesModel();

        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            if ($objAmbientes->save($nome) == "salvo com sucesso!") {
                return header("location: ../");
            } else {
                return header("location: ambientes/create");
            }
        }
    }

    public function update()
    {
        $id = $_POST['id_ambiente'];
        $nome = $_POST['nome'];
        $objAmbientes = new AmbientesModel();

        if ($id != null) {
            if ($objAmbientes->update($id, $nome) == "atualizado com sucesso!") {

                return header("location: ../configuracao");
            } else {
                return header("location: ../configuracao");
            }
        }
    }

    public function showedit($id)
    {
        $objAmbientes = new AmbientesModel();
        $dados = $objAmbientes->listById($id);
        $this->id_ambiente = $dados['id_ambiente'];
        $this->nome = $dados['descricao'];
        
        $this->layout();
        $this->render('ambientes', 'edit');
    }

    public function delete($id)
    {
        $objAmbientes = new AmbientesModel();
        if ($objAmbientes->delete($id) == "excluido com sucesso!") {
            return header("location: ../../configuracao");
        } else {
            return header("location: ../../configuracao");
        }
    }
}
