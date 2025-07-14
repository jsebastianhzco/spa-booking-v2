<?php
// Config globals
const REQUIRED = "required";
const SITE_AUTHOR = "fait avec ❤️ par Vista Web";
const SITE_TITLE = "Acupuncture | Elianne Bouchard";
$current_year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Réservations - Acupuncture | Elianne Bouchard">
    <meta name="author" content="<?php echo SITE_AUTHOR; ?>">
    <title>Réservations &#8211; <?php echo SITE_TITLE; ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- Fonts and CSS -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">
    <link href="custom/mycss.css" rel="stylesheet">

    <script src="js/modernizr.js"></script>
</head>

<body>
    <div id="preloader"><div data-loader="circle-side"></div></div>
    <div id="loader_form"><div data-loader="circle-side-2"></div></div>

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

    <div class="container-fluid full-height">
        <div class="row row-height">
            <div class="col-lg-6 content-left">
                <div class="content-left-wrapper bg_spa">
                    <div class="wrapper">
                        <a href="/" id="logo" class="d-none"><img src="img/icons_select/body.svg"/></a>
                        <div id="social">
                            <ul>
                                <li><a href="https://m.facebook.com/AcupunctureElianneBouchard/?locale2=fr_CA" target="_blank"><i class="social_facebook"></i></a></li>
                                <li><a href="mailto:bouchard.elianne@gmail.com"><i class="icon_mail"></i></a></li>
                            </ul>
                        </div>
                        <div class="left_title">
                            <h3>Réservez un rendez-vous</h3>
                            <p>Vous êtes à quelques étapes de réserver votre traitement</p>
                            <div class="form-group">
                                <a href="https://www.acupuncturevalleyfield.ca"><input type="button" value="Retour au site" class="btn btn-success"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 content-right">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>

                    <h6 style="text-align: center;">Pour les nouveaux clients, veuillez prendre note qu'un frais de 25$ sera ajouté à votre première facture.</h6>

                    <form id="wrapped" method="POST">
                        <input id="website" name="website" type="text" value="">
                        <div id="middle-wizard">
                            <div class="step">
                                <h3 class="main_question"><strong>1/2</strong>Veuillez remplir vos coordonnées</h3>
                                <div class="form-group">
                                    <input type="email" name="email_cliente" class="form-control required email" placeholder="Email">
                                    <i class="icon-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_cliente" class="form-control user_id">
                                </div>
                                <div class="form-group">
                                    <input type="button" value="Vérifier votre Email" class="btn btn-success check-email">
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
                                    <input type="text" name="tel_cliente" class="form-control telefono" readonly placeholder="Téléphone">
                                    <i class="icon-phone"></i>
                                </div>
                            </div>

                            <div class="submit step">
                                <h3 class="main_question"><strong>2/2</strong>Réserver un traitement</h3>
                                <div class="form-group">
                                    <select class="form-control required servicio_reserva_test" name="servicio_reserva">
                                        <option value="">Choisissez votre traitement</option>
                                        <option value="1">Acupuncture 75$ (25$ Frais d'ouverture de dossier)</option>
                                        <option value="2">Rajeunissement Facial 120$ (25$ Frais d'ouverture de dossier)</option>
                                        <option value="3">Maladie des yeux DMLA  100$ (25$ Frais d'ouverture de dossier)</option>
                                    </select>
                                    <input type="hidden" class="color-bg" name="color-bg">
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" type="text" name="dates" class="form-control required fecha_reserva" placeholder="Date de préférence" readonly>
                                    <i class="icon-hotel-calendar_3"></i>
                                </div>
                                <div class="form-group">
                                    <input class="form-control wide time required hora_reserva" name="hora_reserva" placeholder="Heure préférée" readonly>
                                    <div class="horarios-response mt-3"></div>
                                </div>

                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <input type="hidden" name="hora<?= $i ?>" class="hora<?= $i ?>">
                                <?php endfor; ?>

                                <div class="form-group terms">
                                    <label class="container_check">
                                        Veuillez accepter nos <a href="#" data-toggle="modal" data-target="#terms-txt">termes et conditions</a>
                                        <input type="checkbox" name="terms" value="Yes" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="bottom-wizard">
                            <div class="form-group">
                                <button type="button" name="backward" class="backward">Précédent</button>
                                <button type="button" name="forward" class="forward">Suivant</button>
                                <button type="submit" name="process" class="submit">Envoyer</button>
                            </div>
                        </div>
                    </form>

                    <a class="quickbutton-login" href="">
                        <button style="width:100%;" type="button" class="submit get-email">modifier / annuler la réservation</button>
                    </a>

                    <div class="footer">
                        <em><?php echo $current_year; ?><br>Travaux réalisés par <a href="https://www.vistaweb.ca" target="_blank">Vista Web</a></em>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal terms -->
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termsLabel">Termes et Conditions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>1- Les clients sont responsables de leurs RDV et les cancellations sont sans frais 24 heures avant le RDV</li>
                        <li>2- Consignes COVID</li>
                        <li>3- Paiement accepté: Virement interac avec le cellulaire ou comptant</li>
                        <li>4- Les clients peuvent modifier ou canceller leurs RDV eux-mêmes jusqu'à 24 heures d'avance.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
    <script src="js/velocity.min.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/booking_spa_func.js"></script>
    <script src="js/app.js"></script>
    <script src="js/validar-hora.js"></script>
    <script src="js/validaciones_duracion_servicios.js"></script>
    <script src="customjs.js"></script>
</body>
</html>
