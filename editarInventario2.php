<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis:200|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">
	<title>Busqueda</title>
</head>
<body>
<?php
include_once("conexion.php");
$id=$_REQUEST['id'];
$nombre=$_REQUEST['nombre'];
$cantidad=$_REQUEST['cantidad'];
$precioCompra=$_REQUEST['precio_compra'];
$precioVenta=$_REQUEST['precio_venta'];
$consulta="UPDATE producto SET id='$id',nombre='$nombre', cantidad='$cantidad', precio_compra='$precioCompra', precio_venta='$precioVenta'where id=".$id;
$resultado=mysqli_query($conexion,$consulta) or die ("No se pudo ejecutar la consulta.");
echo "<p align='center'>REGISTRO ACTUALIZADO<br></p>";
header("location:agregar_inventario.php");
?>

</body>
</html>