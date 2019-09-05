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
<h1>Tabela de animais</h1>
<div class="panel panel-primary">
	<div class="panel-heading">
		<form method="get" action="inicio.php">
		    <input type="hidden" name="page" value="buscar-cliente">	
			<input type="search" name="campo-busca">
		    <button>Buscar</button>
		    <label><input type="radio" checked name="tipo-busca" value="especie"> Buscar por espécie</label>
		    <label><input type="radio" name="tipo-busca" value="raca"> Buscar por raça</label>
		    </form>
	</div>
    <?php 
     $termo = isset($_GET['campo-busca']) ? filter_input(INPUT_GET, 'campo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : '';
     $tipo = isset($_GET['tipo-busca']) ? filter_input(INPUT_GET, 'tipo-busca', FILTER_SANITIZE_SPECIAL_CHARS) : 'raca';

     $resultados = Animal::buscar($tipo, $termo);
     ?>
	<table class="table table-striped">
		<tr>
			<th>ID:</th>
			<th>Espécie:</th>
			<th>Raça:</th>
      <th>Cor:</th>
			<th>Peso:</th>
			<th>Proprietário:</th>
			<th>Ação:</th>
		</tr>

		<?php 
		if(count($resultados)!=0):
		foreach ($resultados as $animal): ?>
		<tr>
			<td><?php echo $animal['id_animal'] ?></td>
			<td><?php echo $animal['especie'] ?></td>
			<td><?php echo $animal['raca'] ?></td>
      <td><?php echo $animal['cor'] ?></td>
			<td><?php echo $animal['peso'] ?></td>
			<td><?php echo $animal['nome_dono'] ?></td>
			<td>
              <a href="?page=formulario-animal&id-animal=<?php echo $animal['id_animal'] ?>">
              <button class="btn btn-success"><span class="fa fa-wrench"></span> Editar</button>
              </a>

              <a href="../controles/controleExcluirAnimal.php?id-animal-excluir=<?php echo $animal['id_animal'] ?>" class="botao-excluir-animal">
              <button class="btn btn-danger"><span class="fa fa-trash-o"></span> Excluir</button>
              </a>
			</td>
		</tr>
	<?php 
  endforeach; 
  echo 'Resultados encontrados: '.count($resultados);
	else:
    ?>
     <tr>
     <td  colspan="7">
       Nenhum resultado encontrado	
     </td>
     </tr>
   <?php
	endif;?>
</table>
</div>