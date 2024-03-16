<?php
//aqui se realiza la conexion con la base de datos
$dbname = 'conexionbd';
    $dbuser = 'root';
    $dbhost = 'localhost';
    $dbpass = '';

   
    $conexion = new mysqli($dbhost,$dbuser, $dbpass,$dbname);

?>