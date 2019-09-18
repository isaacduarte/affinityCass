<?php
 
 include_once '../conexao/conexao.php';
 
 if(!isset($_SESSION)){
      session_start();
 }

 class Usuario{
 	private $nome;
 	private $cpf;
 	private $email;
      private $telefone;
      private $login;
      private $senha; 
      private $nivel;
      private $cnpj;
      private $inscricao;
      private $filiado;

 	function __construct($nome, $cpf, $email, $telefone, $login, $senha, $nivel, $cnpj, $inscricao, $filiado){
       $this->nome = $nome;
       $this->cpf = $cpf;
       $this->email = $email;
       $this->telefone =$telefone;
       $this->login = $login;
       $this->senha = $senha;
       $this->nivel = $nivel;
       $this->cnpj = $cnpj;
       $this->inscricao = $inscricao;
       $this->filiado = $filiado;
 	}

 	public function cadastrar(){
      $sql = "insert into usuario(nome,cpf,email,telefone,login,senha,nivel,cnpj,inscricao,filiado)values(':nome',':cpf',':email',':telefone',':login',':senha',':nivel', ':cnpj', ':inscricao', ':filiado')";
      $array = array(':nome',':cpf',':email',':telefone',':login',':senha',':nivel', ':cnpj', ':inscricao', ':filiado');
      $array2 = array($this->nome, $this->cpf, $this->email, $this->telefone, $this->login, $this->senha, $this->nivel, $this->cnpj, $this->inscricao, $this->filiado);
      $sql = str_replace($array, $array2, $sql);
      $conexao = new Conexao();
      $conexao->query($sql);
 	}

      public static function logar($login, $senha){
            $sql = "select * from usuario where login=':login' and senha=':senha' limit 1";
            $array1 = array(':login',':senha');
            $array2 = array($login, $senha);
            $sql = str_replace($array1, $array2, $sql);

            $resultados = new Conexao();
            $resultados = $resultados->query($sql);

            if(mysqli_num_rows($resultados)==1){
              $usuario = $resultados->fetch_array();
              $_SESSION['id_usuario_logado'] = $usuario['id_usuario'];
            }else{
                  echo "<script>alert('Usuário ou senha incorretos')</script>";
            }
      }

      public static function getUsuarioPorID($id){
            $sql = "select * from usuario where id_usuario=':id'";

            $sql = str_replace(':id', $id, $sql);

            $conexao = new Conexao();
            $usuario = $conexao->query($sql)->fetch_array();

            return $usuario;
      }

      public static function isExistenteEmail($email){
            $sql = "select * from usuario where email=':email'";

            $sql = str_replace(':email', $email, $sql);

            $conexao = new Conexao();
            $usuario = $conexao->query($sql);

            return mysqli_num_rows($usuario)==1;
      }

      public static function verificarPermissao(){
        if(!isset($_SESSION['id_usuario_logado'])){
            header('Location: ../index.php');
            exit();
        }
      }

      public static function fazerLogoff(){
        if(isset($_SESSION)){
            session_destroy();
            header('Location: ../index.php');
        }
      }
      public static function buscar($tipo_busca, $termo){
            $sql = "select * from usuario where :tipo_busca like '%:termo_busca%'";
            $array1 = array(':tipo_busca', ':termo_busca');
            $array2 = array($tipo_busca, $termo);
            $sql = str_replace($array1, $array2, $sql);
            
            $resultados = new Conexao();
            $resultados = $resultados->query($sql);
            return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
         }
 }
