<?php 
 include_once '../classes/Animal.class.php';

   if(isset($_GET['id-animal'])){
      $animal = Animal::getAnimalPorId($_GET['id-animal']);
      $id = $animal['id_animal'];
      $especie = $animal['especie'];
      $raca = $animal['raca'];
      $cor = $animal['cor'];
      $peso = $animal['peso'];
      $nome_dono = $animal['nome_dono'];

   }
 ?>
 <h1><?php echo isset($id) ? 'Alterar animal: ID '.$id : 'Cadastrar animal' ?></h1>
<form method="post" action="../controles/controleFormularioAnimal.php" autocomplete="off">
<input type="hidden" name="id_animal" value="<?php echo isset($id) ? $id : '' ?>">
	<div class="row">
		<div class="col-md-6 form-group">
			<label>Informe a espécie do animal</label>
			<input type="text" class="form-control" name="especie" 
			placeholder="Digite a espécie" required value="<?php echo isset($especie) ? $especie : '' ?>">
		</div>
		<div class="col-md-6 form-group">
			<label>Informe a raça do animal</label>
			<input type="text" class="form-control" name="raca" 
			placeholder="Digite a raça" required value="<?php echo isset($raca) ? $raca : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-7 form-group">
			<label>Informe a cor do animal</label>
			<input type="text" class="form-control" name="cor" 
			placeholder="Digite a cor" required value="<?php echo isset($cor) ? $cor : '' ?>">
		</div>
		<div class="col-md-5 form-group">
			<label>Informe o peso do animal</label>
			<input type="text" class="form-control" name="peso" 
			placeholder="Digite o peso" required value="<?php echo isset($peso) ? $peso : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
				<label>Informe o nome do proprietário do animal</label>
			<input type="text" class="form-control" name="nome-dono" 
			placeholder="Digite o nome do dono" required value="<?php echo isset($nome_dono) ? $nome_dono : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<button name="form-submit" class="btn btn-primary center-block"><span class="fa fa-check"></span> Salvar</button>
		</div>
		<div class="col-md-6 form-group">
			<button type="reset" name="form-cancelar" class="btn btn-primary center-block"
			onclick="window.location='?page=buscar-animais'"><span class="fa fa-times"></span> Cancelar</button>
		</div>
	</div>
</form>
