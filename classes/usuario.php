<?php
 include_once 'conexao.php';
 /**
 *
 */
class Usuario
{
  public function __construct()
  {
    $this->pdo = new Conect();

  }
  //Cadastrar
  public function cadastrar($nomep, $sele, $nescola, $ndiciplina, $email, $senha)
  {
    //verificação se o email ja existe
    $cmd = $this->pdo->Conn()->prepare("SELECT idcadastro from cadastro WHERE email = :email");
    $cmd->bindValue(":email", $email , PDO::PARAM_STR);
    $cmd->execute();
    if ($cmd->rowCount() > 0)//veio ide
     {
      return false;
    }else {//nao veio id
      // cadastrar
      $nivel = 1;
      $id = null;
      $campo = "`idcadastro`, `nome`, `sexo`, `nome_escolal`, `diciplina`, `email`, `senha`, `nivel`";
      $cmd = $this->pdo->Conn()->prepare("INSERT INTO  `cadastro` ($campo) values (:id, :nomep, :sele, :nescola, :ndiciplina, :email, :senha,:nivel)");
      $cmd->bindValue(":id",$id , PDO::PARAM_INT);
      $cmd->bindValue(":nomep",$nomep , PDO::PARAM_STR);
      $cmd->bindValue(":sele",$sele , PDO::PARAM_STR);
      $cmd->bindValue(":nescola",$nescola , PDO::PARAM_STR);
      $cmd->bindValue(":ndiciplina",$ndiciplina , PDO::PARAM_STR);
      $cmd->bindValue(":email",$email , PDO::PARAM_STR);
      $cmd->bindValue(":senha",md5($senha) , PDO::PARAM_STR);
      $cmd->bindValue(":nivel",$nivel , PDO::PARAM_STR);
      $cmd->execute();
      return true;
    }
  }
  //logor
  public function entrar($email, $senha)
  {
    $cmd = $this->pdo->Conn()->prepare("SELECT * from cadastro WHERE email = :email AND senha = :senha");
    $cmd->bindValue(":email",$email , PDO::PARAM_STR);
    $cmd->bindValue(":senha", md5($senha), PDO::PARAM_STR);
    $cmd->execute();
    if ($cmd->rowCount() > 0) //pessoa cadastrada
    {
      $dados = $cmd->fetch();
      session_start();
      if ($dados['nivel'] == 2)
       {
        $_SESSION['id_master'] = $dados['idcadastro'];
      }else {
        $_SESSION['id_usuario'] = $dados['idcadastro'];
      }
      return true;
    }else {
      return false;
    }

  }

  public function buscarDadosUsuarios($id)
  {
    $cmd = $this->pdo->Conn()->prepare("SELECT *,(SELECT `imagem` FROM `imguser` WHERE `cadastro_idcadastro` = :ide) as imgusuario from cadastro WHERE idcadastro = :id ");
    $cmd->bindValue(":ide",$id , PDO::PARAM_STR);
    $cmd->bindValue(":id",$id , PDO::PARAM_STR);
    $cmd->execute();
    $dados = $cmd->fetch();
    return $dados;
  }
  public function buscarTodoDadoUse()
  {
    $cmd = $this->pdo->Conn()->prepare("SELECT * from cadastro");
    $cmd->bindValue(":id",@$id , PDO::PARAM_STR);
    $cmd->execute();
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  //buscar categoria dos jogos
  public function buscarCatJogo()
  {
    $cmd = $this->pdo->Conn()->prepare("SELECT * FROM `categoria`");
    $cmd->execute();
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  //excluir Usuario
  public function excluirUse($iduse)
  {
    if ($iduse)
     {
      $cmd = $this->pdo->Conn()->prepare("DELETE FROM `comentario` WHERE cadastro_idcadastro = :id");
      $cmd->bindValue(":id", $iduse , PDO::PARAM_INT);
      $cmd->execute();
      $cmd = $this->pdo->Conn()->prepare("DELETE FROM `cadastro` WHERE idcadastro = :id");
      $cmd->bindValue(":id", $iduse , PDO::PARAM_INT);
      $cmd->execute();
    }else
      {
        $cmd = $this->pdo->Conn()->prepare("DELETE FROM `cadastro` WHERE idcadastro = :id");
        $cmd->bindValue(":id", $iduse , PDO::PARAM_INT);
        $cmd->execute();
      }
  }
  //Cadastrar imagem perfil
  public function cadastrarImgPerfil($novoNome,$novo)
  {
    echo $novoNome;
    //verificação se o email ja existe
    $cmd = $this->pdo->Conn()->prepare("SELECT idimgUser, cadastro_idcadastro from imgUser WHERE cadastro_idcadastro = :id");
    $cmd->bindValue(":id", $novo , PDO::PARAM_STR);
    $cmd->execute();
    if ($cmd->rowCount() > 0)//veio ide
     {
       $cmd = $this->pdo->Conn()->prepare("UPDATE `imguser` SET `imagem`=:imge WHERE  cadastro_idcadastro = :id");
       $cmd->bindValue(":imge", $novoNome , PDO::PARAM_STR);
       $cmd->bindValue(":id", $novo , PDO::PARAM_INT);
       $cmd->execute();

       return true;

       // cadastrar
       // $id = null;
       // $campo = "`idimgUser`, `nome`, `imagem`, `cadastro_idcadastro`";
       // $cmd = $this->pdo->Conn()->prepare("INSERT INTO  `imgUser` ($campo) values (:id, :nome, :imag, :fk_id)");
       // $cmd->bindValue(":id",$id , PDO::PARAM_INT);
       // $cmd->bindValue(":nome",$novo , PDO::PARAM_STR);
       // $cmd->bindValue(":imag",$novoNome , PDO::PARAM_STR);
       // $cmd->bindValue(":fk_id",$novo , PDO::PARAM_STR);
       // $cmd->execute();
    }else {
      // cadastrar
      $id = null;
      $campo = "`idimgUser`, `nome`, `imagem`, `cadastro_idcadastro`";
      $cmd = $this->pdo->Conn()->prepare("INSERT INTO  `imgUser` ($campo) values (:id, :nome, :imag, :fk_id)");
      $cmd->bindValue(":id",$id , PDO::PARAM_INT);
      $cmd->bindValue(":nome",$novo , PDO::PARAM_STR);
      $cmd->bindValue(":imag",$novoNome , PDO::PARAM_STR);
      $cmd->bindValue(":fk_id",$novo , PDO::PARAM_STR);
      $cmd->execute();
      return true;
    }

  }

}




 ?>
