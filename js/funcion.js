setTimeout(function () {
      document.getElementById("erro").style.display = "none";
    }, 3000);
    function hide(){
    document.getElementById("erro").style.display = "none";
    }
    $(function(){
            $(".troca").click(function(e){
                e.preventDefault();
                el = $(this).data('element');
                $(el).toggle();
            });
        });
