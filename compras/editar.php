<?php
include "../config/conexion.php";
include_once("index.php");

$codigo = $_GET['cod'];

$querybuscar = mysqli_query($conexion, "SELECT * FROM compras WHERE cod=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar)){

    $cod = $mostrar['cod'];
    $fecha = $mostrar['fecha'];
    $estado = $mostrar['estadoPedido'];
    $metodo = $mostrar['metodoPago'];
    $precio = $mostrar['precioTotal'];
}
?>
<html>
<head>
    <title> Arteria </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="caja_popup2" id="formmodificar">
        <form method="POST" class="contenedor_popup" >
            <table>
                <tr><th colspan="2">Modificar pedido</th></tr>
                <tr>
                    <td>Fecha</td>
                    <td><input type="date" name="txtfecha" value="<?php echo $fecha;?>" required></td>
                </tr>
                <tr>
                    <td>Estado del Pedido</td>
                    <td>
                        <!--<input list="estados" id="estados" name="txtestado" value="<?php // echo $estado;?>" required>-->
                        <select name="txtestado">
                            <option value="<?php echo $estado;?>" style="color: green;"><?php echo $estado;?></option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Alistando">Alistando</option>
                            <option value="Enviado">Enviado</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Metodo de pago</td>
                    <td>
                        <select name="txtmetodo">
                            <option value="<?php echo $metodo;?>" style="color: green;"><?php echo $metodo;?></option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta">Tarjeta</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Precio Total</td>
                    <td><input type="number" name="txtprecio" value="<?php echo $precio;?>" required></td>
                </tr>
                <tr> 	
                    <td colspan="2">
                        <a href="index.php">Cancelar</a>
                        <input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('Deseas modificar a este usuario?');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['btnmodificar'])){
        
        $cod1 = $_GET['cod'];
        $fecha1 = $_POST['txtfecha'];
        $estado1 = $_POST['txtestado'];
        $metodo1 = $_POST['txtmetodo'];
        $precio1 = $_POST['txtprecio'];

        $querymodificar = mysqli_query($conexion, "UPDATE compras SET fecha='$fecha1',estadoPedido='$estado1',metodoPago='$metodo1',precioTotal='$precio1' WHERE cod=$cod1");

        echo"<script>window.location= 'index.php' </script>";

    }
    ?>