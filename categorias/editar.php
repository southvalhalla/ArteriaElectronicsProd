<?php
include "../log/conexion.php"
include_once("index.php");

$codigo = $_GET['cod'];

$querybuscar = mysqli_query($conexion, "SELECT * FROM categorias WHERE cod=$codigo");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['cod'];    
    $tipo_pro = $mostrar['tipo_pro'];
    $carac = $mostrar['carac'];
   
}
?>
<html>
<head>
    <title> arteria </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

    </head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar categoria</th></tr>
            <tr> 
                <td>id</td>
                <td><input type="number" name="txtcodigo" value="<?php echo $codigo;?>" required></td>
            </tr>
            <tr> 
                <td>Tipo Producto</td>
                <td><input type="text" name="txttipo_pro" value="<?php echo $tipo_pro;?>" required></td>
            </tr>
            <tr> 
                <td>Caracteristicas</td>
                <td><input type="text" name="txtcarac" value="<?php echo $carac;?>" required></td>
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

    if(isset($_POST['btnmodificar']))
    {
        $codigo1 = $_POST['txtcodigo'];     
        $tipo_pro2 = $_POST['txttipo_pro'];
        $carac3 = $_POST['txtcarac'];
        
        $querymodificar = mysqli_query($conexion, "UPDATE categorias SET tipo_pro='$tipo_pro2',carac='$carac3' WHERE cod='$codigo1'");

        echo"<script>window.location= 'index.php' </script>";

    }
    ?>
