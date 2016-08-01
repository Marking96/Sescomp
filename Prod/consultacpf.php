<?php

/* Importa o arquivo de configura do BD e Links */
require("configuracao.php");
require("includes/funcoes.php");

if(!isset($_GET['cpf'])){
	echo 'error1';
}else{

$cpf = limpaCPF_CNPJ($_GET['cpf']);
//echo $cpf;

if(validaCPF($cpf)){ 

	$qryCPF = $pdo->prepare("SELECT cpf FROM participante WHERE cpf = ?");
  $qryCPF->execute(array($cpf));
  if($qryCPF->rowCount() > 0){
    echo "error";
  }else{
    echo "ok";
  }

}else{
	echo "error";
}



}

?>
