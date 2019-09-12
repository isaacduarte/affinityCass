<?php
include_once '../conexao/conexao.php';
if(!isset($_SESSION)){
  session_start();
}

class Adquirente{

 private $descricao;
 private $id_loja; 

 function __construct($descricao, $id_loja){
   $this->descricao = $descricao;
   $this->id_loja = $id_loja;
 }

 public function cadastrar(){
   $sql = "insert into adquirente(descricao, id_loja) values (':descricao', ':id_loja')";
   $array1 = array(':descricao', ':id_loja');
   $array2 = array($this->descricao, $this->id_loja);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Cadastrado com sucesso!!')</script>";
}

public function alterar($id){
  $sql = "update adquirente descricao=':descricao', id_loja=':id_loja' where id_adquirente=:id_adquirente";
   $array1 = array(':descricao', ':id_loja', ':id_adquirente');
   $array2 = array($this->descricao, $this->id_loja, $id);
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

public static function getAdquirentePorId($id_adquirente){
  $sql = "select * from loja where id_adquirente=':id_adquirente'";
  $sql = str_replace(':id_adquirente', $id_adquirente, $sql);
  $resultados = new Conexao();
  $resultados = $resultados->query($sql);
  return $resultados->fetch_array();
}

public static function getAdquirentesCadastrados(){
  $sql = 'select * from adquirente';
  $conexao = new Conexao();
  $resultados = $conexao->query($sql);
  return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
  
}

public static function getLojaPorLoja($id){
    $sql = "select * from adquirente where id_adquirente=':id'";
    $array1 = array(':id');
    $array2 = array($id);
    $sql = str_replace($array1, $array2, $sql);
    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
 }

 public static function excluir($id){
  $sql = "delete from loja_adquirente where id_loja_adquirente=':id_loja_adquirente'";
  $sql = str_replace(':id_loja_adquirente', $id, $sql);
  $resultados = new Conexao();
  $resultados = $resultados->query($sql);
}

}