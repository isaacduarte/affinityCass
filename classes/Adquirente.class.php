<?php
include_once '../conexao/conexao.php';
if(!isset($_SESSION)){
  session_start();
}

class Adquirente{

 private $id_adquirente;
 private $descricao;
 

 function __construct($id_adquirente, $descricao){
  $this->id_adquirente = $id_adquirente;
  $this->descricao = $descricao;
   
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
  $sql = "select * from adquirente where id_adquirente=':id_adquirente'";
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
}