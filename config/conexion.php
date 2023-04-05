<?php
require_once 'config.php';

$conexion = mysqli_connect($host, $usuariodb, $clavedb, $basededatos);

if (!$conexion) {
    die("Error en la conexion: " . mysqli_connect_error());
} else {
    echo "";
}

try{
    $conn = new PDO ("mysql:host=$host;dbname=$basededatos",$usuariodb, $clavedb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch(PDOException $e){
    print_r("error en la conexion: ". $e->getMessage()); 
}


// ?>