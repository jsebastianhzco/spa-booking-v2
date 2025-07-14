<?php
require_once "config/conexion.php";
session_start();
$pagina_actual = "Tableau de bord";
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">


<head>

   <?php
/*

   if (empty($_SESSION['email'])) {

   ?>
      <script>
         window.location.href = "login.php";
      </script>
   <?php } */ ?>


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
   <link rel="stylesheet" href="assets/css/style.css">
   <link href='lib/main.css' rel='stylesheet' />



   <?php require_once "config/app.php"; ?>



</head>



<?php require_once "vistas/modal.php"; ?>

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
         <div class="row">
            <div class="container page__container">
               <?php include "includes/menu.php"; ?>
               <div class="row">
                  <div style="background-color:red;padding:25px;color:white;text-align: center;font-weight: bold;text-transform: uppercase;" class="col-xs-3">Acupuncture</div>
                  <div style="background-color:aqua;padding:25px;color:white;text-align: center;font-weight: bold;text-transform: uppercase;" class="col-xs-3">Rajeunissement facial</div>
                  <div style="background-color:darkorange;padding:25px;color:white;text-align: center;font-weight: bold;text-transform: uppercase;" class="col-xs-3">Maladie des yeux DMLA</div>
                  <div style="background-color:green;padding:25px;color:white;text-align: center;font-weight: bold;text-transform: uppercase;" class="col-xs-3">Suivi</div>

               </div>

               <div style="padding:2%;">
                  <iframe id="contenedor-agenda" src="calendar.php?view=timeGridDay" style="width:98%;height:1200px;" frameborder="0"></iframe>
               </div>
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


   <script>
      $(function() {


         $('.fecha_reserva').flatpickr({
            minDate: "today"
         });


         $('#holiday').flatpickr({
            minDate: "today"
         });

         $('#no-holiday').flatpickr({
            minDate: "today"
         });

         $('#contenedor-agenda').attr('src', 'calendar.php?view=dayGridWeek');

      });
   </script>





   <!-- Vector Maps -->
   <!-- <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
         <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
         <script src="assets/js/vector-maps.js"></script> -->
</body>

</html>