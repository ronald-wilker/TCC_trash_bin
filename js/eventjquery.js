//exibir dropdaw ao passa o mouse 
$(document).ready(function(){
$(".botao").click(function(){
    $(".diver").toggle("slow");
});
});
//exibir e oculta as mensagens
setTimeout(function () {
      document.getElementById("erro").style.display = "none";
    }, 3000);
    function hide(){
    document.getElementById("erro").style.display = "none";
  };
