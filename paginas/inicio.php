<?php 

 include_once '../classes/Usuario.class.php';
 include_once '../classes/Cliente.class.php';

  if(!isset($_SESSION)){
      session_start();
 }

 Usuario::verificarPermissao();

 $usuario = Usuario::getUsuarioPorID($_SESSION['id_usuario_logado']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Affinity Cass - Inicio</title>
    <meta charset="utf-8">
    <link rel="icon" href="../imagens/icone.png">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/inicio.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <script type="text/javascript">
     window.addEventListener('load', function(){
        var botoes_logoff = document.querySelectorAll('.botao-logoff');

     for(var i = 0; i < botoes_logoff.length; i++){
        botoes_logoff[i].addEventListener('click', function(evento){
          if(!confirm("Tem certeza que deseja sair?")){
            evento.preventDefault();
          }
        });
     }
     });
    </script>
</head>
<body>
    <section class="menu-lateral">
    <div class="mascara">
    	<h1>Affinity Cass</h1>
    	<ul>
    		<li><a href="?page=menu"><span class="fa fa-home"></span> Inicio</a></li>
    		<li><a href="?page=formulario-cliente"><span class="fa fa-plus"></span> Cadastrar Cliente</a></li>
    		<li><a href="?page=buscar-cliente"><span class="fa fa-search"></span> Buscar cliente (<?php echo Cliente::getQtdClientesCadastrados() ?>)</a></li>
    		<li><a href="../controles/controleLogoff.php" class="botao-logoff"><span class="fa fa-sign-out"></span> Sair</a></li>
    	</ul>
    </div>
    </section>
    <section class="conteudo">
    <div class="cabecalho-site">
    	<h3><span class="fa fa-user"></span> Olá senhor(a): <?php echo $usuario['nome'] ?></h3>
    </div>
     <?php 
         switch (isset($_GET['page']) ? $_GET['page'] : 'inicio') {
         	case 'buscar-cliente':
         		include_once 'buscar-cliente.php';
         		break;
         	case 'formulario-animal':
         		include_once 'formulario-cliente.php';
         		break;
         	case 'menu':
                include_once 'menu-inicial.php';
                break;
            case 'sobre':
                include_once 'equipe.php';
                break;
         	default:
         		include_once 'menu-inicial.php';
         		break;
         }
      ?>
    </section>
</body>
</html>