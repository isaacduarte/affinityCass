<?php 
 include_once '../classes/Cliente.class.php';
 include_once '../classes/Adquirente.class.php';


   if(isset($_GET['id_cliente'])){
      $cliente = Cliente::getClientePorId($_GET['id_cliente']);
      $id = $cliente['id_cliente'];
      $nome = $cliente['nome'];
      $telefone = $cliente['telefone'];
      $email = $cliente['email'];
      $status = $cliente['status'];
      $id_usuario = $cliente['id_usuario'];
   }

 ?>
 <h1><?php echo isset($id) ? 'Alterar Cliente: ID '.$nome : 'Cadastrar Cliente' ?></h1>
<form  method="post" action="../controles/controle-update-cliente.php" autocomplete="off">
<input type="hidden" name="id_cliente" value="<?php echo isset($id) ? $id : '' ?>">
<input type="hidden" name="id_usuario" value="<?php echo ($id_usuario) ?>">

	<div class="row">
		<div class="col-md-6 form-group">
			<label>Nome</label>
			<input type="text" class="form-control" name="nome" 
			placeholder="Digite o Nome" required value="<?php echo isset($nome) ? $nome : '' ?>">
		</div>
		<div class="col-md-6 form-group">
			<label>telefone</label>
			<input id="telefone" type="text" class="form-control" name="telefone" 
			placeholder="Digite o telefone" required value="<?php echo isset($telefone) ? $telefone : '' ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<label> E-mail</label>
			<input type="text" class="form-control" name="email" 
			placeholder="Digite o E-mail" required value="<?php echo isset($email) ? $email : '' ?>">
		</div>
		<div class="col-md-6 form-group">
        <label>Status da venda</label>
        <select name="status" class="form-control" id="exampleFormControlSelect3">
  		 <option value="<?php echo isset($status) ?>">
           <?php 
				if($status==1){
                    echo("Aguardando proposta");
				}else if($status==2){
                    echo("Aguardando documentação");
				}else if($status==3){
                    echo("Implantação em Andamento");
				}else if($status==4){
                    echo("Implantação Finalizada");
				}else{
                    echo("Cancelado");
				}
				?>
           </option>
           <option value="1">Aguardando proposta</option>
           <option value="2">Aguardando documentação</option>
           <option value="3">Implantação em Andamento</option>
           <option value="4">Implantação Finalizada</option>
           <option value="5">Cancelado</option>     
		</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 form-group">
			<button name="form-submit" class="btn btn-primary center-block"><span class="fa fa-check"></span> Salvar</button>
		</div>
		<div class="col-md-6 form-group">
			<button type="reset" name="form-cancelar" class="btn btn-primary center-block"
			onclick="window.location='?page=buscar-lojas&id_usuario=<?php echo $cliente['id_usuario'] ?>'"><span class="fa fa-times"></span> Cancelar</button>
		</div>
	</div>
  </div>
</div>
</form>
