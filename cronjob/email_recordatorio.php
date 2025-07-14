<?php

date_default_timezone_set('America/Toronto'); // Asegúrate de usar tu zona horaria

$fecha_actual = date('Y-m-d');
$fecha_objetivo = date("Y-m-d", strtotime($fecha_actual . "+1 days"));

try {
    $conect = new PDO("mysql:host=localhost;dbname=****", "****", "****", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    exit;
}

$sql = "
SELECT 
    re.hora, 
    re.fecha, 
    ser.nombre_servicio, 
    cli.email_cliente, 
    cli.nombre_cliente, 
    cli.apellido_cliente
FROM reservas re
INNER JOIN servicios ser ON ser.id_servicio = re.title 
INNER JOIN clientes cli ON cli.id_cliente = re.id_cliente 
WHERE re.fecha = :fecha
";

$stmt = $conect->prepare($sql);
$stmt->bindParam(':fecha', $fecha_objetivo);
$stmt->execute();

$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($reservas as $data) {
    $to = $data['email_cliente'];
    $subject = "=?UTF-8?B?" . base64_encode("Demande de Reservation Acupuncture") . "?=";
    $headers = 'From: Elianne Bouchard <eliannebouchardac@gmail.com>' . "\r\n" .
               'Reply-To: eliannebouchardac@gmail.com' . "\r\n" .
               'Content-Type: text/plain; charset=UTF-8';

    $message = "Détails de votre réservation:\n\n";
    $message .= "Nom: {$data['nombre_cliente']} {$data['apellido_cliente']}\n";
    $message .= "Date du rendez-vous: {$data['fecha']}\n";
    $message .= "Heure: {$data['hora']}\n";
    $message .= "Service: {$data['nombre_servicio']}\n";
    $message .= "Merci pour votre temps.\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado a {$to}\n";
    } else {
        echo "Error al enviar a {$to}\n";
    }
}
?>
