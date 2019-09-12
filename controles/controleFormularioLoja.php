<?php
include_once '../classes/loja.class.php';
include_once '../classes/loja_adquirente.class.php';

 if(isset($_POST['form-submit'])){
   	 $id_loja = filter_input(INPUT_POST, 'id_loja', FILTER_SANITIZE_NUMBER_INT);
   	 $cnpj= filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
     $id_cliente = filter_input(INPUT_POST, 'id_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
        
   	 if(empty($id_loja)){
        $loja = new Loja($cnpj, $id_cliente);
		$loja->cadastrar();
		$loja = Loja::getLojaUltimoCadastrado();
		$id_loja=$loja['id_loja'];
		
		foreach($_POST["framework"] as $id_adquirente)
		{
		$loja_adquirente = new Loja_Adquirente($id_loja, $id_adquirente);
		$loja_adquirente->cadastrar();  
	    }
		echo "<script>window.location='../paginas/inicio.php?page=form-filial&id_cliente=$id_cliente'</script>";

	}else{
        $loja = new Loja($cnpj, $id_cliente);
		$loja->cadastrar();
		$loja = Loja::getLojaUltimoCadastrado();
        $id_loja=$loja['id_loja'];
        foreach($_POST["row"] as $id_loja_adquirente){
        loja_Adquirente::excluir($_GET[$id_loja_adquirente]);
        }
		foreach($_POST["framework"] as $id_adquirente)
		{
		$loja_adquirente = new Loja_Adquirente($id_loja, $id_adquirente);
		$loja_adquirente->cadastrar();  
	    }
		echo "<script>window.location='../paginas/inicio.php?page=buscar-cliente'</script>";  
   	 }
   }