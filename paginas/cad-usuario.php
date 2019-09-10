<!DOCTYPE html>
<html>
<head>
	<title>Affinity Cass</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
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
    					<div class="col-md-6 form-group">
    						<label>CPF</label>
    				        <input class="form-control" type="text" name="cpf" placeholder="Informe o CPF">
    					</div>
    					<div class="col-md-6 form-group">
    						<label>Email</label>
    				        <input class="form-control" type="text" name="email" placeholder="Informe o Email">
    					</div>
                        <div class="col-md-6 form-group">
                            <label>Telefone</label>
                            <input class="form-control" type="text" name="telefone" placeholder="Informe o Telefone">
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
    					<div class="col-md-12">
    						<button class="btn btn-primary center-block">Concluir</button>
    					</div>
    				</div>
    			</form>
    	</div>
    </section>
</body>
</html>
 
