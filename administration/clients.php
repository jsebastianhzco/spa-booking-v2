<?php

require_once "config/conexion.php";

session_start();

$pagina_actual = "Clients";



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

                

     









           



                  <table id="example" class="display" style="width:100%">

                    <thead>

                        <tr>

                            <th>Prenom</th>

                            <th>Nom</th>

                            <th>Courriel</th>

                            <th>Tèlèphone</th>

                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>







                        <?php





                        $statement=$conect->prepare("SELECT * FROM clientes");
                        $statement->execute(); 
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        while ($data=$statement->fetch(PDO::FETCH_ORI_NEXT)) { 

                            

                        ?>

   





                        <tr>



                            <td><?php echo $data['nombre_cliente']; ?></td>

                            <td><?php echo $data['apellido_cliente']; ?></td>

                            <td><a style="color:black;" href="mailto:<?php echo $data['email_cliente']; ?>"> <?php echo $data['email_cliente']; ?> </a></td>

                            <td><a style="color:black;" href="tel:<?php echo $data['tel_cliente']; ?>"><?php echo $data['tel_cliente']; ?></a></td>

                            <td>

                            

                            <a href="detalles-cliente.php?id_cliente=<?php echo $data['id_cliente']; ?>"><button class="btn btn-primary text-center"><i class="bi bi-eye"></i>Voir</button></a>

                            

                            </td>

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



   $(function () {

     

         

    $('#example').DataTable( {

    language: {

        processing:     "Traitement en cours...",

        search:         "Rechercher&nbsp;:",

        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",

        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",

        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",

        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",

        infoPostFix:    "",

        loadingRecords: "Chargement en cours...",

        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",

        emptyTable:     "Aucune donnée disponible dans le tableau",

        paginate: {

            first:      "Premier",

            previous:   "Pr&eacute;c&eacute;dent",

            next:       "Suivant",

            last:       "Dernier"

        },

        aria: {

            sortAscending:  ": activer pour trier la colonne par ordre croissant",

            sortDescending: ": activer pour trier la colonne par ordre décroissant"

        }

    }

} , 

{



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