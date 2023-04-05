<?php
    include_once "../config/conexion.php"; 
    $page = 1;
?>
<html>
    <style>
        
    </style>
    <head>    
        <title>Arteria</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="../comple/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <?php include('../comple/navBar.php'); ?>
        <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
            <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de categoria" class="form form-control w-25"><input type="submit" value="Buscar" name="btnbuscar" class="btn btn-success mt-2">
                </form>
            </div>
            <tr><th colspan="4" class="text-center"><h1>categorias</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
            <tr>
            
                <th>#</th>    
                <th>id</th>
                <th>Tipo de Producto</th>
                <th>Caracteristicas</th>
                <th>Accion</th>
                
            </tr> 
            <?php 

                if(isset($_POST['btnbuscar'])){
                    $buscar = $_POST['txtbuscar'];
                    $queryusuarios = mysqli_query($conexion, "SELECT id,tipo_pro,carac FROM categorias where tipo_pro like '".$buscar."%'");
                }
                else{
                    $queryusuarios = mysqli_query($conexion, "SELECT * FROM categorias ORDER BY id asc");
                }
                $numerofila = 0;
                while($mostrar = mysqli_fetch_array($queryusuarios)){   
                    $numerofila++;
            ?>
                    <tr>       
                    <td><?= $numerofila ?></td>         
                    <td><?= $mostrar['id'] ?></td>                
                    <td><?= $mostrar['tipo_pro'] ?></td>
                    <td><?= $mostrar['carac'] ?></td>
                    <td style='width:auto'><a class='btn btn-success' href=<?= "editar.php?id=$mostrar[id]" ?> >Modificar</a> | <a class='btn btn-danger' href=<?= "eliminar.php?id=$mostrar[id]" ?> onClick=<?= "return confirm('¿Estás seguro de eliminar a $mostrar[tipo_pro]?')" ?> >Eliminar</a></td> 
            <?php } ?>
        </table>
        <script>
            function abrirform() {
                document.getElementById("formregistrar").style.display = "block";
            }

            function cancelarform() {
                document.getElementById("formregistrar").style.display = "none";
            } 

        </script>
        <div class="caja_popup" id="formregistrar">
            <form action="agregar.php" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Categoria</th></tr>
                    <tr>
                        <td>tipo_producto</td>
                        <td><input type="text" name="txttipo_pro" required></td>
                    </tr>
                    <tr>
                        <td>caracteristicas</td>
                        <td><input type="text" name="txtcarac" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button type="button" onclick="cancelarform()">Cancelar</button>
                            <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registraresta categoria?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

