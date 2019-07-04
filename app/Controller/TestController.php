<?php
namespace App\Http\Controller;

use Framework\Core\Controller;

/**
 * Classe: Controller
 * =============================================================================
 * Objectivo: Controller para teste
 * 
 * 
 * 
 * =============================================================================
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@hotmail.com>
 * 
 * @copyright 2015-2019 AB Babosa Serviços e Desenvolvimento ME
 * =============================================================================
 */
class TestController extends Controller
{

    public function index()
    {
        return toJSON(["message" => "Teste OK"]);
    }
}
