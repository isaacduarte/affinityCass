<?php
include_once '../conexao/conexao.php';
if(!isset($_SESSION)){
  session_start();
}
class Loja{

 private $cnpj;
 private $id_cliente; 

 function __construct($cnpj, $id_cliente){
   $this->cnpj = $cnpj;
   $this->id_cliente = $id_cliente;
 }

 public function cadastrar(){
   $sql = "insert into loja(cnpj, id_cliente) values (':cnpj', ':id_cliente')";
   $array1 = array(':cnpj', ':id_cliente');
   $array2 = array($this->cnpj, $this->id_cliente);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Cadastrado com sucesso!!')</script>";
}

public function alterar($id_loja){
  $sql = "update cliente cnpj=':cnpj', id_cliente=':id_cliente' where id_loja=:id_loja";
   $array1 = array(':cnpj', ':id_cliente', ':id_loja');
   $array2 = array($this->cnpj, $this->id_cliente, $id_loja);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Alterado com sucesso!!')</script>";
}

 /*public static function getQtdClientesCadastrados($id){
    $sql = "select * from cliente where id_usuario=':id_usuario'";
    $sql = str_replace(':id_usuario', $id, $sql);

    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return $resultados->fetch_array();
 }
*/

public static function getLojaPorId($id_loja){
  $sql = "select * from loja where id_loja=':id_loja'";
  $sql = str_replace(':id_loja', $id_loja, $sql);
  $resultados = new Conexao();
  $resultados = $resultados->query($sql);
  return $resultados->fetch_array();
}

public static function getLojaPorCliente($id_cliente){
    $sql = "select * from loja where id_cliente=':id_cliente'";
    $array1 = array(':id_cliente');
    $array2 = array($id_cliente);
    $sql = str_replace($array1, $array2, $sql);
    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
 }
 public static function getLojaUltimoCadastrado(){
  $sql = 'select id_loja from loja ORDER BY id_loja DESC LIMIT 1';
  $conexao = new Conexao();
  $resultados = $conexao->query($sql);
  $resultados = mysqli_fetch_assoc($resultados);
  return $resultados;
  
}

public static function buscar($id, $tipo_busca, $termo){
  $sql = "select * from loja where id_cliente=':id' and :tipo_busca like '%:termo_busca%'";
  $array1 = array(':id', ':tipo_busca', ':termo_busca');
  $array2 = array($id, $tipo_busca, $termo);
  $sql = str_replace($array1, $array2, $sql);
  
  $resultados = new Conexao();
  $resultados = $resultados->query($sql);
  return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
}
}