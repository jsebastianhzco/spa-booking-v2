<?php

require "administration/config/conexion.php";

$fecha_actual = date('Y-m-d');
$fecha_objetivo = date("Y-m-d", strtotime("$fecha_actual -1 days"));

try {
    $statement = $conect->prepare("
        SELECT 
            re.hora, 
            re.fecha, 
            ser.nombre_servicio, 
            cli.email_cliente, 
            cli.nombre_cliente, 
            cli.apellido_cliente 
        FROM reservas AS re 
        INNER JOIN servicios AS ser ON ser.id_servicio = re.title 
        INNER JOIN clientes AS cli ON cli.id_cliente = re.id_cliente 
        WHERE re.fecha = :fecha
    ");

    $statement->bindParam(':fecha', $fecha_objetivo);
    $statement->execute();
    $reservas = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (empty($reservas)) {
        echo json_encode([
            'status' => 'empty',
            'message' => 'Aucune réservation trouvée pour la date précédente.'
        ]);
        exit;
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Voici les réservations trouvées pour la date précédente :',
        'data' => $reservas
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Une erreur s’est produite lors de la récupération des données.',
        'details' => $e->getMessage()
    ]);
}
