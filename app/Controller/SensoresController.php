<?php

namespace App\Controller;

class SensoresController extends Controller
{
    public function index()
    {
        $this->layout();
        $this->render("sensores",'index');
    }
}
