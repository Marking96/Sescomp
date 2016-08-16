<?php

require("../cabecalho.php");
require("../includes/makeInput.php");

if(!isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "login"</script>';
exit;	// sai da página para n exibir o restante do documento php

}


if(isset($_POST['novo'])){

$nome				= filter_input(INPUT_POST, 'nome');
$descricao			= filter_input(INPUT_POST, 'descricao');
$facebook	= filter_input(INPUT_POST, 'facebook');
$twitter	= filter_input(INPUT_POST, 'twitter');
$gplus	= filter_input(INPUT_POST, 'gplus');

	if(empty($nome)){
		$erro = true;
		$msg = "Informe o Nome do Palestrante";
	}else{
		$param = array($nome,$descricao,$facebook,$twitter,$gplus);
		$qryInserir = $pdo->prepare("INSERT INTO palestrante SET nome=?,descricao=?,facebook=?,twitter=?,gplus=?");
		$qryInserir->execute($param);
		if($qryInserir->rowCount() <= 0){
			$erro = true;
			$msg = "Erro ao cadastrar, tente novamente.".$maxId;
			$debug = $qryInserir->errorInfo();
			$msg .= "<br/>". $debug[2];
		}else{
			$ok = true;
			$msg = "Palestrante Cadastrado com Sucesso!";
		}

		}

	}



?>
<title>Inscrição - Sescomp</title>
	</head>
	<body id="top" class="fixed-nav">

		<?php require("../menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container">
        <div class="row-fluid">



          <div class="span12" id="about">
            <h2 class="padding-top">Administrador <span>Sescomp</span> |
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="sair.php">sair</a></small></h2>

          <div id="apresentacao">
          <h3>Seja bem vindo ao formulário de inscrição do Sescomp!</h3>

          <div class="row-fluid">
						<!-- Cadastro de Oficinas -->
						<div class="span7" >
							<h2 class="padding-top">Cadastrar Palestrantes</h2>
							<?php

							if($ok)
							alert($msg,"success");
							if($erro)
							alert($msg,"error");
							?>
							<form class="form-horizontal" method="POST" action="">
							<?php

							input("nome","Nome","input-xlarge","nome","Nome do Palestrante",true,$_POST["nome"]);
							input("descricao","Descrição","input-xlarge","descricao","Descrição sobre o Palestrante",false,$_POST["descricao"]);
							input("facebook","Facebook","input-xlarge","facebook","http://fb.com/nickname",false,$_POST["facebook"]);
							input("twitter","Twitter","input-xlarge","twitter","http://twitter.com/nickname",false,$_POST["twitter"]);
							input("gplus","Google+","input-xlarge","gplus","http://plus.google.com/nickname",false,$_POST["gplus"]);

							?>

							<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="Cadastrar" name="novo">
							<button type="button" class="btn">Cancelar</button>
							</div>

							</form>
						</div>

						<div class="span5">
						<h2 class="padding-top">Oficineiros Cadastrados</h2>
						<?php

						$qryOficineiro = $pdo->query("SELECT * FROM palestrante ORDER BY id_palestrante");
						while($oficineiro = $qryOficineiro->fetchObject()){
						?>
						<div class="mapa">
							<?php echo $oficineiro->id_palestrante ?> - <?php echo $oficineiro->nome ?>: <?php echo $oficineiro->descricao ?>
						</div>
						<?php } ?>

						</div>

					</div>


          </div>

          </div>

      </div>
    </section>

		<?php require("../rodape.php"); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo $urlBase; ?>js/vendor/jquery.mask.js"></script>
<script type="text/javascript">

	$('#inicio').mask('00:00');
	$('#termino').mask('00:00');

  $(".alert").alert();

</script>

	</body>
</html>
