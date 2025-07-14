<?php
include '../config/conexion.php';

$opc = $_GET['opc'];



// AGREGAR UN NUEVO CLIENTE//
  if ($opc=="nuevo_cliente") {
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $tel_cliente = $_POST['tel_cliente'];
    $usuario_cliente = "DEFAULT";
    $pass_cliente = "DEFAULT";


    $sql = "INSERT INTO clientes (nombre_cliente, apellido_cliente, email_cliente, tel_cliente , usuario_cliente , pass_cliente)
    VALUES (:nombre_cliente, :apellido_cliente, :email_cliente, :tel_cliente , :usuario_cliente , :pass_cliente)";
    $guardar = $conect->prepare($sql);
    
    $guardar->bindParam(':nombre_cliente',$nombre_cliente);
    $guardar->bindParam(':apellido_cliente',$apellido_cliente);
    $guardar->bindParam(':email_cliente',$email_cliente);
    $guardar->bindParam(':tel_cliente',$tel_cliente);
    $guardar->bindParam(':usuario_cliente',$usuario_cliente);
    $guardar->bindParam(':pass_cliente',$pass_cliente);
    $guardar->execute();
  }




// EDITAR CLIENTE //

elseif ($opc=="actualizar-cliente") {
  $id_cliente = $_POST['id_cliente'];
  $nombre_cliente = $_POST['nombre_cliente'];
  $apellido_cliente = $_POST['apellido_cliente'];
  $email_cliente = $_POST['email_cliente'];
  $tel_cliente = $_POST['tel_cliente'];

  $actualizar_cliente = $conect->prepare("UPDATE clientes SET nombre_cliente = :nombre_cliente , apellido_cliente = :apellido_cliente , email_cliente = :email_cliente , tel_cliente = :tel_cliente  WHERE id_cliente = :id_cliente");
  $actualizar_cliente->bindParam(':nombre_cliente',$nombre_cliente);
  $actualizar_cliente->bindParam(':apellido_cliente',$apellido_cliente);
  $actualizar_cliente->bindParam(':email_cliente',$email_cliente);
  $actualizar_cliente->bindParam(':tel_cliente',$tel_cliente);
  $actualizar_cliente->bindParam(':id_cliente',$id_cliente);
  $actualizar_cliente->execute();
 }


// EDITAR CLIENTE //




// AGREGAR DIA FESTIVO (HOLIDAY) //

elseif($opc == "add_holiday" ){

  $fecha = $_POST['fecha'];


  $sql = "INSERT INTO parametros (fecha) VALUE (:fecha)";

  $holiday = $conect->prepare($sql);

  $holiday->bindParam(':fecha' , $fecha);
  $holiday->execute();




}






// AGREGAR DIA FESTIVO (HOLIDAY) //

elseif($opc == "add_no_holiday" ){

  $fecha = $_POST['fecha'];


  $sql = "INSERT INTO excepciones (fecha) VALUE (:fecha)";

  $no_holiday = $conect->prepare($sql);

  $no_holiday->bindParam(':fecha' , $fecha);
  $no_holiday->execute();




}








  //AGREGAR UN NUEVA RESERVA//
elseif ($opc=="agregar_reserva") {

  $seleccionarId_reserva = $conect->prepare("SELECT * FROM reservas order by id_reserva desc");
  $seleccionarId_reserva->execute();
  $ids = $seleccionarId_reserva->fetch();
  
  $update_url = $ids['id_reserva'] + 1;

  $url = 'detalles-reserva.php?id_reserva='.$update_url;

  $id_cliente = $_POST['id_cliente'];
  $title = $_POST['title'];
  $id_staff = 1;
  $start = $_POST['start'];
  $end = $_POST['end'];
  $estado_reserva = "Confirmé";
  $hora = $_POST['hora'];
  $hora2 = $_POST['hora2'];
  $hora3 = $_POST['hora3'];
  $hora4 = $_POST['hora4'];

  $fecha = $_POST['fecha'];
  $backgroundColor = $_POST['backgroundColor'];


  $sql = "INSERT INTO reservas (id_cliente, title, id_staff, start, end, estado_reserva ,url , hora , fecha ,  hora2 , hora3 , hora4 , backgroundColor)
  VALUES (:id_cliente,:title,:id_staff, :start , :end , :estado_reserva , :url , :hora , :fecha ,  :hora2 , :hora3 , :hora4 , :backgroundColor)";
  $guardar = $conect->prepare($sql);
  
  $guardar->bindParam(':id_cliente',$id_cliente);
  $guardar->bindParam(':title',$title);
  $guardar->bindParam(':id_staff',$id_staff);
  $guardar->bindParam(':start',$start);
  $guardar->bindParam(':end',$end);
  $guardar->bindParam(':estado_reserva',$estado_reserva);
  $guardar->bindParam(':url',$url);
  $guardar->bindParam(':hora',$hora);
  $guardar->bindParam(':fecha',$fecha);
  $guardar->bindParam(':hora2',$hora2);
  $guardar->bindParam(':hora3',$hora3);
  $guardar->bindParam(':hora4',$hora4);
  $guardar->bindParam(':backgroundColor', $backgroundColor);
  $guardar->execute();

$mail = "eliannebouchardac@gmail.com , jaime@komercos.com";
  //$mail = "eliannebouchardac@gmail.com , jaime@komercos.com";
  //$mail = "sebastian@vistaweb.ca";
  $to = $_POST['email_cliente'];
  $to2 = $mail;
  
  $subject   = "Demande de réservation auprès d'acupuncture";
  $headers   = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";
   
  $message  = "détails de votre réservation\n";
  $message .= "\nDate de votre rendez-vous :" . $_POST['fecha'];
  $message .= "\nL'heure du rendez-vous : " . $_POST['hora'];
  $message .= "\nMerci pour votre temps";

  //$message .= "\nPeople: " . $_POST['adults'];

  //$message .= "\nBooking Options:\n" ;
  
  //foreach($_POST['options'] as $value) 
  //	{ 
  //	$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
  //	};

  /*
  $message .= "\nNom: " . $_POST['nombre_cliente'];
  $message .= "\nNom de famille: " . $_POST['apellido_cliente'];
  $message .= "\nCourriel: " . $_POST['email_cliente'];
  $message .= "\nTelephone: " . $_POST['tel_cliente'];
  */

  //Receive Variable
  $sentOk = mail("$to ,$to2" ,$subject,utf8_decode($message),$headers);
  

}




// // ACTUALIZAR RESERVA //
  elseif ($opc=="actualizar_reserva") {


 // Imprimir un mensaje en la consola del navegador usando console.log
    echo "<script>console.log('Iniciando la actualización de reserva...');</script>";
      




      
  $id_cliente = $_POST['id_cliente'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $hora = $_POST['hora'];
  $title = $_POST['title'];
  $id_reserva = $_POST['id_reserva'];
  
  $fecha = $_POST['fecha'];
  $backgroundColor = $_POST['backgroundColor'];

  
  $sql = "UPDATE reservas SET    
  id_cliente = :id_cliente,
  start=:start,
  end=:end,
  hora=:hora,
  title=:title,
  fecha=:fecha,
  backgroundColor = :backgroundColor
  WHERE id_reserva= :id_reserva";
  $actualizar = $conect->prepare($sql);
  $actualizar->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
  $actualizar->bindParam(':id_reserva',$id_reserva, PDO::PARAM_STR);
  $actualizar->bindParam(':start',$start, PDO::PARAM_STR);
  $actualizar->bindParam(':end',$end, PDO::PARAM_STR);
  $actualizar->bindParam(':hora',$hora, PDO::PARAM_STR);
  $actualizar->bindParam(':title',$title, PDO::PARAM_STR);
  $actualizar->bindParam(':fecha',$fecha, PDO::PARAM_STR);
  $actualizar->bindParam(':backgroundColor',$backgroundColor, PDO::PARAM_STR);
  $actualizar->execute();


  $sql2 ="SELECT email_cliente FROM clientes WHERE id_cliente = :id_cliente";
  $tomar_email = $conect->prepare($sql2);
  $tomar_email->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
  $tomar_email->execute();
  $email_capturado = $tomar_email->fetch();



// $to = "eliannebouchardac@gmail.com";
//  // $to = "jaime@komercos.com";
//   //$to =  "sebastian@vistaweb.ca";
//  $to2 = $email_capturado["email_cliente"];
//   // $to2 = $email_capturado;
  
//   $subject   = "Vos données de réservation ont été mises à jour";
//   $headers   = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";
   
//   $message  = "détails de votre réservation\n";
//   $message .= "\nVotre courriel :" . $email_capturado["email_cliente"];
//   $message .= "\nDate de votre rendez-vous :" . $_POST['fecha'];
//   $message .= "\nL'heure du rendez-vous : " . $_POST['hora'];
//   $message .= "\nMerci pour votre temps";

//   //$message .= "\nPeople: " . $_POST['adults'];

//   //$message .= "\nBooking Options:\n" ;
  
//   //foreach($_POST['options'] as $value) 
//   //	{ 
//   //	$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
//   //	};

//   /*
//   $message .= "\nNom: " . $_POST['nombre_cliente'];
//   $message .= "\nNom de famille: " . $_POST['apellido_cliente'];
//   $message .= "\nCourriel: " . $_POST['email_cliente'];
//   $message .= "\nTelephone: " . $_POST['tel_cliente'];
//   */

//   //Receive Variable
//   $sentOk = mail("$to ,$to2" ,$subject,utf8_decode($message),$headers);







/*

 $para = 'ecobox@videotron.ca, jaimeanazco@gmail.com, Support@vistaweb.ca';

//$para      = 'ecobox@videotron.ca';
$titulo    = 'Soumission';
$mensaje   = 'Nom : ';


$cabeceras = 'From: webmaster@conteneurecobox.com' . "\r\n" .
    'Reply-To: webmaster@conteneurecobox.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$cabeceras .= 'Content-type: text; charset=utf-8' . "\r\n";

mail($para, $titulo, utf8_decode($mensaje), $cabeceras);

*/

  

 }
// ACTUALIZAR RESERVA //






// // // ACTUALIZAR RESERVA //
//   elseif ($opc=="actualizar_reserva") {
      
//   $id_cliente = $_POST['id_cliente'];
//   $start = $_POST['start'];
//   $end = $_POST['end'];
//   $hora = $_POST['hora'];
//   $title = $_POST['title'];
//   $id_reserva = $_POST['id_reserva'];
  
//   $fecha = $_POST['fecha'];
//   $backgroundColor = $_POST['backgroundColor'];

  
//   $sql = "UPDATE reservas SET    
//   id_cliente = :id_cliente,
//   start=:start,
//   end=:end,
//   hora=:hora,
//   title=:title,
//   fecha=:fecha,
//   backgroundColor = :backgroundColor
//   WHERE id_reserva= :id_reserva";
//   $actualizar = $conect->prepare($sql);
//   $actualizar->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
//   $actualizar->bindParam(':id_reserva',$id_reserva, PDO::PARAM_STR);
//   $actualizar->bindParam(':start',$start, PDO::PARAM_STR);
//   $actualizar->bindParam(':end',$end, PDO::PARAM_STR);
//   $actualizar->bindParam(':hora',$hora, PDO::PARAM_STR);
//   $actualizar->bindParam(':title',$title, PDO::PARAM_STR);
//   $actualizar->bindParam(':fecha',$fecha, PDO::PARAM_STR);
//   $actualizar->bindParam(':backgroundColor',$backgroundColor, PDO::PARAM_STR);
//   $actualizar->execute();


//   $sql2 ="SELECT email_cliente FROM clientes WHERE id_cliente = :id_cliente";
//   $tomar_email = $conect->prepare($sql2);
//   $tomar_email->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
//   $tomar_email->execute();
//   $email_capturado = $tomar_email->fetch();



// $to = "eliannebouchardac@gmail.com";
//  // $to = "jaime@komercos.com";
//   //$to =  "sebastian@vistaweb.ca";
//  $to2 = $email_capturado["email_cliente"];
//   // $to2 = $email_capturado;
  
//   $subject   = "Vos données de réservation ont été mises à jour";
//   $headers   = "From:Elianne Bouchard <noreply@acupuncturevalleyfield.ca>";
   
//   $message  = "détails de votre réservation\n";
//   $message .= "\nVotre courriel :" . $email_capturado["email_cliente"];
//   $message .= "\nDate de votre rendez-vous :" . $_POST['fecha'];
//   $message .= "\nL'heure du rendez-vous : " . $_POST['hora'];
//   $message .= "\nMerci pour votre temps";

//   //$message .= "\nPeople: " . $_POST['adults'];

//   //$message .= "\nBooking Options:\n" ;
  
//   //foreach($_POST['options'] as $value) 
//   //	{ 
//   //	$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
//   //	};

//   /*
//   $message .= "\nNom: " . $_POST['nombre_cliente'];
//   $message .= "\nNom de famille: " . $_POST['apellido_cliente'];
//   $message .= "\nCourriel: " . $_POST['email_cliente'];
//   $message .= "\nTelephone: " . $_POST['tel_cliente'];
//   */

//   //Receive Variable
//   $sentOk = mail("$to ,$to2" ,$subject,utf8_decode($message),$headers);




				

  

//  }
// // ACTUALIZAR RESERVA //

// VER DETALLES DE CLIENTE //
  elseif ($opc=="detalles") {
    $id_cliente = $_POST['id_cliente'];
    $detalles =$conect->prepare("SELECT * FROM clientes WHERE id_cliente=:id_cliente");
    $detalles->bindParam(':id_cliente',$id_cliente);
    $detalles->execute();
    $data = $detalles->Fetch(PDO::FETCH_ASSOC); 
    echo json_encode($data);
  }
// VER DETALLES DE CLIENTE //
 
// VER DETALLES DE RESERVA //
elseif ($opc=="detalles-reserva") {
  $id_reserva = $_POST['id_reserva'];
  $detalles =$conect->prepare("SELECT 
  re.start , 
  re.title , 
  re.end , 
  re.url, 
  re.backgroundColor, 
  re.description, 
  re.hora,
  re.fecha,
  re.id_reserva,
  ser.nombre_servicio , 
  ser.id_servicio , 
  cli.id_cliente , 
  cli.nombre_cliente , 
  cli.apellido_cliente FROM reservas   as re 
  INNER JOIN servicios as ser ON ser.id_servicio = re.title 
  INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente
   WHERE id_reserva=:id_reserva");
  $detalles->bindParam(':id_reserva',$id_reserva);
  $detalles->execute();
  $data = $detalles->Fetch(PDO::FETCH_ASSOC); 
  echo json_encode($data);
}
// VER DETALLES DE RESERVA //


// BORRAR CLIENTE //
 elseif ($opc=="borrar") {
  $id_cliente = $_POST['id_cliente'];

  $borrar = $conect->prepare("DELETE FROM clientes WHERE id_cliente=:id_cliente");
  $borrar->bindParam(':id_cliente',$id_cliente);
  $borrar->execute();
 }
// BORRAR CLIENTE //








// BORRAR RESERVA //

elseif ($opc=="borrar-reserva") {
  $id_reserva = $_POST['id_reserva'];
  $start = $_POST['start'];
  $end = $_POST['end']; 
  $hora = $_POST['hora'];  
  $hora2 = $_POST['hora2']; 
  $hora3= $_POST['hora3']; 
  $hora4 = $_POST['hora4']; 
  $fecha = $_POST['fecha'];
 

  $borrar = $conect->prepare("UPDATE reservas SET start = :start , end = :end, hora = :hora, hora2 = :hora2, hora3 = :hora3, hora4 = :hora4 , fecha = :fecha  WHERE id_reserva = :id_reserva");
  $borrar->bindParam(':id_reserva',$id_reserva);
  $borrar->bindParam(':start',$start);
  $borrar->bindParam(':end',$end);
  $borrar->bindParam(':hora',$hora);
  $borrar->bindParam(':hora2',$hora2);
  $borrar->bindParam(':hora3',$hora3);
  $borrar->bindParam(':hora4',$hora4);
  $borrar->bindParam(':fecha',$fecha);
  $borrar->execute();
 }


/*
elseif ($opc=="borrar-reserva") {
  $id_reserva = $_POST['id_reserva'];

  $borrar = $conect->prepare("DELETE FROM reservas WHERE id_reserva=:id_reserva");
  $borrar->bindParam(':id_reserva',$id_reserva);
  $borrar->execute();
 }
// BORRAR RESERVA //
*/
// VER HISTORIAL DE CAMBIOS //
  elseif ($opc=="ver_cambios") {
    
    $id_cliente = $_POST['id_cliente'];

    $vista = $conect->prepare("SELECT fecha_cambio , descripcion_cambio FROM cambios WHERE id_cliente = :id_cliente");
    $vista->bindParam(':id_cliente',$id_cliente);
    $vista->execute();


    $vista->setFetchMode(PDO::FETCH_ASSOC);
    while ($data=$vista->fetchAll()){
    
  

    echo json_encode($data);
    

    }
    
  }
// VER HISTORIAL DE CAMBIOS //



//BUSCAR USUARIOS EN TIEMPO REAL//

elseif ($opc== "busqueda_ajax_usuarios") {

  $nombre_cliente = $_POST['nombre_cliente'];

  $vista = $conect->prepare('SELECT * FROM clientes Where nombre_cliente  like :nombre_cliente');
  $vista->execute(array(":nombre_cliente" => "%" . $_POST["nombre_cliente"] . "%"));

  $vista->setFetchMode(PDO::FETCH_ASSOC);
  while ($data=$vista->fetchAll()){
  
    echo json_encode($data);

  }
}


//BUSCAR USUARIOS EN TIEMPO REAL//


//***VALIDAR HORA AJAX */
    elseif($opc == "validar_hora_ajax" ){
                      


      $hora_reserva = $_POST['hora_reserva'];						
      $start = $_POST['dates']."T".$hora_reserva;
                     
      $sqlValidarHorario = $conect->prepare("SELECT * FROM reservas  WHERE start = :start ");
      $sqlValidarHorario->bindParam(":start", $start, PDO::PARAM_STR);	
      $sqlValidarHorario->execute();									
    //							$sqlValidarHorario->fetch();

      $hola = $sqlValidarHorario->fetchAll();

      if(count($hola) >  0 ){
          
          $error = "L'heure sélectionnée n'est pas disponible, veuillez réessayer une autre fois.";
          echo json_encode($error);
      }else{
          $error = "L'heure sélectionnée est disponible.";
          echo json_encode($error);
      }
    }
    //***VALIDAR HORA AJAX */









// AGREGAR CAMBIOS  //
    elseif ($opc=="agregar_cambio") {

        $id_cliente = $_POST['id_cliente'];
        $fecha_cambio = $_POST['fecha_cambio'];
        $descripcion_cambio = $_POST['descripcion_cambio'];
        
        $sql = "INSERT INTO cambios (id_cliente, fecha_cambio, descripcion_cambio)
        VALUES (:id_cliente, :fecha_cambio, :descripcion_cambio)";
        $guardar = $conect->prepare($sql);
        
        $guardar->bindParam(':id_cliente',$id_cliente);
        $guardar->bindParam(':fecha_cambio',$fecha_cambio);
        $guardar->bindParam(':descripcion_cambio',$descripcion_cambio);
        $guardar->execute();  
    }
// AGREGAR CAMBIOS  //



///VALIDAR HORA CUANDO SE VA AGREGAR UNA RESERVA//


elseif($opc=="validar_horas" ){
    							
  $fecha = $_POST['fecha'];
  
  
  
  $validarHorasTabla = $conect->prepare("SELECT hora, hora2, hora3, hora4, hora5,  id_reserva FROM reservas WHERE fecha = :fecha");
  $validarHorasTabla->bindParam(":fecha" , $fecha , PDO::PARAM_STR);
  $validarHorasTabla->execute();
  $response = $validarHorasTabla->fetchAll();
  
  echo json_encode($response);
  
  }

///VALIDAR HORA CUANDO SE VA AGREGAR UNA RESERVA//
?>
