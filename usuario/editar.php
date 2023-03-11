<?php
include "../log/conexion.php"
include_once("index.php");

$codigo = $_GET['cod'];

$querybuscar = mysqli_query($conexion, "SELECT * FROM usuario WHERE cod=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar)){

    $numDoc = $mostrar['cod'];
    $nombre = $mostrar['nombre'];
    $apellido = $mostrar['apellido'];
    $ciudad = $mostrar['ciudad'];
    $direccion = $mostrar['direccion'];
    $telefono = $mostrar['telefono'];
    $codigoPostal = $mostrar['codigo_postal'];
    $correo = $mostrar['correo_cliente'];
    $contrasena = $mostrar['contrasena'];
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
                <tr><th colspan="2">Modificar usuario</th></tr>
                <tr>
                    <td>Num Documento</td>
                    <td><input type="number" name="txtdoc" value="<?php echo $numDoc;?>" required></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td><input type="text" name="txtapellido" value="<?php echo $apellido;?>" required></td>
                </tr>
                <tr>
                    <td>Ciudad</td>
                    <td><input type="text" name="txtciudad" value="<?php echo $ciudad;?>" required></td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td><input type="text" name="txtdireccion" value="<?php echo $direccion;?>" required></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input type="number" name="txttelefono" value="<?php echo $telefono;?>" required></td>
                </tr>
                <tr>
                    <td>Codigo postal</td>
                    <td><input type="number" name="txtcodigo" value="<?php echo $codigoPostal;?>" required></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><input type="email" name="txtcorreo" value="<?php echo $correo;?>" required></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input type="password" name="txtcontrasena" value="<?php echo $contrasena;?>" required></td>
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
        
        $numdoc1 = $_POST['txtdoc'];
        $nombre1 = $_POST['txtnombre'];
        $apellido1 = $_POST['txtapellido'];
        $ciudad1 = $_POST['txtciudad'];
        $direccion1 = $_POST['txtdireccion'];
        $telefono1 = $_POST['txttelefono'];
        $codigoPostal1 = $_POST['txtcodigo'];
        $correo1 = $_POST['txtcorreo'];
        $contrasena1 = $_POST['txtcontrasena'];

        $querymodificar = mysqli_query($conexion, "UPDATE usuario SET nombre='$nombre1',apellido='$apellido1',ciudad='$ciudad1',direccion='$direccion1',telefono='$telefono1',codigo_postal='$codigoPostal1',correo_cliente='$correo1',contrasena='$contrasena1' WHERE cod=$numdoc1");

        echo"<script>window.location= 'index.php' </script>";

    }
    ?>