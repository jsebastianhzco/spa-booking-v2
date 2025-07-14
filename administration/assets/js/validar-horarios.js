$(function () {

    
    $('#id_servicio').change(function (e) {
     


        e.preventDefault();
        console.log($(this).val());
        var id_servicio = $(this).val();
        var hora = $('.hora_reserva').val();
        var hora2;
        var hora3;
        var hora4;
        var hora5;
        var hora6;
        var hora7;
        var hora8;


        if(id_servicio == 1){
          /*$('button.tabla').removeAttr('disabled');
          $('button.tabla').css('backgroundColor' , '#28a745');
          */
          
            switch (hora) {
                case '09:00':
                    hora2 = '09:30';
                    
                  console.log('la duracion del servicio es de una hora');
                  break;
                case '09:30':
                    hora2 = '10:30';
                    
                    console.log('la duracion del servicio es de una hora');
                  break;
                case '10:00':
                    hora2 = '10:30';
                    
                    console.log('la duracion del servicio es de una hora');
                break;
                case '10:30':
                    hora2 = '11:00';
                    
                    console.log('la duracion del servicio es de una hora');
                break; 
                case '11:00':
                    hora2 = '11:30';
                    
                  console.log('la duracion del servicio es de una hora');
                  break;
                case '11:30':
                    hora2 = '12:00';
                    
                    console.log('la duracion del servicio es de una hora');
                  break;
                case '12:00':
                    hora2 = '12:30';
                    
                    console.log('la duracion del servicio es de una hora');
                break;
                case '12:30':
                    hora2 = '13:00';
                    
                    console.log('la duracion del servicio es de una hora');
                break;

                case '13:00':
                    hora2 = '13:30';
                    
                  console.log('la duracion del servicio es de una hora');
                  break;
                case '13:30':
                    hora2 = '14:00';
                    
                    console.log('la duracion del servicio es de una hora');
                  break;
                case '14:00':
                    hora2 = '14:30';
                    
                    console.log('la duracion del servicio es de una hora');
                break;
                case '14:30':
                    hora2 = '15:00';
                    
                    console.log('la duracion del servicio es de una hora');
                break; 
                case '15:00':
                    hora2 = '15:30';
                    
                  console.log('la duracion del servicio es de una hora');
                  break;
                case '15:30':
                    hora2 = '16:00';
                    
                    console.log('la duracion del servicio es de una hora');
                  break;
                case '16:00':
                    hora2 = '16:30';
                    
                    console.log('la duracion del servicio es de una hora');
                break;
                case '16:30':
                    hora2 = '17:00';
                    
                    console.log('la duracion del servicio es de una hora');
                break;  
                case '17:00':
                    hora2 = '17:30';
                    
                    console.log('la duracion del servicio es de una hora');
                  break;
                case '17:30':
                    hora2 = '18:00';
                    
                    console.log('la duracion del servicio es de una hora');
                break;
                case '18:00':
                    hora2 = '18:30';
                    
                    console.log('la duracion del servicio es de una hora');
                break; 
                default:
                  console.log('nada');
              }



        }

        else if(id_servicio == 2){
          /*$('button.tabla').removeAttr('disabled');
          $('button.tabla').css('backgroundColor' , '#28a745');
          */
          
            switch (hora) {
                case '09:00':
                    hora2 = '09:30';
                    hora3 = '10:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '09:30':
                    hora2 = '10:00';
                    hora3 = '10:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '10:00':
                    hora2 = '10:30';
                    hora3 = '11:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;


                  case '10:30':
                    hora2 = '11:00';
                    hora3 = '11:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '11:00':
                    hora2 = '11:30';
                    hora3 = '12:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '11:30':
                    hora2 = '12:00';
                    hora3 = '12:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '12:00':
                    hora2 = '12:30';
                    hora3 = '13:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break; 
                  
                  case '12:30':
                    hora2 = '13:00';
                    hora3 = '13:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;
                  
                  case '13:00':
                    hora2 = '13:30';
                    hora3 = '14:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;


                  case '13:30':
                    hora2 = '14:00';
                    hora3 = '14:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '14:00':
                    hora2 = '14:30';
                    hora3 = '15:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '14:30':
                    hora2 = '15:00';
                    hora3 = '15:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '15:00':
                    hora2 = '15:30';
                    hora3 = '16:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '15:30':
                    hora2 = '16:00';
                    hora3 = '16:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;


                  case '16:00':
                    hora2 = '16:30';
                    hora3 = '17:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;



                  case '16:30':
                    hora2 = '17:00';
                    hora3 = '17:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;


                  case '17:00':
                    hora2 = '17:30';
                    hora3 = '18:00';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  case '17:30':
                    hora2 = '18:00';
                    hora3 = '18:30';
                    
                  console.log('la duracion del servicio es de una hora y media');
                  break;

                  default:
                  console.log('nada');
              }
        }


        else if(id_servicio == 3){
          /*$('button.tabla').removeAttr('disabled');
          $('button.tabla').css('backgroundColor' , '#28a745');
          */
          
            switch(hora){
                case  '09:00' :
                    hora2 = '09:30';
                    hora3 = '10:00';
                    hora4 = '10:30';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;
                case  '09:30' :
                    hora2 = '10:00';
                    hora3 = '10:30';
                    hora4 = '11:00';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;
                case  '10:00' :
                    hora2 = '10:30';
                    hora3 = '11:00';
                    hora4 = '11:30';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;
                case  '10:30' :
                    hora2 = '11:00';
                    hora3 = '11:30';
                    hora4 = '12:00';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '11:00' :
                    hora2 = '11:30';
                    hora3 = '12:00';
                    hora4 = '12:30';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '11:30' :
                    hora2 = '12:00';
                    hora3 = '12:30';
                    hora4 = '13:00';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '12:00' :
                    hora2 = '12:30';
                    hora3 = '13:00';
                    hora4 = '13:30';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '12:30' :
                    hora2 = '13:00';
                    hora3 = '13:30';
                    hora4 = '14:00';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '13:00' :
                    hora2 = '13:30';
                    hora3 = '14:00';
                    hora4 = '14:30';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '13:30' :
                    hora2 = '14:00';
                    hora3 = '14:30';
                    hora4 = '15:00';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;

                case  '14:00' :
                    hora2 = '14:30';
                    hora3 = '15:00';
                    hora4 = '15:30';
                    
                  console.log('la duracion del servicio es de dos horas');
                break;


                case  '14:30' :
                  hora2 = '15:00';
                  hora3 = '15:30';
                  hora4 = '16:00';
                  
                  console.log('la duracion del servicio es de dos horas');
                break;


                case  '15:00' :
                  hora2 = '15:30';
                  hora3 = '16:00';
                  hora4 = '16:30';
                  
                  console.log('la duracion del servicio es de dos horas');
                break;


                case  '15:30' :
                  hora2 = '16:00';
                  hora3 = '16:30';
                  hora4 = '17:00';
                  
                  console.log('la duracion del servicio es de dos horas');
                break;



                case  '16:00' :
                  hora2 = '16:30';
                  hora3 = '17:00';
                  hora4 = '17:30';
                  
                  console.log('la duracion del servicio es de dos horas');
                break;



                case  '16:30' :
                  hora2 = '17:00';
                  hora3 = '17:30';
                  hora4 = '18:00';
                  
                  console.log('la duracion del servicio es de dos horas');
                break;

                default:
                console.log('nada');


              }
        }





        console.log(hora + hora2 + hora3);

        $('.hora1').val(hora);
        $('.hora2').val(hora2);
        $('.hora3').val(hora3);
        $('.hora4').val(hora4);
        $('.hora5').val(hora5);
        $('.hora6').val(hora6);
        $('.hora7').val(hora7)
        $('.hora8').val(hora8);
        






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

                            console.log('estan disponibles todas las plazas');
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
        $('#id_servicio').trigger('change');


    });

});