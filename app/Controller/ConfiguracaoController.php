<?php
namespace App\Controller\ConfiguracaoController;

use App\Controller\Controller;

class ConfiguracaoController extends Controller
{
    public function showconfiguracao()
    {
         $this->render('configuracao','configuracao');
    }
}
