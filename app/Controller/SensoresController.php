<?php

namespace App\Controller;

class SensoresController extends Controller
{
    public function index()
    {
     
        $this->render("sensores",'index');
    }
}
