<?php
include "../log/conexion.php"
include_once("index.php");

$codigo = $_GET['cod'];

$querybuscar = mysqli_query($conexion, "SELECT * FROM productos WHERE cod=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar)){

    $cod = $mostrar['cod'];
    $nom_pro = $mostrar['nom_pro'];
    $marca = $mostrar['marca'];
    $precio = $mostrar['precio'];
    $imagenes = $mostrar['imagenes'];
    $fecha_fab = $mostrar['fecha_fab'];
    $descripcion = $mostrar['descripcion'];
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
                <tr><th colspan="2">Modificar Producto</th></tr>
                <td>Codigo</td>
                    <td><input type="number" name="txtcod" value="<?php echo $cod;?>" required></td>
                </tr>
                <tr>
                    <td>Nombre producto</td>
                    <td><input type="text" name="txtnom_pro" value="<?php echo $nom_pro;?>" required></td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td><input type="text" name="txtmarca" value="<?php echo $marca;?>" required></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="number" name="txtprecio" value="<?php echo $precio;?>" required></td>
                </tr>
                <tr>
                    <td>Imagenes</td>
                    <td><input type="text" name="txtimagenes" value="<?php echo $imagenes;?>" required></td>
                </tr>
                <tr>
                    <td>Fecha Fabricacion</td>
                    <td><input type="date" name="txtfecha_fab" value="<?php echo $fecha_fab;?>" required></td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><input type="text" name="txtdescripcion" value="<?php echo $descripcion;?>" required></td>
                </tr>
                <tr> 	
                    <td colspan="2">
                        <a href="index.php">Cancelar</a>
                        <input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('Deseas modificar a este producto?');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['btnmodificar'])){
        
        $cod1 = $_POST['txtcod'];
        $nom_pro2 = $_POST['txtnom_pro'];
        $marca3 = $_POST['txtmarca'];
        $precio4 = $_POST['txtprecio'];
        $imagenes5 = $_POST['txtimagenes'];
        $fecha_fab6 = $_POST['txtfecha_fab'];
        $descripcion7 = $_POST['txtdescripcion'];

        $querymodificar = mysqli_query($conexion, "UPDATE productos SET nom_pro=' $nom_pro2',marca='$marca3',precio=' $precio4',precio=' $precio4',imagenes=' $imagenes5',descripcion='$descripcion7' WHERE cod=$cod1");

        echo"<script>window.location= 'index.php' </script>";

    }
    ?>