<?php
  if(!isset($_SESSION)){
    session_start();
  }

  if(isset($_SESSION['id_usuario_logado'])){
    header('Location: paginas/inicio.php');    
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Affinity Cass - Entre ou cadastre-se</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/index.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function(){
	  $('#telefone').mask('(00) 0000-0000');
	  $('#CNPJ').mask(' 00.000.000/0000-00');
	  $('#cpf').mask(' 000.000.000-00');
      });
</script>
</head>

<body>
    <section class="lado-um">
    	<div class="container-formulario-login">
    	 <h3>Login</h3>
    		<form method="post" action="controles/controleLoginUsuario.php">
    			<div class="row form-group">
    				<div class="col-md-12">
    				<label>Digite o Login</label>
    				   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="login" type="text" class="form-control" placeholder="Informe o login">
                       </div>
    				</div>
    			</div>
    			<div class="row form-group">
    				<div class="col-md-12">
    				<label>Digite a senha</label>
    				    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="senha" type="password" class="form-control" placeholder="Informe a senha">
                       </div>
    				</div>
    			</div>
    			<div class="row form-group">
    				<div class="col-md-12">
    				    <button class="btn btn-primary center-block">Entrar</button>
    				</div>
    			</div>
    			</div>
    		</form>
    	</div>
    </section>
    <section class="lado-dois">
    	<div class="container-formulario-cadastro">
    	    <h3>Cadastre-se no Affinity Cass</h3>
    			<form method="post" action="controles/controleCadastroUsuario.php">
    				<div class="row">
    					<div class="col-md-12 form-group">
    						<label>Nome</label>
    				        <input class="form-control" type="text" name="nome" placeholder="Informe o nome">
    					</div>
    				</div>
					<div class="row">
    					<div class="col-md-12 form-group">
						<label>Email</label>
    				        <input class="form-control" type="text" name="email" placeholder="Informe o Email">
    					</div>
    				</div>
    				<div class="row">
    					<div class="col-md-6 form-group">
    						<label>CPF</label>
    				        <input id="cpf" class="form-control" type="text" name="cpf" placeholder="Informe o CPF">
    					</div>
    					<div class="col-md-6 form-group">
    						<label>CNPJ</label>
    				        <input id="CNPJ" class="form-control" type="text" name="cnpj" placeholder="Informe o CNPJ">
    					</div>
                        <div class="col-md-6 form-group">
                            <label>Telefone</label>
                            <input id="telefone" class="form-control" type="text" name="telefone" placeholder="Informe o Telefone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Login</label>
                            <input class="form-control" type="text" name="login" placeholder="Informe o Login">
                        </div>
    				</div>
    				<div class="row">
    					<div class="col-md-6 form-group">
    						<label>Senha</label>
    				        <input class="form-control" type="password" name="senha" placeholder="Informe uma senha">
    					</div>
                          <div class="col-md-6 form-group">
                            <label>Confirme sua senha</label>
                            <input class="form-control" type="password" name="confsenha" placeholder="Confirme a senha">
                        </div> 
					</div>
					<div class="row">
    					<div class="col-md-6 form-group">
    						<label>Número de Inscrição</label>
    				        <input class="form-control" type="text" name="inscricao" placeholder="Número de Inscrição do Contador">
    					</div>						
						<div class="col-md-6 form-group">
						  <label><input type="radio" checked name="filiado" value="1"> Filiado ao Sescap</label>
		   				  <label><input type="radio" name="filiado" value="0"> Não Filiado</label>
						</div> 
    				</div>
    				<div class="row">
    					<div class="col-md-12">
    						<button class="btn btn-primary center-block">Concluir</button>
    					</div>
    				</div>
    			</form>
    	</div>
    </section>
</body>
</html>
 
