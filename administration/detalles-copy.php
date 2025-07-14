<?php
$id_reserva = $_GET['id_reserva'];
?>


<!DOCTYPE html>
<html lang="en">
<head>




    <?php require_once "config/app.php"; ?>
    <?php require_once "config/conexion.php"; ?>
    

</head>
<body>




<?php
$vista = $conect->prepare("SELECT re.start , re.title , re.end , re.url, re.estado_reserva, ser.nombre_servicio , ser.id_servicio , cli.id_cliente , cli.nombre_cliente , cli.apellido_cliente
FROM reservas as re 
INNER JOIN servicios as ser ON ser.id_servicio = re.title 
INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente where id_reserva = :id_reserva");
$vista->bindParam(':id_reserva',$id_reserva);

$vista->execute();
$vista->setFetchMode(PDO::FETCH_ASSOC);
while ($data=$vista->fetch(PDO::FETCH_ORI_NEXT)) { ?>

<p> <?php echo $data['start']; ?> </p>
<p> <?php echo $data['end']; ?> </p>
<p> <?php echo $data['nombre_cliente']; ?> <?php echo $data['apellido_cliente']; ?> </p>
<p> <?php echo $data['estado_reserva']; ?>  </p>
<a href="./calendar.php">back</a>





<?php } ?>




</body>



</html>