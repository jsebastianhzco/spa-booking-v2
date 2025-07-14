<?php

$required = "required";
$site_author ="fait avec ❤️ par Vista Web";
$site_title = "Acupuncture | Elianne Bouchard" ;
$current_year;


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
</a></li>
		</ul>
	</nav>
	<!-- /menu -->
	
	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper bg_spa">
					<div class="wrapper">
						<a STYLE ="display : none!important"    href="/" id="logo"><img src="img/icons_select/body.svg"/></a>
						<div id="social">
							<ul>
								<li><a href="https://m.facebook.com/AcupunctureElianneBouchard/?locale2=fr_CA" target="_blank" ><i class="social_facebook"></i></a></li>
								<li><a href="mailto:bouchard.elianne@gmail.com"><i class="icon_mail"></i></a></li>
								<li STYLE ="display : none!important"   ><a href="#0"><i class="social_instagram"></i></a></li>
							</ul>
						</div>
						<!-- /social -->
						<div class="left_title">
							<h3>Réservez un rendez-vous</h3>
							<p>Vous êtes à quelques étapes de réserver votre traitement</p>

																	 
							<div class="form-group">
										<a href="https://www.acupuncturevalleyfield.ca"><input type="button" value="Retour au site" class=" btn btn-success"></a>
									</div>
						</div>
						<h3 STYLE ="display : none!important">Réservez un rendez-vous</h3>
					</div>
				</div>
				<!--/content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right">
				<div id="wizard_container">
					<div id="top-wizard">
						<div id="progressbar"></div>
					</div>
					<!-- /top-wizard -->


						<h6 style="text-align: center;" >Pour les nouveaux clients, veuillez prendre note qu'un frais de 25$ sera ajouté à votre première facture.</h6>

					
						<form id="wrapped" method="POST">
						<input id="website" name="website" type="text" value="">
						<!-- Leave for security protection, read docs for details -->
						<div id="middle-wizard">
							


								<!-- step-->
								<div class="step">
									<h3 class="main_question"><strong>1/2</strong>Veuillez remplir vos coordonnées</h3>
									<div class="form-group">
										<input type="email" name="email_cliente" class="form-control required email" placeholder="Email">
										<i class="icon-envelope"></i>
									</div>
	
									<div class="form-group">
										<input type="hidden" name="id_cliente"  class="form-control  user_id" placeholder="ID USER">										
									</div>
										 
									<div class="form-group">
										<input type="button" value="Vérifier votre Email" class=" btn btn-success check-email">
									</div>


									<div class="form-group">
										<input type="text" name="nombre_cliente" class="form-control required nombre" readonly placeholder="Prénom">
										<i class="icon-user"></i>
									</div>

									<div class="form-group">
										<input type="text" name="apellido_cliente" class="form-control required apellido" readonly placeholder="Nom">
										<i class="icon-user"></i>
									</div>
									
									<div class="form-group">
										<input type="text" name="tel_cliente" class="form-control telefono" readonly placeholder="Téléphone ">
										<i class="icon-phone"></i>
									</div>
								</div>
								<!-- /step-->




								<!-- step-->
								<div class="submit step">
									<h3 class="main_question"><strong>2/2</strong>Réserver un traitement</h3>

									
			

									<div class="form-group">
										<div class="styled-select clearfix">
										<!--	
										<select class="required ddslick servicio_reserva" name="servicio_reserva">
												<option value="" data-imagesrc="img/icons_select/select_treatment.svg">Select Treatment</option>
												
												<option class="servicio-acupuncture" value="1" data-imagesrc="img/icons_select/body.svg">Acupuncture</option>
												<option class="servicio-facial" value="2" data-imagesrc="img/icons_select/facial.svg">Rajeunissement facial (25$ frais d'ouverture)</option>
												<option class="servicio-maladie" value="3" data-imagesrc="img/icons_select/body_relaxing.svg">Maladie des yeux DMLA</option>
											</select>
										-->

											<select class="required  servicio_reserva_test form-control" name="servicio_reserva">
												<option value="" >Choisissez votre traitement</option>
												
												<option class="servicio-acupuncture" value="1">Acupuncture 75$ (25$ Frais d'ouverture de dossier)</option>
												<option class="servicio-facial" value="2" >Rajeunissement Facial 120$ (25$ Frais d'ouverture de dossier)</option>
												<option class="servicio-maladie" value="3" >Maladie des yeux DMLA  100$ (25$ Frais d'ouverture de dossier)</option>

											</select>

												<input type="hidden" class="color-bg" name="color-bg">



										</div>
									 </div>


									<div class="form-group">
										<input autocomplete="off" type="text" name="dates" class="form-control required fecha_reserva" placeholder="date de préférence" readonly>
										<i class="icon-hotel-calendar_3"></i>
									</div>
	
					
									<div class="form-group">
										<div class="styled-select clearfix">
											<input class="form-control wide time required hora_reserva" name="hora_reserva" placeholder="Heure préférée" readonly value="">																			
									<table class="horarios" style="margin-top:15px;">
									<tbody>



										<div style="margin-top:30px;" class="horarios-response">
										
										
										
										
										</div>



									</tbody>
									</table>		
											<!--<small class="error-mensaje"></small>-->
										</div>
									</div>


									<input type="hidden" name="hora" class="hora1">
									<input type="hidden" name="hora2" class="hora2">
									<input type="hidden" name="hora3" class="hora3">
									<input type="hidden" name="hora4" class="hora4">
									<input type="hidden" name="hora5" class="hora5">
									<input type="hidden" name="hora6" class="hora6">

									<div class="form-group terms">
										<label class="container_check">Veuillez accepter nos <a href="#" data-toggle="modal" data-target="#terms-txt">termes et conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->
								</div>
								<!-- /middle-wizard -->
								<div id="bottom-wizard">
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<button type="button" name="backward" class="backward">Précédent</button>
															<button type="button" name="forward" class="forward">Suivant</button>
															<button  type="submit" name="process" class="submit">Envoyer</button><br>
														</div>													
													</div>												
												</div>


									

								</div>
							<!-- /bottom-wizard -->
						</form>
					
																
						<a class="quickbutton-login" href="">
						<button style="width:100%;" type="button"   class="submit get-email">modifier / annuler la réservation</button>
						</a>
			
			
			
						<div class="footer">
						<em>2023 <br> Travaux réalisés par <a href="https://www.vistaweb.ca" target="_blank">Vista Web</a></em>
					</div>
					</div>
					<!-- /Wizard container -->
				

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
					<h4 class="modal-title" id="termsLabel">Termes et Conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>

<ul>
	<li>1- Les clients sont responsables de leurs RDV et les cancellations sont sans frais 24 heures avant le RDV</li>
	<li>2- Consignes COVID</li>
	<li>3- Paiement accepté</li>
	<li>Virement interac avec le cellulaire ou comptant</li>
	<li>4- Les clients peuvent modifier ou canceller leurs RDV eux-mêmes jusqu'à 24 heures d'avance.</li>
</ul>
</p>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Fermer</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/booking_spa_func.js"></script>

	<!-- VISTA WEB -->

	<script src="js/app.js"></script>
	<script src="js/validar-hora.js"></script>
	<script src="js/validaciones_duracion_servicios.js"></script>
	<script src="customjs.js"></script>


	<script>


	/*
		setInterval(function(){
			var fecha = $('.fecha_reserva').val();	
			console.log(fecha);
			$.get( "horarios-disponibles.php?fecha="+fecha, function( data ) {
			$( ".horarios-response" ).html( data );		
			}); 
		},5000);
	*/



	</script>


</body>
</html>
