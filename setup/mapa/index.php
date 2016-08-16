<?php

require("../cabecalho.php");
require("../includes/makeInput.php");

if(!isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
echo '<script type="text/javascript">location = "login"</script>';
exit; // sai da página para n exibir o restante do documento php

}
if(isset($_POST['envioMapa'])){

$nome = filter_input(INPUT_POST, 'nome');
$dia_evento = filter_input(INPUT_POST, 'dia_evento');
$inicio = filter_input(INPUT_POST, 'inicio');
$termino= filter_input(INPUT_POST, 'termino');


  if(empty($nome)){
    $erro = true;
    $msg = "Informe o Nome do Palestrante";
  }else{

    $param = array($nome,date('Y-m-d',strtotime($dia_evento)),$inicio,$termino);
    $qryInserir = $pdo->prepare("INSERT INTO mapa SET nome=?,dia=?,inicio=?,termino=?");
    $qryInserir->execute($param);

    if($qryInserir->rowCount() <= 0){
      $erro = true;
      $msg = "Erro ao cadastrar, tente novamente.";
      $debug = $qryInserir->errorInfo();
      $msg .= "<br/>". $debug[2];
    }else{
      $ok = true;
      $msg = "Mapa Cadastrado com Sucesso!";
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
        <div class="row">

          <div class="span12" id="about">
            <h2 class="padding-top">Administrador <span>Sescomp</span> |
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="sair.php">sair</a></small></h2>

          <div id="apresentacao">
          <h3>Seja bem vindo ao formulário de inscrição do Sescomp!</h3>
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

          input("nome","Nome do Mapa","input-medium","nome","Exe.: M01,M02,T01",true,$_POST["nome"],"inputNome");
          input("dia_evento","Dia do evento","","dia_evento","DD-MM-AAAA",FALSE,$_POST["dia_evento"]);
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
            <?php echo $mapa->id_mapa ?> - <?php echo $mapa->nome ?>: <?php echo date('d/m',strtotime($mapa->dia)) ?>-<?php echo date('H:i',strtotime($mapa->inicio)) ?>-<?php echo date('H:i',strtotime($mapa->termino))?>
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
        $('#dia_evento').mask('00-00-0000');

  $(".alert").alert();

</script>

  </body>
</html>
