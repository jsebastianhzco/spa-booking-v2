<?php

$servername = "localhost";
$fecha = date('Y-m-d');
echo "Fecha Actual" . $fecha;
$fecha_menos = date("Y-m-d", strtotime($fecha . "+ 1 days"));
echo "\n - Fecha a ejecutar " . $fecha_menos;
$db = "acupuncture_reservations";

$username = "acupuncture_wp1";
$password = "N^pD5e3LBZ#@(vUs#h)84&*1";

try {
    $conect = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    echo "Error en la línea: " . $e->getLine();
}

$statement = $conect->prepare("SELECT 
re.hora, 
re.fecha, 
ser.nombre_servicio, 
cli.email_cliente, 
cli.nombre_cliente, 
cli.apellido_cliente,
ser.nombre_servicio as nombre_servicio_reserva
FROM 
reservas as re 
INNER JOIN servicios as ser ON ser.id_servicio = re.title 
INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente 
WHERE 
fecha = :fecha_menos");

$statement->bindParam(':fecha_menos', $fecha_menos);

$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);

while ($data = $statement->fetch(PDO::FETCH_ORI_NEXT)) {
    if ($data['fecha'] == $fecha_menos) {
        $data['fecha'];
        $data['email_cliente'];
        $data['nombre_cliente'];
        $data['apellido_cliente'];
        $data['hora'];

        $to = $data['email_cliente'];
        $to2 = "sebastian@vistaweb.ca";

        $subject = "Demande de Reservation Acupuncture";
        // Codificar el asunto en UTF-8
        $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
        
        $headers = 'From: Elianne Bouchard' . "\r\n" .
                   'Reply-To: eliannebouchardac@gmail.com' . "\r\n" .
                   'Content-Type: text/plain; charset=UTF-8';

        $message = "détails de votre réservation\n";
        $message .= "\nNom: " . $data['nombre_cliente'] . " " . $data['apellido_cliente'];
        $message .= "\nDate de votre rendez-vous :" . $data['fecha'];
        $message .= "\nL'heure du rendez-vous : " . $data['hora'];
        $message .= "\nService : " . $data['nombre_servicio_reserva'];
        $message .= "\nMerci pour votre temps";

        $sentOk = mail($to, $subject, utf8_decode($message), $headers);

        if ($sentOk) {
            echo "\nEMAIL ENVIADO A :" . $data['email_cliente'];
        } else {
            echo "\nERROR AL ENVIAR EL CORREO A: " . $data['email_cliente'];
        }
    } else {
        $to = "johan-se97@hotmail.com";
        $subject = "Query Resume";
        $headers = "From: Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";
        $message = "détails de votre réservation\n";
        $message .= "\nQuery Resume";

        $sentOk = mail($to, $subject, utf8_decode($message), $headers);
    }
}

// Cerrar la conexión PDO para liberar recursos
$conect = null;
?>
