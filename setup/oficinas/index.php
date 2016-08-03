<?php

require("../cabecalho.php");
require("../includes/makeInput.php");

if(!isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "login"</script>';
exit;	// sai da página para n exibir o restante do documento php

}


if(isset($_POST['novo'])){

$titulo				= filter_input(INPUT_POST, 'titulo');
$descricao			= filter_input(INPUT_POST, 'descricao');
$palestrantes	= filter_input(INPUT_POST, 'palestrantes');
$vagas	= filter_input(INPUT_POST, 'vagas');
$local	= filter_input(INPUT_POST, 'local');
$mapas	= filter_input(INPUT_POST, 'mapas');

	if(empty($titulo)){
		$erro = true;
		$msg = "Informe o Nome da Oficina";
	}elseif(empty($descricao)){
    $erro = true;
		$msg = "Informe a Descrição da Oficina";
  }elseif(count($palestrantes) <= 0){
    $erro = true;
		$msg = "Informe algum(a) Oficineiro(a)";
  }elseif(empty($vagas) || $vagas < 0){
    $erro = true;
		$msg = "Informe o número de Vagas";
  }elseif(count($mapas) <= 0){
    $erro = true;
		$msg = "Informe os Horários da Oficina";
  }elseif(empty($local)){
    $erro = true;
		$msg = "Informe o local da Atividade";
  }else{

    $mapas = json_encode($_POST['mapas']);
    $palestrantes = json_encode($_POST['palestrantes']);

		$param = array($titulo,$descricao,$palestrantes,$vagas,$mapas,$local);
		$qryInserir = $pdo->prepare("INSERT INTO atividades SET titulo=?,descricao=?,palestrantes=?,vagas=?,mapeamento=?,local=?,tipo='oficina',situacao='ativo'");
		$qryInserir->execute($param);

		if($qryInserir->rowCount() <= 0){
			$erro = true;
			$msg = "Erro ao cadastrar, tente novamente.";
			$debug = $qryInserir->errorInfo();
			$msg .= "<br/>". $debug[2];
		}else{
			$ok = true;
			$msg = "Palestrante Cadastrado com Sucesso!";
		}

		}

	}



?>
<title>Inscrição - II FLISOL Vale</title>
	</head>
	<body id="top" class="fixed-nav">

		<?php require("../menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container">
        <div class="row-fluid">

          <div class="span12" id="about">
            <h2 class="padding-top">Administrador <span>FLISOL Vale</span> |
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="sair.php">sair</a></small></h2>

          <div id="apresentacao">
          <h3>Seja bem vindo ao formulário de inscrição do Flisol Vale 2016!</h3>

  <div class="row-fluid">
		<!-- Cadastro de Oficinas -->
		<div class="span7" >
			<h2 class="padding-top">Cadastrar Oficinas</h2>
			<?php

			if($ok)
			alert($msg,"success");
			if($erro)
			alert($msg,"error");

			?>
			<form class="form-horizontal" method="POST" action="">
			<?php
			input("titulo","Título","input-xlarge","titulo","Nome da Oficina",true,$_POST["titulo"]);
      ?>

			<div class="control-group">
        <label class="control-label" for="descricao">Descrição</label>
        <div class="controls">
          <textarea rows="3" name="descricao" id="descricao" placeholder="Descrição da Oficina"><?php echo $_POST["descricao"] ?></textarea>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="palestrantes">Palestrantes</label>
        <div class="controls">
          <select multiple="multiple" name="palestrantes[]" required="required">
            <?php
              $getPalestrantes = $pdo->query("select * from palestrante");

              while ($palestrante = $getPalestrantes->fetchObject()) {

             ?>
            <option value="<?php echo $palestrante->id_palestrante; ?>"><?php echo $palestrante->nome; ?></option>
            <?php
          }
             ?>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="local">Local</label>
        <div class="controls">
          <select name="local" required="required">
            <option value="Laboratório I">Laboratório I</option>
            <option value="Laboratório II">Laboratório II</option>
            <option value="Laboratório III">Laboratório III</option>
            <option value="Auditório">Auditório</option>
            <option value="Videoconferência">Video Conferência</option>
            <option value="Sala de Estudos">Sala de Estudos</option>
            <option value="Sala 8">Sala 8</option>
            <option value="Auditório">Auditório</option>
          </select>
        </div>
      </div>

      <?php
			input("vagas","Vagas","input-small","vagas","00",true,$_POST["vagas"]);
			?>

      <div class="control-group">
        <label class="control-label" for="mapas">Horários (Mapas)</label>
        <div class="controls">
          <select multiple="multiple" name="mapas[]">
            <?php
              $getMapas = $pdo->query("select * from mapa");

              while ($mapa = $getMapas->fetchObject()) {

             ?>
            <option value="<?php echo $mapa->id_mapa; ?>">
              <?php echo $mapa->nome; ?> - <?php echo date('d/m',strtotime($mapa->dia)) ?> : <?php echo date('H:i',strtotime($mapa->inicio)) ?> : <?php echo date('H:i',strtotime($mapa->termino))?>
            </option>
            <?php
          }
             ?>
          </select>
        </div>
      </div>

			<div class="form-actions">
			<input type="submit" class="btn btn-primary" value="Cadastrar" name="novo">
			<button type="button" class="btn">Cancelar</button>
			</div>

			</form>
		</div>

		<div class="span5">
		<h2 class="padding-top">Oficinas Cadastrados</h2>
		<?php

		$qryAtividade = $pdo->query("SELECT * FROM atividades ORDER BY id_atividade");
		while($atividade = $qryAtividade->fetchObject()){
		?>
		<div class="mapa">
			<a href="view.php?id=<?php echo $atividade->id_atividade ?>"><?php echo $atividade->titulo ?> : <?php echo $atividade->descricao ?></a> 
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
