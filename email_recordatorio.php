<?php 

require "administration/config/conexion.php";


$fecha = date('Y-m-d');


$fecha_menos = date("Y-m-d",strtotime($fecha ."- 1 days"));




$statement = $conect->prepare("SELECT re.hora , re.fecha , ser.nombre_servicio , cli.email_cliente , cli.nombre_cliente , cli.apellido_cliente FROM reservas as re INNER JOIN servicios as ser ON ser.id_servicio = re.title INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente WHERE fecha = :fecha_menos");
$statement->bindParam(':fecha_menos',$fecha_menos);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
while ($data=$statement->fetch(PDO::FETCH_ORI_NEXT)) {


   if($data['fecha'] == $fecha_menos){


    echo $data['fecha'];
    
    echo $data['email_cliente'];
    
    echo $data['nombre_cliente'];

    
    echo $data['apellido_cliente'];

    echo $data['hora'];
      
    
    /*
    //$mail = "sebastian@vistaweb.ca";
    $to = $data['email_cliente'];
    
    
    $subject   = "Rappel de votre réservation";
    $headers   = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";
     
    $message  = "détails de votre réservation\n";
    $message .= "\nNom: " . $data['nombre_cliente'] ." ". $data['apellido_cliente'];
    $message .= "\nDate de votre rendez-vous :" . $data['fecha'];
    $message .= "\nL'heure du rendez-vous : " . $data['hora'];
    $message .= "\nMerci pour votre temps";

    $sentOk = mail($to ,$subject,utf8_decode($message),$headers);
    */



   }else{
       return false;
   }

}





echo json_encode($data);










?>