<?php
require_once "administration/config/conexion.php";

class ReservationHandler {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function createClient($data) {
        $sql = "INSERT INTO clientes (usuario_cliente, pass_cliente, nombre_cliente, apellido_cliente, email_cliente, tel_cliente)
                VALUES (:usuario_cliente, :pass_cliente, :nombre_cliente, :apellido_cliente, :email_cliente, :tel_cliente)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':usuario_cliente' => 'DEFAULT',
            ':pass_cliente' => 'DEFAULT',
            ':nombre_cliente' => $data['nombre_cliente'],
            ':apellido_cliente' => $data['apellido_cliente'],
            ':email_cliente' => $data['email_cliente'],
            ':tel_cliente' => $data['tel_cliente']
        ]);

        $stmt = $this->db->prepare("SELECT id_cliente FROM clientes WHERE email_cliente = :email_cliente");
        $stmt->execute([':email_cliente' => $data['email_cliente']]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['id_cliente'];
    }

    public function checkAvailability($startTime) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM reservas WHERE start = :start");
        $stmt->execute([':start' => $startTime]);
        return $stmt->fetchColumn() == 0;
    }

    public function createReservation($data, $clientId) {
        $fecha = $data['dates'];
        $hora = $data['hora_reserva'];
        $fecha_reserva = "$fecha" . "T" . "$hora";
        $hora_fin_reserva = $hora;  
        $fin_reserva = "$fecha" . "T" . "$hora_fin_reserva";

        $stmt = $this->db->query("SELECT id_reserva FROM reservas ORDER BY id_reserva DESC LIMIT 1");
        $lastId = $stmt->fetch(PDO::FETCH_ASSOC)['id_reserva'] ?? 0;
        $newUrl = 'detalles-reserva.php?id_reserva=' . ($lastId + 1);

        $sql = "INSERT INTO reservas 
                (id_cliente, title, id_staff, start, end, estado_reserva, url, backgroundColor, fecha, hora, hora2, hora3, hora4)
                VALUES (:id_cliente, :title, :id_staff, :start, :end, :estado_reserva, :url, :backgroundColor, :fecha, :hora, '', '', '')";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_cliente' => $clientId,
            ':title' => $data['servicio_reserva'],
            ':id_staff' => 1,
            ':start' => $fecha_reserva,
            ':end' => $fin_reserva,
            ':estado_reserva' => 'attente de confirmation',
            ':url' => $newUrl,
            ':backgroundColor' => $data['color-bg'],
            ':fecha' => $fecha,
            ':hora' => $hora
        ]);
    }

    public function sendNotificationEmails($data) {
        $adminEmail = "jaime@komercos.com";
        $subject = "Demande de réservation auprès d'acupuncture";
        $headers = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";
        $message = "DETAILS\n" .
                   "\nPreferred date: {$data['dates']}" .
                   "\nPreferred time: {$data['hora_reserva']}" .
                   "\nTreatments: {$data['servicio_reserva']}" .
                   "\nNom: {$data['nombre_cliente']}" .
                   "\nNom de famille: {$data['apellido_cliente']}" .
                   "\nCourriel: {$data['email_cliente']}" .
                   "\nTéléphone: {$data['tel_cliente']}" .
                   "\nTermes acceptés: {$data['terms']}" .
                   "\nLien: https://www.acupuncturevalleyfield.ca/dossier-client.html";

        mail($adminEmail, $subject, $message, $headers);

        $userMessage = "Merci pour votre temps. Votre demande a été envoyée avec succès.\n" .
                       "\nPreferred date: {$data['dates']}" .
                       "\nPreferred time: {$data['hora_reserva']}" .
                       "\nTreatments: {$data['servicio_reserva']}";

        mail($data['email_cliente'], "Merci", $userMessage, $headers);
    }
}

// --- EJECUCIÓN PRINCIPAL ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $handler = new ReservationHandler($conect);

    $clientId = $handler->createClient($_POST);

    $startDate = $_POST['dates'] . 'T' . $_POST['hora_reserva'];

    if (!$handler->checkAvailability($startDate)) {
        echo "Erreur : L'heure choisie n'est pas disponible.";
        exit;
    }

    $handler->createReservation($_POST, $clientId);
    $handler->sendNotificationEmails($_POST);

    echo <<<HTML
    <div id="success">
        <div class="icon icon--order-success svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                <g fill="none" stroke="#8EC343" stroke-width="2">
                    <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                    <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                </g>
            </svg>
        </div>
        <h4><span>Demande envoyée avec succès!</span>Thank you for your time</h4>
        <small>Vous serez redirigé dans 5 secondes.</small>
        <small>Veuillez remplir le formulaire suivant pour finaliser votre demande. Merci!</small>
    </div>
    <script>setTimeout(() => window.location.href = "https://www.acupuncturevalleyfield.ca/dossier-client.html", 5000);</script>
HTML;
}
?>
