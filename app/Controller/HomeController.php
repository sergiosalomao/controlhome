<?php
namespace App\Controller\HomeController;

use App\Controller\Controller;

class HomeController extends Controller
{
    public function showhome()
    {
        $this->layout();
        $this->render("home","home");
    }
}
