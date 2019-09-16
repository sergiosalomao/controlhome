<?php
namespace App\Http\Controller;

use Framework\Core\Controller;

class TestController extends Controller
{
    public function index()
    {
        return toJSON(["message" => "Teste OK"]);
    }
}
