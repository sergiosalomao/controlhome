<?php

namespace App\Controller;

class IluminacaoController extends Controller
{
    protected $idcomodo;
    
    public function index()
    {
    $this->render("iluminacao",'index');
    }

    public function listaComponentes($idComodo)
    {
    $this->idcomodo = $idComodo;
      $this->render("iluminacao",'lista');
    }

}
