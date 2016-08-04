<?php

require("cabecalho.php");
require("includes/makeInput.php");

if(!isset($_SESSION['idUsuario'])){
/* Direciona para a p?ina depois de logado */
echo '<script type="text/javascript">location = "login"</script>';
exit;	// sai da p?ina para n exibir o restante do documento php

}
?>
<title>Inscrição - Sescomp</title>
	</head>
	<body id="top" class="fixed-nav">

		<?php require("menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container">
        <div class="row">

					<div class="span12">
						<h2 class="padding-top">Administrador <span>Sescomp</span> |
              <small><?php echo $_SESSION["nomeUsuario"] ?> - <a href="sair.php">sair</a></small></h2>
							<div id="apresentacao" style="margin-top:40px">
							<h2>Resumo das <?php
							$getTotal = $pdo->query("SELECT count(id_participante) as total FROM participante");
							$all = $getTotal->fetchObject();
							echo $all->total;
							 ?> Inscrições</h2>
							</div>
					</div>

          </div>
      </div>

			<div class="container-fluid">
				<div class="row-fluid">

					<div class="span6">
						<h2 class="padding-top">Sexo</h2>
							<div style="">
								<div id="piechart" style="width: 100%; height: 300px;"></div>
							</div>
					</div>

					<div class="span6">
						<h2 class="padding-top">Escolaridade</h2>
							<div style="">
								<div id="chartEscolaridade" style="width: 100%; height: 300px;"></div>
							</div>
					</div>

					</div>

					<div class="row-fluid">
						<div class="span12">
							<h2 class="padding-top">Cidades</h2>
								<div style="">
	<div id="columnchart_material" style="width: 100%; height: 400px;"></div>
								</div>
						</div>
					</div>
			</div>

    </section>

		<?php require("rodape.php"); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart','bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sexo', 'Por vaga'],
					<?php

					$countM = $pdo->query("SELECT count(id_participante) as totalM FROM participante WHERE sexo = 'm'");
					$totalM = $countM->fetchObject();
					echo "['Masculino', ". $totalM->totalM."],";

					$countF = $pdo->query("SELECT count(id_participante) as totalF FROM participante WHERE sexo = 'f'");
					$totalF = $countF->fetchObject();
					echo "['Feminino', ". $totalF->totalF."],";

					$countN = $pdo->query("SELECT count(id_participante) as totalN FROM participante WHERE sexo = ''");
					$totalN = $countN->fetchObject();
					echo "['Não Informado', ". $totalN->totalN."]";

					?>
        ]);

				var cidades = google.visualization.arrayToDataTable([
					['Cidade', 'Inscritos'],
					<?php
					$getCidade = $pdo->query("Select cidade,count(cidade) as totalCidade FROM participante GROUP BY cidade");

					while ($cidades = $getCidade->fetchObject()){
						echo "['". $cidades->cidade ."', ".$cidades->totalCidade."],";
					}
					 ?>
				]);

				var view = new google.visualization.DataView(cidades);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

				var escolaridade = google.visualization.arrayToDataTable([
					['Cidade', 'Inscritos'],
					<?php
					$getEscolaridade = $pdo->query("Select escolaridade,count(escolaridade) as total FROM participante GROUP BY escolaridade");

					while ($escolaridade = $getEscolaridade->fetchObject()) {
						echo "['". $escolaridade->escolaridade ."', ".$escolaridade->total."],";
					}

					 ?>
				]);

        var options = {
					backgroundColor: 'none',
					is3D:true,
        };

				var optionsCidade = {
					chart: {
						backgroundColor: 'none',
						bar: {groupWidth: "95%"},
        		legend: { position: "none" },
					}
				};


        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var chartEscolaridade = new google.visualization.PieChart(document.getElementById('chartEscolaridade'));
				var chartCidade = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));


				chartCidade.draw(view, optionsCidade);
				chartEscolaridade.draw(escolaridade, options);
        chart.draw(data, options);

      }



</script>

	</body>
</html>
