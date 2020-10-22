<?php
include_once ("conexion.php");
session_start();
if (isset($_SESSION['entrar'])){
	
?>
<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis:200|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylo.css">
<head>

	<title class="welcome">Búsqueda</title>
	<a href="cierre.php"><img src="images/cierre.jpg" class="cierreSesion" title="Cerrar sesión"> </a><br>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!-- SCRIPTS JS-->
		<script src="peticion.js"></script>
	</head>
	<body>
		<header>
			<p class="titulo_admin" >BARRIONUEVO SHOP </p>
		</header><br>
			<ul class="headi">
				<li><a href="agregar_inventario.php" >GESTIONAR INVENTARIO</a></li> 
				<li><a href="bus.php" class="current" >GESTIONAR PERSONAS</a></li>
				<li><a href="ver_pedidos.php" >GESTIONAR PEDIDOS</a></li>
				<li><a href="finanzas.php" >GESTIONAR FINANZAS</a></li>
  			</ul>
		<section>
			<h2 class="busqueda" align="center">Búsqueda</h2>
			
			<input class="busqueda_personas" align="center" type="text" name="busqueda" id="busqueda" >
		</section>

		<section id="tabla_resultado">
		<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
		</section>

		
	</body>
	</html>
	<?php
		}
else{
	header("location: restringido.php");
}
	?>

<br><br><br><br><br><br><br>

