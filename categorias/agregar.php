<?php include "../config/conexion.php";

    $tipo_pro = $_POST['txttipo_pro'];
    $carac = $_POST['txtcarac'];
    

    mysqli_query($conexion,"INSERT INTO categorias(tipo_pro,carac) Values('$tipo_pro','$carac')");
    
    header("Location:index.php");

    ?>