<?php
 include_once 'conexao.php';
 /**
 *
 */
  date_default_timezone_set('America/Belem');
class Comentario
{
  public function __construct()
  {
    $this->pdo = new Conect();

  }
  //Cadastrar
  public function buscarcomentario()
  {
    //selecionar comentario
    $cmd = $this->pdo->Conn()->prepare("SELECT * , (SELECT `nome` FROM `cadastro` WHERE `idcadastro` = `cadastro_idcadastro`) as idusuario FROM `comentario` ORDER BY hora DESC");
    $cmd->execute();
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  //inserir comentario
  public function inserircomentario(  $comentario ,$idcadastro)
  {
      //inserir comentario
      $id  = null;
      $campo = "`idcomentario`, `comentario`, `datacomentario`, `hora`, `cadastro_idcadastro`";
      $cmd = $this->pdo->Conn()->prepare("INSERT INTO `comentario` ($campo) VALUES (:id,:comt,:dia,:hra,:fkcad)");
      $cmd->bindValue(":id"   ,  $id);
      $cmd->bindValue(":comt" ,  $comentario );
      $cmd->bindValue(":dia"  ,  date('Y-m-d') );
      $cmd->bindValue(":hra"  ,  date('H:i') );
      $cmd->bindValue(":fkcad",  $idcadastro );
      $cmd->execute();
  }


  //excluir comentario
  public function excluircomentario($idcomentario, $idcadastro, $n)
  {
    try{
      if ($n == 2) {//administrador
        //excluir comentario
        $cmd = $this->pdo->Conn()->prepare("DELETE FROM `comentario` WHERE idcomentario = :id");
        $cmd->bindValue(":id", $idcomentario , PDO::PARAM_INT);
        $cmd->execute();

      }else
      {
        $cmd = $this->pdo->Conn()->prepare("DELETE FROM `comentario` WHERE idcomentario = :id AND cadastro_idcadastro = :idcadastro ");
        $cmd->bindValue(":id", $idcomentario , PDO::PARAM_INT);
        $cmd->bindValue(":idcadastro", $idcadastro , PDO::PARAM_INT);
        $cmd->execute();

      }
    }catch(Exception $ex){
      echo $ex->getMessage();
    }

  }




}




 ?>
