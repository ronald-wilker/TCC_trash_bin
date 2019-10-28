<?php
//-1 verificar se apertaram o botao
//-2 guarda dados dentro de variaveis
//-3 enviar dados colhidos para classe, funcao cadastrar
//-4 verificar o retorno



include_once 'classes/usuario.php';
include_once 'classes/comentario.php';
include_once 'classes/jogo.php';


$us = new Usuario;
$comt = new Comentario;
$jogo = new Jogo;


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
       //login

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
////////////////////////////////////////////////////////////////
//comentarios
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
//excluir usuario pelo adm pega valores de variaveis
if (isset($_GET['id_excu']))
{
  $iduse = htmlentities(addslashes($_GET['id_excu']));
           try {
         $us->excluirUse($iduse);
         $resp = base64_encode("Excluido Usuário com sucesso!!");
         header("location:edita.php?msg=".$resp);
       }catch(Exception $ex){
         echo $ex->getMessage();
       }
 }

//////////////////////////////////////////////////////////
//cadastro do jogo
if (isset($_POST['gamer']))
{
  $njogo = htmlentities(addslashes($_POST['njogo']));
  $dscr = htmlentities(addslashes($_POST['dscr']));
  $niven = htmlentities(addslashes($_POST['niven']));
  $ccurr = htmlentities(addslashes($_POST['ccurr']));
  $tema = htmlentities(addslashes($_POST['tema']));
  $serie = htmlentities(addslashes($_POST['serie']));
  $idade = htmlentities(addslashes($_POST['idade']));
  $objet = htmlentities(addslashes($_POST['objet']));
  $sele = htmlentities(addslashes($_POST['sele']));
  $fk_id = htmlentities(addslashes($_POST['fk_id']));
  $game = array('njogo' =>$njogo,'dscr' =>$dscr,'niven' =>$niven,'ccurr' =>$ccurr,'tema' =>$tema,
  'serie' =>$serie,'idade' =>$idade,'objet' =>$objet,'sele' =>$sele,'fk_id' =>$fk_id );


  $jogo->cadastrarJogo($game);
  $resp = base64_encode("Jogo cadastrado com sucesso!!");
  header("location:edita.php?msg=".$resp);
}
//atualizar do jogo
if (isset($_POST['atugame']))
{
  $id = htmlentities(addslashes($_POST['atugam']));
  $njogo = htmlentities(addslashes($_POST['njogo']));
  $dscr = htmlentities(addslashes($_POST['dscr']));
  $niven = htmlentities(addslashes($_POST['niven']));
  $ccurr = htmlentities(addslashes($_POST['ccurr']));
  $tema = htmlentities(addslashes($_POST['tema']));
  $serie = htmlentities(addslashes($_POST['serie']));
  $idade = htmlentities(addslashes($_POST['idade']));
  $objet = htmlentities(addslashes($_POST['objet']));
  $sele = htmlentities(addslashes($_POST['sele']));
  $fk_id = htmlentities(addslashes($_POST['fk_id']));
  $atugame = array('id' =>$id, 'njogo' =>$njogo, 'dscr' =>$dscr,'niven' =>$niven,'ccurr' =>$ccurr,'tema' =>$tema,
  'serie' =>$serie,'idade' =>$idade,'objet' =>$objet,'sele' =>$sele,'fk_id' =>$fk_id );
//   echo "<pre>";
// print_r($atugame);
// echo "</pre>";

  $jogo->atualizarJogo($atugame);
  $resp = base64_encode("Jogo atualizado com sucesso!!");
  header("location:editajogo.php?msg=".$resp);

}



 ?>
