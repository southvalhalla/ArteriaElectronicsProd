<?php
include "../log/conexion.php"

$codigo = $_GET['cod'];

mysqli_query($conexion, "DELETE FROM usuario WHERE cod=$codigo");

header("Location:index.php");

?>