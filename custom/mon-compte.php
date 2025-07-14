<?php 



require_once "../administration/config/conexion.php";



$opc = $_GET['opc'];





if($opc == 'check_email'){

    

    $email_cliente = $_POST['email_cliente'];        

    

    $detalles_email =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

    $detalles_email->bindParam(':email_cliente',$email_cliente);

    $detalles_email->execute();

    

    $data = $detalles_email->Fetch(PDO::FETCH_ASSOC);

    $datos = $data['pass_cliente'];

    

    echo json_encode($datos);    

}







elseif($opc == 'login' ){

    $email_cliente = $_POST['email_cliente'];        

    //$pass_cliente = $_POST['pass_cliente'];        



    $ver_reservas_frontend =$conect->prepare("SELECT * FROM clientes WHERE email_cliente=:email_cliente");

    $ver_reservas_frontend->bindParam(':email_cliente',$email_cliente);

    //$ver_reservas_frontend->bindParam(':pass_cliente',$pass_cliente);

    $ver_reservas_frontend->execute();

    

    $data = $ver_reservas_frontend->Fetch(PDO::FETCH_ASSOC);

    $respuesta = $data['id_cliente'];

    

    echo json_encode($respuesta); 



}





elseif($opc == 'borrar_reserva'){



    $id_reserva = $_POST['id_reserva'];





    $borrar_reserva =$conect->prepare("DELETE  FROM reservas WHERE id_reserva = :id_reserva ");

    $borrar_reserva->bindParam(':id_reserva',$id_reserva);

    $borrar_reserva->execute();

}





elseif($opc == 'set_pass'){



    $email_cliente = $_POST['email_cliente'];        

    $pass_cliente = $_POST['pass_cliente']; 



    $sql = "UPDATE clientes SET pass_cliente=:pass_cliente WHERE email_cliente=:email_cliente";

    $actualizar = $conect->prepare($sql);

    $actualizar->bindParam(':pass_cliente',$pass_cliente);

    $actualizar->bindParam(':email_cliente',$email_cliente);

    $actualizar->execute();



}





elseif($opc == 'edit_reserva_cliente_detalles'){

    $id_reserva = $_POST['id_reserva'];        

    $sql = "SELECT * FROM reservas INNER JOIN servicios ON reservas.title = servicios.id_servicio WHERE id_reserva = :id_reserva;
    ";

    $actualizar_reserva = $conect->prepare($sql);
    $actualizar_reserva->bindParam(':id_reserva',$id_reserva);
    $actualizar_reserva->execute();
    $datos = $actualizar_reserva->Fetch(PDO::FETCH_ASSOC);

    echo json_encode($datos);  



}


elseif($opc == "edit_reserva_cliente"){

    $id_reserva = $_POST["id_reserva"];
    $title = $_POST['title'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "UPDATE reservas SET title = :title, hora = :hora, fecha = :fecha, start = :start, end = :end WHERE id_reserva = :id_reserva";
    $datos_actualizar = $conect->prepare($sql);
    $datos_actualizar->bindParam(':id_reserva', $id_reserva);
    $datos_actualizar->bindParam(':title', $title);
    $datos_actualizar->bindParam(':hora', $hora);
    $datos_actualizar->bindParam(':fecha', $fecha);
    $datos_actualizar->bindParam(':start', $start);
    $datos_actualizar->bindParam(':end', $end);
    $datos_actualizar->execute();
    




}


?>