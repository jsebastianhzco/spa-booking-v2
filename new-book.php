<?php
require_once "administration/config/conexion.php";

header('Content-Type: text/html; charset=utf-8');

// Función de limpieza
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Variables saneadas
$usuario_cliente = "DEFAULT";
$pass_cliente = "DEFAULT"; // Reemplazar en producción con password_hash()

$nombre_cliente = isset($_POST['nombre_cliente']) ? sanitize_input($_POST['nombre_cliente']) : '';
$apellido_cliente = isset($_POST['apellido_cliente']) ? sanitize_input($_POST['apellido_cliente']) : '';
$email_cliente = isset($_POST['email_cliente']) ? sanitize_input($_POST['email_cliente']) : '';
$tel_cliente = isset($_POST['tel_cliente']) ? sanitize_input($_POST['tel_cliente']) : '';

// Validación de campos vacíos
if (empty($nombre_cliente) || empty($apellido_cliente) || empty($email_cliente) || empty($tel_cliente)) {
    echo <<<HTML
<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Erreur</title></head>
<body style="background-color:#fff; text-align:center; padding-top:50px;">
<h1>Erreur : Informations client manquantes.</h1>
<p>Vous serez redirigé dans 5 secondes...</p>
<script>setTimeout(() => window.location.href = '/', 5000);</script>
</body></html>
HTML;
    exit;
}

// Validación de email
if (!filter_var($email_cliente, FILTER_VALIDATE_EMAIL)) {
    echo <<<HTML
<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Erreur Email</title></head>
<body style="background-color:#fff; text-align:center; padding-top:50px;">
<h1>Erreur : Adresse courriel invalide.</h1>
<p>Vous serez redirigé dans 5 secondes...</p>
<script>setTimeout(() => window.location.href = '/', 5000);</script>
</body></html>
HTML;
    exit;
}

try {
    if (!isset($conect) || !($conect instanceof PDO)) {
        throw new Exception("Connexion à la base de données non disponible.");
    }

    $sql = "INSERT INTO clientes (usuario_cliente, pass_cliente, nombre_cliente, apellido_cliente, email_cliente, tel_cliente)
            VALUES (:usuario_cliente, :pass_cliente, :nombre_cliente, :apellido_cliente, :email_cliente, :tel_cliente)";
    
    $stmt = $conect->prepare($sql);

    $stmt->bindParam(':usuario_cliente', $usuario_cliente);
    $stmt->bindParam(':pass_cliente', $pass_cliente);
    $stmt->bindParam(':nombre_cliente', $nombre_cliente);
    $stmt->bindParam(':apellido_cliente', $apellido_cliente);
    $stmt->bindParam(':email_cliente', $email_cliente);
    $stmt->bindParam(':tel_cliente', $tel_cliente);

    if ($stmt->execute()) {
        echo <<<HTML
<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Succès</title></head>
<body style="background-color:#fff; text-align:center; padding-top:50px;">
<h1>Inscription réussie !</h1>
<p>Vous serez redirigé vers l'accueil dans 5 secondes.</p>
<script>setTimeout(() => window.location.href = '/', 5000);</script>
</body></html>
HTML;
    } else {
        throw new Exception("Erreur SQL : " . implode(" | ", $stmt->errorInfo()));
    }

} catch (Exception $e) {
    error_log("Erreur d'inscription client : " . $e->getMessage());
    echo <<<HTML
<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Erreur</title></head>
<body style="background-color:#fff; text-align:center; padding-top:50px;">
<h1>Une erreur inattendue s'est produite.</h1>
<p>Veuillez réessayer plus tard ou contacter le support.</p>
<p>Vous serez redirigé dans 5 secondes...</p>
<script>setTimeout(() => window.location.href = '/', 5000);</script>
</body></html>
HTML;
}
?>
