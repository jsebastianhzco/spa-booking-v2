$(function () {


  $('.holidays-modal').click(function (e) { 
    e.preventDefault();
  
    $("#holidays-modal").modal("show");
  
  });


  $('.no-holidays-modal').click(function (e) { 
    e.preventDefault();
  
    $("#no-holidays-modal").modal("show");
  
  });





$('.create_holiday').click(function (e) { 
  e.preventDefault();
  
  var date_holiday = $('.holiday_input').val();

  if(date_holiday == ""){

    swal("ERROR", "REQUIRED", "error");

  }else{

    $.ajax({
      type: "POST",
      url: "includes/crud.php?opc=add_holiday",
      data: {
        fecha : date_holiday
      },
      success: function () {
        $('.holiday_input').val("");
        alert("SUCESS");
      }
    });




  }


});







$('.create_no_holiday').click(function (e) { 
  
  e.preventDefault();
  
  var date_no_holiday = $('.no_holiday_input').val();

  if(date_no_holiday == ""){

    swal("ERROR", "REQUIRED", "error");

  }else{

    $.ajax({
      type: "POST",
      url: "includes/crud.php?opc=add_no_holiday",
      data: {
        fecha : date_no_holiday
      },
      success: function () {
        $('.no_holiday_input').val("");
        alert("SUCESS");
      }
    });
  }
});











$('#id_servicio').change(function (e) { 
  e.preventDefault();

    $('.bg-color').val($(this).val());
  
    if($(this).val() == "1" ){ $('.bg-color').val('red');}
    if($(this).val() == "2"){  $('.bg-color').val('aqua'); }
    if($(this).val() == "3"){  $('.bg-color').val('darkorange'); }
    if($(this).val() == "4"){  $('.bg-color').val('green'); }

  
});









  $('.add_reservation').click(function (e) { 
  e.preventDefault();

  $("#modal-add-reservation").modal("show");

});




$('.edit-reservation').click(function (e) { 
  e.preventDefault();

  $("#modal-edit-reservation").modal("show");

  var id_reserva = $('#id-reserva').attr('data-reserva');

  //console.log(id_reserva);


  $.ajax({
    type: "post",
    url: "includes/crud.php?opc=detalles-reserva",
    data: {
      id_reserva : id_reserva
    },
      success: function (data) {
        console.log(data);

        var json = data;
        var obj = JSON.parse(json);

        console.log(obj.id_reserva);
        $('.nombre-apellido').val(`${obj.nombre_cliente} ${obj.apellido_cliente}`);
        $('#nombre-reserva-update').val(obj.id_cliente);
        $('#date-reserva-update').val(obj.fecha);
        $('#hora-reserva-update').val(obj.hora);
        $('#service-reserva-update').val(obj.title);
        $(".id_update").val(obj.id_reserva);
      }
  });

});





$('.edit_reserva_btn').click(function (e) { 
  e.preventDefault();
  var data = {
   
    id_cliente : $('#nombre-reserva-update').val(),
     fecha : $('#date-reserva-update').val(),
     hora : $('#hora-reserva-update').val(),
     title : $('#service-reserva-update').val(),
     id_reserva : $(".id_update").val()
     
  }


  console.log(data.title);

  if(data.title == "1"){
    var backgroundColor = "red"
  }

  if(data.title == "2"){
    var backgroundColor = "aqua"
  }

  if(data.title == "3"){
    var backgroundColor = "darkorange"
  }

  if(data.title == "4"){
    var backgroundColor = "green"
  }

  if(data.fecha == ""){
    alert('required');
  }else{
    $.ajax({
      type: "post",
      url: "includes/crud.php?opc=actualizar_reserva",
      data: {
        id_reserva : data.id_reserva,
        id_cliente  : data.id_cliente,
        start : data.fecha+"T"+data.hora ,
        end : data.fecha+"T"+data.hora,
        fecha : data.fecha,
        hora :data.hora,
        title : data.title,
        backgroundColor : backgroundColor
      },
      
      success: function (response) {
        location.reload();
      }
    });
  }

});



$('.hora_reserva').change(function (e) { 
  e.preventDefault();
  
  var hora_reserva = $('#hora_reserva').val();
  var fecha_reserva= $('.fecha_reserva').val();

    
    if(fecha_reserva == "" || hora_reserva == ""){
      console.log('required');
  }else{

      $.ajax({
          type: "post",
          url: "includes/crud.php?opc=validar_hora_ajax",
          data: {
              hora_reserva : hora_reserva,
              dates : fecha_reserva
          },
          success: function (error) {

              var pars = JSON.parse(error)
              
              $('.error-mensaje').text(pars);
              
              switch(pars) {
                case "L'heure sélectionnée n'est pas disponible, veuillez réessayer une autre fois.":
                  $('.create_reservation').attr('disabled' , 'disabled');

                  break;
                case "L'heure sélectionnée est disponible." :
                  $('.create_reservation').removeAttr('disabled');
                  break;
                default:
                  // code block
              }
              
      

              

              
          }
      });
  }


});




$('.create_reservation').click(function (e) { 
  e.preventDefault();

  var data = {
    id_cliente : $('#id_cliente').val(),
    id_servicio : $('#id_servicio').val(),
    id_staff : $('#id_staff').val(),
    fecha_reserva_start : $('.fecha_reserva').val(),
    hora_reserva_start : $('.hora_reserva').val(),
    estado_reserva : $('#estado_reserva').val(),
    hora2 : $('.hora2').val(),
    hora3 : $('.hora3').val(),
    hora4 : $('.hora4').val(),
    email_cliente : $('.email_reservation').val(),
    nombre_completo : $("#txtbusca").val(),
    backgroundColor : $('.bg-color').val()
  }

 if(data.id_cliente == "" || data.id_servicio == ""  || data.hora_reserva_start == "" || data.fecha_reserva_start == ""){
    
    swal("ERROR", "REQUIRED", "error");

  }else{
    $.ajax({
      type: "post",
      url: "includes/crud.php?opc=agregar_reserva",
      data: {
         
        id_cliente : data.id_cliente,
        title : data.id_servicio,
        id_staff : data.id_staff,
        start : data.fecha_reserva_start+"T"+data.hora_reserva_start,
        end : data.fecha_reserva_start+"T"+data.hora_reserva_start,
        fecha : data.fecha_reserva_start , 
        hora : data.hora_reserva_start , 
        estado_reserva : data.estado_reserva,
        hora2 : data.hora2,
        hora3 : data.hora3,
        hora4 : data.hora4, 
        email_cliente : data.email_cliente,
        nombre_completo : data.nombre_completo,
        backgroundColor : data.backgroundColor
      },
      success: function () {
        //swal("Bon travail!", "Réservation créée avec succès! ", "success");


        //location.reload();

        $("#modal-add-reservation > div > div > div > div > form > div:nth-child(5) > div > input").val("")
        $('#txtbusca').val("");
        $('#id_cliente').val("");
        $('#id_servicio').val("");
        $('#id_staff').val("");
        $('#hora_reserva').val("");
        $('#fecha_reserva').val("");
        $('#estado_reserva').val("");
        $('#contenedor-agenda').attr('src', 'calendar.php?view=timeGridDay&date='+data.fecha_reserva_start);
        alert("Réservation créée avec succès!");



      }
    });
  }

});













// ABRIR MODAL NUEVO USUARIO //
 $('.modal-nuevo-usuario').click(function (e) { 
    e.preventDefault();


    $("#modal-create-user").modal("show");
    
  });
// ABRIR MODAL NUEVO USUARIO //

// CREAR NUEVO USUARIO //
 $('.create_user').click(function (e) { 
    e.preventDefault();
    
    var data = {
      nombre_cliente : $('#nombre_nuevo_cliente').val(),
      apellido_cliente : $('#apellido_nuevo_cliente').val(),
      email_cliente : $('#email_nuevo_cliente').val(),
      tel_cliente : $('#tel_nuevo_cliente').val()
    }

//console.log(data.tel_cliente);

if(data.email_cliente == ""){

  alert('REQUIRED');

}else{
      $.ajax({
      type: "post",
      url: "includes/crud.php?opc=nuevo_cliente",
      data: {
        nombre_cliente : data.nombre_cliente,
        apellido_cliente : data.apellido_cliente, 
        email_cliente : data.email_cliente,
        tel_cliente : data.tel_cliente
      },
      success: function () {
        swal("Bon travail!", "Utilisateur créé avec succès!", "success");
        clear();

        function clear(){
          
          $('#nombre_nuevo_cliente').val("");
          $('#apellido_nuevo_cliente').val("");
          $('#email_nuevo_cliente').val("");
          $('#tel_nuevo_cliente').val("");
          location.reload();
        }
      }
 
    });
}


  });
// CREAR NUEVO USUARIO //


// ABRIR MODAL DE CAMBIOS //
 $('.changes_modal').click(function () { 

  $('#modal-changes').modal("show");

    setTimeout(function () { 
      
      alert('hoola');
      $('.lista_cambios').html("");

     }, 0);
     

  
      var id = this.id;

      setTimeout(function () { 
        traer_cambios();
        
      },0);
  
      function traer_cambios () { 
          $.ajax({
          type:"POST",
          url:"includes/crud.php?opc=ver_cambios",
          data:"id_cliente="+id,
          success: function(data){
        
            var json = data;
            var obj = JSON.parse(json);
            var x = 0;

            console.log(obj);

            for (i = 0; i < obj.length; i++){
              $('.lista_cambios').append("<li>"+obj[i]['fecha_cambio']+" - "+obj[i]['descripcion_cambio']+"</li>");
              
            }      
             
          }
        })
      }/** AJAX **/


    
    
    
    });
// ABRIR MODAL DE CAMBIOS //


// AGREGAR CAMBIO //
 $('.add_change').click(() => {


        var id_cliente = $('#id_cliente_cambio').val();
        var fecha_cambio = $('#fecha_cambio').val();
        var descripcion_cambio = $('#descripcion_cambio').val();

        $.ajax({
          type: "POST",
          url: "includes/crud.php?opc=agregar_cambios",
          data: {
            id_cliente : id_cliente,
            fecha_cambio : fecha_cambio,
            descripcion_cambio : descripcion_cambio
          },
          success: function () {
            

            traer_cambios();

            function traer_cambios () { 
              $.ajax({
              type:"POST",
              url:"includes/crud.php?opc=ver_cambios",
              data:"id_cliente="+$('#id_cliente_cambio').val(),
              success: function(data){
            
                var json = data;
                var obj = JSON.parse(json);
                var x = 0;
    
                console.log(obj);
    
                for (i = 0; i < obj.length; i++){
                  $('.lista_cambios').append("<br>Date :"+obj[i]['fecha_cambio']+" - Description :"+obj[i]['descripcion_cambio']);
                  
                }      
                $('#modal-changes').modal("show"); 
              }
            })
          }














          }
        });

      });
// AGREGAR CAMBIO //



// CREAR CLIENTE //
 $('.create').click (function() {
        /*var id = Math.random(); $("#id").val().trim()*/;
        var empresa = $('#empresa_create').val().trim();
        var direccion = $('#direccion_create').val().trim();
        var correo = $('#correo_create').val().trim();
        var propietario = $('#propietario_create').val().trim();
        var website = $('#website_create').val().trim();
        var info_bancaria = $('#banco_create').val().trim();
        var fecha_firma = $('#firma_create').val().trim();
        var fecha_inicio = $('#inicio_create').val().trim();
        var fecha_fin = $('#fin_create').val().trim();
        var plan = $('#pack_create').val().trim();
        var pass_website = $('#pass_create').val().trim();



          if(empresa == ""){
          alert('faltan datos');
          }else{
                $.ajax({
                    type: "POST",
                    url: "includes/crud.php?opc=agregar",
                    data: "empresa="+empresa+"&direccion="+direccion+"&correo="+correo+"&propietario="+propietario+"&website="+website+"&info_bancaria="+info_bancaria+"&fecha_firma="+fecha_firma+
                    "&fecha_inicio="+fecha_inicio+"&inicio_create="+fecha_inicio+"&fecha_fin="+fecha_fin+"&plan="+plan+"&pass_website="+pass_website,
                    success: () => {

                      alert("good data");

                      $('#empresa_create').val("");
                      $('#direccion_create').val("");
                      $('#correo_create').val("");
                      $('#propietario_create').val("");
                      $('#website_create').val("");
                      $('#banco_create').val("");
                      $('#firma_create').val("");
                      $('#inicio_create').val("");
                      $('#fin_create').val("");
                      $('#pack_create').val("");
                      $('#pass_create').val("");
                      $('#myTable').DataTable();

                    }
                  });
                } 

        });
// CREAR CLIENTE //



// ACTUALIZAR CLIENTE //
 $('.actualizar').click (function () {

            var id_cliente = $('#id_cliente').val().trim();
            var empresa = $('#empresa').val().trim();
            var direccion = $('#direccion').val().trim();
            var correo = $('#correo').val().trim();
            var propietario = $('#propietario').val().trim();
            var website = $('#website').val().trim();
            var info_bancaria = $('#banco').val().trim();
            var fecha_firma = $('#firma').val().trim();
            var fecha_inicio = $('#inicio').val().trim();
            var fecha_fin = $('#fin').val().trim();
            var plan = $('#pack').val().trim();
            var pass_website = $('#pass').val().trim();



            if (empresa == "") {
              alert('faltan datos');
            } else {
              $.ajax({
                type: "POST",
                url: "includes/crud.php?opc=actualizar",
                data: {
                  id_cliente: id_cliente,
                  empresa: empresa,
                  direccion: direccion,
                  correo: correo,
                  propietario: propietario,
                  website: website,
                  info_bancaria: info_bancaria,
                  fecha_firma: fecha_firma,
                  fecha_inicio: fecha_inicio,
                  inicio_create: fecha_inicio,
                  fecha_fin: fecha_fin,
                  plan: plan,
                  pass_website: pass_website
                },

                success: () => {
                  

                  var id = $('#id_cliente').val();
  

                  $.ajax({
                    type:"POST",
                    url:"includes/crud.php?opc=detalles",
                    data : "id_cliente="+id,
                    dataType: "json",
                    success: function(data){
            
                    $('#id_cliente').val(data.id_cliente);
                    $('#empresa').val(data.empresa);
                    $('#direccion').val(data.direccion);
                    $('#correo').val(data.correo);
                    $('#propietario').val(data.propietario);
                    $('#website').val(data.website);
                    $('#banco').val(data.info_bancaria);
                    $('#firma').val(data.fecha_firma);
                    $('#inicio').val(data.fecha_inicio);
                    $('#fin').val(data.fecha_fin);
                    $('#pack').val(data.plan);
                    $('#pass').val(data.pass_website);
            
            
            
                    $('#modal-update').modal("show");
                    
                    }
                  })





                }
              });
            }

          });
// ACTUALIZAR CLIENTE //

// MODAL DETALLES CLIENTE //
 $('.read_modal').click(function () { 
      var id = this.id;
  

      $.ajax({
        type:"POST",
        url:"includes/crud.php?opc=detalles",
        data : "id_cliente="+id,
        dataType: "json",
        success: function(data){

        $('#id_cliente').val(data.id_cliente);
        $('#empresa').val(data.empresa);
        $('#direccion').val(data.direccion);
        $('#correo').val(data.correo);
        $('#propietario').val(data.propietario);
        $('#website').val(data.website);
        $('#banco').val(data.info_bancaria);
        $('#firma').val(data.fecha_firma);
        $('#inicio').val(data.fecha_inicio);
        $('#fin').val(data.fecha_fin);
        $('#pack').val(data.plan);
        $('#pass').val(data.pass_website);



        $('#modal-update').modal("show");
        
        }
      })
      
  });
// MODAL DETALLES CLIENTE //


// BORRAR CLIENTE //
  $('.borrar_cliente').click(function () { 
  
    var id_cliente =   $('.borrar_cliente').attr("id");   
      var conf = confirm("Seguro que quiere eliminar el registro" );
      
      if (conf==true) {
          $.ajax({
            type: "POST",
            url: "includes/crud.php?opc=borrar",
            data: {
              id_cliente : id_cliente
            },
            success: function () {
             
              location.reload();

            }
          });
      }
    });
// BORRAR CLIENTE //






// BORRAR RESERVA //
$(".delete-reservation").click(function () { 
  
  var id_reserva =   $('.delete-reservation').attr("id"); 
  var start = "NULL";
  var end = "NULL"; 
  var hora = "NULL";  
  var hora2 = "NULL";  
  var hora3= "NULL";   
  var hora4 = "NULL";
  var fecha = "NULL";  

    var conf = confirm("Vous voulez vraiment supprimer l'enregistrement" );
    
    if (conf==true) {
        $.ajax({
          type: "POST",
          url: "includes/crud.php?opc=borrar-reserva",
          data: {
            id_reserva : id_reserva,
            start : start,
            end : end,
            hora : hora,
            hora2 : hora2,
            hora3 : hora3,
            hora4 : hora4,
            fecha : fecha
          },
          success: function () {
           
            window.location.href="calendar.php?view=dayGridWeek";

          }
        });
    }
  });
// BORRAR RESERVA //












//BUSQUEDA DE CLIENTE MIENTRAS SE ESCRIBE//
$("#txtbusca").keyup(function(){





  var nombre_cliente=$(this).val();

if(nombre_cliente == ""){
  $('.salida').html("");
  $('#id_cliente').val("");


}else{
    $.ajax({
      data : {
        nombre_cliente : nombre_cliente
      },
      url:   'includes/crud.php?opc=busqueda_ajax_usuarios',
      type:  'post',
        beforeSend: function () { 
          
        },
        success:  function (data) { 

          $('.salida').html("");
          var x = JSON.parse(data);

            console.log(x);

            
            for(i = 0; i < x.length; i++){
              console.log(x[i]["nombre_cliente"]);
              $(".email_reservation").val(x[i]["email_cliente"]); 
              $('.salida').append(`<li class='list-group-item usuario-lista' email-usuario = ${x[i]['email_cliente']}  data-usuario-id = ${x[i]['id_cliente']} > ${x[i]['nombre_cliente']}  ${x[i]['apellido_cliente']}</li>`);
              
          }
 
      },
      error:function(){
           alert("error")
        }
   }, "JSON");
}


})
//BUSQUEDA DE CLIENTE MIENTRAS SE ESCRIBE//


$(document).on("click", ".usuario-lista", function(){
  
  $('.salida').html("");

  var b = $(this).attr('data-usuario-id');
  var c = $(this).text();
  var e = $(this).attr('email-usuario');

  $("#txtbusca").val(c);

  $('#id_cliente').val(b);

  $('.email_reservation').val(e);

});

//$('.tabla').attr('disabled' , 'disabled');
//MOSTRAR HORAS DISPONIBLES CUANDO SE VA CREAR UNA RESERVA//

$('#fecha_reserva').change(function (e) { 
  e.preventDefault();
  var fecha = $(this).val();


if(fecha == ""){
  alert('vacio');
}else{
  $.ajax({
    type: "post",
    url: "includes/crud.php?opc=validar_horas",
    data: {
      fecha : fecha
    },
    
    success: function (response) {

      console.log('entra al ajax 1');
      console.log(response);
      var obj = JSON.parse(response);

      
              if(obj.length == 0){

                  console.log('estan disponibles todas las plazas');
                  //$('button.tabla').removeAttr('disabled');
                  $('button.tabla').css('backgroundColor' , '#28a745');
                                  
              }else{

                  
                  
                  //$('button.tabla').removeAttr('disabled');
                  $('button.tabla').css('backgroundColor' , '#28a745'); 

                  for(var i = 0; i <= obj.length - 1; i++){
                                          
                          $("button[table-data='"+obj[i]["hora"]+"']").css('backgroundColor', 'red');   
                          //$("button[table-data='"+obj[i]["hora"]+"']").attr('disabled' , 'disabled');
                          $("button[table-data='"+obj[i]["hora2"]+"']").css('backgroundColor', 'red');   
                          //$("button[table-data='"+obj[i]["hora2"]+"']").attr('disabled' , 'disabled');
                          $("button[table-data='"+obj[i]["hora3"]+"']").css('backgroundColor', 'red');   
                          //$("button[table-data='"+obj[i]["hora3"]+"']").attr('disabled' , 'disabled');
                          $("button[table-data='"+obj[i]["hora4"]+"']").css('backgroundColor', 'red');   
                          //$("button[table-data='"+obj[i]["hora4"]+"']").attr('disabled' , 'disabled');                                 
                 }
                  }
      
    }
  });
}

});



//PONER VALOR DE TABLA EN INPUT CUANDO SE DA CLICK//

$('.tabla').click(function (e) { 
  e.preventDefault();
           
            
  

  var valTabla = $(this).attr('table-data');

  $('.hora_reserva').val(valTabla);


});







});






