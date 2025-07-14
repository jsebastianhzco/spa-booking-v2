<?php
$required = "required";
$site_author ="fait avec ❤️ par Vista Web";
$site_title = "Acupuncture | Elianne Bouchard" ;
$current_year;
include './administration/config/conexion.php';
include 'modal-editar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


    <meta name="description" content="Réservations - Acupuncture | Elianne Bouchard">
    <meta name="author" content="Vista Web">
    <title>Réservations &#8211; Acupuncture | Elianne Bouchard</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="custom/mycss.css" rel="stylesheet">
	<!-- MODERNIZR -->
	<script src="js/modernizr.js"></script>
	<!-- DataTables-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->

	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->

	<nav>
		<ul class="cd-primary-nav">
			<li><a href="https://www.acupuncturevalleyfield.ca/" class="animated_link">Accueil</a></li>
			<li><a href="https://www.acupuncturevalleyfield.ca/pourquoi-lacupuncture.html/" class="animated_link">Pourquoi l’acupuncture</a></li>
			<li><a href="https://www.acupuncturevalleyfield.ca/services.html/" class="animated_link">Services | 提供的服務</a></li>
			<li><a href="https://www.acupuncturevalleyfield.ca/technique-specifique.html/" class="animated_link">Technique Spécifique</a></li>
			<li><a href="https://www.acupuncturevalleyfield.ca/videos-explicatifs.html/" class="animated_link">Vidéos explicatifs</a></li>
			<li><a href="mon-compte.php" class="animated_link">Mon Compte</a></li>			
		</ul>
	</nav>



	<!-- /menu -->
	<div class="container-fluid" style="height:100vh;">
		<div class="row " style="">
			<div class="col-lg-4 content-left" style="height:50vh;">
				<div class="content-left-wrapper bg_spa">
					<div class="wrapper">
						<a href="/" id="logo"><img src="img/icons_select/body.svg"/></a>
						<div id="social">
							<ul>
								<li><a href="https://m.facebook.com/AcupunctureElianneBouchard/?locale2=fr_CA" target="_blank" ><i class="social_facebook"></i></a></li>
								<li><a href="mailto:bouchard.elianne@gmail.com"><i class="icon_mail"></i></a></li>	
							</ul>
						</div>
						<!-- /social -->
						<div class="container-fluid">
                                <form action="">
									<div class="form-group">
										<input type="email" name="email_cliente" class="form-control required email_cliente" placeholder="Email">
										<i class="icon-envelope"></i>
                                    </div>                                
									<div class="form-group" style="display:none;">
										<input disabled type="pass" name="pass_cliente" class="form-control required pass_cliente" placeholder="Pass">
										<i class="icon-user"></i>
										<p class="avisos_login_cliente"></p>
                                    </div>
                                    <div id="bottom-wizard">
										<button style="display:none;" type="button" name="backward" class="forward set_pass">mot de passe</button>
										<button type="button" name="backward" class="forward check_client">Voir mes réservations</button>
										<button style="display:none;" id="login-cliente" type="button" name="forward" class="forward envoyer_login_cliente">Envoyer</button>                                   
                                    </div>
                                </form>
						</div>
					</div>
				</div>
				<!--/content-left-wrapper -->
			</div>
			<!-- /content-left -->
			<div class="col-lg-8 content-right">
				<div class="container-fluid">
					<?php
						error_reporting(0);
						$id_cliente = $_GET['id_cliente'];
						if(isset($id_cliente)){	?>
						<a href="/mon-compte.php"> <input type="button" value="Logout" class="btn btn-primary"></a>
							 <br><br>
<table id="tabla-mi-cuenta" class="table info-booking">
	<thead>
		<tr>
			<th scope="col">Service </th>
			<th scope="col">Heure </th>
			<th scope="col">Date </th>
			<th scope="col">Action </th>
		</tr>
	</thead>
	<tbody>
		<?php
			include './administration/config/conexion.php';
			$id_cliente = $_GET['id_cliente'];
			$vista = $conect->prepare("SELECT re.id_reserva ,re.fecha, re.id_cliente, re.hora , re.title , ser.nombre_servicio
			FROM reservas as re
			INNER JOIN servicios AS ser ON ser.id_servicio = re.title 
			WHERE re.id_cliente = :id_cliente AND fecha<>'NULL' AND hora<>'NULL' ORDER BY id_reserva DESC");
			$vista->bindParam(':id_cliente',$id_cliente);
			$vista->execute();
			$vista->setFetchMode(PDO::FETCH_ASSOC);
			while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) {
		?>

				
<tr>
	<td><?php echo $data['nombre_servicio']; ?></td>
	<td><?php echo $data['hora']; ?></td>
	<td><span data-date = "<?php echo $data['fecha']; ?>" ><?php echo $data['fecha']; ?></span> </td>	
	<td>
					<div><?php 	date_default_timezone_set('America/Toronto');	date('H:i');	$hoy = date('Y-m-d');	if( $hoy > $data['fecha']){ ?>
						<span> <p>Terminé</p></span>
						<?php 	}else{ 	?>
						<input  type="button" value="Cancel" class="btn btn-danger borrar_reserva" id="<?php echo $data['id_reserva']; ?>">  
					</div>
					<br>
					<div>
						<input  type="button" value="Edit" class="btn btn-primary editar_reserva_cliente" id="<?php echo $data['id_reserva']; ?>"   data-date = "<?php echo $data['fecha']; ?>">
					</div>
					<?php } ?>
	</td>
</tr>
	
			<?php } 
			}
			?>
		
	</tbody>
</table>
					</div>
					<!-- /Wizard container -->
					<div class="footer">
						<em>2024 <?php echo $site_title ?> - fait avec ❤️ par Vista Web</em>
					</div>
					<!-- Footer -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->
	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->
	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->
	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button -->
	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>


	

	<!-- /.modal -->
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/crud.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>
	<!-- Wizard script -->
	<script src="js/booking_spa_func.js"></script>
	<!-- VISTA WEB -->





	<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
	<script src="js/app.js"></script>
	<script src="js/validar-hora.js"></script>
	<script src="js/validaciones_duracion_servicios.js"></script>
	<script src="js/login-cliente.js"></script>
	<script src="./administration/assets/js/crud.js"></script>
	<script>
		$(function() {});
	</script>

</body>
</html>