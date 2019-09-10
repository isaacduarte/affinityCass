<?php
include_once '../conexao/conexao.php';
if(!isset($_SESSION)){
  session_start();
}
class Cliente{

 private $nome;
 private $CNPJ;
 private $adquirente;
 private $telefone;
 private $email;
 private $id_usuario; 

 function __construct($nome, $CNPJ, $adquirente, $telefone, $email, $id_usuario){
   $this->nome = $nome;
   $this->CNPJ = $CNPJ;
   $this->adquirente = $adquirente;
   $this->telefone = $telefone;
   $this->email = $email;
   $this->id_usuario = $id_usuario;
 }

 public function cadastrar(){
   $sql = "insert into cliente(nome, CNPJ, adquirente, telefone, email, id_usuario) values (':nome', ':CNPJ', ':adquirente', ':telefone', ':email', ':id_usuario')";
   $array1 = array(':nome', ':CNPJ', ':adquirente', ':telefone', ':email', ':id_usuario');
   $array2 = array($this->nome, $this->CNPJ, $this->adquirente, $this->telefone, $this->email, $this->id_usuario);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Cliente cadastrado com sucesso!!')</script>";
}

public function alterar($id){
  $sql = "update cliente set nome=':nome', CNPJ=':CNPJ', adquirente=':adquirente', telefone=':telefone', email=':email', id_usuario=':id_usuario' where id_cliente=:id_cliente";
   $array1 = array(':nome', ':CNPJ', ':adquirente', ':telefone', ':email', ':id_usuario', ':id_cliente');
   $array2 = array($this->nome, $this->CNPJ, $this->adquirente, $this->telefone, $this->email, $this->id_usuario, $id);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Cliente alterado com sucesso!!')</script>";
}

public static function buscar($id, $tipo_busca, $termo){
    $sql = "select * from cliente where id_usuario=':id' and :tipo_busca like '%:termo_busca%'";
    $array1 = array(':id', ':tipo_busca', ':termo_busca');
    $array2 = array($id, $tipo_busca, $termo);
    $sql = str_replace($array1, $array2, $sql);
    
    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
 }

 /*public static function getQtdClientesCadastrados($id){
    $sql = "select * from cliente where id_usuario=':id_usuario'";
    $sql = str_replace(':id_usuario', $id, $sql);

    $resultados = new Conexao();
    $resultados = $resultados->query($sql);
    return $resultados->fetch_array();
 }
*/
public static function getClientePorId($id_cliente){
  $sql = "select * from cliente where id_cliente=':id_cliente'";
  $sql = str_replace(':id_cliente', $id_cliente, $sql);
  $resultados = new Conexao();
  $resultados = $resultados->query($sql);
  return $resultados->fetch_array();
}

}
