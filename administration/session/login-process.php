<?php

require ("../config/conexion.php");
$opc = $_GET["opc"];
if($opc== "login"){


    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $query = $conect->prepare("SELECT * FROM user WHERE username=:username and pass = :pass");  
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->bindParam("pass", $pass, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($data);
    session_start();
    $_SESSION['email'] = $data['email'];
    $_SESSION['usuario'] = $data['username'];
    $_SESSION['rol'] = "admin";
    
}
?>