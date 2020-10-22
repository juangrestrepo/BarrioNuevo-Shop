<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<title></title>
</head>
<body>


<?php
include_once("conexion.php");
$cedula=$_REQUEST['cedula'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$direccion=$_REQUEST['direccion'];
$telefono=$_REQUEST['telefono'];
$correo=$_REQUEST['correo'];
$claveusu=$_REQUEST['claveusu'];
$consulta="INSERT INTO personas(cedula, nombre, apellido, direccion, telefono, correo, claveusu, tipousu) values('$cedula', '$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$claveusu',1)";
$resultado=mysqli_query($conexion,$consulta )or die("no se puede ingresar al servidor");
echo "".$nombre.$apellido;
?>

<H1 align="center">Registro Exitoso</H1>
<meta http-equiv="REFRESH" content="2; URL=index.php">

</body>
</html>