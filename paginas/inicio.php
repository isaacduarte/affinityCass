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
  <link rel="stylesheet" href="../estilo/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/inicio.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function(){
	  $('#telefone').mask('(00) 0000-0000');
	  $('#cnpj').mask(' 00.000.000/0000-00');
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
 
     <?php
     if($usuario['nivel']==1){ 
       include_once 'menu-lateral.php';
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
            case 'form-filial':
                include_once 'form-filial.php';
                break;
         	default:
         		include_once 'menu-inicial.php';
         		break;
         }
        }else{
          include_once 'menu-gerencia.php';
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
             case 'form-filial':
                 include_once 'form-filial.php';
                 break;
             case 'gerenciar-vendas':
                include_once 'gerenciar-vendas.php';
                break;
              case 'buscar-lojas':
                include_once 'buscar-lojas.php';
                break;
                case 'editar-cliente':
                include_once 'editar-cliente.php';
                break;
                case 'exibe-lojas':
                include_once 'exibe-lojas.php';
                break;
            default:
              include_once 'menu-inicial.php';
              break;
          }
        }
      ?>
    </section>
</body>
<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Selecione Adquirente',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"..",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>
</html>