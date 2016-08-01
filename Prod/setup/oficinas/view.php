<?php

require("../cabecalho.php");
require("../includes/makeInput.php");

if(!isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "login"</script>';
exit;	// sai da página para n exibir o restante do documento php

}

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "index"</script>';
exit;	// sai da página para n exibir o restante do documento php

}

$id = $_GET["id"];

$getAtividade = $pdo->query("SELECT * from atividade WHERE id_atividade = ". $id);
if($getAtividade->rowCount() > 0){
  $atividade = $getAtividade->fetchObject();
}else{
  echo '<script type="text/javascript">location = "index"</script>';
  exit;	// sai da página para n exibir o restante do documento php
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
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="../sair.php">sair</a></small></h2>

          <div id="apresentacao">
          <h3>Seja bem vindo ao formulário de inscrição do Sescomp!</h3>

  <div class="row-fluid">
		<!-- Cadastro de Oficinas -->
		<div class="span5" >
			<h2 class="padding-top">Oficina: <?php echo $atividade->titulo; ?></h2>
		<?php $atividade->descricao; ?>

		</div>

		<div class="span7">
		<h2 class="padding-top">Inscritos na Atividade</h2>
		<?php

		$qryInscritos = $pdo->query("SELECT * FROM `atividade_participante` as ap
INNER JOIN participante as p ON (p.id_participante = ap.id_participante)
WHERE ap.id_atividade = ". $id . " ORDER BY cidade,p.nome");
		while($inscrito = $qryInscritos->fetchObject()){
		?>
		<div class="mapa">
			<?php echo $inscrito->id_participante ?> - <?php echo $inscrito->nome ?>: <?php echo $inscrito->cidade ?>
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

	$('#vagas').mask('00');

  $(".alert").alert();

</script>

	</body>
</html>
