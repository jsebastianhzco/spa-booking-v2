<?php
require_once "config/conexion.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tables</title>

<!-- Prevent the demo from appearing in search engines -->
<meta name="robots" content="noindex">

<!-- Perfect Scrollbar -->
<link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

<!-- App CSS -->
<link type="text/css" href="assets/css/app.css" rel="stylesheet">
<link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
<link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

<!-- Font Awesome FREE Icons -->
<link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
<link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

</head>


<body class="layout-fluid layout-sticky-subnav">





<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">

<!-- Header -->



<!-- // END Header -->

<!-- Header Layout Content -->
<div class="mdk-header-layout__content page">



<div class="container-fluid page__container">
<div class="card card-form">
<div class="row no-gutters">
    <div class="col-lg-4 card-body">
        <p><strong class="headings-color">Reserve details</strong></p>
        <ul>


        <?php

$id_reserva = $_GET['id_reserva'];

$vista = $conect->prepare("SELECT re.hora ,re.fecha ,re.start , re.title , re.end , re.url, re.estado_reserva, ser.nombre_servicio , ser.id_servicio ,cli.tel_cliente, cli.email_cliente , cli.id_cliente , cli.nombre_cliente , cli.apellido_cliente
FROM reservas as re 
INNER JOIN servicios as ser ON ser.id_servicio = re.title 
INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente where id_reserva = :id_reserva");
$vista->bindParam(':id_reserva',$id_reserva);

$vista->execute();
$vista->setFetchMode(PDO::FETCH_ASSOC);

while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) {
    $identificador_cliente = $data['id_cliente'];
?>

            <li><p>Réservation # :<span class="id_reserva_update" id="id-reserva" data-reserva="<?php echo $id_reserva; ?> "><?php echo $id_reserva; ?></span> </p></li>
            <li><p>Client # : <?php echo $data['id_cliente']; ?> </p></li>
            <li><p>Client : <?php echo $data['nombre_cliente']; ?> <?php echo $data['apellido_cliente']; ?> </p></li>
            <li>
                <p>
                    Date : <?php $data['fecha'];
                   setlocale(LC_ALL, 'fr_CA');
                   
                   echo utf8_encode(strftime("%A %e %B %Y" , strtotime($data['fecha'])));


                    
                    ?> 
                    
 
                </p>
            </li>
            <li><p>Heure : <?php echo $data['hora']; ?> </p></li>

            <li><p>Service : <?php echo $data['nombre_servicio']; ?> </p></li>
            <li><p>Courriel : <?php echo $data['email_cliente']; ?> </p></li>
            <li><p>Téléphone  : <?php echo $data['tel_cliente']; ?> </p></li>
            <li style="list-style:none;"><input id="<?php echo $id_reserva; ?>" type="button" class="btn btn-danger delete-reservation" value="Effacer"></li><br>
            <li style="list-style:none;"><input id="<?php echo $id_reserva; ?>" type="button" class="btn btn-success edit-reservation" value="Edit"></li>
            
            <a class="text-dark modal-edit-reservation" href="#" class="text-dark" data-toggle="modal" >

            
            <br>
            <?php } ?>
            <a href="./calendar.php?view=dayGridWeek"><input type="button" class="btn btn-primary" value="Retour à l'agenda"></a>
        </ul>
    </div>
    <div class="col-lg-8 card-form__body border-left">


        <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

            <table class="table mb-0 thead-border-top-0">
                <thead>
                    <tr>

 
                    

                        <th>Id</th>


                        <th >Service</th>
                        <th >Date</th>
                        <th >Heure</th>

                    </tr>
                </thead>
                <tbody class="list" id="staff">

            <?php
            
            $id_reserva = $_GET['id_reserva'];

            $vista = $conect->prepare("SELECT re.start , re.title , re.end , re.url, re.estado_reserva, ser.nombre_servicio , ser.id_servicio ,cli.tel_cliente, cli.email_cliente , cli.id_cliente , cli.nombre_cliente , cli.apellido_cliente
            FROM reservas as re 
            INNER JOIN servicios as ser ON ser.id_servicio = re.title 
            INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente where id_reserva = :id_reserva");
            $vista->bindParam(':id_reserva',$id_reserva);
            
            $vista->execute();
            $data = $vista->Fetch(PDO::FETCH_ASSOC);
            
            
            $id_cliente = $data['id_cliente'];


            $get_reservations = $conect->prepare("SELECT re.* , ser.nombre_servicio
            FROM reservas as re
            INNER JOIN servicios as ser ON ser.id_servicio = re.title
            where id_cliente = :id_cliente");
            $get_reservations->bindParam(':id_cliente',$id_cliente);
            $get_reservations->execute();
            $get_reservations->setFetchMode(PDO::FETCH_ASSOC);
            while ($data2=$get_reservations->fetch(PDO::FETCH_ORI_NEXT)) {
            ?>
                    
                    <tr class="selected">





                        <td><small class="text-muted"><?php echo $data2['id_reserva']; ?></small></td>


                        <td>

                            <div class="media align-items-center">
                                <div class="media-body">

                                    <span class="js-lists-values-employee-name"><?php echo $data2['nombre_servicio']; ?></span>

                                </div>
                            </div>

                        </td>


                        <td><span class="badge badge-warning"></span><?php $data2['fecha'];
                        echo utf8_encode(strftime("%A %e %B %Y" , strtotime($data2['fecha'])));
                        ?></td>

                        <td><span class="badge badge-warning"></span><?php echo $data2['hora']; ?></td>

                    </tr>
          
            <?php } ?>
            

                </tbody>
            </table>
        </div>


    </div>
</div>
</div>




</div>


</div>
<!-- // END header-layout__content -->

</div>
<!-- // END header-layout -->

<!-- App Settings FAB -->


<!-- jQuery -->
<script src="assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="assets/vendor/perfect-scrollbar.min.js"></script>

<!-- DOM Factory -->
<script src="assets/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="assets/vendor/material-design-kit.js"></script>

<!-- App -->
<script src="assets/js/toggle-check-all.js"></script>
<script src="assets/js/check-selected-row.js"></script>
<script src="assets/js/dropdown.js"></script>
<script src="assets/js/sidebar-mini.js"></script>
<script src="assets/js/app.js"></script>

<!-- App Settings (safe to remove) -->
<script src="assets/js/app-settings.js"></script>



<!-- List.js -->
<script src="assets/vendor/list.min.js"></script>
<script src="assets/js/list.js"></script>


<!-- VISTA WEB -->
<script src="assets/js/crud.js"></script>
      <!-- Flatpickr -->
      <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
      <script src="assets/js/flatpickr.js"></script>

<script>


$(function () {


    
        $("#txtbusca2").keyup(function(){





        var nombre_cliente = $(this).val();

        if(nombre_cliente == ""){
        $('.salida2').html("");
        $('#nombre-reserva-update').val("");


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

                $('.salida2').html("");
                var x = JSON.parse(data);

                console.log(x);

                
                for(i = 0; i < x.length; i++){
                    console.log(x[i]["nombre_cliente"]);
                    $(".email_reservation").val(x[i]["email_cliente"]); 
                    $('.salida2').append(`<li class='list-group-item usuario-lista' email-usuario = ${x[i]['email_cliente']}  data-usuario-id = ${x[i]['id_cliente']} > ${x[i]['nombre_cliente']}  ${x[i]['apellido_cliente']}</li>`);
                    
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

    $('.salida2').html("");

    var b = $(this).attr('data-usuario-id');
    var c = $(this).text();
    var e = $(this).attr('email-usuario');

    $("#txtbusca2").val(c);

    $('#nombre-reserva-update').val(b);

    $('.email_reservation').val(e);




    });

    /*
    $('.fecha_reserva_update').flatpickr({
        minDate: "today"
    });*/
});

</script>
<?php require_once "vistas/modal.php";?>
</body>

</html>