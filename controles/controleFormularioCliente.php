<?php

include_once '../classes/Cliente.class.php';
include_once '../classes/loja_adquirente.class.php';

 if(isset($_POST['form-submit'])){
   	 $id = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
	 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	 $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
	 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	 $id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);    
	 $decricao = '';
	 foreach($_POST["framework"] as $row)
	 {
	  $descricao .= $row . ', ';
	 }
	 $descricao = substr($descricao, 0, -2);
	 $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
   	 if(empty($id)){
		$cliente = new Cliente($nome, $CNPJ, $adquirente, $telefone, $email, $id_usuario);
		$cliente->cadastrar();
		
		echo "<script>window.location='../paginas/inicio.php?page=formulario-cliente'</script>";       
   	 }else{
		$cliente = new Cliente($nome, $CNPJ, $adquirente, $telefone, $email, $id_usuario, $id);	
		$cliente->alterar($id);
   	 	echo "<script>window.location='../paginas/inicio.php?page=buscar-cliente'</script>";   
		}	
   }
   