<?php
    include_once "../config/conexion.php"; 
$page = 1;
?>

<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="../comple/style.css">
    </head>
    <body class="bg-dark bg-gradient">
        <?php
            include('../comple/navBar.php');
        ?>
        <table class="table table-dark table-striped table-hover d-flex justify-content-center border-secondary rounded ">
            
            <div id="barrabuscar" class="ms-2 form-group">
                <form method="POST">
                    <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar nombre de producto" class="form form-control w-25"><input type="submit" value="Buscar" class="btn btn-success mt-2" name="btnbuscar">
                </form>
            </div>
            <tr><th colspan="9" class="text-center"><h1>LISTA DE PRODUCTOS</h1><th><a class="btn btn-primary mt-2" onclick="abrirform()">Agregar</a></th></tr>
            <tr>
                <th>no.</th>
                <th>Codigo</th>
                <th>Nombre producto</th>
                <th>id categoria</th>
                <th>Marca</th>
                <th>precio</th>
                <th>imagenes</th>
                <th>Fecha fabricacion</th>
                <th>Descripcion</th>
                <th>Accion</th>
                
            </tr> 
            <?php 

                if(isset($_POST['btnbuscar'])){
                    $buscar = $_POST['txtbuscar'];
                    $queryusuarios = mysqli_query($conexion, "SELECT no_,cod,nom_pro,id_catego,marca,precio,imagenes,fecha_fab,descripcion FROM productos where nom_pro like '".$buscar."%'");
                }
                else{
                    $queryusuarios = mysqli_query($conexion, "SELECT * FROM productos ORDER BY no_ asc");
                }
                $numerofila = 0;
                while($mostrar = mysqli_fetch_array($queryusuarios)){   
                    $numerofila++;
            ?>                        
                    <tr>
                     <td><?= $numerofila ?></td>
                     <td><?= $mostrar['cod'] ?></td>
                     <td><?= $mostrar['nom_pro'] ?></td>
                     <td><?= $mostrar['id_catego'] ?></td>
                     <td><?= $mostrar['marca'] ?></td>
                     <td><?= $mostrar['precio'] ?></td>
                     <td><?= $mostrar['imagenes'] ?></td>
                     <td><?= $mostrar['fecha_fab'] ?></td>
                     <td><?= $mostrar['descripcion'] ?></td> 
                     <td style='width:26%'><a class='btn btn-success' href= <?= "editar.php?cod=$mostrar[cod]" ?>>Modificar</a> | <a class='btn btn-danger' href=<?= "eliminar.php?cod=$mostrar[cod]" ?> onClick=<?="return confirm('¿Estás seguro de eliminar a $mostrar[nom_pro]?')"?>>Eliminar</a></td></tr>
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
        <div class="caja_popup bg-body-secondary border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle w-50 h-75" id="formregistrar">
            <form action="agregar.php" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Nuevo Producto</th></tr>
                    <tr>
                        <td>Codigo</td>
                        <td><input class="form-control" type="number" name="txtcod" required></td>
                    </tr>
                    <tr>
                        <td>Nombre producto</td>
                        <td><input class="form-control" type="text" name="txtnom_pro" required></td>
                    </tr>
                    <tr>
                        <td>Nombre categoria</td>
                        <td>
                            <select class="form-select" name="txtid_catego">                     
                            <?php
                                $sql='SELECT * FROM categorias';
                                $query=mysqli_query($conexion,$sql);
                                while($row=mysqli_fetch_array($query)){
                                    $cod =$row['cod'];
                                    $tipo_pro =$row['tipo_pro'];
                                    
                                ?>
                                    <option value="<?php echo $cod; ?>"><?php echo $cod.' - '.$tipo_pro; ?></option>
                                <?php
                                }
                            ?>
                            </select>   
                        <td>
                    </tr>
                    <tr>
                        <td>Marca</td>
                        <td><input class="form-control" type="text" name="txtmarca" required></td>
                    </tr>
                    <tr>
                        <td>Precio</td>
                        <td><input class="form-control" type="number" name="txtprecio" required></td>
                    </tr>
                    <tr>
                        <td>Imagenes</td>
                        <td><input class="form-control form-control-sm" type="file" name="txtimagenes" required></td>
                    </tr>
                    <tr>
                        <td>Fecha Fabricacion</td>
                        <td><input class="form-control" type="date" name="txtfecha_fab" required></td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td><input class="form-control" type="text" name="txtdescripcion" required></td>
                    </tr>
                
                    <tr> 	
                        <td colspan="2">
                            <button  class="btn btn-danger" type="button" onclick="cancelarform()">Cancelar</button>
                            <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este producto?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

