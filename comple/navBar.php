
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php
  if ($page == 0) {
    $home = "inicio.php";
    $sales = "compras/index.php";
    $products = "productos/index.php";
    $users = "usuario/index.php";
    $categories = "categorias/index.php";
  } else {
    $home = "../inicio.php";
    $sales = "../compras/index.php";
    $products = "../productos/index.php";
    $users = "../usuario/index.php";
    $categories = "../categorias/index.php";
  }
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= $home ?>">ArteriaElectronics</a>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href=<?= $categories ?> >Categorias</a>
      <li class="nav-item">
        <a class="nav-link" href=<?= $sales ?> >Compras</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href=<?= $products ?> >Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=<?= $users ?> >Usuario</a>
      </li> 
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link btn btn-outline-success my-2 my-sm-0" href="../index.php">Cerrar sesión</a>
      </li>
      
    </ul>
  </div>
</nav>






