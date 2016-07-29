<?php

error_reporting(E_ALL & ~E_NOTICE);

define(HOST, 'localhost');
define(USER, 'root');
define(SENHA, '');
define(BD, 'sescomp');

try{
	$dsn = "mysql:host=".HOST.";dbname=".BD.";charset=utf8";
	$opcoes = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
	);
	$pdo = new PDO($dsn,USER,SENHA, $opcoes);
//	$pdo = new PDO("mysql:host=".HOST."; dbname=".BD.";", USER, SENHA);
}catch(PDOException $e){

	echo "Erro ao conectar - ". $e->getMessage();

}

$urlBase  = 'http://'.$_SERVER['SERVER_NAME'].'/';
// $urlLogin  = 'http://'.$_SERVER['SERVER_NAME'].'/login';


?>
