<?php

include_once '../classes/Cliente.class.php';
include_once '../classes/loja.class.php';
include_once '../classes/loja_adquirente.class.php';

 if(isset($_POST['form-submit'])){
   	 $id = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_NUMBER_INT);
	 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	 $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
	 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	 $id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT); 
	 $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
	 $plano=1;
	 $cliente = new Cliente($nome, $telefone, $email,$status,$plano, $id_usuario );
	 $cliente->alterar($id);
	
	//echo "<script>window.location='../paginas/inicio.php?page=formulario-cliente'</script>";
	echo "<script>window.location='../paginas/inicio.php?page=buscar-lojas&id_usuario=$id_usuario~]'</script>";
	} 
	
   