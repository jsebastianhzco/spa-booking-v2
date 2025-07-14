<?php
$required = "required";
$site_author = "fait avec ❤️ par Vista Web";
$site_title = "Acupuncture | Elianne Bouchard";
$current_year = date("Y");

require_once "./administration/config/conexion.php";
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
        <div class="col-lg-8 content-right">
            <div>
                <?php
$required = "required";
$site_author = "fait avec ❤️ par Vista Web";
$site_title = "Acupuncture | Elianne Bouchard";
$current_year = date("Y");

require_once "./administration/config/conexion.php";
?>

<!-- HTML igual que ya tenías hasta la parte donde empieza el contenido dinámico -->

<div class="container-fluid full-height">
    <div class="row row-height">
        <div class="col-lg-8 content-right">
            <div>
                <?php
                if (isset($_GET["id_cliente"])) {
                    $id_cliente = intval($_GET["id_cliente"]);

                    echo '<a href="/mon-compte.php">
                            <input type="button" value="Déconnexion" class="btn btn-primary">
                          </a><br><br>';

                    $stmt = $conect->prepare("
                        SELECT 
                            re.id_reserva, 
                            re.fecha, 
                            re.hora, 
                            ser.nombre_servicio
                        FROM reservas AS re
                        INNER JOIN servicios AS ser ON ser.id_servicio = re.title
                        WHERE re.id_cliente = :id_cliente
                        ORDER BY re.fecha DESC
                    ");
                    $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
                    $stmt->execute();
                    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($reservas): ?>
                        <table class="table info-booking">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Heure</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Annuler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservas as $reserva): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($reserva["id_reserva"]) ?></td>
                                        <td><?= htmlspecialchars($reserva["fecha"]) ?></td>
                                        <td><?= htmlspecialchars($reserva["hora"]) ?></td>
                                        <td><?= htmlspecialchars($reserva["nombre_servicio"]) ?></td>
                                        <td>
                                            <input type="button" value="Annuler" class="btn btn-danger" id="<?= htmlspecialchars($reserva["id_reserva"]) ?>">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                <?php else:
                        echo "<p>Aucune réservation trouvée.</p>";
                    endif;
                } else {
                    echo "<p>Identifiant client manquant.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
<!-- /container-fluid -->
					<!-- /Wizard container -->
				
					<div class="footer">
						<em>2020 <?php echo $site_title; ?> - fait avec ❤️ par Vista Web</em>
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
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/booking_spa_func.js"></script>

	<!-- VISTA WEB -->

	<script src="js/app.js"></script>
	<script src="js/validar-hora.js"></script>
	<script src="js/validaciones_duracion_servicios.js"></script>
	<script src="js/login-cliente.js"></script>

</body>
</html>