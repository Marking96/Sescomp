<?php
require("../cabecalho.php");
require("../includes/makeInput.php");
require("../includes/funcoes.php");
require("../includes/PHPMailer-master/PHPMailerAutoload.php");
require('../includes/recaptcha-master/src/autoload.php');

$secret = "6LfeUiYTAAAAAAxZoJ8izwxlLTnrI0s7pWpEF0r6";
$siteKey = '6LfeUiYTAAAAAJvvRnRTkuRGfhgmPaT_1T4IYkmM';


$lang = 'pt-BR';
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

//if(!isset($_SESSION['idUsuario'])){
/* Direciona para a página depois de logado */
//echo '<script type="text/javascript">location = "http://flisol.valelivre.org"</script>';
//exit;	// sai da página para n exibir o restante do documento php

//}

if(isset($_POST['envio'])){

	$nome				= filter_input(INPUT_POST, 'nome');
	$cpf				= filter_input(INPUT_POST, 'cpf');
	$email			= filter_input(INPUT_POST, 'email');
	$cemail			= filter_input(INPUT_POST, 'cemail');
	$telefone1	= filter_input(INPUT_POST, 'telefone1');
	$cep				= filter_input(INPUT_POST, 'cep');
	$cidade			= filter_input(INPUT_POST, 'cidade');
	$uf					= filter_input(INPUT_POST, 'uf');
	$nascimento	= filter_input(INPUT_POST, 'nascimento');
	$escolaridade	= filter_input(INPUT_POST, 'escolaridade');
	$ocupacao		= filter_input(INPUT_POST, 'ocupacao');
	$iniciativa	= filter_input(INPUT_POST, 'iniciativa');
	$instEnsino	= filter_input(INPUT_POST, 'instEnsino');
	$sexo	= filter_input(INPUT_POST, 'sexo');

	$minicursos = $_POST['oficinas'];

	$qryCPF = $pdo->prepare("SELECT cpf FROM participante WHERE cpf = ?");
	$qryCPF->execute(array($cpf));
	if($qryCPF->rowCount() > 0){
		$hasCPF = true;
	}else{
		$hasCPF = false;
	}

	// Verifica mapas repetidos nos horários
	//print_r($_POST);
	$msg1 = "";
	$mapas = array();
	$choques = array();

	print_r($_POST);

	foreach ($minicursos as $v) {
		if($v != ''){
			$qryAtividade = $pdo->query("SELECT mapeamento FROM atividades WHERE id_atividade = $v");
			$mapeamento = $qryAtividade->fetchObject();
			$mapaAtividade = json_decode($mapeamento->mapeamento, true);
			foreach ($mapaAtividade as $mapa) {
				if(!in_array($mapa, $mapas)){
						array_push($mapas,$mapa);
				}else{
					$msg1 .= $mapa;
					array_push($choques,$v);
				}
				
			}
		}
	}

	if (!$resp->isSuccess()) {
		
		$captcha = true;
	} else {
		$captcha = false;
	}


		if(empty($nome)){
			$erro = true;
			$msg = "Informe seu Nome";
		}elseif(empty($cpf) || !validaCPF(limpaCPF_CNPJ($cpf)) ){
			$erro = true;
			$msg = 'Algum problema com o seu CPF';
		}elseif($hasCPF){
			$erro = true;
			$msg = 'Seu CPF já foi informado. Entre em contato com a equipe do Flisol caso exista algum erro';
		}elseif($captcha){
			$erro = true;
			$msg = 'Confirme o captcha de forma correta';
			$msg .= $resp->getErrorCodes();
		}elseif(empty($email) || $email != $cemail || !filter_var($email, FILTER_VALIDATE_EMAIL)){
			$erro = true;
			$msg = 'Verifique se informou um E-mail correto e/o confirmou';
		}elseif(empty($telefone1)){
			$erro = true;
			$msg = 'Informe pelo menos um telefone para contato';
		}elseif(empty($cidade) || empty($uf) || empty($cep)){
			$erro = true;
			$msg = 'Suas informações de endereços não foram informadas';
		}elseif(count($choques)){
			$erro = true;
			$msg = 'Existem choques de horários nas oficinas selecionadas. Confira os horários.';
		}else{

			$param = array($nome,limpaCPF_CNPJ($cpf),$email,$telefone1,$cep,
			$cidade,$uf,date('Y-m-d',strtotime($nascimento)),$escolaridade,
			$ocupacao,$iniciativa,$instEnsino,$sexo);
			$qryInserir = $pdo->prepare("INSERT INTO participante SET
				nome=?,cpf=?,email=?,telefone1=?,cep=?,
				cidade=?,uf=?,data_nasc=?,escolaridade=?,
				ocupacao=?,iniciativa=?,instensino=?,sexo=?,
				data_cadastro=NOW()");
			$qryInserir->execute($param);

			if($qryInserir->rowCount() <= 0){
				$erro = true;
				$msg = "Erro ao cadastrar, tente novamente.";
				$debug = $qryInserir->errorInfo();
				$msg .= "<br/>". $debug[2];
			}else{
				$ok = true;

				// Cadastro das respostas
					$ultimoId = $pdo->lastInsertId('id_participante');

					foreach($minicursos as $v){
						if(!empty($v)){

							//Verifica se tem vaga
							$qryVagas = $pdo->query("Select count(*) vagas_ocupadas FROM atividade_participante WHERE id_atividade = $v");
							$vagas = $qryVagas->fetchObject();

							$qryTotalVagas = $pdo->query("Select vagas FROM atividade WHERE id_atividade = $v");
							$total = $qryTotalVagas->fetchObject();

							$totalVagas = $total->vagas - $vagas->vagas_ocupadas;

			if($totalVagas > 0){
				$qryResposta = $pdo->prepare("INSERT INTO atividade_participante SET id_atividade=?, id_participante=?");
				$qryResposta->execute(array($v,$ultimoId));

				// Atualiza o n�mero de Vagas
				$totalVagas--;
				$qryUpdate = $pdo->query("UPDATE atividade SET vagas_disp = $totalVagas
					WHERE id_atividade = $v;");

			}


						}

					}


			$msg = "Inscrição Realizada com Sucesso";

			// Envio de E-mail para o participante

		$mail = new PHPMailer;
/*
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.sescomp2016.esy.es';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'inscricao@sescomp2016.esy.es';                 // SMTP username
		$mail->Password = '*M/l9KcysEs0';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		$mail->setFrom('inscricao@sescomp2016.esy.es', 'II Sescomp');
		$mail->addAddress($email, $nome);     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
*/
		$mail->Subject = "Seja bem vindo a II Sescomp!";

		// Gerando o corpo do E-mail
		$body = '<p>Parabéns <b>'.$nome.'</b> sua inscrição na Sescomp foi realizada com sucesso!</p>
		<hr/>
		<h3 style="text-align:center;font-family:sans-serif;">Detalhes da Inscrição</h3>';
		$minicursos = array_filter($minicursos);
		if(count($minicursos)){
			$body .= '<p style="padding:10px;font-family:sans-serif;">Você se inscreveu em '. count($minicursos) .' oficinas:</p>';
			$body .= '<ul>';
			foreach($minicursos as $v) {
			  if($v != ''){

					$getName = $pdo->query("Select titulo FROM atividade WHERE id_atividade = $v");
					$minicurso = $getName->fetchObject();
				  $body .= '<li style="font-family:sans-serif;">'. $minicurso->titulo . '</li>';

				}
			}
			  $body .= '</ul>';
		}

		  $body .= '<p style="text-align:center;font-family:sans-serif;padding:10px">
		  Não deixe de verificar os horários das atividades para não ficar perdido :D. Esperamos que aproveite o evento!</p>
		  <img src="http://flisol.valelivre.org/images/rodape.jpg" alt="cabecalho" />';

		$mail->Body    = $body;
		$mail->AltBody = 'Seja bem vindo ao Sescomp! Sua inscrição foi realizada com sucesso.';
/*
		if(!$mail->send()) {
		    $msg .= 'Message could not be sent.';
		    $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    $msg .= '. Sua confirmação de inscrição foi enviada para seu e-mail.';
		}
*/
				}


				}

			}


		?>
<title>Inscrição - II Sescomp</title>

	</head>
	<body id="top" class="fixed-nav">

		<?php require("../menu-topo.php"); ?>

    <section class="intro white-background" id="formulario">
      <div class="container">
	<div class="row">

	  <div class="span12" id="about">
	    <h2 class="padding-top">Inscreva-se no <span>sescomp</span></h2>

	<div id="apresentacao">
		<h3>Seja bem vindo ao formulário de inscrição do Sescomp!</h3>
		<p>
			Para evitar erros durante sua inscrição esteja atento ás informações preenchidas e em caso de dúvidas entre em contato com a equipe do evento via o e-mail contato[arroba]valelivre[ponto]org. Lembrando que as informações fornecidas serão utilizadas para confecção de certificados e/ou crachás. <strong>A equipe do Sescomp deseja um bom proveiro das atividades!</strong>
		</p>

<?php
if($ok) alert($msg,"success");
if($erro) alert($msg,"error");

 ?>

<?php if(!$ok){ ?>

	<form class="form-horizontal" method="POST" action="">
	<h2>Seus Dados</h2>
	<?php

	input("nome","Nome Completo","input-xlarge","nome","Seu Nome Completo",true,$_POST["nome"]);
	input("cpf","CPF","cpf","cpf","Seu CPF",true,$_POST["cpf"],"text","","inputCPF");
	input("email","E-mail","input-xlarge","email","Insira seu E-mail",true,$_POST["email"],"email","","inputEmail");
	input("cemail","Confirme seu E-mail","input-xlarge","cemail","Confirme o e-mail informado",true,$_POST["cemail"],"email","","inputCemail");
	input("telefone1","Telefone","input-medium","telefone1","(88) 99999-9999",true,$_POST["telefone1"]);

	input("cep","CEP","input-medium","cep","00000-000",true,$_POST["cep"],"text","","","Informe o CEP para carregar Cidade e UF.");
	input("cidade","Cidade","input-xxlarge","cidade","",false,$_POST["cidade"],'text');
	input("uf","UF","input-mini","uf","",false,$_POST["uf"],'text');
	input("nascimento","Data de Nascimento","","nascimento","DD-MM-AAAA",false,$_POST["nascimento"]);

	?>

	<div class="control-group">
		<label for="escolaridade" class="control-label">Escolaridade</label>
		<div class="controls">
			<select size="1" name="escolaridade" id="escolaridade">
				<option value="Fundamental Incompleto" >Fundamental Incompleto</option>
				<option value="Fundamental Completo" >Fundamental Completo</option>
				<option value="Médio Incompleto" >Médio Incompleto</option>
				<option value="Médio Completo">Médio Completo</option>
				<option value="Superior Incompleto">Superior Incompleto</option>
				<option value="Superior Completo"> Superior Completo</option>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label for="ocupacao" class="control-label">Ocupação</label>
		<div class="controls">
			<select size="1" name="ocupacao" id="ocupacao">
				<option value=""></option>
				<option value="estudante">Estudante</option>
				<option value="profissional">Profissional</option>
				<option value="comunidade">Comunidade</option>
			</select>
		</div>
	</div>

	<div class="pEstudantes" style="display:none">

		<div class="control-group">
			<label for="iniciacao" class="control-label">Iniciativa</label>
			<div class="controls">
				<select size="1" name="iniciativa" id="iniciativa">
					<option value="publica">Pública</option>
					<option value="particular">Particular</option>
				</select>
			</div>
		</div>

	<?php
	input("instEnsino","Instituição de Ensino","input-xlarge","instEnsino","Nome da Instituição de Ensino",false,$_POST["instEnsino"]);
	?>

	</div>

	<div class="control-group">
		<label for="sexo" class="control-label">Sexo</label>
		<div class="controls">
			<select size="1" name="sexo" id="sexo">
				<option value="">Não Informado</option>
				<option value="m">Masculino</option>
				<option value="f">Feminino</option>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label for="" class="control-label"></label>
		<div class="controls">
			<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
			
		</div>
	</div>


	<hr/>
	<h2>Minicursos e Oficinas</h2>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th style="width:30%">Oficina</th>
				<th>Detalhes</th>
				<th>Vagas</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$qryAtividades = $pdo->query("SELECT * FROM atividades ORDER BY titulo");
			
			while($atividade = $qryAtividades->fetchObject()){

			 ?>
			 <tr>
					<td style="font-weight:bold"><?php echo $atividade->titulo ?></td>
					<td style="font-size:12pt;"><?php echo $atividade->descricao ?><br/>
					<strong>Oficineiro(s):</strong>
					<?php
					$palestrantes = json_decode($atividade->palestrantes, true);
					$nomesList = array();
					foreach ($palestrantes as $idx) {
						$getNome = $pdo->query("SELECT nome FROM palestrante WHERE id_palestrante = $idx");
						$nomes = $getNome->fetchObject();
						array_push($nomesList, $nomes->nome);
					}
					echo implode(', ',$nomesList);
					?><br/>
					<strong>Data e Horário:</strong>
					<?php
						$mapeamento = json_decode($atividade->mapeamento, true);
						
						$getHorario = $pdo->query("SELECT dia as dia,MIN(inicio) as ini,max(termino) as ter FROM mapa
WHERE id_mapa IN (". implode(',',$mapeamento) .");");
						$horario = $getHorario->fetchObject();
						echo date('d/m',strtotime($horario->dia)).' - '.  date('H:i',strtotime($horario->ini)). ' as '. date('H:i',strtotime($horario->ter));
					 ?>
				</td>
					<td style="text-align:center;font-size:12pt;color:#999">

	<?php
	// Fazendo a contagem de quantos inscritos nas atividades
	$idAtividade = $atividade->id_atividade;
	$qryInscritos = $pdo->query("SELECT id_participante FROM atividade_participante WHERE id_atividade = $idAtividade");
	$total = $qryInscritos->rowCount();
	$total = $atividade->vagas - $total;
	 ?>

						<?php echo $total ?>/<?php echo $atividade->vagas ?><br/>

						<?php if($total > 0){
							?>
	<button type="button" class="btn btn-primary participar" data-toggle="button" data-complete-text="finished!"
	value="<?php echo $atividade->id_ativdiade;?>">Participar</button>
	<input type="hidden" name="oficinas[]" class="input_participar" value="" id="input_<?php echo $atividade->id_atividade;?>">
						<?php
						} ?>

					</td>
			 </tr>
			 <?php } ?>
		</tbody>
	</table>


	<div class="form-actions">
	<input type="submit" class="btn btn-primary" value="Inscrever-se" name="envio">
	<button type="button" class="btn">Cancelar</button>
	</div>

		</form>

<?php }else{ ?>
	<a href="<?php echo $urlBase;?>inscricao" class="btn btn-primary">Nova Inscrição</a>
		<?php } ?>
	  </div>

	</div>

      </div>
    </section>

		<?php require("../rodape.php"); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo $urlBase; ?>js/vendor/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo $urlBase; ?>js/bootstrap-alert.js"></script>
<script type="text/javascript" src="<?php echo $urlBase; ?>js/bootstrap-button.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>'>
	    </script>
<script type="text/javascript">

$('.btn').button();

$('.participar').click(function(e){
	var val = $(this).val();

	if($(this).hasClass('active')){
		$('#input_'+val).val('');
		$(this).removeClass('btn-success');
	}else{
		$('#input_'+val).val(val);
		$(this).addClass('btn-success');
	}
});

$("#ocupacao").change(function(e){

	if($(this).val() == "estudante")
	$(".pEstudantes").slideDown();
	else
	$(".pEstudantes").slideUp();

});

//var options =  {
//onComplete: function(cepInput) {
//		$.ajax({
//					dataType:'json',
//					method:"GET",
//          url:"../consultacep.php",
//					data:{ cep: cepInput}
//      }).success(function(data){
//					if(data[0].cidade && data[0].uf){
//						$('#cidade').val(data[0].cidade);
//						$('#uf').val(data[0].uf);
//					}
//
//      });
//  }
//};

var optionsCPF =  {
onComplete: function(cpfInput) {
		$.ajax({
					method:"GET",
	  url:"../consultacpf.php",
					data:{ cpf: cpfInput}
      }).success(function(data){
				if(data == "error"){
					$(".inputCPF").addClass("error").removeClass("success");
					$(".inputCPF .controls")
					.append('<p class="help-block">CPF inválido ou já utilizado, informe um outro.</p>');
				}else{
					$(".inputCPF").addClass("success").removeClass("error");
						$(".inputCPF .controls .help-block").remove();
				}

      });
  }
};

$("#email").blur(function(e){
	e.preventDefault();
	var email = $(this).val();
	if(testEmail != ''){

			var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if (testEmail.test(email)){

			$(".inputEmail").addClass("success").removeClass("error");
			$(".inputEmail .controls .help-block").remove();
		}else{
			$(".inputEmail").addClass("error").removeClass("success");
			$(".inputEmail .controls")
			.append('<p class="help-block">E-mail inválido ou já informado. Tente um outro.</p>');
		}


	}
    // Não passou
});

$("#cemail").blur(function(e){
	var email 	= $("#email").val();
	var cemail 	= $("#cemail").val();

	if((email == cemail) && (email != ''))
		$(".inputCemail").addClass("success").removeClass("error");
	else
		$(".inputCemail").addClass("error").removeClass("success");

});

	$('#cep').mask('00000-000', options);
	$('#cpf').mask('000.000.000-00', optionsCPF);
	$('#telefone1').mask('(00) 00000-0000');
$('#nascimento').mask('00-00-0000');
</script>
</body>
</html>
