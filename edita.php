<?php
  include_once 'classes/usuario.php';
  $us = new Usuario;
  session_start();
  if (!isset($_SESSION['id_master'])) {
    $msg = base64_encode("sem permissão de acesso!!");
    header('location:index.php?msge='.$msg);
  }
$informacao =  $us->buscarTodoDadoUse();

     $msg = $_REQUEST['msg'];
     $msge = $_REQUEST['msge'];
    if ($msg) {
      ?>
          <div id="erro" class="alert alert-success alert-dismissible fade show">
          <button type="button" class="close" onclick="$('#erro').hide()">&times;</button>
          <?php echo $msg;  ?>
           </div>
      <?php
    }elseif ($msge) {
    ?>
            <div id="erro" class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" onclick="$('#erro').hide()">&times;</button>
            <?php echo $msge;  ?>
             </div>
    <?php
    }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">
<meta name="author" content="Lidiane da S. Costa e Ronald Wilker de A. Andrade">
<meta name="description" content="steam jogos digitais">
<meta name="keywords" content="steam, jogos, Trash Bin">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link href="fontawesome-free-5.8.2-web/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/estilo.css">
  <title>Steam RLink</title>
</head>
  <body style="background-image: url('s.jpg');background-repeat:no-repeat; background-size:cover;>
    <main>
      <div class="" id="myAlert">

      </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-degrader">
          <a class="navbar-brand" href="index.php"><img src="imagens/logotipo.png"  class=" im" alt="sem imagem" title="RLink.com"></a>

        <button class="navbar-toggler bg-warning " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" id="01">


            <li class="nav-item active mr-auto">
                <a class="nav-link text-light" href="index.php" >Início<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light" href="#contatoo" >Contato</a>
            </li>
            <li class="nav-item ">
               <a class="nav-link text-light" href="#quem_somos" >Quem Somos</a>
            </li>
          </ul>
           <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                   <a class="nav-link text-light" href="sair.php" >Sair</a>
                </li>
           </ul>


          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Busca">
            <button class="btn btn-warning text-purple my-2 my-sm-0" type="submit">Pesquisa</button>
          </form>
        </div>
      </nav>
      <!--fim topo-->

      <div class="form-group">
          <h2  class="text-center">Usuarios Cadastrados</h2>
      <?php

             foreach ($informacao as $key){ ?>
               <form   method="post" action="update.php"  >
      <table class="table ">
        <thead class="thead-dark" w-100>
            <tr>
              <th scope="col"><h4 class="text-right"><?php   echo $key['nome'];?></h4></th>

              <th scope="col"></th>

            </tr>
        </thead>
        <tr class="table-primary">
          <td>
            <label for="id">Identificador:</label>
            <input class="form-control" id="id"  value="<?php   echo $key['idcadastro']?>">
            <small id="emailHelp" class="form-text text-muted">Id do usuario.</small>
          </td>
          <td>
              <label for="nomep">Nome:</label>
              <input class="form-control" id="nomep" name="nomep" >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['nome'];?>.</small>

            </td>
          </tr>
        <tr class="table-secondary">
          <td>
            <label for="sele">Sexo:</label>
            <input class="form-control" id="sele" name="sele"  >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['sexo'];?>.</small>

          </td>
          <td>
            <label for="nescola">Escola:</label>
            <input class="form-control" id="nescola" name="nescola"  >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['nome_escolal'];?>.</small>

          </td>
        </tr>
        <tr class="table-success">
          <td>
            <label for="ndiciplina">Disciplina:</label>
            <input class="form-control"  id="ndiciplina" name="ndiciplina" >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['diciplina'];?>.</small>

          </td>
          <td>
            <label for="email">E-mail:</label>
            <input class="form-control"  id="email" name="email" >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['email'];?>.</small>

          </td>
        </tr>
        <tr class="table-info">
          <td>
            <label for="senha">Senha:</label>
            <input class="form-control"  id="senha" name="senha" >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['senha'];?>.</small>

          </td>
          <td>
            <label for="nivel">Nivel de acesso:</label>
            <input class="form-control"  id="nivel" name="nivel" >
            <small id="emailHelp" class="form-text text-muted"><?php   echo $key['nivel'];?>.</small>

          </td>
        </tr>
        <tr class="table-primary">

        <td>
          <button type="submit" name="envia" value="editar" class="btn btn-primary">Editar</button>
        </td>
    </form>
    <form action="del.php" method="post">
         <td>
          <button type="submit" name="envia" value="<?php echo $key['idcadastro']?>" class="btn btn-danger">Excluir</button>
        </td>
    </form>
      </tr>
</table>
       <?php
        };
       ?>
   </div>
   <div class="jumbotron mt-2" id="quem_somos">
     <div class=" d-flex justify-content-center">
       <img src="imagens/logomarca.png" class="center" alt="logomarca"  style="max-width:30%;max-height:200px;">
       <img src="imagens/logotipo.png" class="center" alt="logotipo"  style="max-width:30%;max-height:200px;">
     </div>
     <h1 class="display-4 text-center">Quem Somos</h1>
     <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
         in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
         non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
         <!--comentario-->
         <h2>Deixe seu comentário</h2>
         <form class="" action="index.html" method="post">
         <div class="row">
           <div class="col-4 col-md-1 mt-2">
             <img src="imagens/prof.jpg" alt="perfil" class="perfil">
           </div>
           <div class="col-8 col-md-4">
             <textarea name="text" rows="8" cols="80" maxlength="400"></textarea>
           </div>
         </div>
         <input class="btn btn-sm btn-primary mt-2" type="submit" name="comentario" value="PUBICAR COMENTÁRIO">
       </form>
   </div>
   <!--inicio footer-->
   <footer class="text-light bg-dark corlink">
           <div class="container">
             <div class="row row-30">
               <div class="col-md-4 col-lg-4 col-xl-5 mt-2">
                 <div class="pr-xl-4"><a class="brand" href="index.php"><img class="brand-logo-light" src="imagens/logotipo.png" alt="" width="140" height="37" srcset="imagens/logotipo.png 2x"></a>
                   <p>Somos uma agência criativa premiada, dedicada ao melhor resultado em web design, promoção, consultoria de negócios e marketing.</p>
                   <!-- Rights-->
                   <p class="rights"><span>©  </span><span class="copyright-year">2019</span><span> </span><span>Todos os direitos reservados.</span></p>
                 </div>
               </div>
               <div class="col-md-4 col-lg-4 mt-2" id="contatoo">
                 <h5>Contacts</h5>
                 <dl class="contact-list">
                   <dt>endereço:</dt>
                   <dd>798 logo ali, amapá, Brasil</dd>
                 </dl>
                 <dl class="contact-list">
                   <dt>email:</dt>
                   <dd><a href="#">rlinksite@gmail.com</a></dd>
                 </dl>
                 <dl class="contact-list">
                   <dt>telefone:</dt>
                   <dd>xxxxx-xxxx
                   </dd>
                 </dl>
               </div>
               <div class="col-md-4 col-lg-4 col-xl-3 mt-2">
                 <h5>Links</h5>
                 <ul class="nav-list">
                   <li class="mt-2"><!--Facebook-->
                       <button type="button" class="btn btn-primary">
                       <i class="fab fa-facebook"></i> Facebook</button>
                   </li>
                   <li class="mt-2"><!--Gmail-->
                       <button type="button" class="btn btn-danger">
                       <i class="fab fa-google-plus-g"></i> Gmail</button>
                   </li>
                   <li class="mt-2"><!--Instagram-->
                       <button type="button" class="btn btn-danger">
                       <i class="fab fa-instagram"></i> Instagram</button>
                   </li>
                 </ul>
               </div>

             </div>
           </div>
         </footer>
   <!--fim footer-->



</main>
      <script src="js/funcion.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
