<?php 
  
  include_once '../classes/Cliente.class.php';

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
<h1>Tabela de Clientes</h1>
<div class="panel panel-primary">
	<div class="panel-heading">
		<form method="get" action="inicio.php">
		<div class="row">
		 <div class="col-md-3">
		    <input type="hidden" name="page" value="buscar-cliente">	
			<input type="search" class="form-control" name="campo-busca">
		 </div>	
		    <button class="btn btn-primary "><span class="fa fa-check"></span>Buscar</button>
		    <label><input type="radio" checked name="tipo-busca" value="nome"> Buscar por Nome</label>
		    <label><input type="radio" name="tipo-busca" value="CNPJ"> Buscar por CNPJ</label>
		</div>
		    </form>
	</div>
    <?php 
     $termo = isset($_GET['campo-busca']) ? filter_input(INPUT_GET, 'campo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : '';
	 $tipo = isset($_GET['tipo-busca']) ? filter_input(INPUT_GET, 'tipo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : 'nome';
	 $id=$usuario['id_usuario'] ;
	 
	 $resultados = Cliente::buscar($id, $tipo, $termo);
     ?>
	<table class="table table-striped table-bordered table-hover ">
		<tr>
			<th>Nome:</th>
			<th>CNPJ:</th>
			<th>Adquirente:</th>
            <th>Telefone:</th>
			<th>E-mail:</th>
			<th>Ação:</th>
		</tr>

		<?php 
		if(count($resultados)!=0):
		foreach ($resultados as $cliente): ?>
		<tr>
			<td><?php echo $cliente['nome'] ?></td>
			<td><?php echo $cliente['CNPJ'] ?></td>
			<td><?php echo $cliente['adquirente'] ?></td>
            <td><?php echo $cliente['telefone'] ?></td>
			<td><?php echo $cliente['email'] ?></td>
			<td>
              <a href="?page=formulario-cliente&id_cliente=<?php echo $cliente['id_cliente'] ?>">
              <button class="btn btn-success"><span class="fa fa-wrench"></span> Editar</button>
              </a>
			</td>
		</tr>
		
     <tr>
	 
	<?php 
  endforeach; 
  echo 'Resultados encontrados: '.count($resultados);
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