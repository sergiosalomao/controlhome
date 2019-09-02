<?php

namespace App\Controller;

class Controller{

    private $controller;
    private $view;

   public function about(){
       echo "about";
   }

   public function layout(){
    include_once 'Views/layout/header.php';
   }

   public function render($controller, $view){
        $this->view = $view;
        $this->controller = $controller;
        $this->layout();
        $this->view();
    }

    public function view(){
        include_once 'Views/'.$this->controller.'/'.$this->view.'.php';
    }

}