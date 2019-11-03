

//inicio do pesquisa
   $(document).ready(function(){
     $("#form_pesquisa").on('submit',function (evento) {
           evento.preventDefault();
     //Aqui a ativa a imagem de load
     function loading_show(){
    $('#loading').html("<img src='imagens/loading.gif'/>").fadeIn('fast');
     }

     //Aqui desativa a imagem de loading
     function loading_hide(){
         $('#loading').fadeOut('fast');
     }

     // aqui a fun��o ajax que busca os dados em outra pagina do tipo html, n�o � json
     function load_dados(valores, page, div)
     {
             $.ajax({
                 type: "POST",
                 url: page,
                 beforeSend: function(){//Chama o loading antes do carregamento
                   loading_show();
         },
                 dataType: "html",
                 data: valores,
                 success: function(msg)
                 {
                     loading_hide();
                     var data = msg;
               $(div).html(data).fadeIn();
                 }
           });
     }
     //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
     load_dados(null, 'acao.php', '#MostraPesq');
     //Aqui uso o evento key up para come�ar a pesquisar, se valor for maior q 0 ele faz a pesquisa
     $('#pesquisaDesc').keyup(function(){
         var valores =  $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada
         //pegando o valor do campo #pesquisaDesc
         var $parametro = $(this).val();
         // console.log($parametro);
       //  document.write(valores);
         if($parametro.length >= 1)
         {
             load_dados(valores, 'acao.php', '#MostraPesq');
         }else
         {
             load_dados(null, 'acao.php', '#MostraPesq');
         }
     });
  });
  });
