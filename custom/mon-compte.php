<?php

require_once "../administration/config/conexion.php";

header('Content-Type: application/json; charset=utf-8');

$opc = $_GET['opc'] ?? null;

switch ($opc) {
    case 'check_email':
        $email = $_POST['email_cliente'] ?? null;

        if (!$email) exit(json_encode(['error' => 'Email requerido.']));

        $stmt = $conect->prepare("SELECT pass_cliente FROM clientes WHERE email_cliente = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($data ? $data['pass_cliente'] : null);
        break;

    case 'login':
        $email = $_POST['email_cliente'] ?? null;

        if (!$email) exit(json_encode(['error' => 'Email requerido.']));

        $stmt = $conect->prepare("SELECT id_cliente FROM clientes WHERE email_cliente = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($data ? $data['id_cliente'] : null);
        break;

    case 'borrar_reserva':
        $id = $_POST['id_reserva'] ?? null;

        if ($id) {
            $stmt = $conect->prepare("DELETE FROM reservas WHERE id_reserva = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'ID requerido']);
        }
        break;

    case 'set_pass':
        $email = $_POST['email_cliente'] ?? null;
        $pass = $_POST['pass_cliente'] ?? null;

        if (!$email || !$pass) exit(json_encode(['error' => 'Datos incompletos.']));

        $stmt = $conect->prepare("UPDATE clientes SET pass_cliente = :pass WHERE email_cliente = :email");
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo json_encode(['success' => true]);
        break;

    case 'edit_reserva_cliente_detalles':
        $id = $_POST['id_reserva'] ?? null;

        if (!$id) exit(json_encode(['error' => 'ID requerido.']));

        $stmt = $conect->prepare("SELECT * FROM reservas INNER JOIN servicios ON reservas.title = servicios.id_servicio WHERE id_reserva = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($data ?: []);
        break;

    case 'edit_reserva_cliente':
        $id = $_POST['id_reserva'] ?? null;
        $title = $_POST['title'] ?? null;
        $fecha = $_POST['fecha'] ?? null;
        $hora = $_POST['hora'] ?? null;
        $start = $_POST['start'] ?? null;
        $end = $_POST['end'] ?? null;

        if (!$id || !$title || !$fecha || !$hora || !$start || !$end) {
            exit(json_encode(['error' => 'Datos incompletos']));
        }

        $stmt = $conect->prepare("UPDATE reservas SET title = :title, hora = :hora, fecha = :fecha, start = :start, end = :end WHERE id_reserva = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':end', $end);
        $stmt->execute();

        echo json_encode(['success' => true]);
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Parámetro inválido']);
        break;
}
