<?php
  include_once 'classes/usuario.php';
  include_once 'classes/jogo.php';
  $jogo = new Jogo;
  $us = new Usuario;
  session_start();
  if (!isset($_SESSION['id_master'])) {
    $msg = base64_encode("sem permissão de acesso!!");
    header('location:index.php?msge='.$msg);
  }
$game =  $jogo->buscarJogo();
$catjo =  $us->buscarCatJogo();

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
                <a class="nav-link text-light" href="index.php" >Início</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-light" href="#contatoo" >Contato</a>
            </li>
            <li class="nav-item ">
               <a class="nav-link text-light" href="#quem_somos" >Quem Somos</a>
            </li>
          </ul>

           <ul class="navbar-nav mr-auto">
                          <li class="nav-item">

       <!--botao volta pagina anterior -->
         <?php echo "<a class='nav-link text-light ' href='" . $_SERVER['HTTP_REFERER'] . "'>Voltar</a>"; ?>

             </li>
                <li class="nav-item ">
                   <a class="nav-link text-light" href="classes/sair.php" >Sair</a>
                </li>
           </ul>
          <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Busca">
            <button class="btn btn-warning text-purple my-2 my-sm-0" type="submit">Pesquisa</button>
          </form> -->
        </div>
      </nav>
      <!--fim topo-->
      <div class="form-group">
          <h2  class="text-center">Jogos Cadastrados</h2>
      <?php

             foreach ($game as $key){ ?>
               <form   method="post" action="acao.php"  >
      <table class="table ">
        <thead class="thead-dark" w-100>
            <tr>
              <th scope="col"><h4 class="text-right"><?php   echo $key['nomejogo'];?></h4></th>

              <th scope="col"></th>

            </tr>
        </thead>
        <tr class="table-primary">
          <td>
            <label for="njogo">Nome do jogo:</label>
            <input class="form-control" maxlength="45" id="njogo" name="njogo"  value="<?php   echo $key['nomejogo']?>">
            <small  class="form-text text-danger">Nome do jogo.</small>
          </td>
          <td>
            <label for="dscr">Descrição do jogo<span class="text-danger">*</span></label>
            <textarea name="dscr" id="dscr" rows="8" cols="10" maxlength="400" placeholder="<?php   echo $key['desc_jogo'];?>"></textarea>
                 <small  class="form-text text-danger">Sobre o jogo.</small>


            </td>
        </tr>
        <tr class="table-secondary">

          <td>
            <label for="niven">nivel de ensino:</label>
            <input class="form-control" maxlength="45" id="niven" name="niven" value="<?php   echo $key['Nensino'];?>" >
              <small  class="form-text text-danger">Nível de ensino do jogo. </small>

          </td>
          <td>
            <label for="ccurr">Componente Curricular:</label>
            <input class="form-control" maxlength="45" id="ccurr" name="ccurr" value="<?php   echo $key['Ccuricular'];?>" >
            <small  class="form-text text-danger">Componente Curricular(disciplina).</small>

          </td>
        </tr>
        <tr class="table-success">
          <td>
            <label for="tema">Tema:</label>
            <input class="form-control" maxlength="45"  id="tema" name="tema" value="<?php   echo $key['tema'];?>">
            <small  class="form-text text-danger">Tema do Jogo.</small>

          </td>
          <td>
            <label for="serie">Série</label>
            <input class="form-control" maxlength="45"  id="serie" name="serie" value="<?php   echo $key['serie'];?>">
            <small  class="form-text text-danger">Série do Ensino.</small>

          </td>
        </tr>
        <tr class="table-info">
          <td>
            <label for="idade">Idade:</label>
            <input class="form-control" maxlength="20" id="idade" name="idade"  value="<?php   echo $key['idade']?>">
            <small  class="form-text text-danger">Idade de classificação.</small>
          </td>
          <td>
            <label for="objet">Objetivos do jogo<span class="text-danger">*</span></label>
            <textarea name="objet" id="objet" rows="8" cols="10" maxlength="400" placeholder="<?php   echo $key['desc_min'];?>"></textarea>
               <small  class="form-text text-danger">Objetivos do jogo.</small>
            </td>
        </tr>
        <tr class="table-primary">

          <td>
            <label for="nescola">nivel de dificuldade:</label>
            <select name="sele" class="form-control" id="selecione">
              <option value="<?php echo $key['nivel'];?>"><?php echo $key['nivel'];?></option>
              <option value="facil">Fácil</option>
              <option value="medio">Médio</option>
              <option value="dificil">Difícil</option>
            </select>
            <small  class="form-text text-danger">Nível de dificuldade do jogo.</small>
          </td>
          <td>
            <label for="atugam">Identificado:</label>
            <input class="form-control" maxlength="45" id="atugam" name="atugam"  value="<?php   echo $key['idgames']?>">
            <small  class="form-text text-danger">Identificadordo jogo.</small>
          </td>

        </tr>
        <tr class="table-secondary">
          <td>
            <button type="submit" name="atugame" value="atualiza" class="btn btn-primary mr-2">Editar</button>
            <a type="button" href="acao.php?id_excg=<?php   echo $key['idgames']?> & idcat=<?php   echo $key['categoria_idcategoria']?> " name="gamer"  class="btn btn-danger">Excluir</a>
          </td>
          <td>
            <label for="exampleFormControlSelect2">Categoria</label>
            <select  class="form-control" name="fk_id" id="exampleFormControlSelect2">
              <?php
             foreach ($catjo as $key){ ?>

             <option   value="<?php echo $key['idcategoria'];?>" > <?php   echo $key['nome_cat'];?>  </option>  <?php
                };


               ?>
              </select>
               <small  class="form-text text-danger">Categoria do jogo. </small>

          </td>
        </tr>


    </form>


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
     <p class="lead text-center text-justify"> Somos uma equipe de desenvolvedores
       sempre disposta a ofertar os melhores produtos, visando sua satisfação.
       Venha conosco em busca de uma nova fase para a sua vida. Sempre estaremos prontos
       para atendê-lo e satisfazê-lo.</p>


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
