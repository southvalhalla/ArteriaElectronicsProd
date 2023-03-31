<?php
    include_once "../config/conexion.php"; 
    $page = 1;
?>
<html>
    <head>    
		<title>Arteria</title>
		<meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="../comple/style.css" rel="stylesheet">
    </head>
    <body class="bg-dark bg-gradient">
                <?php
                    include('../comple/navBar.php');
                ?>
        <div id="barrabuscar" class="mx-auto my-3">
            <form method="POST" class="">
                <div class="row">
                    <div class="col-4 offset-3">
                        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="Ingresar usuario" class="form form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-dark table-striped table-hover text-center justify-content-center border-secondary rounded mx-auto" style="width: auto;">
            <tr>
                <th colspan="6" class="text-center"><h1>LISTAR COMPRAS</h1></th>
                <th>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary mt-2" onclick="abrirform()">Agregar</button>
                        </div>
                        <div class="col-6">
                            <a href="genratepdf.php">
                                <button class="btn btn-info mt-2"">Informe</button>
                            </a>
                        </div>
                    </div>
                    
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>ID Cliente</th>
                <th>Estado Pedido</th>
                <th>metodo de pago</th>
                <th>Precio Total</th>
                <th>Accion</th>
            </tr> 
            <?php 

                if(isset($_POST['btnbuscar'])){
                    $buscar = $_POST['txtbuscar'];
                    $queryusuarios = mysqli_query($conexion, "SELECT cod,fecha,estadoPedido,precioTotal FROM compras where cod like '".$buscar."%'");
                }
                else{
                    $queryusuarios = mysqli_query($conexion, "SELECT * FROM compras ORDER BY fecha asc");
                }
                while($mostrar = mysqli_fetch_array($queryusuarios)){   
                ?>
                <tr>
                    <td><?= $mostrar['cod'] ?></td>
                    <td><?= $mostrar['fecha'] ?></td>
                    <td><?= $mostrar['IDcliente'] ?></td>
                    <td><?= $mostrar['estadoPedido'] ?></td>
                    <td><?= $mostrar['metodoPago'] ?></td>
                    <td><?= $mostrar['precioTotal'] ?></td>
                    <td style='width:26%'>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?= "editar.php?cod=$mostrar[cod]" ?>">
                                    <button class='btn btn-success'>Modificar</button>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= "eliminar.php?cod=$mostrar[cod]" ?>">
                                    <button class='btn btn-danger' onClick=<?="return confirm('¿Estás seguro de eliminar a $mostrar[cod]?')"?>>Eliminar</button>
                                </a>
                            </div>
                        </div>
                        
                        
                    </td>";           
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
        <div class="caja_popup bg-body-secondary  border border-4 border-primary-subtle rounded position-absolute top-50 start-50 translate-middle w-50 h-50" id="formregistrar">
            <form action="agregar.php" class="contenedor_popup" method="POST">
                <table>
                    <tr><th colspan="2">Nueva Compra</th></tr>
                    <tr>
                        <td>Fecha</td>
                        <td><input class="form-control" type="date" name="txtfecha" required></td>
                    </tr>
                    <tr>
                        <td>Cliente</td>
                        <td>
                            <select class="form-select" name="txtcliente">
                            <?php
                                $sql='SELECT * FROM usuario';
                                $query=mysqli_query($conexion,$sql);
                                while($row=mysqli_fetch_array($query)){
                                    $id_client=$row['cod'];
                                    $nom_client=$row['nombre'];
                                    $ape_client=$row['apellido'];
                                ?>
                                    <option value="<?php echo $id_client ?>"><?php echo $id_client.' - '.$nom_client.' '.$ape_client; ?></option>
                                <?php
                                }
                            
                            ?>
                    
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodo de pago</td>
                        <td>
                            <select class="form-select" name="txtmetodo" required>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Precio Total</td>
                        <td><input class="form-control" type="number" name="txtprecio" required></td>
                    </tr>
                    <tr> 	
                        <td colspan="2">
                            <button class="btn btn-danger ms-50" type="button" onclick="cancelarform()">Cancelar</button>
                            <input class="btn btn-success" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm ('¿Deseas registrar a este usuario?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

