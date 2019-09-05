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
    $router->get('configuracao/ambientes', 'App\Controller\ConfiguracaoController\ConfiguracaoController@showAmbiente');
    $router->get('configuracao/usuarios', 'App\Controller\ConfiguracaoController\ConfiguracaoController@showUsuario');
    
    #AMBIENTES
    $router->get('configuracao/ambientes/create', 'App\Controller\AmbientesController@create');
    $router->get('configuracao/ambientes/showedit/{id}', 'App\Controller\AmbientesController@showedit');
    $router->get('configuracao/ambientes/delete/{id}', 'App\Controller\AmbientesController@delete');
    $router->post('configuracao/ambientes/update', 'App\Controller\AmbientesController@update');
    $router->post('configuracao/ambientes/save', 'App\Controller\AmbientesController@save');

     #USUARIOS
     $router->get('configuracao/usuarios/create', 'App\Controller\UsuariosController@create');
     $router->get('configuracao/usuarios/showedit/{id}', 'App\Controller\UsuariosController@showedit');
     $router->get('configuracao/usuarios/delete/{id}', 'App\Controller\UsuariosController@delete');
     $router->post('configuracao/usuarios/update', 'App\Controller\UsuariosController@update');
     $router->post('configuracao/usuarios/save', 'App\Controller\UsuariosController@save');

    #COMPONENTES
    $router->get('configuracao/componentes/show/{id_ambiente}', 'App\Controller\ComponentesController@show');
    $router->get('configuracao/componentes/create/{id_ambiente}', 'App\Controller\ComponentesController@create');
    $router->get('configuracao/componentes/delete/{id}', 'App\Controller\ComponentesController@delete');
    $router->get('configuracao/componentes/edit/{id}', 'App\Controller\ComponentesController@edit');
    $router->post('configuracao/componentes/save', 'App\Controller\ComponentesController@save');
    $router->post('configuracao/componentes/update', 'App\Controller\ComponentesController@update');

    #ILUMINACAO
    $router->get('iluminacao', 'App\Controller\IluminacaoController@index');
    $router->get('iluminacao/componentes/{id_ambiente}', 'App\Controller\IluminacaoController@listaComponentes');

    #SENSORES
    $router->get('sensores', 'App\Controller\SensoresController@index');
    $router->run();
  