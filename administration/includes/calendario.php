<?php
error_reporting(0);
ini_set('display_errors', 0);

session_start();

header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

header("Allow: GET, POST, OPTIONS, PUT, DELETE");



//require_once '../config/conexion.php';



include "../config/app.php";

// Create connection



$conn = mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($conn, "utf8");






// Check connection



if (!$conn) {

   



    die("Connection failed: " . mysqli_connect_error());



}







$agenda = "SELECT re.start , re.title , re.end , re.url, re.backgroundColor, re.description, ser.nombre_servicio , ser.id_servicio , cli.id_cliente , cli.nombre_cliente , cli.apellido_cliente



FROM reservas as re 



INNER JOIN servicios as ser ON ser.id_servicio = re.title 



INNER JOIN clientes as cli ON cli.id_cliente = re.id_cliente";







$result = mysqli_query($conn, $agenda);



$response = [];







if (mysqli_num_rows($result) > 0) {



    while($row = mysqli_fetch_assoc($result)) {


         foreach ($row as $key => $value) {



            $row[$key] = mb_convert_encoding($value, 'UTF-8', 'auto');



        }







        $response[] = [

            'start' => $row['start'],

            'end' => $row['end'],

            'title' => $row['title'],

            'nombre_servicio' => $row['nombre_servicio'],

            'backgroundColor' => $row['backgroundColor'],

            'url' => $row['url'],

            'description' => $row['description'],

            'id_cliente' => $row['id_cliente'],

            'nombre_cliente' => $row['nombre_cliente'],

            'apellido_cliente' =>$row['apellido_cliente'],

        ];



        }



     }



     



;



      if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET") {
       // var_dump($response); // Depuración temporal


    //  $response = [
    //     [
    //         "start" => "2024-07-01T10:00:00",
    //         "end" => "2024-07-01T11:00:00",
    //         "title" => "Prueba",
    //         "nombre_servicio" => "Test",
    //         "backgroundColor" => "red",
    //         "url" => "",
    //         "description" => "Evento de prueba",
    //         "id_cliente" => "1",
    //         "nombre_cliente" => "Juan",
    //         "apellido_cliente" => "Pérez"
    //     ]
    // ];
    






    //     echo json_encode($response);
    //     exit;

    $json = json_encode($response);
        if ($json === false) {
            echo json_last_error_msg();
            exit;
        }
        echo $json;
        exit;






    }   











?>











<?php 



                              



                              



                              if(empty($_SESSION['usuario'])){







                              ?>



                              <script>



                                 window.location.href="login.php";



                              </script>



                              <?php } ?> 