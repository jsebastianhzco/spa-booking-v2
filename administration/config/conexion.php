<?php

include 'app.php';



try {
  //$conect = new PDO("mysql:host=$servername;dbname=$db", $username, $password);


$conect = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


  // set the PDO error mode to exception
  $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   "Connected successfully";
} catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
}
?>

