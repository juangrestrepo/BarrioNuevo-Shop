<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="URF-8">
	<title>Cambios</title>
</head>
<body>
<?php
include_once("conexion.php");
$cedula=$_REQUEST['cedula'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$direccion=$_REQUEST['direccion'];
$telefono=$_REQUEST['telefono'];
$correo=$_REQUEST['correos'];
$claveusu=$_REQUEST['claveusu'];
$consulta="UPDATE personas SET cedula='$cedula',nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', correo='$correo', claveusu='$claveusu' where cedula=".$cedula;
$resultado=mysqli_query($conexion,$consulta) or die ("No se pudo ejecutar la consulta.");
echo "<p align='center'>REGISTRO ACTUALIZADO<br></p>";
?>
<meta http-equiv="refresh" content="1; URL=bus.php">

</body>
</html>