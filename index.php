 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arteria_login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		body {
			background-image: url('https://i.pinimg.com/originals/c7/4c/6c/c74c6c43ecedf84d4d7615de1d9287ef.jpg');
			background-repeat: no-repeat;
			background-size: cover;
      background-color: transparent;
		}
    .formulario {
	    margin-top
    }
  
    
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center mt-3 formulario" style="height:100vh;">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title text-center mb-4">Inicio de sesión</h3>
 
                <form class="transparent" action="log.php" method="POST">
                

                      <div class="form-group" >       
                        <label class="text-black" for="nickname">Usuario</label>
                        <input type="text" class="form-control is-valid" name="nickname"placeholder="Usuario">
                      </div>

                      <div class="form-group">
                        <label class="text-black" for="password">Contraseña</label>
                        <input type="password" class="form-control is-valid" name="password" placeholder="Contraseña">

                      </div>    
                        <?php
                        if(isset($_GET['error'])){
                            $error= $_GET['error'];
                        if($error == "incorrecto"){ ?>
                            <p class="alert alert-danger d-flex align-items-center">El Usuario o Contraseña no son correctos</p>
                        <?php } 
                        if ($error=="vacio"){ ?>
                          <p class="alert alert-danger d-flex align-items-center">Campo vacio</p>
                        <?php }
                        }
                        
                        ?>

                    <input name="btningresar" type="submit" class="btn btn-primary btn-block mt-4" value="Acceder">
                  
                </form> 
          </div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>