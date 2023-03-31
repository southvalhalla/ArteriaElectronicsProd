<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="comple/style.css" rel="stylesheet">

    <title>Arteria</title>
    <style>
		img {
            width: 100vw;
            height: auto;
        }   
        body {
            height: 100%;
            overflow: hidden;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-black">

    <?php
        $page = 0;
        include('comple/navBar.php');
    ?>
    <div class="w-25 h-25 mx-auto">
        <img src="imagenes/logo_negro.jpg" alt="Descripción de la imagen" class="w-100 h-100 mx-auto">
    </div>
    <div class="row my-2">
        <div class="col-10 offset-1">
            <form method="POST" action="" class="text-white" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <label class="text-center" for="doc">BUSQUEDA</label>
                        </div>
                        <div class="col-3">
                            <select name="tipo" class="form-select">
                                <option value="nombre">Nombre/Tipo</option>
                                <option value="documento">Documento/ID</option>                        
                            </select>
                        </div>
                        <div class="col-2">
                            <select name="selec" class="form-select">
                                <option value="usuario">Usuarios</option>
                                <option value="compras">Compras</option>
                                <option value="categorias">Categorias</option>
                                <option value="productos">Productos</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <input type="text" name="doc" id="doc" class="form-control">
                        </div>
                        <div class="col-1">
                            <input class="btn btn-primary" type="submit" value="Consultar" name="btn_consultar">
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-white">
            <?php
                include_once "config/conexion.php"; 

                $doc = "";
                $select = "";
                $tipo = "";
                if(isset($_POST['btn_consultar'])){
                    $doc = $_POST['doc'];
                    $selec = $_POST['selec'];
                    $tipo = $_POST['tipo'];
                    $existe = 0;
                    if ($tipo == "documento"){
                        if($selec=="usuario"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM usuario WHERE cod = '$doc'");
                                ?>
                                <table class="border border-white">
                                    <thead class="bg-white text-black">
                                        <tr>
                                            <th colspan="8">Usuarios</th>
                                        </tr>
                                        <tr>
                                            <th>Num Documento</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Ciudad</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Codigo postal</th>
                                            <th>Correo</th>
                                        </tr> 
                                    </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $consulta['cod'] ?></td>
                                            <td><?= $consulta['nombre'] ?></td>
                                            <td><?= $consulta['apellido'] ?></td>
                                            <td><?= $consulta['ciudad'] ?></td>
                                            <td><?= $consulta['direccion'] ?></td>
                                            <td><?= $consulta['telefono'] ?></td>
                                            <td><?= $consulta['codigo_postal'] ?></td>
                                            <td><?= $consulta['correo_cliente'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                    echo "el documento no existe";
                                }                                    
                            }
                        }
                        else if($selec=="compras"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM compras WHERE cod = '$doc'");
                                ?>
                                <table class="border border-white">
                                    <thead class="bg-white text-black">
                                        <tr colspan="6">
                                            COMPRAS
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>ID Cliente</th>
                                            <th>Estado del Pedido</th>
                                            <th>Metodo de Pago</th>
                                            <th>Precio Total</th>
                                        </tr>
                                    </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $consulta['cod'] ?></td>
                                            <td><?= $consulta['fecha'] ?></td>
                                            <td><?= $consulta['IDcliente'] ?></td>
                                            <td><?= $consulta['estadoPedido'] ?></td>
                                            <td><?= $consulta['metodoPago'] ?></td>
                                            <td><?= $consulta['precioTotal'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                    echo "el ID no existe";
                                }                                    
                            }
                        }    
                        else if($selec=="categorias"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM categorias WHERE cod = '$doc'");
                                ?>
                                <table class="border border-white">
                                <thead class="bg-white text-black">
                                    <tr colspan="3">
                                        CATEGORIAS
                                    </tr>
                                    <tr>
                                        <th>cod</th>
                                        <th>tipo_pro</th>
                                        <th>carac</th>
                                    </tr> 
                                </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                <tbody>
                                    <tr>
                                    <td><?= $consulta['cod'] ?></td>
                                    <td><?= $consulta['tipo_pro'] ?></td>
                                    <td><?= $consulta['carac'] ?></td>
                                    </tr>
                                </tbody>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                echo "el ID no existe";
                                }                                    
                            }
                        }    
                        else if($selec=="productos"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM productos WHERE cod = '$doc'");
                                ?>
                                <table class="border border-white">
                                <thead class="bg-white text-black">
                                    <tr colspan="8">
                                        PRODUCTOS
                                    </tr>
                                    <tr>
                                        <th>cod</th>
                                        <th>nom_pro</th>
                                        <th>id_catego</th>
                                        <th>marca</th>
                                        <th>precio</th>
                                        <th>imagenes</th>
                                        <th>fecha_fab</th>
                                        <th>descripcion</th>
                                    </tr> 
                                </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?= $consulta['cod'] ?></td>
                                        <td><?= $consulta['nom_pro'] ?></td>
                                        <td><?= $consulta['id_catego'] ?></td>
                                        <td><?= $consulta['marca'] ?></td>
                                        <td><?= $consulta['precio'] ?></td>
                                        <td><?= $consulta['imagenes'] ?></td>
                                        <td><?= $consulta['fecha_fab'] ?></td>
                                        <td><?= $consulta['descripcion'] ?></td>
                                    </tr>
                                </tbody>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                echo "el ID no existe";
                                }                                      
                            }                                    
                        }                        }                        if($tipo == 'nombre'){
                        if($selec=="usuario"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM usuario WHERE nombre = '$doc'");
                                ?>
                                <table class="border border-white">
                                <thead class="bg-white text-black">
                                    <tr>
                                        <th colspan="9">Usuarios</th>
                                    </tr>
                                    <tr class="bg-white text-black">
                                        <th>Num Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Ciudad</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Codigo postal</th>
                                        <th>Correo</th>
                                    </tr> 
                                </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?= $consulta['cod'] ?></td>
                                        <td><?= $consulta['nombre'] ?></td>
                                        <td><?= $consulta['apellido'] ?></td>
                                        <td><?= $consulta['ciudad'] ?></td>
                                        <td><?= $consulta['direccion'] ?></td>
                                        <td><?= $consulta['telefono'] ?></td>
                                        <td><?= $consulta['codigo_postal'] ?></td>
                                        <td><?= $consulta['correo_cliente'] ?></td>
                                    </tr>
                                </tbody>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                echo "el usuario no existe";
                                }                                    
                            }
                        }
                        else if($selec=="compras"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                echo "no se puede buscar nombre en la tabla de compras";                                    
                            }
                        }    
                        else if($selec=="categorias"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM categorias WHERE tipo_pro = '$doc'");
                                ?>
                                <table class="border border-white">
                                    <thead class="bg-white text-black">
                                        <tr colspan="3">
                                            CATEGORIAS
                                        </tr>
                                        <tr>
                                            <th>cod</th>
                                            <th>tipo_pro</th>
                                            <th>carac</th>
                                        </tr>
                                    </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $consulta['cod'] ?></td>
                                            <td><?= $consulta['tipo_pro'] ?></td>
                                            <td><?= $consulta['carac'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                echo "la categoria no existe";
                                }                                    
                            }
                        }    
                        else if($selec=="productos"){
                            if($doc == ""){
                                echo "Ingrese datos";
                            }else{
                                $resultados = mysqli_query($conexion,"SELECT * FROM productos WHERE nom_pro = '$doc'");
                                ?>
                                <table class="border border-white">
                                    <thead class="bg-white text-black">
                                    <tr class="bg-white text-black">
                                        <th>cod</th>
                                        <th>nom_pro</th>
                                        <th>id_catego</th>
                                        <th>marca</th>
                                        <th>precio</th>
                                        <th>imagenes</th>
                                        <th>fecha_fab</th>
                                        <th>descripcion</th>
                                    </tr> 
                                    </thead>
                                <?php while($consulta = mysqli_fetch_array($resultados)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $consulta['cod'] ?></td>
                                            <td><?= $consulta['nom_pro'] ?></td>
                                            <td><?= $consulta['id_catego'] ?></td>
                                            <td><?= $consulta['marca'] ?></td>
                                            <td><?= $consulta['precio'] ?></td>
                                            <td><?= $consulta['imagenes'] ?></td>
                                            <td><?= $consulta['fecha_fab'] ?></td>
                                            <td><?= $consulta['descripcion'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <?php $existe++;
                                }
                                if($existe==0){
                                echo "el producto no existe";
                                }                                      
                            }                                    
                        }                        }                      
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>