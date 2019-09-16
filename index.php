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
				<div class="row form-group">
    				<div class="col-md-2">
						
					</div>
					<div class="col-md-8">
						<a class="center-block" href="cad-usuario.php">Não possui login? Faça seu cadastro!</a>
    				</div>
				</div>
				</div>
    		</form>
    	</div>
    </section>
    
</body>
</html>
 
