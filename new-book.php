<?php require_once "administration/config/conexion.php";?>
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
<body onLoad="etTimeout('delayedRedirect()', 5000)" style="background-color:#fff;">

<?php
    
    $usuario_cliente = "DEFAULT";
    $pass_cliente = "DEFAULT";
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $tel_cliente = $_POST['tel_cliente'];

    $sql2 = "INSERT INTO clientes (usuario_cliente , pass_cliente , nombre_cliente , apellido_cliente , email_cliente , tel_cliente)
    VALUES (:usuario_cliente, :pass_cliente ,:nombre_cliente , :apellido_cliente , :email_cliente , :tel_cliente)";


                        $crear_cliente = $conect->prepare($sql2);

						$crear_cliente->bindParam(':usuario_cliente',$usuario_cliente);
						$crear_cliente->bindParam(':pass_cliente',$pass_cliente);
						$crear_cliente->bindParam(':nombre_cliente',$nombre_cliente);
						$crear_cliente->bindParam(':apellido_cliente',$apellido_cliente);
						$crear_cliente->bindParam(':email_cliente',$email_cliente);
						$crear_cliente->bindParam(':tel_cliente',$tel_cliente);
						$crear_cliente->execute();

                        $success = 1;

                        if($success == 1){
                            echo "good";
                        }
?>


</body>
</html>