<?php
 include_once 'conexao.php';
 /**
 *
 */
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
    $cmd = $this->pdo->Conn()->prepare("SELECT * , (SELECT `nome` FROM `cadastro` WHERE `idcadastro` = `cadastro_idcadastro`)
     as idusuario FROM `comentario` ORDER BY datacomentario DESC");
    $cmd->execute();
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }
  public function excluircomentario($idcomentario, $idcadastro)
  {
    if ($idcadastro == 1) {//administrador
      //excluir comentario
      $cmd = $this->pdo->Conn()->prepare("DELETE FROM `comentario` WHERE idcomentario = :id");
      $cmd = bindValue(":id", $idcomentario , PDO::PARAM_INT);
      $cmd->execute();
      $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    }else
    {
      $cmd = $this->pdo->Conn()->prepare("DELETE FROM `comentario` WHERE idcomentario = :id AND cadastro_idcadastro = :idcadastro ");
      $cmd = bindValue(":id", $idcomentario , PDO::PARAM_INT);
      $cmd = bindValue(":idcadastro", $idcadastro , PDO::PARAM_INT);
      $cmd->execute();
      $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
  }



}




 ?>
