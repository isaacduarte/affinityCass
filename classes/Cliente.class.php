<?php
include_once '../conexao/conexao.php';
if(!isset($_SESSION)){
  session_start();
}
class Cliente{

 private $nome;
 private $telefone;
 private $email;
 private $status;
 private $plano;
 private $id_usuario; 

 function __construct($nome, $telefone, $email, $status, $plano, $id_usuario){
   $this->nome = $nome;
   $this->telefone = $telefone;
   $this->email = $email;
   $this->status = $status;
   $this->plano = $plano;
   $this->id_usuario = $id_usuario;
 }

 public function cadastrar(){
   $sql = "insert into cliente(nome, telefone, email, status, plano, id_usuario) values (':nome', ':telefone', ':email', ':status', ':plano', ':id_usuario')";
   $array1 = array(':nome', ':telefone', ':email', ':status', ':plano', ':id_usuario');
   $array2 = array($this->nome, $this->telefone, $this->email, $this->status, $this->plano, $this->id_usuario);
   $sql = str_replace($array1, $array2, $sql);
   $resultado = new Conexao();
   $resultado->query($sql);
   echo "<script>alert('Cliente cadastrado com sucesso!!')</script>";
}

public function alterar($id){
  $sql = "update cliente set nome=':nome', telefone=':telefone', email=':email', status=':status', plano=':plano', id_usuario=':id_usuario' where id_cliente=:id_cliente";
   $array1 = array(':nome', ':telefone', ':email', ':status', ':plano', ':id_usuario', ':id_cliente');
   $array2 = array($this->nome, $this->telefone, $this->email, $this->status, $this->plano, $this->id_usuario, $id);
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
public static function getClienteUltimoCadastrado(){
  $sql = 'select id_cliente from cliente ORDER BY id_cliente DESC LIMIT 1';
  $conexao = new Conexao();
  $resultados = $conexao->query($sql);
  $resultados = mysqli_fetch_assoc($resultados);
  return $resultados;
  
}

}
