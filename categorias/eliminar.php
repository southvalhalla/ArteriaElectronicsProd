<?php
include "../log/conexion.php"

$cod = $_GET['cod'];

mysqli_query($conexion, "DELETE FROM categorias WHERE cod=$cod");

header("Location:index.php");

?>