<?php

require("../cabecalho.php");


?>
<title>Painel - Sescomp</title>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" media="screen" charset="utf-8">
	</head>
	<body id="top" class="fixed-nav">

		<?php require("../menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container-fluid">
        <div class="row">

					<div class="span12">
						<h2 class="padding-top">Administrador <span>Sescomp</span> |
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="sair.php">sair</a></small></h2>
							<div id="apresentacao" style="margin-top:40px">
							<h2>Seja bem vindo ao Painel do Sescomp!</h2>

							</div>
					</div>

          </div>

          <div class="row-fluid">
            <div class="span12">
              <h3>Lista de Inscritos</h3>
              <table id="myTable" style="font-size:10pt">
                <thead>
                  <tr>
                    <th></th><th>Nome/E-mail</th><th>Telefone</th><th>CPF</th><th>Cidade/UF</th><th>IES</th><th>Escolaridade</th><th>Sexo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $getParticipantes = $pdo->query("SELECT * FROM participante");
                  while ($part = $getParticipantes->fetchObject()) {
                  ?>
                  <tr>
                    <td></td>
                    <td><?php echo $part->nome; ?><br/>
                    <?php echo $part->email; ?></td>
                    <td><?php echo $part->telefone1; ?></td>
                    <td><?php echo $part->cpf; ?></td>
                    <td><?php echo $part->cidade; ?>/<?php echo $part->uf; ?></td>
                    <td><?php echo $part->instensino; ?></td>
                    <td><?php echo $part->escolaridade; ?></td>
                    <td><?php if($part->sexo == 'm') echo "Masculino"; elseif($part->sexo == 'f') echo "Feminino"; else echo "Não informado"; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

      </div>
    </section>

		<?php require("../rodape.php"); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>

	</body>
</html>
