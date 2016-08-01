<?php

require("cabecalho.php");
require("includes/makeInput.php");

if(isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "index"</script>';
exit;	// sai da página para n exibir o restante do documento php

}

/* Verifica se o usuário enviou o formulário */
if(isset($_POST['logar'])){

/* Importa o Objeto de Login */
require('includes/class.login.php');

/* Cria um novo objeto de Login */
$login = new Login();

/* Seta os dados de Login como obrigatórios */
$login->set($_POST['login'], 'login')->obrigatorio();
$login->set($_POST['senha'], 'senha')->obrigatorio();

/* Pega as informações passadas pelo input de nome 'lembrar' quando enviado o Formulario */
$lembrar = filter_input(INPUT_POST, 'lembrar');

/* Aplica o método validar, se estiver com os dados corretos passa, executa o que tem dentro */
if($login->validar()){

/* Query para consultar no BD se existe o login e senha e recupera os dados */
$sql = "SELECT id_usuario,login,nome,data_acesso FROM usuario WHERE login = ? AND senha = ?";

/* Envia os parâmetros que deverao substituir os '?' nas querys */
$param = array($_POST['login'], sha1($_POST['senha']));
// deve levar em consideracao a sequencia

$qryUser = $pdo->prepare($sql); // prepara os parametros para a consulta
$qryUser->execute($param); // executa o comando

	/* Cria um objeto com os dados obtidos */
$res = $qryUser->fetchObject();

	if($qryUser->rowCount() <= 0){ // verifica se n retornou dados
    $error = true;
    $msg = '<strong>Erro:</strong> Login inv&aacute;lido';
	}else{

		/* Seta as sessões com os dados do objeto */
		$_SESSION['idUsuario']    	= $res->id_usuario;
		$_SESSION['loginUsuario']   	= $res->login;
		$_SESSION['nomeUsuario']  	= $res->nome;
		$_SESSION['dataAcesso'] 		= $res->data_acesso;

		/* Atualiza o valor de ultimo acesso do usuario */
		$qryUpdate = $pdo->prepare("UPDATE usuario SET data_acesso=NOW() WHERE id_usuario=?");
		$qryUpdate->execute(array($res->id_usuario));


		/* Direciona para a página depois de logado */
		echo '<script type="text/javascript">location = "'.$urlBase.'"</script>';
		exit;	// sai da página para n exibir o restante do documento php

	}

}else{
/* Informa os erros caso n esteja valido */
	$erro = $login->erros();
}

}


?>
<title>Inscrição - Sescomp</title>
	</head>
	<body id="top" class="fixed-nav">

		<?php require("menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container">
        <div class="row">

					<div class="span12" id="about">
						<h2 class="padding-top">Login <span>Sescomp</span></h2>

						<?php

						if($ok)
						alert($msg,"success");
						if($error)
						alert($msg,"error");
						?>

						<form class="form-horizontal" method="POST" action="">
						<?php

						input("login","Login","input-xlarge","login","usuário",true,$_POST["login"]);
						input("senha","Senha","input-xlarge","senha","senha",true,"","password");

						?>

						<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Enviar" name="logar">
						<button type="button" class="btn">Cancelar</button>
						</div>

						</form>
					</div>

      </div>
    </section>

		<?php require("../rodape.php"); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo $urlBase; ?>js/vendor/jquery.mask.js"></script>
<script type="text/javascript">

  $(".alert").alert();

</script>

	</body>
</html>
