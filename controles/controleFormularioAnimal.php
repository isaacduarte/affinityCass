<?php

include_once '../classes/Animal.class.php';

 if(isset($_POST['form-submit'])){
   	 $id = filter_input(INPUT_POST, 'id_animal', FILTER_SANITIZE_NUMBER_INT);
   	 $especie = filter_input(INPUT_POST, 'especie', FILTER_SANITIZE_SPECIAL_CHARS);
   	 $raca = filter_input(INPUT_POST, 'raca', FILTER_SANITIZE_SPECIAL_CHARS);
   	 $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_SPECIAL_CHARS);
   	 $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_SPECIAL_CHARS);
   	 $nome_dono = filter_input(INPUT_POST, 'nome-dono', FILTER_SANITIZE_SPECIAL_CHARS);

   	 $animal = new Animal($especie, $raca, $cor, $peso, $nome_dono);
   	 if(empty($id)){
   	 	$animal->cadastrar();
   	    echo "<script>window.location='../paginas/inicio.php?page=formulario-animal'</script>";       
   	 }else{
   	 	$animal->alterar($id);
   	 	echo "<script>window.location='../paginas/inicio.php?page=buscar-animais'</script>";   
   	 }
   }