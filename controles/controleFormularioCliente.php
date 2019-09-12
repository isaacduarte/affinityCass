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
	 $id_adquirente = '';
	 $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
		$plano=1;
		$status=1;
		$cliente = new Cliente($nome, $telefone, $email, $id_usuario,$status,$plano );
		$cliente->cadastrar();
		$resultados = Cliente::getClienteUltimoCadastrado();
		$id_cliente=$resultados['id_cliente'];
		$loja = new Loja($cnpj, $id_cliente);
		$loja->cadastrar();
		$loja = Loja::getLojaUltimoCadastrado();
		$id_loja=$loja['id_loja'];
		
		foreach($_POST["framework"] as $id_adquirente)
		{
		 //$id_adquirente .= $row . ', ';	
		
		//$id_adquirente = substr($id_adquirente, 0, -2);
		$loja_adquirente = new Loja_Adquirente($id_loja, $id_adquirente);
		$loja_adquirente->cadastrar();
		     
	}
		//echo "<script>window.location='../paginas/inicio.php?page=formulario-cliente'</script>";
		echo "<script>window.location='../paginas/inicio.php?page=form-filial&id_cliente=$id_cliente'</script>";

	}
   