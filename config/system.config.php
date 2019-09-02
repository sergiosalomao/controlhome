<?php
//EXIBE EM TEMPO DE EXECUÇÃO OS ERROS DO PHP
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$confIni = parse_ini_file("config.ini", true);

if (!$confIni)
    exit("<div class='alert alert-danger'>ERRO[65382] - Erro ao tentar se conectar com o servidor. Entre em contato com o administrador do sistama!</div>");


define('HOST', $confIni['SERVIDOR']['HOST']);
define('PORTA', $confIni['SERVIDOR']['PORTA']);
