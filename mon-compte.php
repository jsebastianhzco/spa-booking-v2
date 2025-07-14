<?php
// PHP al inicio del archivo
$required = "required"; // Si esto es para un atributo HTML, puedes dejarlo así.
$site_author = "fait avec ❤️ par Vista Web";
$site_title = "Acupuncture | Elianne Bouchard";
$current_year = date("Y"); // Inicializar el año actual

// Asegúrate de que 'conexion.php' esté configurado para lanzar excepciones PDO
include './administration/config/conexion.php';
// Asegúrate de que 'modal-editar.php' exista y contenga el HTML para tu modal de edición.
include 'modal-editar.php';

// Validar y sanear el id_cliente al inicio
$id_cliente = isset($_GET['id_cliente']) ? (int)$_GET['id_cliente'] : 0;

// Si el ID del cliente es inválido, redirige o maneja el error.
if ($id_cliente <= 0 && isset($_GET['id_cliente'])) { // Solo si id_cliente fue pasado pero es inválido
    header("Location: /mon-compte.php?error=invalid_id"); // Redirige a la página de login o error
    exit();
}
// Puedes agregar una redirección si no hay id_cliente y el usuario no está logueado,
// dependiendo de tu flujo de autenticación.
if (!isset($_GET['id_cliente']) || $id_cliente === 0) {
    // Si la página mon-compte.php requiere un ID de cliente para funcionar,
    // y no está presente, podrías redirigir a una página de inicio de sesión
    // o mostrar un mensaje para loguearse.
    // header("Location: /login.php"); // Ejemplo
    // exit();
}

// Configurar la zona horaria una sola vez al inicio del script para consistencia.
date_default_timezone_set('America/Toronto');
?>
<!DOCTYPE html>
<html lang="fr"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <meta name="description" content="Réservations - Acupuncture | Elianne Bouchard">
    <meta name="author" content="Vista Web">
    <title>Réservations &#8211; Acupuncture | Elianne Bouchard</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">
    <link href="custom/mycss.css" rel="stylesheet">
    <script src="js/modernizr.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><nav>
        <ul class="cd-primary-nav">
            <li><a href="https://www.acupuncturevalleyfield.ca/" class="animated_link">Accueil</a></li>
            <li><a href="https://www.acupuncturevalleyfield.ca/pourquoi-lacupuncture.html/" class="animated_link">Pourquoi l’acupuncture</a></li>
            <li><a href="https://www.acupuncturevalleyfield.ca/services.html/" class="animated_link">Services | 提供的服務</a></li>
            <li><a href="https://www.acupuncturevalleyfield.ca/technique-specifique.html/" class="animated_link">Technique Spécifique</a></li>
            <li><a href="https://www.acupuncturevalleyfield.ca/videos-explicatifs.html/" class="animated_link">Vidéos explicatifs</a></li>
            <li><a href="mon-compte.php" class="animated_link">Mon Compte</a></li>
        </ul>
    </nav>

    <div class="container-fluid" style="height:100vh;">
        <div class="row ">
            <div class="col-lg-4 content-left" style="height:50vh;">
                <div class="content-left-wrapper bg_spa">
                    <div class="wrapper">
                        <a href="/" id="logo"><img src="img/icons_select/body.svg" alt="Logo Acupuncture Elianne Bouchard"/></a> <div id="social">
                            <ul>
                                <li><a href="https://m.facebook.com/AcupunctureElianneBouchard/?locale2=fr_CA" target="_blank" aria-label="Facebook"><i class="social_facebook"></i></a></li> <li><a href="mailto:bouchard.elianne@gmail.com" aria-label="Correo electrónico"><i class="icon_mail"></i></a></li>
                            </ul>
                        </div>
                        <div class="container-fluid">
                            <form action="#" method="POST"> <div class="form-group">
                                    <input type="email" name="email_cliente" class="form-control required email_cliente" placeholder="Email" autocomplete="username"> <i class="icon-envelope"></i>
                                </div>
                                <div class="form-group" style="display:none;">
                                    <input disabled type="password" name="pass_cliente" class="form-control required pass_cliente" placeholder="Mot de passe" autocomplete="current-password"> <i class="icon-user"></i>
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
                </div>
            <div class="col-lg-8 content-right">
                <div class="container-fluid">
                    <?php if ($id_cliente > 0) { // Usar el $id_cliente saneado ?>
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
                                try {
                                    $hoy = new DateTime(); // Objeto DateTime actual
                                    $vista = $conect->prepare("SELECT re.id_reserva, re.fecha, re.id_cliente, re.hora, re.title, ser.nombre_servicio
                                        FROM reservas AS re
                                        INNER JOIN servicios AS ser ON ser.id_servicio = re.title
                                        WHERE re.id_cliente = :id_cliente AND fecha IS NOT NULL AND hora IS NOT NULL ORDER BY id_reserva DESC");
                                    $vista->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT); // Especificar tipo de parámetro
                                    $vista->execute();
                                    $reservas = $vista->fetchAll(PDO::FETCH_ASSOC); // Fetch all para manejar errores de forma más limpia

                                    if (count($reservas) > 0) {
                                        foreach ($reservas as $data) {
                                            $fecha_reserva_obj = new DateTime($data['fecha']);
                                            $es_pasado = $hoy > $fecha_reserva_obj; // Comparar objetos DateTime
                                ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['nombre_servicio']); ?></td>
                                                <td><?php echo htmlspecialchars($data['hora']); ?></td>
                                                <td><span data-date="<?php echo htmlspecialchars($data['fecha']); ?>"><?php echo htmlspecialchars($data['fecha']); ?></span></td>
                                                <td>
                                                    <div>
                                                        <?php if ($es_pasado) { ?>
                                                            <span> <p>Terminé</p></span>
                                                        <?php } else { ?>
                                                            <input type="button" value="Cancel" class="btn btn-danger borrar_reserva" id="<?php echo htmlspecialchars($data['id_reserva']); ?>">
                                                        <?php } ?>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <?php if (!$es_pasado) { // Solo mostrar Editar si no ha terminado ?>
                                                            <input type="button" value="Edit" class="btn btn-primary editar_reserva_cliente" id="<?php echo htmlspecialchars($data['id_reserva']); ?>" data-date="<?php echo htmlspecialchars($data['fecha']); ?>">
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        } // Fin foreach
                                    } else {
                                        echo '<tr><td colspan="4">No hay reservaciones para mostrar.</td></tr>';
                                    }
                                } catch (PDOException $e) {
                                    error_log("Error al cargar reservas del cliente " . $id_cliente . ": " . $e->getMessage());
                                    echo '<tr><td colspan="4">Error al cargar sus reservaciones. Por favor, inténtelo de nuevo.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div style="text-align: center; padding: 50px;">
                            <h2>Bienvenue!</h2>
                            <p>Veuillez entrer votre adresse courriel pour voir vos réservations.</p>
                            <p>Si vous n'avez pas encore de compte ou si vous souhaitez prendre un rendez-vous, veuillez contacter Elianne Bouchard.</p>
                        </div>
                    <?php } ?>
                </div>
                <div class="footer">
                    <em><?php echo $current_year; ?> <?php echo htmlspecialchars($site_title); ?> - <?php echo htmlspecialchars($site_author); ?></em>
                </div>
                </div>
            </div>
        </div>
    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <div class="cd-overlay-content">
        <span></span>
    </div>
    <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Entendu! Voici une version **très courte** des Termes et Conditions, en français canadien. Encore une fois, c'est un **exemple très simplifié** et je vous recommande vivement de consulter un professionnel du droit pour un document complet et conforme.

---

## Conditions d'Utilisation

En utilisant ce site web, vous acceptez nos conditions.

---

### 1. Réservations

Vous devez avoir 18 ans ou plus et fournir des informations exactes pour réserver. Votre réservation est confirmée par notification. Consultez notre politique d'annulation pour les détails sur les modifications.

---

### 2. Confidentialité

Vos données personnelles sont traitées selon notre **Politique de Confidentialité**.

---

### 3. Droits d'Auteur

Le contenu de ce site est notre propriété. Toute reproduction est interdite sans autorisation.

---

### 4. Responsabilité

Ce site est fourni tel quel. Nous ne sommes pas responsables des dommages liés à son utilisation.

---

### 5. Loi Applicable

Ces conditions sont régies par les lois du **Québec, Canada**.

---

### 6. Contact

Pour toute question, contactez-nous.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/crud.js"></script>
    <script src="js/common_scripts.min.js"></script>
    <script src="js/velocity.min.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/booking_spa_func.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/validar-hora.js"></script>
    <script src="js/validaciones_duracion_servicios.js"></script>
    <script src="js/login-cliente.js"></script>
    <script src="./administration/assets/js/crud.js"></script>
    <script>
        $(function() {
            // Inicializar DataTables si la tabla está presente
            <?php if ($id_cliente > 0) { ?>
                $('#tabla-mi-cuenta').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" // O tu idioma preferido (fr_FR.json)
                    },
                    "paging": true, // Habilitar paginación
                    "searching": true, // Habilitar búsqueda
                    "info": true // Mostrar información de paginación
                });
            <?php } ?>
        });
    </script>

</body>
</html>