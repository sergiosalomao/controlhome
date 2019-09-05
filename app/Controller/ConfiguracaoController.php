<?php
namespace App\Controller\ConfiguracaoController;

use App\Controller\Controller;

class ConfiguracaoController extends Controller
{
    public function showconfiguracao()
    {
        $this->layout();
        $this->render('configuracao','configuracao');
    }

    public function showUsuario()
    {
        $this->layout();
        $this->render('configuracao','usuarios');
    }

    public function showAmbiente()
    {
        $this->layout();
        $this->render('configuracao','ambientes');
    }

    
}
