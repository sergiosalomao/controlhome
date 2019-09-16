<?php

namespace App\Controller;

use App\Models\ReservatoriosModel\ReservatoriosModel;

class ReservatoriosController extends Controller
{
    protected $id_reservatorio;
    protected $descricao;
    protected $capacidade;

    public function show()
    {
        $this->layout();
        $this->render('reservatorios', 'lista');
    }

    public function listaReservatorios()
    {
        $objReservatorios = new ReservtoriosModel();
        return $objReservatorios->listAll();
    }

    public function create()
    {
        $this->layout();
        $this->render('reservatorios', 'create');
    }

    public function save()
    {
        $objReservatorios = new ReservatoriosModel();
        if (isset($_POST['descricao'])) {
            if ($objReservatorios->save($_POST) == "salvo com sucesso!") {
                return header("location: ../reservatorios");
            } else {
                return header("location: reservatorios/create");
            }
        }
    }

    public function update()
    {
        $objReservatorios = new ReservatoriosModel();
        if ($_POST['id_reservatorio'] != null) {
            if ($objReservatorios->update($_POST) == "atualizado com sucesso!") {
                return header("location: ../../configuracao/reservatorios");
            } else {
                return header("location: ../reservatorios");
                return header("location: ../reservatorios");
            }
        }
    }

    public function showedit($id)
    {
        $objReservatorios = new ReservatoriosModel();
        $dados = $objReservatorios->listById($id);
        $this->id_reservatorio = $dados['id_reservatorio'];
        $this->descricao = $dados['descricao'];
        $this->capacidade = $dados['capacidade'];
        $this->layout();
        $this->render('reservatorios', 'edit');
    }

    public function delete($id)
    {
        $objReservatorios = new ReservatoriosModel();
        if ($objReservatorios->delete($id) == "excluido com sucesso!") {
            return header("location: ../../reservatorios");
        } else {
            return header("location: ../reservatorios");
        }
    }
}