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









$seleccionarId_reserva = $conect->prepare("SELECT * FROM reservas order by id_reserva desc");

$seleccionarId_reserva->execute();

$ids = $seleccionarId_reserva->fetch();



$update_url = $ids['id_reserva'] + 1;





						$url = 'detalles-reserva.php?id_reserva='.$update_url;

						$fecha = $_POST['dates'];

						$hora = $_POST['hora_reserva'];

						$hora2 = $_POST['hora2'];

						$hora3 = $_POST['hora3'];

						$hora4 = $_POST['hora4'];



						

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

						$id_cliente = $_POST['id_cliente'];

						$backgroundColor = $_POST['color-bg'];

 

						

						$sqlValidarHorario = $conect->prepare("SELECT * FROM reservas  WHERE start = :start");

						$sqlValidarHorario->bindParam(":start", $fecha_reserva, PDO::PARAM_STR);	

						$sqlValidarHorario->execute();

						$hola = $sqlValidarHorario->fetchAll();

						if(count($hola) >  0 ){

								

							$error = "ERORR";

							echo $error;

						}else{



						$sql = "INSERT INTO reservas (id_cliente , backgroundColor , title, start, end, url ,id_staff , estado_reserva , fecha, hora, hora2 , hora3 , hora4)

						VALUES (:id_cliente  , :backgroundColor , :title, :start, :end , :url , :id_staff,  :estado_reserva, :fecha, :hora, :hora2, :hora3 , :hora4 )";

						$guardar = $conect->prepare($sql); 



						  

						$guardar->bindParam(':id_cliente',$id_cliente);

						$guardar->bindParam(':title',$title);

						

						$guardar->bindParam(':start',$fecha_reserva);

						$guardar->bindParam(':end',$fin_reserva);

						$guardar->bindParam(':url',$url);

						$guardar->bindParam(':backgroundColor',$backgroundColor);



						$guardar->bindParam(':id_staff',$id_staff);

						$guardar->bindParam(':estado_reserva',$estado_reserva);

						$guardar->bindParam(':fecha',$fecha);



						if($title == "1"){

							$hora2 = "NULL";

						}



						$guardar->bindParam(':hora',$hora);

						$guardar->bindParam(':hora2',$hora2);

						$guardar->bindParam(':hora3',$hora3);

						$guardar->bindParam(':hora4',$hora4);



						$guardar->execute();

						

						$mail = $_POST['email_cliente'];

						$to = "eliannebouchardac@gmail.com";/* YOUR EMAIL HERE */

						//$to = "sebaslbp19972015@gmail.com";/* YOUR EMAIL HERE */

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

						$message .= "\n<a href='www.acupuncturevalleyfield.ca/carriere-chez-nous'>Carrière chez nous</a>" . "\n";

	

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



								mail($user,$usersubject,$usermessage,$userheaders);



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

</div>





				<?php	} ?>









	



<!-- END SEND MAIL SCRIPT -->   





</body>

</html>