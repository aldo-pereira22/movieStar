<?php


$db_name = "moviestar";
$db_host = "localhost";
$db_user = "user";
$db_pass = "1234";


$conn = new PDO("mysql:dbname=". $db_name .";host=" .$db_host, $db_user, $db_pass);



//HABILITAR ERROS;
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);




?>