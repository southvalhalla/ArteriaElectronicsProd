<?php
$host = "localhost";
$basededatos = "id20421237_arteriaddbb";
$usuariodb = "id20421237_arteriauser";
$clavedb = "lZI}c_Djn-1=Wcb5";

$conexion = mysqli_connect($host, $usuariodb, $clavedb, $basededatos);

if (!$conexion) {
    die("Error en la conexion: " . mysqli_connect_error());
} else {
    echo "";
}
$error;
?>