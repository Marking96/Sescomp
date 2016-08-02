<?php

error_reporting(E_ALL & ~E_NOTICE);

define(HOST, 'localhost');
define(USER, 'u592794861_scpm');
define(SENHA, 'wY:/NStC9r9atCnh3I');
define(BD, 'u592794861_bd');

try{

	$pdo = new PDO("mysql:host=".HOST."; dbname=".BD.";", USER, SENHA);

}catch(PDOException $e){

	echo "Erro ao conectar - ". $e->getMessage();

}

$urlBase  = 'http://'.$_SERVER['SERVER_NAME'].'/setup/';
$urlLogin  = 'http://'.$_SERVER['SERVER_NAME'].'/setup/login';


?>
