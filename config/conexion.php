<?php

//! prod
// $host = "localhost";
// $basededatos = "id20421237_arteriaddbb";
// $usuariodb = "id20421237_arteriauser";
// $clavedb = "lZI}c_Djn-1=Wcb5";

//! local
$host = "localhost";
$basededatos = "id20421237_arteriaddbb";
$usuariodb = "root";
$clavedb = "Pa22w0rd";

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