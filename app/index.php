    <?php

    session_start();
    require_once("../config/system.config.php");
    require_once("../vendor/autoload.php");

    use Bramus\Router\Router;
    use App\Controller\IluminacaoController;

    // Create a Router
    $router = new Router();
    #HOME
    $router->get('/', 'App\Controller\HomeController\HomeController@showhome');
    #CONFIGURACAO
    $router->get('configuracao', 'App\Controller\ConfiguracaoController\ConfiguracaoController@showconfiguracao');
    #AMBIENTES
    $router->get('comodos/create', 'App\Controller\ComodosController@create');
    $router->get('comodos/showedit/{id}', 'App\Controller\ComodosController@showedit');
    $router->get('comodos/delete/{id}', 'App\Controller\ComodosController@delete');
    $router->post('comodos/update', 'App\Controller\ComodosController@update');
    $router->post('comodos/save', 'App\Controller\ComodosController@save');

    #COMPONENTES
    $router->get('componentes/show/{idcomodo}', 'App\Controller\ComponentesController@show');
    $router->get('componentes/create/{idcomodo}', 'App\Controller\ComponentesController@create');
    $router->get('componentes/delete/{id}', 'App\Controller\ComponentesController@delete');
    $router->get('componentes/edit/{id}', 'App\Controller\ComponentesController@edit');
    $router->post('componentes/save', 'App\Controller\ComponentesController@save');
    $router->post('componentes/update', 'App\Controller\ComponentesController@update');

    #ILUMINACAO
    $router->get('iluminacao', 'App\Controller\IluminacaoController@index');
    $router->get('iluminacao/componentes/{idComodo}', 'App\Controller\IluminacaoController@listaComponentes');

    #SENSORES
    $router->get('sensores', 'App\Controller\SensoresController@index');
    $router->run();
