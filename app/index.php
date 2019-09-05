    <?php
    if (!headers_sent()) session_start();    
    require_once("../config/system.config.php");
    require_once("../vendor/autoload.php");
    
    use Bramus\Router\Router;


    // Create a Router
    $router = new Router();
    #HOME
    $router->get('/', 'App\Controller\HomeController\HomeController@showhome');
    #CONFIGURACAO
    $router->get('configuracao', 'App\Controller\ConfiguracaoController\ConfiguracaoController@showconfiguracao');
    
    #AMBIENTES
    $router->get('ambientes/create', 'App\Controller\AmbientesController@create');
    $router->get('ambientes/showedit/{id}', 'App\Controller\AmbientesController@showedit');
    $router->get('ambientes/delete/{id}', 'App\Controller\AmbientesController@delete');
    $router->post('ambientes/update', 'App\Controller\AmbientesController@update');
    $router->post('ambientes/save', 'App\Controller\AmbientesController@save');

    #COMPONENTES
    $router->get('componentes/show/{id_ambiente}', 'App\Controller\ComponentesController@show');
    $router->get('componentes/create/{id_ambiente}', 'App\Controller\ComponentesController@create');
    $router->get('componentes/delete/{id}', 'App\Controller\ComponentesController@delete');
    $router->get('componentes/edit/{id}', 'App\Controller\ComponentesController@edit');
    $router->post('componentes/save', 'App\Controller\ComponentesController@save');
    $router->post('componentes/update', 'App\Controller\ComponentesController@update');

    #ILUMINACAO
    $router->get('iluminacao', 'App\Controller\IluminacaoController@index');
    $router->get('iluminacao/componentes/{id_ambiente}', 'App\Controller\IluminacaoController@listaComponentes');

    #SENSORES
    $router->get('sensores', 'App\Controller\SensoresController@index');
    $router->run();
  