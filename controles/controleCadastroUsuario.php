<?php
 
 include_once '../classes/Usuario.class.php';

 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
 $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
 $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
 $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
 $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
 $confsenha = filter_input(INPUT_POST, 'confsenha', FILTER_SANITIZE_SPECIAL_CHARS);
 $nivel=1;

 if(empty($nome)){
 	echo "<script>alert('O campo nome e obrigatório')</script>";
 }else if(empty($cpf)){
 	echo "<script>alert('O campo CPF e obrigatório')</script>";
 }else if(empty($email)){
 	echo "<script>alert('O campo email e obrigatório')</script>";
 }else if(Usuario::isExistenteEmail($email)){
    echo "<script>alert('Já existe um usuário com este Email')</script>";
 }else if(empty($senha)){
 	echo "<script>alert('O campo senha e obrigatório')</script>";
 }else if($senha != $confsenha){
    echo "<script>alert('As senhas não coincidem')</script>";
 }else{
 	$usuario = new Usuario($nome, $cpf, $email, $telefone, $login, md5($senha), $nivel);
 	$usuario->cadastrar();
 	Usuario::logar($login, md5($senha));
    echo "<script>window.location='../paginas/inicio.php'</script>";
 }

 echo "<script>window.location='../index.php'</script>";

