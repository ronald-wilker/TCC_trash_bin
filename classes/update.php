<?php
include_once 'conexao.php';

/**
 *
 */
class Atualizar
{

  function __construct()
  {
    $this->pdo = new Conect();
  }
//editar usuario pelo adm
public function editar($vls){


         $sql = "UPDATE `cadastro` SET `nome`= :nome,`sexo`= :sexo,`nome_escolal`= :nesco,
         `diciplina`= :dcp,`email`= :email,`nivel`= :nivel WHERE `idcadastro`= :idc";
$cmd = $this->pdo->Conn()->prepare($sql);
$cmd->bindParam(':nome',     $vls['nomep']   , PDO::PARAM_STR);
$cmd->bindParam(':sexo',      $vls['sele']    , PDO::PARAM_STR);
$cmd->bindParam(':nesco',     $vls['nescola']   , PDO::PARAM_STR);
$cmd->bindParam(':dcp',      $vls['ndiciplina']    , PDO::PARAM_STR);
$cmd->bindParam(':email',      $vls['email']    , PDO::PARAM_STR);
//$cmd->bindParam(':snh',      $vls['senha']    , PDO::PARAM_STR);
$cmd->bindParam(':nivel',      $vls['nivel']    , PDO::PARAM_STR);
$cmd->bindParam(':idc',     $vls['id']             , PDO::PARAM_INT);
$cmd->execute();



   $msg = base64_encode( "Usuário Atualizado!!");
  header('Location: ../edita.php?msg='.$msg);


}
//perfil usuario edita
public function editarPerfil($nomep, $nescola, $ndiciplina, $id ){
  echo "<pre>";
 echo $nomep, $nescola, $ndiciplina, $id;
  echo "</pre>";
//$sql = "UPDATE `cadastro` SET `nome`= :nome, nome_escolal`= :nesco,`diciplina`= :dcp  WHERE `idcadastro`= :idc";
$up = $this->pdo->Conn()->prepare("UPDATE `cadastro` SET `nome`= :nome, nome_escolal = :nesco,`diciplina`= :dcp  WHERE `idcadastro`= :idc");
$up->bindParam(':nome'  ,      $nomep         , PDO::PARAM_STR);
$up->bindParam(':nesco' ,      $nescola       , PDO::PARAM_STR);
$up->bindParam(':dcp'   ,      $ndiciplina    , PDO::PARAM_STR);
$up->bindParam(':idc'   ,      $id            , PDO::PARAM_INT);
$up->execute();

  
   $msg = base64_encode( "Usuário Atualizado!!");
  header('Location: ../index.php?msg='.$msg);


}

}

$edt = new Atualizar;
//update cadastros de Usuarios
if (isset($_POST['envia']))
{
  $id = htmlentities(addslashes($_POST['id']));
  $nomep = htmlentities(addslashes($_POST['nomep']));
  $sele = htmlentities(addslashes($_POST['sele']));
  $nescola = htmlentities(addslashes($_POST['nescola']));
  $ndiciplina = htmlentities(addslashes($_POST['ndiciplina']));
  $email = htmlentities(addslashes($_POST['email']));
//  $senha = md5(htmlentities(addslashes($_POST['senha'])));
  $nivel = htmlentities(addslashes($_POST['nivel']));
  $vls  = array('nomep' => $nomep,'sele' => $sele,'nescola' => $nescola,'ndiciplina' => $ndiciplina,'email' => $email,
'senha' => $senha,'nivel' => $nivel,'id' => $id  );
// echo "<pre>";
// var_dump($vls);
// echo "</pre>";
$edt->editar($vls);

}


if (isset($_POST['salvar']))//update perfil de Usuarios
{

  $id = htmlentities(addslashes($_POST['salvar']));
  $nomep = htmlentities(addslashes($_POST['nickj']));
  $nescola = htmlentities(addslashes($_POST['escola']));
  $ndiciplina = htmlentities(addslashes($_POST['dcp']));

   $edt->editarPerfil($nomep, $nescola, $ndiciplina, $id );
}
 ?>
