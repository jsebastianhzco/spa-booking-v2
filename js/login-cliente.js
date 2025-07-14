
$(function () {
    $(".check_client").click(function (e) { 
        e.preventDefault();
        var data = {

            email_cliente : $('.email_cliente').val()
    
            }

            $.ajax({

                type: "POST",    
                url: "custom/mon-compte.php?opc=login",
    
                   data: {
    
                    email_cliente : data.email_cliente
    
    
                },
      
                success: function (respuesta) {
    
                    var obj = JSON.parse(respuesta);
    
                    console.log(obj);
    
                    window.location="/mon-compte.php?id_cliente="+obj;       
                }
    
            });
    });







});







/*$(function () {

    $('.check_client').click(function (e) {

                e.preventDefault();



        var data = {

        email_cliente : $('.email_cliente').val()

        }

        

        $.ajax({

            type: "POST",

            url: "custom/mon-compte.php?opc=check_email",

            data: {

                email_cliente : data.email_cliente

            },

            success: function (datos) {

                var obj = JSON.parse(datos);

                

                

                if(obj == 'DEFAULT'){

                    //$('.set_pass').show();

                    //$(".envoyer_login_cliente").attr("disabled", "true");

                    //$('.avisos_login_cliente').text("Définissez votre nouveau mot de passe et connectez-vous après l'actualisation de la page");

                    //$('.pass_cliente').removeAttr('disabled');




 
                    $('.set_pass').click(function (e) { 

                        e.preventDefault();

                        

                    

                        var data = {

                            email_cliente : $('.email_cliente').val()  ,

                            pass_cliente : $('.pass_cliente').val()

                        }

                                       

                        $.ajax({

                            type: "post",

                            url: "custom/mon-compte.php?opc=set_pass",

                            data: {

                                email_cliente : data.email_cliente,

                                pass_cliente : data.pass_cliente

                            },

                            success: function () {

                                location.reload();

                            }

                        });

                    

                    });













                    

                }else{

                    

                    $('.pass_cliente').removeAttr('disabled');

                    $('.avisos_login_cliente').text("");



                }

            }

        });

    });









    $('.envoyer_login_cliente').click(function (e) { 

        e.preventDefault();

        

        var data = {

            email_cliente : $('.email_cliente').val()  ,

            pass_cliente : $('.pass_cliente').val()

        }



        $.ajax({

            type: "POST",

            url: "custom/mon-compte.php?opc=login",

            data: {

                email_cliente : data.email_cliente,

                pass_cliente : data.pass_cliente

            },

            

            success: function (respuesta) {

                var obj = JSON.parse(respuesta);

                console.log(obj);

                window.location="/mon-compte.php?id_cliente="+obj;



                



            }

        });

        

    });


});*/