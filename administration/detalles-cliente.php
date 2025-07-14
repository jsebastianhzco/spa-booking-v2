<?php
require_once "config/conexion.php";
session_start();
$pagina_actual = "Client";
$id_cliente = $_GET['id_cliente'];
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
     
    

    <title>Réservations &#8211; Acupuncture | Elianne Bouchard</title>


    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link rel="icon" href="assets/images/fav.png" type="image/png">
    <link rel="manifest" href="manifest.json">

    <script src="lib/main.js"></script>

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

    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- Mi CSS-->
    <link rel="stylesheet" href="assets/css/style.css" >
    <link href='lib/main.css' rel='stylesheet' />

    <!-- DataTables-->
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <?php require_once "config/app.php"; ?>

    

</head>


    
   <?php require_once "vistas/modal.php";?>
   <body class="layout-fluid layout-sticky-subnav">
      <div class="preloader"></div>
      <!-- Header Layout -->
      <div class="mdk-header-layout js-mdk-header-layout">
         <!-- Header -->
         <?php require_once "vistas/top-header.php"; ?>
         <!-- // END Header -->
         <!-- Header Layout Content -->
         <div class="mdk-header-layout__content page">
            <?php require_once "vistas/page-header.php"; ?>
            <!-- // END page__header -->
           
           
           
  
           
           
           
           
            <div class="row" >
               <div class="container page__container">
                  
                
                <?php  include "includes/menu.php"   ?>
                
     



            <div class="row" style="padding:25px;">
            
            <div class="col-md-5">

            <form action="">
                <div class="form-group">
                <label>Non</label><input type="text" class="form-control input-nombre" value="">
                </div>


                <div class="form-group">
                <label>prenon</label><input type="text" class="form-control input-apellido" value="">
                </div>

                <div class="form-group">
                <label>Courriel</label><input type="text" class="form-control input-email" value="">
                </div>


                <div class="form-group">
                <label>Tèlèphone</label><input type="text" class="form-control input-tel" value="">
                </div>


                
                <div class="form-group" style="display:flex;justify-content: space-around;">
                    <input type="button" class="btn btn-success editar-cliente" value="METTRE À JOUR">
                    <input type="button" class="btn btn-primary limpiar-form" value="DÉGAGER">
                </div>
            </form>
            
            
            </div>


            <div class="col-md-5">
            
            <ul class="list-group text-center">

            <input type="hidden" class="list-group-item id_cliente" value="<?php echo $id_cliente; ?>">
                <li class="list-group-item nombre-completo-cliente" style="text-transform:capitalize;"><span class="nombre"></span>  <span class="apellido"></span></li>
                <li class="list-group-item email-cliente"></li>
                <li class="list-group-item tel-cliente"></li>
                
            </ul>
 



            
            </div>

            
            
     
            </div>    
        
       
           





           

                  <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Heure</th>
                        </tr>
                    </thead>
                    <tbody>


<?php





$statement=$conect->prepare("SELECT ser.nombre_servicio , re.id_cliente , re.title, re.hora , re.fecha, cli.nombre_cliente, cli.apellido_cliente FROM reservas AS re INNER JOIN clientes AS cli ON re.id_cliente = cli.id_cliente INNER JOIN servicios as ser ON ser.id_servicio = re.title WHERE re.id_cliente = :id_cliente");
$statement->bindParam(":id_cliente", $id_cliente);
$statement->execute(); 
$statement->setFetchMode(PDO::FETCH_ASSOC);
while ($data=$statement->fetch(PDO::FETCH_ORI_NEXT)) { ?>
   


                        <tr>

                        
                        <td><?php echo $data['nombre_cliente'] ." " .$data['apellido_cliente']; ?></td>
                        <td><?php echo $data['nombre_servicio']; ?></td>
                        <td><?php echo $data['fecha']; ?></td>
                        <td><?php echo $data['hora']; ?></td>
                        


                        </tr>



   <?php } ?>








                    </tbody>

                </table>



               </div>
            </div>
         </div>
         <!-- // END header-layout__content -->
      </div>
      <!-- // END header-layout -->
      <!-- App Settings FAB -->
      <?php require_once "includes/side-menu.php" ?>
      <!-- jQuery -->
      <script src="assets/vendor/jquery.min.js"></script>
      <script src="assets/js/daterangepicker.js"></script>
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
      <!-- Flatpickr -->
      <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
      <script src="assets/js/flatpickr.js"></script>
      <!-- Global Settings -->
      <script src="assets/js/settings.js"></script>
      <!-- Chart.js -->
      <script src="assets/vendor/Chart.min.js"></script>
      <!-- App Charts JS -->
      <script src="assets/js/chartjs-rounded-bar.js"></script>
      <script src="assets/js/charts.js"></script>
      <!-- Chart Samples -->
      <script src="assets/js/page.dashboard.js"></script>
      <!--CRUD -->
      <script src="assets/js/crud.js"></script>

      <!--VALIDAR HORARIOS -->
      <script src="assets/js/validar-horarios.js"></script>
      <!--SWEET ALERT-->                                 
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                    
      <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>


      <script>

$(function() {




function traer_data(){



    $.ajax({
        type: "POST",
        url: "includes/crud.php?opc=detalles",
        data: {
            id_cliente: $('.id_cliente').attr('value')
        },
        success: function(data) {

            var json = data;
            var obj = JSON.parse(json);


            $('.nombre').text(obj.nombre_cliente);
            $('.apellido').text(obj.apellido_cliente);
            $('.email-cliente').text(obj.email_cliente);
            $('.tel-cliente').text(obj.tel_cliente);




            $('.input-nombre').val(obj.nombre_cliente);
            $('.input-apellido').val(obj.apellido_cliente);
            $('.input-email').val(obj.email_cliente);
            $('.input-tel').val(obj.tel_cliente);






            console.log(obj);
        }
    });
}

traer_data();
    
    $('.editar-cliente').click(function(e) {
                e.preventDefault();
                var datos = {
                    nombre_cliente: $('.input-nombre').val(),
                    apellido_cliente: $('.input-apellido').val(),
                    email_cliente: $('.input-email').val(),
                    tel_cliente: $('.input-tel').val()

                }

                console.log(datos);


                if (datos.nombre_cliente == "" || datos.apellido_cliente == "" || datos.email_cliente == "" || datos.tel_cliente == "") {
                    alert('required');
                } else {
                    $.ajax({
                        type: "post",
                        url: "includes/crud.php?opc=actualizar-cliente",
                        data: {
                            id_cliente: $('.id_cliente').attr('value'),
                            nombre_cliente : datos.nombre_cliente,
                            apellido_cliente : datos.apellido_cliente,
                            email_cliente : datos.email_cliente,
                            tel_cliente : datos.tel_cliente
                        },
                        success: function(response) {
                            traer_data();
                        }
                    });
                }


            });



    $('.limpiar-form').click(function(e) {
        e.preventDefault();
        $('.input-nombre').val("");
        $('.input-apellido').val("");
        $('.input-email').val("");
        $('.input-tel').val("");

    });




    $('#example').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        }, {

            "processing": true,
            "serverSide": true,
            "ajax": "includes/clientes-ajax.php.php"
        }

    );
});

</script>
      

      


      <!-- Vector Maps -->
      <!-- <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
         <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
         <script src="assets/js/vector-maps.js"></script> -->
   </body>
</html>