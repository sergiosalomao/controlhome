    <?php
    if (!headers_sent()) session_start();

    require_once("../config/system.config.php");
    require_once("../vendor/autoload.php");
    if (isset($_SESSION['autenticado']) && ($_SESSION['autenticado']  == null))
        $_SESSION['autenticado']  = false;

    use Bramus\Router\Router;

    // Create a Router
    $router = new Router();

    if ((isset($_SESSION['autenticado'])) && ($_SESSION['autenticado'] == true)) {
        #LOGIN
        $router->get('/login/logout', 'App\Controller\LoginController@logout');
        $router->get('login', 'App\Controller\ConfiguracaoController\LoginController@login');
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
        $router->get('usuarios/login', 'App\Controller\UsuariosController@showLogin');
        $router->get('configuracao/usuarios/create', 'App\Controller\UsuariosController@create');
        $router->get('configuracao/usuarios/showedit/{id}', 'App\Controller\UsuariosController@showedit');
        $router->get('configuracao/usuarios/delete/{id}', 'App\Controller\UsuariosController@delete');
        $router->post('configuracao/usuarios/update', 'App\Controller\UsuariosController@update');
        $router->post('configuracao/usuarios/save', 'App\Controller\UsuariosController@save');
        #COMPONENTES
        $router->post('componentes/registrahardware', 'App\Controller\ComponentesController@RegistraHardware');
        $router->post('componentes/recebedados', 'App\Controller\ComponentesController@RecebeDados');
        $router->get('configuracao/componentes/show/{id_ambiente}', 'App\Controller\ComponentesController@show');
        $router->get('configuracao/componentes/create/{id_ambiente}', 'App\Controller\ComponentesController@create');
        $router->get('configuracao/componentes/delete/{id}', 'App\Controller\ComponentesController@delete');
        $router->get('configuracao/componentes/edit/{id}', 'App\Controller\ComponentesController@edit');
        $router->post('configuracao/componentes/save', 'App\Controller\ComponentesController@save');
        $router->post('configuracao/componentes/update', 'App\Controller\ComponentesController@update');
        $router->get('configuracao/componentes/atualizastatus/{idcomponente}', 'App\Controller\ComponentesController@atualizaStatus');
        $router->get('configuracao/componentes/verificastatus/{codigo}', 'App\Controller\ComponentesController@verificaStatus');
        #ILUMINACAO
        $router->get('iluminacao', 'App\Controller\IluminacaoController@ShowIndex');
        $router->get('iluminacao/componentes/{id_ambiente}', 'App\Controller\IluminacaoController@listaComponentes');
        #RESERVATORIOS
        $router->get('configuracao/reservatorios', 'App\Controller\ReservatoriosController@show');
        $router->get('configuracao/reservatorios/show/{id_ambiente}', 'App\Controller\ReservatoriosController@show');
        $router->get('configuracao/reservatorios/create', 'App\Controller\ReservatoriosController@create');
        $router->get('configuracao/reservatorios/delete/{id}', 'App\Controller\ReservatoriosController@delete');
        $router->get('configuracao/reservatorios/showedit/{id}', 'App\Controller\ReservatoriosController@showEdit');
        $router->post('configuracao/reservatorios/save', 'App\Controller\ReservatoriosController@save');
        $router->post('configuracao/reservatorios/update', 'App\Controller\ReservatoriosController@update');
        #SENSORES
        $router->get('sensores/temperatura', 'App\Controller\SensoresController@showTemperatura');
        $router->get('sensores/presenca', 'App\Controller\SensoresController@showPresenca');
        $router->get('sensores/agua', 'App\Controller\SensoresController@showNivelAgua');
        $router->get('sensores/portas', 'App\Controller\SensoresController@showPorta');
        $router->get('sensores/energia', 'App\Controller\SensoresController@showEnergia');
    } else {
        $_SESSION['autenticado'] = false;
        $_SESSION['usuario'] = 'nao definido';
        #LOGIN
        $router->get('/login/logout', 'App\Controller\LoginController@logout');
        $router->get('/', 'App\Controller\LoginController@login');
        $router->post('/login/autentica', 'App\Controller\LoginController@autentica');
    }
    $router->run();
