<?php
#EXIBE EM TEMPO DE EXECUÇÃO OS ERROS DO PHP
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

#error_reporting(E_ERROR | E_WARNING | E_PARSE);
$confIni = parse_ini_file("config.ini", true);
if (!$confIni)
    exit("<div class='alert alert-danger'>ERRO[65382] - Erro ao tentar se conectar com o servidor. Entre em contato com o administrador do sistama!</div>");

#SERVIDOR_APP
define('HOST', $confIni['SERVIDOR_APP']['HOST']);
define('PORTA', $confIni['SERVIDOR_APP']['PORTA']);
#SERVIDOR_CENTRAL_1
define('HOST_CENTRAL_1', $confIni['SERVIDOR_CENTRAL_1']['HOST_CENTRAL_1']);
define('PORTA_CENTRAL_1', $confIni['SERVIDOR_CENTRAL_1']['PORTA_CENTRAL_1']);
#BANCO
define('DBHOST', $confIni['BANCO']['HOST']);
define('DBPORTA', $confIni['BANCO']['PORTA']);
define('DBDEFAULT', $confIni['BANCO']['DBDEFAULT']);
define('DBDRIVER', $confIni['BANCO']['DRIVER']);
define('DBSCHEMA', $confIni['BANCO']['SCHEMA']);
define('DBUSUARIO', $confIni['BANCO']['USUARIO']);
define('DBSENHA', $confIni['BANCO']['SENHA']);
define('DSN',"pgsql:host=" . DBHOST . ";port=" . DBPORTA . ";dbname=" . DBDEFAULT . ";user=" . DBUSUARIO . ";password=" . DBSENHA . ";");
#APP
define('TEMPO_SENSOR_PRESENCA', $confIni['APP']['TEMPO_SENSOR_PRESENCA']);
define('TEMPO_SENSOR_TEMPERATURA', $confIni['APP']['TEMPO_SENSOR_TEMPERATURA']);
define('TEMPO_SENSOR_NIVEL_AGUA', $confIni['APP']['TEMPO_SENSOR_NIVEL_AGUA']);
define('TEMPO_LEITURA_INTERRUPTORES', $confIni['APP']['TEMPO_LEITURA_INTERRUPTORES']);
#SYSTEM_CONFIG
define('DIR_ROOT', $confIni['SYSTEM_CONFIG']['DIR_ROOT']);
define('DIR_APP', $confIni['SYSTEM_CONFIG']['DIR_APP']);
define('DIR_LIBS', $confIni['SYSTEM_CONFIG']['DIR_LIBS']);