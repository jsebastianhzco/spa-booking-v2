<?php

require_once "../administration/config/conexion.php";

$opc = $_GET['opc'] ?? null;

switch ($opc) {
    case "check_email":
    case "check_nombre":
    case "check_apellido":
    case "check_telefono":
    case "check_id":
        $email_cliente = $_POST['email_cliente'] ?? '';
        $stmt = $conect->prepare("SELECT * FROM clientes WHERE email_cliente = :email");
        $stmt->bindParam(':email', $email_cliente);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($opc === "check_email") {
            echo json_encode($data ? $data['email_cliente'] : 1);
        } elseif ($data) {
            $campo = match ($opc) {
                "check_nombre"   => 'nombre_cliente',
                "check_apellido" => 'apellido_cliente',
                "check_telefono" => 'tel_cliente',
                "check_id"       => 'id_cliente',
            };
            echo json_encode($data[$campo]);
        } else {
            echo json_encode(null);
        }
        break;

    case "get_holidays":
        $stmt = $conect->query("SELECT fecha FROM parametros");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case "get_exceptions":
        $stmt = $conect->query("SELECT fecha FROM excepciones");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case "validar_hora_ajax2":
        $fecha = $_POST['fecha'] ?? '';
        $stmt = $conect->prepare("SELECT hora, hora2, hora3, hora4, hora5, id_reserva FROM reservas WHERE fecha = :fecha");
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode($stmt->fetchAll());
        break;

    case "validar_hora_ajax":
        $hora = $_POST['hora_reserva'] ?? '';
        $fecha = $_POST['dates'] ?? '';
        $start = "{$fecha}T{$hora}";
        $stmt = $conect->prepare("SELECT * FROM reservas WHERE start = :start");
        $stmt->bindParam(":start", $start);
        $stmt->execute();
        $disponible = $stmt->rowCount() === 0;

        echo json_encode(
            $disponible 
            ? "L'heure sélectionnée est disponible." 
            : "L'heure sélectionnée n'est pas disponible, veuillez réessayer une autre fois."
        );
        break;

    case "validarDateForm":
        $fecha = $_POST['fecha_consulta'] ?? '';
        $stmt = $conect->prepare("SELECT hora, id_reserva FROM reservas WHERE fecha = :fecha");
        $stmt->bindParam(":fecha", $fecha);
        $stmt->execute();
        echo json_encode($stmt->fetchAll());
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Requête invalide.']);
        break;
}
