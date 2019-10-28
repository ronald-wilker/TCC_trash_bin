<?php
 include_once 'conexao.php';
 /**
 *
 */
class Jogo
{
  public function __construct()
  {
    $this->pdo = new Conect();

  }
  //Cadastrar jogo
  public function cadastrarJogo($game)
  {

      // cadastrar
      $id = null;
      $campo = "`idgames`, `desc_jogo`, `Nensino`, `Ccuricular`,
       `desc_min`, `tema`, `serie`, `idade`, `categoria_idcategoria`, `nivel`";
      $cmd = $this->pdo->Conn()->prepare("INSERT INTO  `games` ($campo) values (:id, :dscr, :niven,
         :ccurr, :objet, :tema, :serie, :idade, :fk_id, :sele)");
      $cmd->bindValue(":id"     , $id            , PDO::PARAM_INT);
      $cmd->bindValue(":dscr"   , $game['dscr']  , PDO::PARAM_STR);
      $cmd->bindValue(":niven"  , $game['niven'] , PDO::PARAM_STR);
      $cmd->bindValue(":ccurr"  , $game['ccurr'] , PDO::PARAM_STR);
      $cmd->bindValue(":objet"  , $game['objet'] , PDO::PARAM_STR);
      $cmd->bindValue(":tema"   , $game['tema']  , PDO::PARAM_STR);
      $cmd->bindValue(":serie"  , $game['serie'] , PDO::PARAM_STR);
      $cmd->bindValue(":idade"  , $game['idade'] , PDO::PARAM_STR);
      $cmd->bindValue(":fk_id"  , $game['fk_id'] , PDO::PARAM_STR);
      $cmd->bindValue(":sele"   , $game['sele']  , PDO::PARAM_STR);
      $cmd->execute();
      return true;
  }


  // public function buscarDadosUsuarios($id)
  // {
  //   $cmd = $this->pdo->Conn()->prepare("SELECT * from cadastro WHERE idcadastro = :id ");
  //   $cmd->bindValue(":id",$id , PDO::PARAM_STR);
  //   $cmd->execute();
  //   $dados = $cmd->fetch();
  //   return $dados;
  // }
  public function buscarJogo()
  {
    $cmd = $this->pdo->Conn()->prepare("SELECT * from games");
    $cmd->execute();
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }
}

?>
