<?php
//EXIBE EM TEMPO DE EXECUÇÃO OS ERROS DO PHP
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

/***********************************************************************/
/************* CARREGA DADOS DO ARQUIVO DE CONFIGURAÇÃO ****************/
/***********************************************************************/

$confIni = parse_ini_file("../config/config.ini", true);

if (!$confIni)
    exit("<div class='alert alert-danger'>ERRO[65382] - Erro ao tentar se conectar com o servidor. Entre em contato com o administrador do sistama!</div>");

//FAZ DEFINIÇÃO DAS CONSTANTES DE CONEXÃO DOS VALORES CONFIGURADOS NO config/config.ini
define('DIR_ROOT', $confIni['SYSTEM_CONFIG']['DirRoot']); #Define o nome da pasta do projeto
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT'] . DIR_ROOT); //DEFINE O CAMINHO COMPLETO DO SISTEMA DENTRO DO "www/htdocs"
define('PATH_TEMP', sys_get_temp_dir()); //INFORMA O PATH TEMPORÁRIO DO SISTEMA


define('DATA_BASE', $confIni['CONEXAO']['DbDefault']);
define('SCHEMA', $confIni['CONEXAO']['Schema']);
define('DRIVER', $confIni['CONEXAO']['Driver']);
define('HOST', $confIni['CONEXAO']['Host']);
define('USER', $confIni['CONEXAO']['Usuario']);
define('PASS', $confIni['CONEXAO']['Senha']);
define('PORT', $confIni['CONEXAO']['Porta']);

define('DATE_STYLE', $confIni['SYSTEM_CONFIG']['DateStyle']);


