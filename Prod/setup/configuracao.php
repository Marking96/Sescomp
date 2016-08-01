<?php

error_reporting(E_ALL & ~E_NOTICE);

define(HOST, 'localhost');
define(USER, 'root');
define(SENHA, '');
define(BD, 'sescomp');

try{

	$pdo = new PDO("mysql:host=".HOST."; dbname=".BD.";", USER, SENHA);

}catch(PDOException $e){

	echo "Erro ao conectar - ". $e->getMessage();

}

$urlBase  = 'http://'.$_SERVER['SERVER_NAME'].'/setup/';
$urlLogin  = 'http://'.$_SERVER['SERVER_NAME'].'/setup/login';


?>
