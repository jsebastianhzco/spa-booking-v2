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

        window.location = "https://www.acupuncturevalleyfield.ca/dossier-client.html"

    }

    </script>



</head>



<body onLoad="setTimeout('delayedRedirect()', 5000)" style="background-color:#fff;">









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

                            $detalles =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

							$detalles->bindParam(':email_cliente',$email_cliente);

							$detalles->execute();

							$data = $detalles->Fetch(PDO::FETCH_ASSOC);

							$id_cliente = $data['id_cliente'];





							$fecha = $_POST['dates'] ;

							$hora  = $_POST['hora_reserva']; ;			

							$hora2 = "";

							$hora3 = "";

							$hora4 = "";

							$hora_fin_reserva;

							if($hora2 == ""){

	

								$hora_fin_reserva = $hora;

	

							}

							

							elseif ($hora2 != "" && $hora3 == ""){

								$hora_fin_reserva = $hora2;

							}

	

	

							elseif ($hora3 != "" && $hora4 == ""){

								$hora_fin_reserva = $hora3;

							}

	

	

							elseif ($hora4 != "" ){

								$hora_fin_reserva = $hora4;

							}



							$fecha_de_reserva = $fecha;





							$fecha_reserva = $fecha."T".$hora;

							$fin_reserva = $fecha."T".$hora_fin_reserva;



							$estado_reserva = "attente de confirmation";

							$title = $_POST['servicio_reserva'] ;

							$id_staff = 1 ;



							$sqlValidarHorario = $conect->prepare("SELECT * FROM reservas  WHERE start = :start");

							$sqlValidarHorario->bindParam(":start", $fecha_reserva, PDO::PARAM_STR);	

							$sqlValidarHorario->execute();

							$hola = $sqlValidarHorario->fetchAll();

							if(count($hola) >  0 ){

								

								$error = "ERORR";

								echo $error;

							}else{

								$seleccionarId_reserva = $conect->prepare("SELECT * FROM reservas order by id_reserva desc");

								$seleccionarId_reserva->execute();

								$ids = $seleccionarId_reserva->fetch();

								$backgroundColor = $_POST['color-bg'];

								$update_url = $ids['id_reserva'] + 1;	



								$url = 'detalles-reserva.php?id_reserva='.$update_url;





								$sql = "INSERT INTO reservas 

								(id_cliente , title, id_staff,  start, end, estado_reserva, url, backgroundColor, fecha, hora, hora2, hora3, hora4)VALUES

								(:id_cliente , :title , :id_staff ,  :start, :end , :estado_reserva, :url, :backgroundColor, :fecha, :hora, :hora2, :hora3, :hora4 )";

								$guardar = $conect->prepare($sql);





								$guardar->bindParam(':id_cliente',$id_cliente);

								$guardar->bindParam(':title',$title);

								$guardar->bindParam(':id_staff',$id_staff);

								

								$guardar->bindParam(':start',$fecha_reserva);

								$guardar->bindParam(':end',$fin_reserva);

								$guardar->bindParam(':estado_reserva',$estado_reserva);

								$guardar->bindParam(':url',$url);

								$guardar->bindParam(':backgroundColor',$backgroundColor);

								$guardar->bindParam(':fecha',$fecha_de_reserva);





								$guardar->bindParam(':hora',$hora);

								$guardar->bindParam(':hora2',$hora2);

								$guardar->bindParam(':hora3',$hora3);

								$guardar->bindParam(':hora4',$hora4);

								

							

								}











								$guardar->execute();







								

								$mail = $_POST['email_cliente'];

								//$to = "eliannebouchardac@gmail.com , jaime@komercos.com";/* YOUR EMAIL HERE */

								$to = "jaime@komercos.com";/* YOUR EMAIL HERE */

								$subject = "Demande de réservation auprès d'acupuncture";

								$headers = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";

								$message = "DETAILS\n";

								$message .= "\nPreferred date: " . $_POST['dates'];

								$message .= "\nPreferred time: " . $_POST['hora_reserva'];

								$message .= "\nTreatments: " . $_POST['servicio_reserva'];

								//$message .= "\nPeople: " . $_POST['adults'];

			

								//$message .= "\nBooking Options:\n" ;

								

								//foreach($_POST['options'] as $value) 

								//	{ 

								//	$message .=   "- " .  trim(stripslashes($value)) . "\n"; 

								//	};

			

								$message .= "\nNom: " . $_POST['nombre_cliente'];

								$message .= "\nNom de famille: " . $_POST['apellido_cliente'];

								$message .= "\nCourriel: " . $_POST['email_cliente'];

								$message .= "\nTelephone: " . $_POST['tel_cliente'];

								$message .= "\ntermes et conditions acceptés: " . $_POST['terms']. "\n";

								$message .= "\n<a href='https://www.acupuncturevalleyfield.ca/dossier-client.html'>Dossier Client</a>" . "\n";

			

								//Receive Variable

								$sentOk = mail($to,$subject,$message,$headers);

								

								//Confirmation page

								$user = "$mail";

								$usersubject = "Merci";

								$userheaders = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";



								$usermessage = "Merci pour votre temps. Votre demande a été envoyée avec succès."; 

								$usermessage .= "\nPreferred date: " . $_POST['dates'];

								$usermessage .= "\nPreferred time: " . $_POST['hora_reserva'];

								$usermessage .= "\nTreatments: " . $_POST['servicio_reserva'];





								if ($_SERVER['REQUEST_METHOD'] == "POST"){mail($user,$usersubject,$usermessage,$userheaders);}

								

								?>

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
	<small>Veuillez noter que vous serez redirigé vers un formulaire qui doit être obligatoirement rempli. Assurez-vous de fournir toutes les informations nécessaires pour traiter votre demande correctement. Merci de votre collaboration!</small>

</div>

														

<?php } ?>



						

						

						

























</body>

</html>



