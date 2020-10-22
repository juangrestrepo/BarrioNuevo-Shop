<?php
include_once("conexion.php");
include_once("carrito2.php");
$datos=$_SESSION['carrito'];
$nombre = $_SESSION['nombre'];
$cedula=$_SESSION['idNombre'];
$total=$_SESSION['total'];
$entrada=array("identidad"=>"$cedula", "totalm"=>"$total");
$consulta=$conexion->prepare("call crearfactura(?,?)");
$consulta->bind_param("ii", $entrada['identidad'], $entrada['totalm']);
$consulta->execute();
$consulta->close();
for ($i=0; $i <count($datos) ; $i++) { 

$produ=$datos[$i]['Id'];
$cantidad=$datos[$i]['Cantidad'];
$producto=$datos[$i]['Nombre'];
$subtotal=$datos[$i]['Cantidad']*$datos[$i]['Precio'];
$entrada2=array("identipro"=>"$produ","nombres"=>"$producto","cantidadpro"=>"$cantidad", "subtotales"=>"$subtotal");
$consulta2=$conexion->prepare("call detallado(?,?,?,?)");
$consulta2->bind_param("isii",$entrada2['identipro'],$entrada2['nombres'], $entrada2['cantidadpro'],$entrada2['subtotales']);
$consulta2->execute();
$consulta2->close();


}
$conexion->close();



?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<title>registro factura</title>
</head>
<body>
<meta http-equiv="REFRESH" content="3; URL=factura.php">
</body>
</html>

?>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis:200|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/scripts.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">

<head>
	<title>Catálogo</title>
</head>
<body>	
<header>
	<p class="titulo" style="padding: 10px;">BARRIONUEVO SHOP </p>
</head>

<a href="cierre.php"><img src="images/cierre.jpg" class="cierreSesion" title="Cerrar sesión"> </a><br>
<body>
<!--EMPIEZA FORMULARIO DE INICIO DE SESIÓN -->
<!--TERMINA FORMULARIO DE INICIO DE SESIÓN -->
</header>
		<div>
		<div>
		</div>
		<div class='headi'>
			<ul>
				<li><a href="index.php" >Inicio</a></li> 
				<li><a href="" class="current"  >Catálogo</a></li> 
				<li><a href="quienes.php">¿Quiénes somos?</a></li> 
				<li><a href="contacto.php">Contáctenos</a> </li>
                
			</ul>
		</div>
	<section>
		
	<h1 class="cedulaNoExiste" align="center">Muchas gracias por su compra!<br>Espera 3 segundos para obtener tu factura<br>O</h1>
	<article align="center">
	<a href="productos.php" class="quienes" align="center">Seguir comprando</a>
	</article>
	<meta http-equiv="REFRESH" content="3; URL=factura.php">