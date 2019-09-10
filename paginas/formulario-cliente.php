<?php 
 include_once '../classes/Cliente.class.php';

   if(isset($_GET['id_cliente'])){
      $cliente = Cliente::getClientePorId($_GET['id_cliente']);
      $id = $cliente['id_cliente'];
      $nome = $cliente['nome'];
      $CNPJ = $cliente['CNPJ'];
      $adquirente = $cliente['adquirente'];
      $telefone = $cliente['telefone'];
	  $email = $cliente['email'];
   }
   $id_usuario= $usuario['id_usuario'];

 ?>
 <h1><?php echo isset($id) ? 'Alterar Cliente: ID '.$id : 'Cadastrar Cliente' ?></h1>
<form method="post" action="../controles/controleFormularioCliente.php" autocomplete="off">
<input type="hidden" name="id_cliente" value="<?php echo isset($id) ? $id : '' ?>">
<input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">

	<div class="row">
		<div class="col-md-6 form-group">
			<label>Informe o Nome</label>
			<input type="text" class="form-control" name="nome" 
			placeholder="Digite o Nome" required value="<?php echo isset($nome) ? $nome : '' ?>">
		</div>
		<div class="col-md-6 form-group">
			<label>Informe o CNPJ</label>
			<input id="CNPJ" type="text" class="form-control" name="CNPJ" 
			placeholder="Digite o CNPJ" required value="<?php echo isset($CNPJ) ? $CNPJ : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<label>Informe todas Adquirentes </label>
			<input type="text" class="form-control" name="adquirente" 
			placeholder="Digite as adquirentess" required value="<?php echo isset($adquirente) ? $adquirente : '' ?>">
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
	<div class="row">
		<div class="col-md-6 form-group">
			<button name="form-submit" class="btn btn-primary center-block"><span class="fa fa-check"></span> Salvar</button>
		</div>
		<div class="col-md-6 form-group">
			<button type="reset" name="form-cancelar" class="btn btn-primary center-block"
			onclick="window.location='?page=buscar-cliente'"><span class="fa fa-times"></span> Cancelar</button>
		</div>
	</div>
</form>
