<?php
/**
 *CONEXÃO POR PDO
 */
class Conect
{
  //ATRIBUTO PRIVADOS
  private $usuario;
  private $senha;
  private $dbname;
  private $host;
  private static $pdo;
  //CONSTRUTOR
  public function __construct(){
    $this->host = "localhost";
    $this->dbname = "trash";
    $this->usuario = "will";
    $this->senha = "will";
  }

  //METODO PARA CONECTAR
  public function Conn()
  {

    define('CHARSET', 'utf8');
    try {
      if(is_null(self::$pdo)){

        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        self::$pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->usuario, $this->senha,$opcoes);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      return self::$pdo;


    } catch (PDOException $e)
     {
      echo "erro com o BD:".$e->getMessage();
    }catch (Exception $e)
     {
      echo "erro:".$e->getMessage();
    }
  }
}

 ?>
