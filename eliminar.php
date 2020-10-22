<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis:200|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">
<head>
	<title class="welcome">Eliminación</title>
	<a href="cierre.php"><img src="images/cierre.jpg" class="cierreSesion" title="Cerrar sesión"> </a><br>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	</head>
	<body>
		<header>
			<p class="titulo" >BARRIONUEVO SHOP </p>
			</div>
		</header><br>
			<h2 class="busqueda">Eliminación</h2>
		<section>
<?php
include("conexion.php");
session_start();
if (isset($_SESSION['entrar'])) {

	$nombre = $_SESSION['nombre'];
	$correo = $_SESSION['usuario'];
	$sql="SELECT nombre FROM personas WHERE correo='$correo'";
	$resultado=$conexion->query($sql);
	$rows=$resultado->num_rows;
	$rows=$resultado->fetch_assoc();
	$perfil=$rows['nombre'];
	$nombre=$rows['nombre'];

	date_default_timezone_set ('America/Bogota');
    $date = date ("H");

    if ($date < 12) {echo "<section class='welcome'>Buenos días, ".$nombre."</section>";}
    else if ($date < 18) {echo "<section class='welcome'>Buenas tardes, ".$nombre."</section>";}
    else {echo "<section class='welcome'>Buenas noches, ".$nombre."</section>";}
if ($_SESSION['tipousu']==2) {

}
else{
	header("location: index.php");
}
}
?>
<br><br>
<form method="POST" action="eliminar2.php" align="center" class="formularioEditar">
	<p>Ingrese el número de cédula de quien desea eliminar</p>
	<br>
	<input type="num" name="cedula" value="" placeholder="Cédula">
	<input type="submit" value="Eliminar">
	
</form>
</body>
</html>