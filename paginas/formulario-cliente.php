<?php 
 include_once '../classes/Cliente.class.php';
 include_once '../classes/Adquirente.class.php';


   if(isset($_GET['id_cliente'])){
      $cliente = Cliente::getClientePorId($_GET['id_cliente']);
      $id = $cliente['id_cliente'];
      $nome = $cliente['nome'];
      $telefone = $cliente['telefone'];
	  $email = $cliente['email'];
   }
   $id_usuario= $usuario['id_usuario'];

 ?>
 <h1><?php echo isset($id) ? 'Alterar Cliente: ID '.$nome : 'Cadastrar Cliente' ?></h1>
<form  method="post" action="../controles/controleFormularioCliente.php" autocomplete="off">
<input type="hidden" name="id_cliente" value="<?php echo isset($id) ? $id : '' ?>">
<input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">

	<div class="row">
		<div class="col-md-6 form-group">
			<label>Informe o Nome</label>
			<input type="text" class="form-control" name="nome" 
			placeholder="Digite o Nome" required value="<?php echo isset($nome) ? $nome : '' ?>">
		</div>
		<div class="col-md-6 form-group">
			<label>Informe o telefone</label>
			<input id="telefone" type="text" class="form-control" name="telefone" 
			placeholder="Digite o telefone" required value="<?php echo isset($telefone) ? $telefone : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<label>Informe o E-mail</label>
			<input type="text" class="form-control" name="email" 
			placeholder="Digite o E-mail" required value="<?php echo isset($email) ? $email : '' ?>">
		</div>
	</div>
	<?php
	$resultados = Adquirente::getAdquirentesCadastrados();
	 
	?>


	<div class="row">
		<div class="col-md-6 form-group">
		<label>Selecione uma adquirente</label>
		<select id="framework" name="framework[]" multiple class="form-control">
		<?php
		if(count($resultados)!=0):
	foreach ($resultados as $adquirente):?>
  		 <option value="<?php echo $adquirente['id_adquirente']?>"><?php echo $adquirente['descricao']?></option>
		   <?php 
  		endforeach; 
			endif;
   		 ?>
		</select>
		</div>
		<div class="col-md-6 form-group">
			<label>Informe o CNPJ</label>
			<input id="cnpj" type="text" class="form-control" name="cnpj" 
			placeholder="Digite o CNPJ" required value="<?php echo isset($cnpj) ? $cnpj : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<button name="form-submit" class="btn btn-primary center-block"><span class="fa fa-check"></span> Salvar</button>
		</div>
		<div class="col-md-6 form-group">
			<button type="reset" name="form-cancelar" class="btn btn-primary center-block"
			onclick="window.location='?page=buscar-cliente'"><span class="fa fa-times"></span> Cancelar</button>
		</div>
	</div>
  </div>
</div>
</form>
