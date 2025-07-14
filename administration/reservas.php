<!DOCTYPE html>
<html lang="fr" dir="ltr">

<?php require_once "includes/head.php" ?>

<body class="layout-fluid layout-sticky-subnav">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        <?php require_once "vistas/top-header.php"; ?>


        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">






            <div class="page__header">
                <div class="container-fluid page__heading-container">
                    <div class="page__heading d-flex align-items-center">
                        <div class="flex">

                            <h1 class="m-0">Reservations</h1>
                        </div>
                        <a data-toggle="modal" data-target="#modal-create"  href="" class="btn btn-success ml-3">Create <i class="material-icons">add</i></a>
                    </div>
                </div>
            </div> <!-- // END page__header -->


            <div class="container-fluid ">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">


                            <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                                <table class="table mb-0 thead-border-top-0 table-striped" id="MyTable">
    <thead>
        <tr>



            <th  class="text-left pl-0">#ID</th>
            <th>Service</th>
            <th>Staff</th>
            <th>Cliente</th>
            <th>Heure</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Actions</th>


        </tr>
    </thead>
                                    <tbody class="list" id="companies">


                                    <?php
      $vista = $conect->prepare("SELECT * FROM reservas");
      $vista->execute();
      $vista->setFetchMode(PDO::FETCH_ASSOC);
      while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?>


     
        

  

<!--FILA DE DATOS-->
                <tr>
                    <td class="pl-0">
                        <div class="badge badge-light"> #<?php echo $data['id_reserva']; ?></div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                               
                                <?php echo $data['id_servicio']; ?>
                            </div>

                            

                        </div>

                    </td>

                    <td >
                        <div ><small><?php echo $data['id_staff']; ?></small></div>
                    </td>

                    <td >
                        <div ><small><?php echo $data['id_cliente']; ?></small></div>
                    </td>
                    <td >
                       <?php echo $data['hora_reserva']; ?>
                    </td>




                    <td >
                       <?php echo $data['fecha_reserva']; ?>
                    </td>


                    <td >
                       <?php echo $data['estado_reserva']; ?>
                    </td>



                    <td> 
                        <div class="button-list d-flex flex-wrap">
                                    <button id="<?php echo $data['id_cliente'];?>"  type="button" class="btn btn-success read_modal" data-toggle="modal" >
                                        <i class="material-icons">pageview</i>
                                    </button>
                                    <button id="<?php echo $data['id_cliente']; ?>" type="button" class="btn btn-light changes_modal" data-toggle="modal" >
                                        <i class="material-icons">edit</i>
                                    </button>
                                   
                                   <!--
                                    <button id="<?php echo $data['id_cliente']; ?>" type="button" class="btn btn-danger borrar_cliente">
                                        <i class="material-icons">delete</i>
                                    </button>

      -->
                                </div>            
                    </td>
                </tr>

<!--FINAL FILA DE DATOS-->


<?php } ?>















                                    </tbody>
                                </table>
                            </div>

                            <div class="card-body text-right">

      
       15 

      
      
      <span class="text-muted">of 1,430</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
                            </div>








                        </div>
                    </div>

                </div>
            </div>





        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->
  <?php require_once "vistas/modal.php";  ?>
  <?php require_once "includes/footer.php"; ?>

  
</body>

</html>