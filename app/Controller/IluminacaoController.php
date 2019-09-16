<?php

namespace App\Controller;

class IluminacaoController extends Controller
{
  protected $id_ambiente;

  public function showIndex()
  {
    $this->render("iluminacao", 'index');
    $this->layout();
  }

  public function listaComponentes($id)
  {
    $this->id_ambiente = $id;
    $this->layout();
    $this->render("iluminacao", 'lista');
  }
}