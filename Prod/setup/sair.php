<?php

session_start();

if(isset($_SESSION)){

	$idUsuario = $_SESSION['idUsuario'];

	require('../configuracao.php');

	$Ult_acesso = $pdo->query("UPDATE admin SET data_acesso = NOW() WHERE id_usuario = $idUsuario");

	$pdo = NULL;

	unset($_SESSION['idUsuario']);
	unset($_SESSION['nomeUsuario']);
	unset($_SESSION['dataAcesso']);

	echo '<script type="text/javascript">location = "index.php"</script>';

}



?>
