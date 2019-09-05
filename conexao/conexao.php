<?php
  
  include_once 'dados.php';
  
  class Conexao{
  	private $conexao;

  	public function getConexao(){
  		$this->conexao = mysqli_connect(ENDERECO, USUARIO, SENHA, BANCO) or die (mysqli_connect_error());
  		mysqli_set_charset($this->conexao, CHARSET) or die (mysqli_error($this->conexao));

  		return $this->conexao;
  	}

  	function query($sql){
       $conexao = $this->getConexao();
       $resultado = $conexao->query($sql);
       
       return $resultado;
  	}
  }
 
