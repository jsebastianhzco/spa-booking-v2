$(document).ready(function(e) {
  mostrar_datos();
});

  

  

  function mostrar_datos() {

    $.ajax({

      type: "POST",

      url: "mon-compte.php",

      success: function (data){

        $('.datos-usuarios').html(data)

      }

    });

  };



  



  