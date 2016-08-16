<?php

require("../cabecalho.php");
require("../includes/makeInput.php");

 

if(isset($_POST['cofirma'])){

	$arrayUsuarios = $_POST['status'];

	$status = filter_input(INPUT_POST, 'status');

		$qryStatus = $pdo->prepare("UPDATE participante SET status=1 where id_participante = $status");
		$qryStatus>execute(array($status));
	

    	if($qryStatus->rowCount() <= 0){
      		$erro = true;
      		$msg = "Erro ao atualizar situação, tente novamente.";
      		$debug = $qryStatus->errorInfo();
      		$msg .= "<br/>". $debug[2];
    	}else{
      		$ok = true;
     		 $msg = "Situação atulizada com Sucesso!";
    	}

    }


?>
<title>Inscrição - Sescomp</title>
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
							<h2>Seja bem vindo ao Painel do Doadores da Sescomp!</h2>

						</div>
			</div>

          	</div>
<form>
		<div class="row-fluid">
            		<div class="span12">
              			<h3>Lista de Inscritos</h3>
              			<table id="myTable" style="font-size:10pt">
		                <thead>
                			<tr>
					<!--	//Se tirar a <th></th> vazia não funciona
					//Só precisa dessas informações na página de doações-->
		    				<th>ID</th><th>Nome</th><th>CPF</th><th>Cidade/UF</th><th>IES</th><th>Status</th><th>Confirmar</th>
                  			</tr>
                		</thead>
                		<tbody>
                  			<?php
                  				$getParticipantes = $pdo->query("SELECT * FROM participante");
                  				while ($part = $getParticipantes->fetchObject()) {
                  			?>
                  		<tr>
                    			<td><?php echo $part->id_participante; ?></td>
                    			<td><?php echo $part->nome; ?><br/>
                    			<td><?php echo $part->cpf; ?></td>
                    			<td><?php echo $part->cidade; ?>/<?php echo $part->uf; ?></td>
                    			<td><?php echo $part->instensino; ?></td>
                    			<td><?php if($part->status == '0') echo "Aguardando"; elseif($part->status == '1') echo "OK";?></td>

				<!--Botão de confirmação para doaçao-->
		    			<td>
						<button type="button" class="btn btn-primary Confirma" data-toggle="button" data-complete-text="finished!" value="<?php echo $participante->id_participante;?>" >Confirmar</button>
					<input type="hidden" name="status[]" class="input_Confirma" value="" id="input_<?php echo $participante->id_participante;?>"></td>			
<!--					<td>
				 	<div class="control-group">
						<div class="controls">
							<select size="1" name="status" id="status">
							<option value="0">Não Confirmado</option>
							<option value="1">Confirmado</option>		
						</select>
					</div>
				       </td>-->
                  		</tr>
                  		<?php } ?>
                		</tbody>
              			</table>
            		</div>
          	</div>
	
	</div>

	<div class="form-actions">
        <input type="submit" class="btn btn-primary" value="Concluir" name="confirma">
         </div>
</form>
</div>
</section>


<?php require("../rodape.php"); ?>
<script type="text/javascript" src="<?php echo $urlBase; ?>js/bootstrap-button.js"></script>
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



/*Script para o botão de confirmação da doação*/
$('.Confirma').click(function(e){
	var val = $(this).val();

	if($(this).hasClass('active')){
		$('#input_'+val).val('');
		$(this).removeClass('btn-success');
	}else{
		$('#input_'+val).val(val);
		$(this).addClass('btn-success');
	}
});




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
