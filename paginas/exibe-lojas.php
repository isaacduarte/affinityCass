<?php 
  
include_once '../classes/Cliente.class.php';
include_once '../classes/loja.class.php';
include_once '../classes/loja_adquirente.class.php';
include_once '../classes/Adquirente.class.php';

 ?>

 <script type="text/javascript">
   window.addEventListener('load', function(){

   	   function getElementos(identificador){
   	   return document.querySelectorAll(identificador);
   }
   
   var botoes_excluir = getElementos('.botao-excluir-cliente');

   for (var i = 0; i < botoes_excluir.length; i++) {
   	    botoes_excluir[i].addEventListener('click', function(evento){
   		  if(!confirm("Tem certeza que deseja deletar este cliente?")){
             evento.preventDefault();
   		  }
    	});
     };
   });
 </script>
 <?php
 if(isset($_GET['id_cliente'])){
	  $cliente= Cliente::getClientePorId($_GET['id_cliente']);
	  $id_cliente= $cliente['id_cliente'];
	  $nome = $cliente['nome'];
	 // $id_usuario = $cliente['id_usuario'];
 }
 ?>
<h3>Lojas: <?php echo($nome); ?></h3>
<div class="panel panel-primary">
	<div class="panel-heading">
		<form method="get" action="inicio.php">
		<div class="row">
		 <div class="col-md-3">
		    <input type="hidden" name="page" value="buscar-cliente">	
			<input type="search" class="form-control" name="campo-busca">
		 </div>	
		    <button class="btn btn-primary "><span class="fa fa-check"></span>Buscar</button>
   			<!--
			<label><input type="radio" checked name="tipo-busca" value="nome"> Buscar por Nome</label>
		    <label><input type="radio" name="tipo-busca" value="CNPJ"> Buscar por CNPJ</label> -->
		</div>
		    </form>
	</div>
	<?php

	
	 $termo = isset($_GET['campo-busca']) ? filter_input(INPUT_GET, 'campo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : '';
	 $tipo = isset($_GET['tipo-busca']) ? filter_input(INPUT_GET, 'tipo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : 'cnpj';

	 $resultados = Loja::getLojaPorCliente($id_cliente);
     ?>
	<table class="table table-striped table-bordered table-hover tabela">
		<tr>
			<th>CNPJ:</th>
			<th>Adquirente:</th>
			<th>Plano:</th>
		</tr>

		<?php 
		if(count($resultados)!=0):
		foreach ($resultados as $loja):
			$id_loja=$loja['id_loja'];
			 ?>
		
		<tr>
			<td><?php echo $loja['cnpj'] ?></td>

			<td><?php 
			$adquirentes= Loja_Adquirente::getLojaAdquirentePorId($id_loja);
			foreach($adquirentes as $adquirente){
				$id_adquirente= $adquirente['id_adquirente'];
				$descricao = Adquirente::getAdquirentePorId($id_adquirente);
				echo $descricao['descricao'];
			}
			
			?></td>
			<td>
			<?php 
						$plano=Loja_Adquirente::getPlano($id_loja);
						foreach ($plano as $planos){
							$p=$planos['id_adquirente'];
						if($p='2'){
							?>
							<img class="img" src="../imagens/prata.png" alt="Parta">
							<?php
						} else{
							?>
							<img class="img" src="../imagens/bronze.png" alt="Bronze">
							<?php
						}
					}
					?>
			
			</td>
			
		</tr>
		
     <tr>
	 
	<?php 
  	endforeach; 
	else:
    ?>
	
     <td  colspan="7">
       Nenhum resultado encontrado	
     </td>
     </tr>
   <?php
	endif;?>
</table>
</div>
<div class="row">
	<a href="?page=buscar-lojas&id_usuario=<?php echo $cliente['id_usuario'] ?>">
		<button class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</button>
	</a>	
</div>


