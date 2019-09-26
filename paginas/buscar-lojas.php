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
 if(isset($_GET['id_usuario'])){
	  $usuario = Usuario::getUsuarioPorID($_GET['id_usuario']);
	  $id_usuario = $usuario['id_usuario'];
	  $nome = $usuario['nome'];
 }
 ?>
<h3>Vendas do representante: <?php echo($nome); ?></h3>
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
	 $tipo = isset($_GET['tipo-busca']) ? filter_input(INPUT_GET, 'tipo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : 'nome';

	 $resultados = Cliente::buscar($id_usuario, $tipo, $termo);
     ?>
	<table class="table table-striped table-bordered table-hover tabela">
		<tr>
			<th>Nome:</th>
            <th>Telefone:</th>
			<th>E-mail:</th>
			<th>Status:</th>
			<th>Ações:</th>
		</tr>

		<?php 
		if(count($resultados)!=0):
		foreach ($resultados as $cliente):
			$id_cliente=$cliente['id_cliente'];
			 ?>
		
		<tr>
			<td><?php echo $cliente['nome'] ?></td>
            <td><?php echo $cliente['telefone'] ?></td>
			<td><?php echo $cliente['email'] ?></td>
			<td>
			<div class="form-group">
   					 <select class="form-control" id="exampleFormControlSelect3">
      					<option>
						  <?php 
				if($cliente['status']==1){
					?>
					<option 
					style="background-image: url('../imagens/1.png'); 
					background-repeat: no-repeat;border-radius: 60%;
					width: 30px;height: 30px;">
					</option>
					<img class="img" src="../imagens/1.png" alt="Aguardando proposta">
				<?php
				}else if($cliente['status']==2){	
					?>
					<img class="img" src="../imagens/2.png" alt="Aguardando documentacao">
				<?php
				}else if($cliente['status']==3){
				?>
				<img class="img" src="../imagens/3.png" alt="Implantacao em Andamento">
				<?php
				}else if($cliente['status']==4){
				?>
				<img class="img" src="../imagens/4.png" alt="Implantacao Finalizada">
				<?php
				}else{
					?>
				<img class="img" src="../imagens/5.png" alt="Cancelado">
					<?php
				}
				?>  
						</option>
      					<option>2</option>
      					<option>3</option>
      					<option>4</option>
      					<option>5</option>
    				</select>
  			</div>
				
			</td>
			<td>
			<form method="GET">
				<input type="hidden" name="id_cliente" value="<?php echo ($id_cliente) ?>">
              	<button class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span></button>
                <button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-plus"></span></button>
			  </form>
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
<div class="tow">
	<a href="?page=gerenciar-vendas">
		<button class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</button>
	</a>	
</div>
<label> <h3>Legenda de Status</h3></label>
<div class="row">
		<div class="col-md-6 form-group">
			<img class="img" src="../imagens/1.png" alt="Aguardando proposta">
			<label> - Aguardando proposta</label>
		</div>
		<div class="col-md-6 form-group">
			<span></span>
		</div>
</div>
<div class="row">
		<div class="col-md-6 form-group">
		<img class="img" src="../imagens/2.png" alt="Aguardando documentacao">
		<label> - Aguardando documentação</label>
		</div>
		<div class="col-md-6 form-group">
		</div>
</div>
<div class="row">
		<div class="col-md-6 form-group">
		<img class="img" src="../imagens/3.png" alt="Implantacao em Andamento">
		<label> - Implantação em Andamento</label>
		</div>
		<div class="col-md-6 form-group">
		</div>
</div>

<div class="row">
		<div class="col-md-6 form-group">
		<img class="img" src="../imagens/4.png" alt="Implantacao em Andamento">
		<label> - Implantacao Finalizada</label>
		</div>
		<div class="col-md-6 form-group">
		</div>
</div>
<div class="row">
		<div class="col-md-6 form-group">
		<img class="img" src="../imagens/5.png" alt="Cancelado">
		<label> - Cancelado</label>
		</div>
		<div class="col-md-6 form-group">
		</div>
</div>



