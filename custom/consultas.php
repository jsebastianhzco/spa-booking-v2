<?php



require_once "../administration/config/conexion.php";





$opc = $_GET['opc'];



if ($opc=="check_email") {

    

     $email_cliente = $_POST['email_cliente'];



     $comprobar_email = $conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente"); 

     $comprobar_email->bindParam(':email_cliente',$email_cliente);   

     $comprobar_email->execute(); 

    

     if($comprobar_email->fetchColumn() > 0){

        

         

    $detalles_email = $conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente"); 

    $detalles_email->bindParam(':email_cliente',$email_cliente);   

    $detalles_email->execute();              

    $data = $detalles_email->Fetch(PDO::FETCH_ASSOC);

    $datos = $data['email_cliente'];

    echo json_encode($datos);   



    }else{



        $datos = 1;

        echo json_encode($datos);

        }











    

    



}



elseif ($opc=="check_nombre") {

    $email_cliente = $_POST['email_cliente'];

    $detalles_email =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

    $detalles_email->bindParam(':email_cliente',$email_cliente);

    $detalles_email->execute();

    $data = $detalles_email->Fetch(PDO::FETCH_ASSOC);

    

    $datos = $data['nombre_cliente'];

    echo json_encode($datos);

}









elseif($opc == "get_holidays"){



   

    

    

    $get_holidays =$conect->prepare("SELECT fecha FROM parametros");

    $get_holidays->execute();

    $holidays = $get_holidays->FetchAll(PDO::FETCH_ASSOC);

    

    echo json_encode($holidays);

}







elseif($opc == "get_exceptions"){



   

    

    

    $get_exceptions =$conect->prepare("SELECT fecha FROM excepciones");

    $get_exceptions->execute();

    $exceptions = $get_exceptions->FetchAll(PDO::FETCH_ASSOC);

    

    echo json_encode($exceptions);

}















elseif ($opc=="check_apellido") {

    $email_cliente = $_POST['email_cliente'];

    

    

    $detalles_email =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

    $detalles_email->bindParam(':email_cliente',$email_cliente);

    $detalles_email->execute();

    $data = $detalles_email->Fetch(PDO::FETCH_ASSOC);

    

    $datos = $data['apellido_cliente'];

    echo json_encode($datos);

}









elseif ($opc=="check_telefono") {

    $email_cliente = $_POST['email_cliente'];

    

    

    $detalles_email =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

    $detalles_email->bindParam(':email_cliente',$email_cliente);

    $detalles_email->execute();

    $data = $detalles_email->Fetch(PDO::FETCH_ASSOC);

    

    $datos = $data['tel_cliente'];

    echo json_encode($datos);

}









elseif ($opc=="check_id") {

    $email_cliente = $_POST['email_cliente'];

    

    

    $detalles_email =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

    $detalles_email->bindParam(':email_cliente',$email_cliente);

    $detalles_email->execute();

    $data = $detalles_email->Fetch(PDO::FETCH_ASSOC);

    

    $datos = $data['id_cliente'];

    echo json_encode($datos);

}











elseif($opc=="validar_hora_ajax2" ){

    							

$fecha = $_POST['fecha'];







$validarHorasTabla = $conect->prepare("SELECT hora, hora2, hora3, hora4, hora5,  id_reserva FROM reservas WHERE fecha = :fecha");

$validarHorasTabla->bindParam(":fecha" , $fecha , PDO::PARAM_STR);

$validarHorasTabla->execute();

$response = $validarHorasTabla->fetchAll();



echo json_encode($response);



}











elseif($opc == "validar_hora_ajax" ){

    							





	$hora_reserva = $_POST['hora_reserva'];						

    $start = $_POST['dates']."T".$hora_reserva;

               

    $sqlValidarHorario = $conect->prepare("SELECT * FROM reservas  WHERE start = :start ");

    $sqlValidarHorario->bindParam(":start", $start, PDO::PARAM_STR);	

    $sqlValidarHorario->execute();									

    //$sqlValidarHorario->fetch();



    $hola = $sqlValidarHorario->fetchAll();



    if(count($hola) >  0 ){

        

        $error = "L'heure sélectionnée n'est pas disponible, veuillez réessayer une autre fois.";

        echo json_encode($error);

    }else{

        $error = "L'heure sélectionnée est disponible.";

        echo json_encode($error);

    }

}





elseif($opc == "validarDateForm"){

    $fecha_consulta = $_POST['fecha_consulta'];



    $sqlValidarConsulta = $conect->prepare("SELECT hora, id_reserva FROM reservas WHERE fecha = :fecha_consulta ");

    $sqlValidarConsulta->bindParam(":fecha_consulta" , $fecha_consulta);

    $sqlValidarConsulta->execute();



    $data = $sqlValidarConsulta->fetchAll();



    echo json_encode($data);









}





















































?>