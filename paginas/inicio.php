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
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/inicio.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function(){
	  $('#telefone').mask('(00) 0000-0000');
	  $('#CNPJ').mask(' 00.000.000/0000-00');
	  $('#cpf').mask(' 000.000.000-00');
      });
</script>
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
    		<li><a  href="?page=buscar-cliente"><span class="fa fa-search"></span> Buscar cliente</a></li>
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
         	case 'formulario-cliente':
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