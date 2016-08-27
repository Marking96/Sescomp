<?php

error_reporting(E_ALL & ~E_NOTICE);

define(HOST, 'localhost');
define(USER, 'usuario');
define(SENHA, 'senha');
define(BD, 'banco');

try{

	$pdo = new PDO("mysql:host=".HOST."; dbname=".BD.";", USER, SENHA);

}catch(PDOException $e){

	echo "Erro ao conectar - ". $e->getMessage();

}

$urlBase  = 'http://'.$_SERVER['SERVER_NAME'].'/sescomp/';
$urlLogin  = 'http://'.$_SERVER['SERVER_NAME'].'/sescomp/setup/login.php';

?>
