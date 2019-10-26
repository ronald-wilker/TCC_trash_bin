<?php
//-1 verificar se apertaram o botao
//-2 guarda dados dentro de variaveis
//-3 enviar dados colhidos para classe, funcao cadastrar
//-4 verificar o retorno



include_once 'classes/usuario.php';
include_once 'classes/comentario.php';


$us = new Usuario;
$comt = new Comentario;


$comt->buscarcomentario();
   session_start();


if (isset($_POST['cadastro']))
{
  $nomep = htmlentities(addslashes($_POST['nomep']));
  $sele = htmlentities(addslashes($_POST['sele']));
  $nescola = htmlentities(addslashes($_POST['nescola']));
  $ndiciplina = htmlentities(addslashes($_POST['ndiciplina']));
  $email = htmlentities(addslashes($_POST['email']));
  $senha = htmlentities(addslashes($_POST['senha']));
  $senha2 = htmlentities(addslashes($_POST['senha2']));
  if (!empty($nomep) && !empty($sele) && !empty($nescola) && !empty($ndiciplina) && !empty($email) && !empty($senha) && !empty($senha2))
 {

           if ($senha == $senha2) {

             if ($us->cadastrar($nomep, $sele, $nescola, $ndiciplina, $email, $senha)){

               $resp = base64_encode("Cadastrado com sucesso!");
               header("location:index.php?msg=".$resp);
             }else {

               $resp = base64_encode("Email já esta cadastrado!");
               header("location:index.php?msge=".$resp);
             }
           }else {

             $resp = base64_encode("Senhas não correspondentes!");
             header("location:index.php?msge=".$resp);
           }
  }else {
    $resp = base64_encode("Preencha todos os campos!");
    header("location:index.php?msge=".$resp);
  }
}elseif (isset($_POST['login']))
{
  $email = htmlentities(addslashes($_POST['email']));
  $senha = htmlentities(addslashes($_POST['senha']));
  if (!empty($email) && !empty($senha))
 {


       if ($us->entrar($email, $senha)) {
         if (isset($_SESSION['id_usuario']))
          {
             $informacao =  $us->buscarDadosUsuarios($_SESSION['id_usuario']);
             $resp = base64_encode("Bem vindo ".$informacao['nome']);
             header("location:index.php?msg=".$resp);
           }elseif (isset($_SESSION['id_master']))
            {
             $informacao =  $us->buscarDadosUsuarios($_SESSION['id_master']);
             $resp = base64_encode("Bem vindo Mestre ".$informacao['nome']);
             header("location:index.php?msg=".$resp);
            }


       }else {

         $resp = base64_encode("Email ou senha estão incorretos!");
         header("location:index.php?msge=".$resp);
       }

  }else {
    $resp = base64_encode("Preencha todos os campos!");
    header("location:index.php?msge=".$resp);
  }
}

//inserir comentario pega valores de variaveis

if (isset($_POST['btncomentario']))
{

  $comentario = htmlentities(addslashes($_POST['textamento']));

  if (isset($_SESSION['id_usuario']))
   {
     $comt->inserircomentario( $comentario, $_SESSION['id_usuario'] );

     header("location:index.php");

    }elseif (isset($_SESSION['id_master']))
    {
      $comt->inserircomentario( $comentario, $_SESSION['id_master'] );

      header("location:index.php");
     }

}


//excluir comentario pega valores de variaveis
if (isset($_GET['id_exc']))
{
  $idcomentario = htmlentities(addslashes($_GET['id_exc']));
  echo $n = htmlentities(addslashes($_GET['nivel']));

  if (isset($_SESSION['id_usuario']))
   {
      $comt->excluircomentario($idcomentario, $_SESSION['id_usuario'], $n);
      header("location:index.php");

    }elseif (isset($_SESSION['id_master']))
       {
         try {
           $comt->excluircomentario($idcomentario, $_SESSION['id_master'],$n);
           $resp = base64_encode("Excluido comentário com sucesso!!");
          header("location:index.php?msg=".$resp);
         }catch(Exception $ex){
           echo $ex->getMessage();
         }

       }
 }






 ?>
