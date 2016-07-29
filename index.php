<?php
require("cabecalho.php");
?>
<title>II Sescomp</title>
	</head>
	<body id="top" class="fixed-nav">

		<?php require("menu-topo.php"); ?>

		<?php require("teaser.php"); ?>

		<?php require("intro.php"); ?>

		<?php require("programacao.php"); ?>

		<!-- ==============================================
		Hero de Chamada
		=============================================== -->
		<section id="register" class="color-background hero-section">
			<div class="container">
				<div class="row">
					<div class="span9">
						<h2 class="no-margin-bottom">Venha participar</h2>
					</div>
					<div class="span3">
						<a href="inscricao" class="button-dark">Inscreva-se já</a>
					</div>
				</div>
			</div>
		</section>

		<!-- End Hero
		============================================== -->

		<?php require("galeria.php"); ?>

		<!-- ==============================================
		Propuestas
		=============================================== -->
		<!--<section class="prices white-background" id="proposals">
			<div class="container">
				<div class="row">
					<div class="span12">
						<h2 class="no-margin-bottom">Propuestas</h2>
						<h4>¿Qué te gustaría aprender? ¿Qué quieres mostrar al resto?</h4>
					</div>
				</div>

				<div class="row">
					<div class="span12">
						<p>Entre todos y todas hacemos posible este evento. Si tienes alguna propuesta o sugerencia, escribe a <a href="mailto:info@wpcordoba.org">info@wpcordoba.org</a>.</p>
					</div>
				</div>
			</div>
		</section>-->
		<!-- End Prices
		============================================== -->

		<?php require("mapa.php"); ?>

		<?php require("registro.php"); ?>

		<?php require("rodape.php"); ?>

<?php require("js-scripts.php") ?>
	</body>
</html>
