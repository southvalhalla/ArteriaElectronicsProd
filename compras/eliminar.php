<?php
include "../config/conexion.php";

$codigo = $_GET['cod'];

mysqli_query($conexion, "DELETE FROM compras WHERE cod=$codigo");

header("Location:index.php");

?>