<?php
 
 include_once '../classes/Animal.class.php';

  if(isset($_GET['id-animal-excluir'])){
  	 Animal::excluir($_GET['id-animal-excluir']);
  }

  echo "<script>window.location='../paginas/inicio.php?page=buscar-animais'</script>";
 
