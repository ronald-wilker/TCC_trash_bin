<?php
  include_once 'classes/usuario.php';
  include_once 'classes/comentario.php';
  include_once 'classes/jogo.php';
  $us = new Usuario;
  $comtario = new Comentario;
  $jogo = new Jogo;
  $game  = $jogo->buscarJogo();
  $coment  = $comtario->buscarcomentario();
  session_start();
  if (isset($_SESSION['id_usuario']))
   {
      $informacao =  $us->buscarDadosUsuarios($_SESSION['id_usuario']);

    }elseif (isset($_SESSION['id_master']))
     {
      $informacao =  $us->buscarDadosUsuarios($_SESSION['id_master']);

     }
     @$msg = $_REQUEST['msg'];
     @$msge = $_REQUEST['msge'];
    if ($msg) {
      ?>
          <div id="erro" class="alert alert-success alert-dismissible fade show">
          <button type="button" class="close" onclick="$('#erro').hide()">&times;</button>
        <div class="text-center">  <?php echo base64_decode($msg);  ?> </div>
           </div>
      <?php
    }elseif ($msge) {
    ?>
            <div id="erro" class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" onclick="$('#erro').hide()">&times;</button>
          <div class="text-center"> <?php echo base64_decode($msge);  ?> </div>
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
<body>
   <main>
   <!--Topo-->
<div class="" id="myAlert">

</div>
  <nav class="navbar navbar-expand-lg navbar-light bg-degrader">
    <a class="navbar-brand" href="index.php"><img src="imagens/logotipo.png"  class=" im" alt="sem imagem" title="RLink.com"></a>

  <button class="navbar-toggler bg-warning " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" id="u01">


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
    <?php
    if (isset($_SESSION['id_master']) && $informacao['nivel'] == 2 )
    {
      ?>
      <li class="nav-item ">
         <a class="nav-link text-light" href="edita.php" >Dados</a>
      </li>
      <li class="nav-item ">
         <a class="nav-link text-light" href="classes/sair.php" >Sair</a>
      </li>
      <?php
    }elseif (isset($_SESSION['id_usuario']))//se tiver uma sessão mostra botão sair
     { ?>
       <li class="nav-item ">
          <a class="nav-link text-light" href="classes/sair.php" >Sair</a>
       </li>
      <?php
    }else {
      ?>

      <li class="nav-item">
<!--inicio do modal cadastro -->
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="acao.php" >
            <div class="form-group">
              <label for="nomep">Nome Completo <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nomep" name="nomep" aria-describedby="nomecompletoHelp" maxlength="45" placeholder="Seu Nome" required>
                 <small id="emailHelp" class="form-text text-muted">Nome completo ou nick de usuario.</small>
            </div>
            <div class="form-group">
               <label for="selecione">Selecione o Sexo</label>
               <select name="sele" class="form-control" id="selecione">
                 <option value="masculino">Masculino</option>
                 <option value="feminino">Feminino</option>
               </select>
             </div>
            <div class="form-group">
              <label for="nescola">Nome da Escola  <span class="text-danger">*</span> </label>
              <input type="text" class="form-control" id="nescola" name="nescola" aria-describedby="nescola" maxlength="45" placeholder="Nome da Escola" required>
                 <small id="emailHelp" class="form-text text-muted">Original ou ficticio.</small>
            </div>
            <div class="form-group">
              <label for="diciplina">Nome da Disciplina  <span class="text-danger">*</span> </label>
              <input type="text" class="form-control" id="diciplina" name="ndiciplina" aria-describedby="diciplina" maxlength="15" placeholder="Nome da Disciplina" required>
               <small id="emailHelp" class="form-text text-muted">Original ou ficticio.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço de email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" maxlength="45" placeholder="Seu email" required>
              <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="senha" maxlength="20" placeholder="Senha" required>
                <small id="emailHelp" class="form-text text-muted">maximo 20  caracteres.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword2">Confirmar Senha <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="exampleInputPassword2" name="senha2" maxlength="20" placeholder="Confirmar Senha" required>
               <small id="emailHelp" class="form-text text-muted">Redigite senha anterior.</small>
            </div>
            <button type="submit" class="btn btn-primary" name="cadastro" value="cadastro">Cadastrar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--fim do modal cadastro -->
        <a class="nav-link text-light " data-toggle="modal" data-target="#modalExemplo" href="#">Cadastro</a>
      </li>

      <li class="nav-item ">
        <!--inicio do modal login -->
        <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="login">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="acao.php">
                    <div class="form-group">
                      <label for="exampleInputEmail">Endereço de email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="exampleInputEmail" name="email" maxlength="45" aria-describedby="emailHelp" placeholder="Seu email" required>
                      <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword">Senha <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" id="exampleInputPassword" maxlength="20" name="senha" placeholder="Senha" required>
                       <small id="emailHelp" class="form-text text-muted">Digite senha cadastrada.</small>
                    </div>
                    <div class="form-group">
                      <a href="#" class="badge badge-danger">Esqueceu a senha?</a>
                    </div>

                    <button type="submit" class="btn btn-primary" name="login" value="login">Login</button>
                </form>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <!--fim do modal login -->
                <a class="nav-link text-light " data-toggle="modal" data-target="#login" href="#">Login</a>
      </li>

      <?php
    }
     ?>


    </ul>


    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Busca">
      <button class="btn btn-warning text-purple my-2 my-sm-0" type="submit">Pesquisa</button>
    </form>
  </div>
</nav>
<!--fim topo-->

<!--inicioi meio-->
<div class="card-group d-flex justify-content-center">
  <!--parte 1 esquerdo-->
  <div class="card  col-md-3 col-lg-4 mt-2  bg-primary text-light">
    <h1 class="card-title text-center">Selecionar Jogos</h1>
    <div class="card-body text-center">
      <h4 class="card-title"><strong>Todas as categorias</strong></h4>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="arte" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Artes
        </a>

        <div class="dropdown-menu" aria-labelledby="arte">
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
     </div>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="ciencia" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ciências
        </a>

        <div class="dropdown-menu" aria-labelledby="ciencia">
          <a class="dropdown-item" href="#">Trash Bin</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
      </div>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="ed_fisica" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Educação Física
        </a>

        <div class="dropdown-menu" aria-labelledby="ed_fisica">
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
      </div>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="geografia" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Geografia
        </a>

        <div class="dropdown-menu" aria-labelledby="geografia">
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
      </div>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="historia" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          História
        </a>

        <div class="dropdown-menu" aria-labelledby="historia">
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
      </div>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="ingles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inglês
        </a>

        <div class="dropdown-menu" aria-labelledby="ingles">
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
      </div>
      <div class="dropdown show mt-1">
        <a class=" text-light dropdown-toggle" href="#" role="button" id="ling_port" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Língua Portuguesa
        </a>

        <div class="dropdown-menu" aria-labelledby="ling_port">
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
          <a class="dropdown-item" href="#">Novo jogo</a>
        </div>
      </div>
    </div>
    <hr>
    <h4 class="card-title text-center"><strong>Selecionar Nível</strong></h4>
    <ul class="list-group list-group-flush  mb-4">
      <li class="list-group-item bg-primary"><a class="dropdown-item badge badge-pill badge-primary" href="#">Fácil</a></li>
      <li class="list-group-item bg-primary"><a class="dropdown-item badge badge-pill badge-primary" href="#">Médio</a></li>
      <li class="list-group-item bg-primary"><a class="dropdown-item badge badge-pill badge-primary" href="#">Difícil</a></li>
    </ul>
  </div>
  <!--parte 2 do meio-->
  <?php
     foreach ($game as $key ) {

     ?>

  <div class="card  col-md-3 col-lg-4 mt-2">
    <img src="imagens/banner_jogo.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><strong> Descrição do jogo:</strong></h5>
      <p class="card-text text-justify"><?php echo $key['desc_jogo']; ?></p>
      <p class="card-text"><strong> Nível de ensino:</strong> <?php echo $key['Nensino']; ?></p>
      <p class="card-text"><strong> Componente Curricular:</strong> <?php echo $key['Ccuricular']; ?></p>
      <p class="card-text"><strong> Temas:</strong> <?php echo $key['tema']; ?></p>
      <p class="card-text"><strong> Série:</strong> <?php echo $key['serie']; ?></p>
      <p class="card-text"><strong> Idade:</strong> <?php echo $key['idade']; ?></p>
      <p class="card-text"><strong> Objetivos:</strong></p>
      <p class="card-text text-justify"><?php echo $key['desc_min']; ?></p>
    </div>
  </div>
  <?php
  }
   ?>
  <!--parte 3 direito-->
  <?php if (isset($_SESSION['id_master']) || isset($_SESSION['id_usuario']))
  {
    ?>
    <div class="card  col-md-3 col-lg-4 mt-2 bg-primary">
      <h1 class="card-title text-center text-light">Meu Perfil</h1>
      <div class="d-flex justify-content-center ">
        <img src="imagens/perfil2.png" class="card-img-top card-img-cent imm rounded-circle" alt="...">
      </div>
      <div class="card-body text-center text-light">
        <h4 class="card-title"><strong>Sobre mim</strong></h4>
        <p class="card-text"><strong>Nome:</strong> <?php echo $informacao['nome']; ?></p>
        <p class="card-text"><strong>Sexo:</strong> <?php echo $informacao['sexo']; ?></p>
        <p class="card-text"><strong>E-mail:</strong> <?php echo $informacao['email']; ?></p>
        <p class="card-text"> <strong>Minha escola</strong> </p>
        <p class="card-text"><?php echo $informacao['nome_escolal']; ?></p>
        <p class="card-text"> <strong>Minha disciplina</strong> </p>
        <p class="card-text"><?php echo $informacao['diciplina']; ?></p>
        <hr>
        <h4 class="card-title"><strong>Editar perfil</strong></h4>
        <button class="card-text btn btn-success"><a class="badge badge-success" href="#">Alterar imagem</a></button>
        <button class="card-text btn btn-success"><a class="badge badge-success" data-toggle="modal" data-target="#editperfil" href="#">Editar perfil</a></button>
        <ul class="list-group ">
        <li class="list-item">
                    <!--inicio do modal cadastro -->
                    <!-- Modal -->
                    <div class="modal fade" id="editperfil" tabindex="-1" role="dialog" aria-labelledby="editperfils" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editperfils">Cadastro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form method="post" action="classes/update.php" >
                                <div class="form-group">
                                  <label class="text-danger" for="nickj">Nome Completo ou Nick <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="nickj" name="nickj" aria-describedby="nomecompletoHelp" maxlength="45" value="<?php echo $informacao['nome']; ?>" required>

                                </div>
                                <div class="form-group">
                                  <label class="text-danger" for="escola">Nome da Escola <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="escola" name="escola" aria-describedby="nescola" maxlength="45" value="<?php echo $informacao['nome_escolal']; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label class="text-danger" for="dcp">Nome da Disciplina <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="dcp" name="dcp" aria-describedby="diciplina" maxlength="15" value="<?php echo $informacao['diciplina']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="salvar" value="<?php echo $informacao['idcadastro']; ?>">Salvar </button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--fim do modal cadastro -->

        </li>
      </ul>

      </div>
    </div>
    <?php
    }else {
  ?>
  <div class="card  col-md-3 col-lg-4 mt-2 bg-primary">
    <h1 class="card-title text-center text-light">Meu Perfil</h1>
    <div class="d-flex justify-content-center ">
      <img src="imagens/perfil2.png" class="card-img-top card-img-cent imm rounded-circle" alt="...">
    </div>
    <div class="card-body text-center text-light">
      <h4 class="card-title"><strong>Sobre mim</strong></h4>
      <p class="card-text"> <strong>Nome:</strong> </p>
      <p class="card-text"> <strong>Sexo:</strong> </p>
      <p class="card-text"> <strong>E-mail:</strong> </p>
      <p class="card-text"> <strong>Minha escola</strong> </p>
      <p class="card-text"> <strong>Minha disciplina</strong> </p>
      <hr>


    </div>
  </div>
  <?php
     } ?>



</div>

<div class="jumbotron mt-2" id="quem_somos">
  <div class=" d-flex justify-content-center">
    <img src="imagens/logomarca.png" class="center" alt="logomarca"  style="max-width:30%;max-height:200px;">
    <img src="imagens/logotipo.png" class="center" alt="logotipo"  style="max-width:30%;max-height:200px;">
  </div>
  <h1 class="display-4 text-center">Quem Somos</h1>
  <p class="lead text-center text-justify"> Somos uma equipe de desenvolvedores sempre disposta a ofertar os melhores produtos, visando sua satisfação. Venha conosco em busca de uma nova fase para a sua vida. Sempre estaremos prontos para atendê-lo e satisfazê-lo.</p>
      <!--comentario-->
      <?php
      if (isset($_SESSION['id_usuario']) || isset($_SESSION['id_master']))
       {
         ?>
         <h2>Deixe seu comentário</h2>
         <form class="" action="acao.php" method="post">
         <div class="row">
           <div class="col-4 col-md-1 mt-2 ">
             <img src="imagens/perfil2.png" alt="perfil" class="perfil">
           </div>
           <div class="col-8 col-md-4">
             <textarea name="textamento" rows="8" cols="80" maxlength="400"></textarea>
           </div>
         </div>
         <input class="btn btn-sm btn-primary mt-2" type="submit" name="btncomentario" value="PUBICAR COMENTÁRIO">
       </form>

          <?php
        }else
         {
           echo "Cadastre-se para deixar seu comentário!";
      }
         ?>


</div>

<!--fim meio-->
<!--area de exibir comentario-->
<h2 class="text-center">Comentários</h2>
<section class="comenta ml-5 " style="max-width:90%;">
<?php
  if (count($coment)> 0) {
    foreach ($coment as $v) {
      ?>
        <form class="form-group">
        <div class="row hrd">
          <div class="col-4 col-md-2 mt-2">
            <img src="imagens/perfil2.png" alt="perfil" class="perfil">
          </div>
          <div class="col-12 col-md-4 ">
        <p>
         <span class="font-weight-bold mr-1"> <?php echo $v['idusuario']; ?> </span>
          <span class="mr-1">
            <?php $data = new DateTime($v['datacomentario']);
                echo  $data->format('d/m/Y');
                  echo "-";

                  echo $v['hora'];
             ?>
             &nbsp &nbsp
              <?php
              if (isset($_SESSION['id_usuario']))
               { //verificando se o comentario e do usuario da sessao
                  if ($_SESSION['id_usuario'] == $v['cadastro_idcadastro'] )
                   {
                    ?>
                    <a href="acao.php?id_exc=<?php echo $v['idcomentario'];?>&nivel=1" class="badge badge-danger">Excluir</a> </span>
                    <?php
                  }

                }elseif (isset($_SESSION['id_master']))
                 {
                  ?>
                  <a href="acao.php?id_exc=<?php echo $v['idcomentario'];?>&nivel=2" class="badge badge-danger">Excluir</a> </span>
                  <?php
                 }
               ?>
        </p>
          <p class="font-weight-bold"><?php echo $v['comentario']; ?></p>
          </div>
        </div>

      </form>
      <?php
    }
  }else {
    echo "Ainda não há comentarios aqui!!";
  }
 ?>
</section>


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
