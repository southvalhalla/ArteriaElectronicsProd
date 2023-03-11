<?php include "../log/conexion.php"

    $cod = rand(5555,9999);
    $fecha = $_POST['txtfecha'];
    $cliente = $_POST['txtcliente'];
    $estado = "Pendiente";
    $metodo = $_POST['txtmetodo'];
    $precio = $_POST['txtprecio'];

    mysqli_query($conexion,"INSERT INTO compras(cod,fecha,IDcliente,estadoPedido,metodoPago,precioTotal) Values('$cod','$fecha','$cliente','$estado','$metodo','$precio')");
    
    header("Location:index.php");
    ?>