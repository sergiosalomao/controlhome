<?php


require_once("../vendor/autoload.php");

use Bramus\Router\Router;
  // Create a Router
    $router = new Router();
   $router->get('/', 'App\Controller\HomeController\HomeController@showhome');
   $router->get('configuracao', 'App\Controller\ConfiguracaoController\ConfiguracaoController@showconfiguracao');
   $router->get('comodos/create','App\Controller\ComodosController@create');
   $router->post('comodos/save','App\Controller\ComodosController@save');
   $router->get('comodos/showedit/{id}','App\Controller\ComodosController@showedit');
   $router->post('comodos/update','App\Controller\ComodosController@update');
   $router->get('comodos/delete/{id}','App\Controller\ComodosController@delete');

   $router->get('componentes/show','App\Controller\ComponentesController@showcomponentes');
   $router->get('componentes/create','App\Controller\ComponentesController@create');
   $router->post('componentes/save','App\Controller\ComponentesController@save');
   $router->get('componentes/delete/{id}','App\Controller\ComponentesController@delete');
 
   $router->get('about', 'App\Controller\Controller@about');

    $router->run();