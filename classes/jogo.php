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
      $campo = "`idgames`, `nomejogo`, `desc_jogo`, `Nensino`, `Ccuricular`, `desc_min`,
       `tema`, `serie`, `idade`, `categoria_idcategoria`, `nivel`";
      $cmd = $this->pdo->Conn()->prepare("INSERT INTO  `games` ($campo) values (:id, :njogo, :dscr, :niven,
         :ccurr, :objet, :tema, :serie, :idade, :fk_id, :sele)");
      $cmd->bindValue(":id"     , $id            , PDO::PARAM_INT);
      $cmd->bindValue(":njogo"   , $game['njogo']  , PDO::PARAM_STR);
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
  //atualizar cadastro  jogo
  public function atualizarJogo($atugame)
  {
  if (empty($nomep) || empty($sele)) {
    echo "<pre>";
    print_r($atugame);
    echo "</pre>";

    $cmd = $this->pdo->Conn()->prepare("UPDATE `games` SET  nomejogo = :njogo, Nensino = :niven,
      Ccuricular = :ccurr,  tema = :tema,  serie = :serie,
        idade = :idade,  categoria_idcategoria = :fk_id,  nivel = :sele WHERE  idgames = :id ");
    $cmd->bindValue(":njogo"   , $atugame['njogo']  , PDO::PARAM_STR);
    $cmd->bindValue(":niven"  , $atugame['niven'] , PDO::PARAM_STR);
    $cmd->bindValue(":ccurr"  , $atugame['ccurr'] , PDO::PARAM_STR);
    $cmd->bindValue(":tema"   , $atugame['tema']  , PDO::PARAM_STR);
    $cmd->bindValue(":serie"  , $atugame['serie'] , PDO::PARAM_STR);
    $cmd->bindValue(":idade"  , $atugame['idade'] , PDO::PARAM_STR);
    $cmd->bindValue(":fk_id"  , $atugame['fk_id'] , PDO::PARAM_STR);
    $cmd->bindValue(":sele"   , $atugame['sele']  , PDO::PARAM_STR);
    $cmd->bindValue(":id"     , $atugame['id']    , PDO::PARAM_INT);
    $cmd->execute();
    return true;
  } else {

      $cmd = $this->pdo->Conn()->prepare("UPDATE `games` SET `nomejogo`= :njogo, desc_jogo = :dscr, Nensino = :niven,
        Ccuricular = :ccurr, desc_min = :objet, `tema`= :tema, `serie`= :serie,
         `idade`= :idade, `categoria_idcategoria`= :fk_id, `nivel`= :sele WHERE `idgames`= :id ");
      $cmd->bindValue(":njogo"   , $atugame['njogo']  , PDO::PARAM_STR);
      $cmd->bindValue(":dscr"   , $atugame['dscr']  , PDO::PARAM_STR);
      $cmd->bindValue(":niven"  , $atugame['niven'] , PDO::PARAM_STR);
      $cmd->bindValue(":ccurr"  , $atugame['ccurr'] , PDO::PARAM_STR);
      $cmd->bindValue(":objet"  , $atugame['objet'] , PDO::PARAM_STR);
      $cmd->bindValue(":tema"   , $atugame['tema']  , PDO::PARAM_STR);
      $cmd->bindValue(":serie"  , $atugame['serie'] , PDO::PARAM_STR);
      $cmd->bindValue(":idade"  , $atugame['idade'] , PDO::PARAM_STR);
      $cmd->bindValue(":fk_id"  , $atugame['fk_id'] , PDO::PARAM_STR);
      $cmd->bindValue(":sele"   , $atugame['sele']  , PDO::PARAM_STR);
      $cmd->bindValue(":id"     , $atugame['id']    , PDO::PARAM_INT);
      $cmd->execute();
      return true;
    }
  }


  // public function buscarDadosUsuarios($id)
  // {
  //   $cmd = $this->pdo->Conn()->prepare("SELECT * from games WHERE idgames = :id ");
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
  //excluir jogo
  public function excluirJogo($idjg,$idcat)
  {
    if ($idjg && $idcat)
     {
      $cmd = $this->pdo->Conn()->prepare("DELETE FROM `games` WHERE categoria_idcategoria = :ide AND idgames = :id");
      $cmd->bindValue(":ide", $idcat , PDO::PARAM_INT);
      $cmd->bindValue(":id", $idjg , PDO::PARAM_INT);
      $cmd->execute();

    }else
      {
        $cmd = $this->pdo->Conn()->prepare("DELETE FROM `games` WHERE idgames = :id");
        $cmd->bindValue(":id", $idjg , PDO::PARAM_INT);
        $cmd->execute();
      }
  }

}

?>
