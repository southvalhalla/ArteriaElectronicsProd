<?php include "../log/conexion.php"

    $numdoc = $_POST['txtcod'];
    $nombre = $_POST['txtnombre'];
    $apellido = $_POST['txtapellido'];
    $ciudad = $_POST['txtciudad'];
    $direccion = $_POST['txtdireccion'];
    $telefono = $_POST['txttelefono'];
    $codigoPostal = $_POST['txtcodigo'];
    $correo = $_POST['txtcorreo'];
    $contrasena = $_POST['txtcontrasena'];
    

    mysqli_query($conexion,"INSERT INTO usuario(cod,nombre,apellido,ciudad,direccion,telefono,codigo_postal,correo_cliente,contrasena) Values('$numdoc','$nombre','$apellido','$ciudad','$direccion','$telefono','$codigoPostal','$correo','$contrasena')");
    
    header("Location:index.php");

    ?>