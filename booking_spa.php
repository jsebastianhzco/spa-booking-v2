<?php require_once "administration/config/conexion.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Réservations | Acupuncture | Elianne Bouchard">
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
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "/"
    }
    </script>
</head>
<body onLoad="setTimeout('delayedRedirect()', 5000)" style="background-color:#fff;">
<?php
try {
    $stmtLastId = $conect->query("SELECT id_reserva FROM reservas ORDER BY id_reserva DESC LIMIT 1");
    $nextId = ($stmtLastId->fetchColumn() ?? 0) + 1;
    $url = "detalles-reserva.php?id_reserva=" . $nextId;

    $fecha = $_POST["dates"] ?? '';
    $hora1 = $_POST["hora_reserva"] ?? '';
    $horas = [
        $hora1,
        $_POST["hora2"] ?? '',
        $_POST["hora3"] ?? '',
        $_POST["hora4"] ?? ''
    ];

    $hora_fin = '';
    foreach (array_reverse($horas) as $h) {
        if (!empty($h)) {
            $hora_fin = $h;
            break;
        }
    }

    $start = "$fechaT$hora1";
    $end = "$fechaT$hora_fin";
    $title = $_POST["servicio_reserva"] ?? '';
    $id_cliente = $_POST["id_cliente"] ?? '';
    $bg_color = $_POST["color-bg"] ?? '';
    $estado = "attente de confirmation";
    $id_staff = 1;

    $stmtCheck = $conect->prepare("SELECT COUNT(*) FROM reservas WHERE start = :start");
    $stmtCheck->bindParam(":start", $start);
    $stmtCheck->execute();

    if ($stmtCheck->fetchColumn() > 0) {
        echo "ERREUR : Cette plage horaire est déjà réservée.";
    } else {
        $stmtInsert = $conect->prepare("INSERT INTO reservas (
            id_cliente, backgroundColor, title, start, end, url, id_staff,
            estado_reserva, fecha, hora, hora2, hora3, hora4
        ) VALUES (
            :id_cliente, :bg, :title, :start, :end, :url, :staff,
            :estado, :fecha, :hora1, :hora2, :hora3, :hora4)");

        if ($title === "1") {
            $horas[1] = null;
        }

        $stmtInsert->execute([
            ":id_cliente" => $id_cliente,
            ":bg" => $bg_color,
            ":title" => $title,
            ":start" => $start,
            ":end" => $end,
            ":url" => $url,
            ":staff" => $id_staff,
            ":estado" => $estado,
            ":fecha" => $fecha,
            ":hora1" => $horas[0],
            ":hora2" => $horas[1],
            ":hora3" => $horas[2],
            ":hora4" => $horas[3]
        ]);

        $email = $_POST["email_cliente"] ?? '';
        $nombre = $_POST["nombre_cliente"] ?? '';
        $apellido = $_POST["apellido_cliente"] ?? '';
        $telefono = $_POST["tel_cliente"] ?? '';
        $terms = $_POST["terms"] ?? '';

        $to = "eliannebouchardac@gmail.com";
        $subject = "Demande de réservation auprès d'acupuncture";
        $headers = "From: Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";

        $message = "DÉTAILS DE LA DEMANDE\n\n";
        $message .= "Date : $fecha\nHeure : $hora1\nTraitement : $title\n";
        $message .= "Nom : $nombre\nNom de famille : $apellido\n";
        $message .= "Courriel : $email\nTéléphone : $telefono\n";
        $message .= "Conditions acceptées : $terms\n";
        $message .= "Lien : www.acupuncturevalleyfield.ca/carriere-chez-nous\n";

        mail($to, $subject, $message, $headers);

        $userSubject = "Merci";
        $userMessage = "Merci pour votre temps. Votre demande a été envoyée avec succès.\n";
        $userMessage .= "Date : $fecha\nHeure : $hora1\nTraitement : $title\n";
        mail($email, $userSubject, $userMessage, $headers);

        echo '<div id="success">
            <div class="icon icon--order-success svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                    <g fill="none" stroke="#8EC343" stroke-width="2">
                        <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                        <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                    </g>
                </svg>
            </div>
            <h4><span>Demande envoyée avec succès!</span> Merci pour votre temps.</h4>
            <small>Vous serez redirigé dans 5 secondes.</small>
        </div>';
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
</body>
</html>
