<?php
include_once '../conexao/conexao.php';
if(!isset($_SESSION)){
  session_start();
}
class Loja_Adquirente{

 private $id_loja;
 private $id_adquirente; 

 function __construct($id_loja, $id_adquirente){
   $this->id_loja = $id_loja;
   $this->id_adquirente = $id_adquirente;
 }

 public function cadastrar(){
   $sql = "insert into loja_adquirente (id_loja, id_adquirente) values (':id_loja', ':id_adquirente')";
   $array1 = array(':id_loja', ':id_adquirente');
   $array2 = array($this->id_loja, $this->id_adquirente);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
}

public function alterar($id){
  $sql = "update loja_adquirente id_loja=':id_loja', id_adquirente=':id_adquiente' where id_loja_adquirente=:id_loja_adquirente";
   $array1 = array(':id_loja', ':id_adquirente', ':id_loja_adquirente');
   $array2 = array($this->id_loja, $this->id_adquirente, $id);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
}

 /*public static function getQtdClientesCadastrados($id){
    $sql = "select * from cliente where id_usuario=':id_usuario'";
    $sql = str_replace(':id_usuario', $id, $sql);

    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return $resultados->fetch_array();
 }
*/

public static function getLojaAdquirentePorId($id){
  $sql = "select * from loja where id_adquirente=':id'";
  $sql = str_replace(':id_adquirente', $id, $sql);
  $resultados = new Conexao();
  $resultados = $resultados->query($sql);
  return $resultados->fetch_array();
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

}