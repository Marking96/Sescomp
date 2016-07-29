<?php

require("../cabecalho.php");
require("../includes/makeInput.php");

if(!isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "login"</script>';
exit;	// sai da página para n exibir o restante do documento php

}


?>
<title>Inscrição - II FLISOL Vale</title>
	</head>
	<body id="top" class="fixed-nav">

		<?php require("../menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container">
        <div class="row">

          <div class="span12" id="about">
            <h2 class="padding-top">Administrador <span>FLISOL Vale</span> |
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="sair.php">sair</a></small></h2>

          <div id="apresentacao">
          <h3>Seja bem vindo ao formulário de inscrição do Flisol Vale 2016!</h3>
          <?php

          if($ok)
          alert($msg,"success");
          if($erro)
          alert($msg,"error");
          ?>

          <div class="row">
          <div class="span6">
          <h2>Cadastrar Mapa de Horário</h2>
          <form class="form-horizontal" method="POST" action="">
          <?php

          input("nome","Nome do Mapa","input-medium","nome","Exe.: M01,M02,T01",true,$_POST["nome"]);
          input("inicio","Hora Início","input-small","inicio","00:00",true,$_POST["inicio"],"text","","inputInicio");
          input("termino","Hora Termino","input-small","termino","00:00",true,$_POST["termino"],"text","","inputTermino");

          ?>

          <div class="form-actions">
          <input type="submit" class="btn btn-primary" value="Enviar" name="envioMapa">
          <button type="button" class="btn">Cancelar</button>
          </div>

          </form>
          </div>

          <div class="span6">
          <h2>Mapas Cadastrados</h2>
          <?php

          $qryMapas = $pdo->query("SELECT * FROM mapa ORDER BY nome");
          while($mapa = $qryMapas->fetchObject()){
          ?>
          <div class="mapa">
            <?php echo $mapa->id_mapa ?> - <?php echo $mapa->nome ?>: <?php echo $mapa->inicio ?>-<?php echo $mapa->termino ?>
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
