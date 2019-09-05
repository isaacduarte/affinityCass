<?php

 include_once '../classes/Usuario.class.php';

 Usuario::logar($_POST['login'], md5($_POST['senha']));
 echo "<script>window.location='../paginas/inicio.php'</script>";
 
