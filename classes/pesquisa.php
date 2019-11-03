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

//pesquisa especifica por jogo
  public function espesqJogo($pesquisa){
    $cmd = $this->pdo->Conn()->prepare("SELECT * from `games` WHERE `nomejogo` LIKE '%$pesquisa%' ");
    $cmd->execute();
    $rs = $cmd->fetchAll(PDO::FETCH_ASSOC);
      if ($rs) {

      foreach ($rs as $key ) {
        $msg.="<img src='imagens/banner_jogo.png' class='card-img-top' alt='...'>";
        $msg.="<div class='card-body'>";
        $msg.="<h5 class='card-title'><strong> Descrição do jogo:</strong></h5>";
        $msg.="<p class='card-text text-justify'>".$key['desc_jogo']."</p>";
        $msg.="<p class='card-text'><strong> Nível de ensino:</strong>".$key['Nensino']."</p>";
        $msg.="<p class='card-text'><strong> Componente Curricular:</strong>".$key['Ccuricular']."</p>";
        $msg.="<p class='card-text'><strong> Temas:</strong>".$key['tema']."</p>";
        $msg.="<p class='card-text'><strong> Série:</strong>".$key['serie']."</p>";
        $msg.="<p class='card-text'><strong> Idade:</strong>".$key['idade']."</p>";
        $msg.="<p class='card-text'><strong> Objetivos:</strong> </p>";
        $msg.="<p class='card-text text-justify'>".$key['desc_min']."</p>";
       $msg.="</div>";

    }
  }else {
              $msg = "";
							$msg.="Nenhum resultado foi encontrado...";
  }

  //retorna a msg concatenada
  	echo $msg;


  }

}




?>
