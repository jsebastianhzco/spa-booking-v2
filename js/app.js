$(function() {

/*

$('.horarios').hide();

$('.hora_reserva').click(function (e) { 

    e.preventDefault();

    $('.horarios').show();

});



*/




$('.servicio_reserva_test').change(function (e) { 

    e.preventDefault();

    

    if($(this).val() == "1" ){ $('.color-bg').val('red');}

    if($(this).val() == "2"){  $('.color-bg').val('aqua'); }

    if($(this).val() == "3"){  $('.color-bg').val('darkorange'); }

});











$('button.submit').hide();



$('.forward').click(function (e) { 

    e.preventDefault();

    $('button.submit').show();

    function HideForward(){
        $('.forward').hide();
    }

    HideForward();

});











$('.backward').click(function (e) { 

    e.preventDefault();

    $('button.submit').hide();
    $('.forward').show();

});









   var boton_check = $('.check-email');



    boton_check.click(function() {



        var email_cliente = $('.email').val();





        if(email_cliente == ""){

            alert('Email Required');

        }else{



            $.ajax({

                type: "post",

                url: "custom/consultas.php?opc=check_email",

                data: {

                    email_cliente: email_cliente

                },

                success: function(datos) {

             

                    if (datos == 1) {

                        $('form#wrapped').attr('action', 'booking_spa_new.php');

                       $('.apellido').removeAttr('readonly');

                       $('.nombre').removeAttr('readonly');

                       $('.telefono').removeAttr('readonly');
                       
setInterval(function(){
    

                        $("button[table-data='11:30']").css('background-color', 'red');
                        $("button[table-data='11:30']").attr('disabled', 'disabled');

                        $("button[table-data='15:30']").css('background-color', 'red');
                        $("button[table-data='15:30']").attr('disabled', 'disabled');


                    },0);
                        

                       $('.apellido').val('');

                       $('.nombre').val('');

                       $('.telefono').val('');



                    } else {



                        $('.apellido').attr('readonly');

                        $('.nombre').attr('readonly');

                        $('.telefono').attr('readonly');

                        $('form#wrapped').attr('action', 'booking_spa.php');

                        var email = JSON.parse(datos);

                        $('.email').val(email);

    

    

                        $.ajax({

                            type: "post",

                            url: "custom/consultas.php?opc=check_nombre",

                            data: {

                                email_cliente: email_cliente

                            },

    

                            success: function(datos) {

                                var nombre = JSON.parse(datos);

                                $('.nombre').val(nombre);

                            }

                        });

    

    

    

                        $.ajax({

                            type: "post",

                            url: "custom/consultas.php?opc=check_apellido",

                            data: {

                                email_cliente: email_cliente

                            },

    

                            success: function(datos) {

                                var apellido = JSON.parse(datos);

                                $('.apellido').val(apellido);

                            }

                        });

    

    

    

                        $.ajax({

                            type: "post",

                            url: "custom/consultas.php?opc=check_telefono",

                            data: {

                                email_cliente: email_cliente

                            },

    

                            success: function(datos) {

                                var telefono = JSON.parse(datos);

                                $('.telefono').val(telefono);

                            }

                        });

    

    

    

                        $.ajax({

                            type: "post",

                            url: "custom/consultas.php?opc=check_id",

                            data: {

                                email_cliente: email_cliente

                            },

    

                            success: function(datos) {

                                var id = JSON.parse(datos);

                                $('.user_id').val(id);
                                $('.quickbutton-login').attr("href", "mon-compte.php?id_cliente="+id);

                            }

                        });

                    }   

                }

            });

        }

    })





    











});