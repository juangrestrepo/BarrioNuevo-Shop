<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis:200|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">
<link rel="icon" type="text/css" href="images/manzana.jpg">
<head>
	<title>Catálogo</title>
</head>
<body>	
<header>
	<a href="index.php" class="titulo" style="padding: 10px;">BARRIONUEVO SHOP </a>
<!--EMPIEZA FORMULARIO DE INICIO DE SESIÓN -->
<br><br><br><div class="container inicio">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Iniciar sesión</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    

    <form class="form-horizontal" method="POST" action="servidor.php">
  <fieldset>
    <legend>Ingresa</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Email</label>

      <div class="col-md-10">
        <input type="email" class="form-control"  placeholder="Email" name="correousu">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword" class="col-md-2 control-label">Contraseña</label>

      <div class="col-md-10">
        <input type="password" class="form-control" placeholder="contraseña" name="claveusu">
        </div>
        </div>
        <a href="registro.php">¿No estás registrado?</a>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           <button type="submit" class="btn btn-primary navbar-inverse ">Iniciar</button>
        </div>
      </div>
      </fieldset>
      </form>
      <!--TERMINA FORMULARIO DE INICIO DE SESIÓN -->


</header>
		<div>
		</div>
		<div class='headi'>
			
		</div>

		<h1 align="center" class="tituregistro">DATOS INCORRECTOS</h1><br>
<br>
<footer>

	<div class="site-footer"><br>
		<h3 class="mapa">Servicios</h3>
   			<li><a href="catalogo.php">Catálogo</a></li> 
			<li><a href="">Compra</a></li> 

		<h3 class="mapa">Nosotros</h3>
	        <li><a href="quienes.php"  >¿Quienes Somos?</a></li> <br>

		<h3 class="mapa">Contacto</h3>
			<li><a href="contacto.php">Contáctenos</a> </li><br>
		© 2017 ERIKA MARÍN<br>
	<a href="http://www.facebook.com" c> <img src="images/fb.jpg" class="fb" align="center"> </a></div>
</footer>
</html>
</html>