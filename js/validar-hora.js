$(function() {
    
    /*
    //SOLO FUNCIONA CON UN SELECT
    $('.hora_reserva').change(function (e) { 
        
        e.preventDefault();
        var hora_reserva = $('.hora_reserva').val();
        var fecha_reserva = $('.fecha_reserva').val();

        //console.log(hora_reserva);
        //console.log(fecha_reserva);
        
        if(fecha_reserva == ""){
            //console.log('se necesita una fecha');
        }else{

            $.ajax({
                type: "post",
                url: "custom/consultas.php?opc=validar_hora_ajax",
                data: {
                    hora_reserva : hora_reserva,
                    dates : fecha_reserva
                },
                success: function (error) {

                    var pars = JSON.parse(error)

                    $('.error-mensaje').text(pars);
                }
            });
        }
*/

});




$('input[name="dates"]').on('show.daterangepicker', function (ev, picker) {


        var fecha = $('.fecha-reserva').val();	   
        //console.log(fecha);
        //console.log("set");
    
        //$.get( "/horarios-disponibles.php?fecha="+fecha, function( data ) {
            //$( ".horarios-response" ).html( data );		
        //}); 
   
        var hora_reserva = $('.hora_reserva').val();
        var fecha_reserva = $('.fecha_reserva').val();
              
        
        if(fecha_reserva == ""){
            ////console.log('se necesita una fecha');
        }else{
        
            $.ajax({
                type: "post",
                url: "custom/consultas.php?opc=validar_hora_ajax",
                data: {
                    hora_reserva : hora_reserva,
                    dates : fecha_reserva
                },
                success: function (error) {
        
                    var pars = JSON.parse(error)
        
                    $('.error-mensaje').text(pars);
                }
            });
        }
});


$('input[name="dates"]').on('hide.daterangepicker', function (ev, picker) {


    var fecha = $('.fecha-reserva').val();	
    //console.log("set2");
        //console.log(fecha);

        
    var hora_reserva = $('.hora_reserva').val(fecha);
    var fecha_reserva = $('.fecha_reserva').val();
    
    setTimeout(function () {  
       //console.log('funcion ejecutada');
        

       $.ajax({
        type: "post",
        url: "custom/consultas.php?opc=validar_hora_ajax2",
        data: {
            fecha : $('.fecha_reserva').val(),
        },
        success: function (response) {
            
            //console.log('entra al ajax 1');
            //console.log(response);
            var obj = JSON.parse(response);

            
                    if(obj.length == 0){

                        //console.log('estan disponibles todas las plazas');
                        $('button.tabla').removeAttr('disabled');
                        $('button.tabla').css('backgroundColor' , '#28a745');
                                        
                    }else{

                        
                        
                        $('button.tabla').removeAttr('disabled');
                        $('button.tabla').css('backgroundColor' , '#28a745'); 

                        for(var i = 0; i <= obj.length - 1; i++){
                                                
                                $("button[table-data='"+obj[i]["hora"]+"']").css('backgroundColor', 'red');   
                                $("button[table-data='"+obj[i]["hora"]+"']").attr('disabled' , 'disabled');
                                $("button[table-data='"+obj[i]["hora2"]+"']").css('backgroundColor', 'red');   
                                $("button[table-data='"+obj[i]["hora2"]+"']").attr('disabled' , 'disabled');
                                $("button[table-data='"+obj[i]["hora3"]+"']").css('backgroundColor', 'red');   
                                $("button[table-data='"+obj[i]["hora3"]+"']").attr('disabled' , 'disabled');
                                $("button[table-data='"+obj[i]["hora4"]+"']").css('backgroundColor', 'red');   
                                $("button[table-data='"+obj[i]["hora4"]+"']").attr('disabled' , 'disabled');                                 
                       }
                        }
            }
        });





        $('.tabla').click(function (e) { 
           
            
            e.preventDefault();

            var fecha_reserva = $('.fecha_reserva').val();
            var valTabla = $(this).attr('table-data');

            $('.hora_reserva').val(valTabla);

            $.ajax({
                type: "post",
                url: "custom/consultas.php?opc=validar_hora_ajax2",
                data: {
                    fecha : fecha_reserva,
                    hora : valTabla
                    },
                success: function (response) {
                    

                    var obj = JSON.parse(response);

                    
                            if(obj.length == 0){

                                //console.log('estan disponibles todas las plazas');
                                $('button.tabla').removeAttr('disabled');
                                $('button.tabla').css('backgroundColor' , '#28a745');
                                                
                            }else{

                                
                                
                                $('button.tabla').removeAttr('disabled');
                                $('button.tabla').css('backgroundColor' , '#28a745'); 

                                for(var i = 0; i <= obj.length - 1; i++){
                                                        
                                        $("button[table-data='"+obj[i]["hora"]+"']").css('backgroundColor', 'red');   
                                        $("button[table-data='"+obj[i]["hora"]+"']").attr('disabled' , 'disabled');
                                        $("button[table-data='"+obj[i]["hora2"]+"']").css('backgroundColor', 'red');   
                                        $("button[table-data='"+obj[i]["hora2"]+"']").attr('disabled' , 'disabled');
                                        $("button[table-data='"+obj[i]["hora3"]+"']").css('backgroundColor', 'red');   
                                        $("button[table-data='"+obj[i]["hora3"]+"']").attr('disabled' , 'disabled');
                                        $("button[table-data='"+obj[i]["hora4"]+"']").css('backgroundColor', 'red');   
                                        $("button[table-data='"+obj[i]["hora4"]+"']").attr('disabled' , 'disabled');                                                                                
                               }
                            }
                }
            });
            $('.servicio_reserva_test').trigger('change');


        });






    },500)

    
    if(fecha_reserva == ""){
        ////console.log('se necesita una fecha');
    }else{
    
        $.ajax({
            type: "post",
            url: "custom/consultas.php?opc=validar_hora_ajax",
            data: {
                hora_reserva : hora_reserva,
                dates : fecha_reserva
            },
            success: function (error) {
    
                var pars = JSON.parse(error)
    
                $('.error-mensaje').text(pars);
            }
        });
    }
});




$('input[name="dates"]').on('hideCalendar.daterangepicker', function (ev, picker) {



    var fecha = $('.fecha-reserva').val();	
    
        //console.log(fecha);


        
    var hora_reserva = $('.hora_reserva').val();
    var fecha_reserva = $('.fecha_reserva').val();
    

    
    if(fecha_reserva == ""){
        //console.log('se necesita una fecha');
    }else{
    
        $.ajax({
            type: "post",
            url: "custom/consultas.php?opc=validar_hora_ajax",
            data: {
                hora_reserva : hora_reserva,
                dates : fecha_reserva
            },
            success: function (error) {
    
                var pars = JSON.parse(error)
    
                $('.error-mensaje').text(pars);
            }
        });
    }
});




$('input[name="dates"]').on('showCalendar.daterangepicker', function (ev, picker) {



    var fecha = $('.fecha_reserva').val();	
    //console.log(fecha);
        
   
        $.get( "horarios-disponibles.php?fecha="+fecha, function( data ) {
            $( ".horarios-response" ).html( data );		
        }); 




    var hora_reserva = $('.hora_reserva').val();
    var fecha_reserva = $('.fecha_reserva').val();
    

    
    if(fecha_reserva == ""){
        ////console.log('se necesita una fecha');
    }else{
    
        $.ajax({
            type: "post",
            url: "custom/consultas.php?opc=validar_hora_ajax",
            data: {
                hora_reserva : hora_reserva,
                dates : fecha_reserva
            },
            success: function (error) {
    
                var pars = JSON.parse(error)
    
                $('.error-mensaje').text(pars);
            }
        });
    }
});




    
         
    


        
 





