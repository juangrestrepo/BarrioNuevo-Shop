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
<body>
<?php
include_once("conexion.php");
session_start();
if ($_SESSION['tipousu']==2) {

}
else{
	header("location: index.php");
}
error_reporting(E_ALL ^ E_NOTICE);
$id=$_REQUEST['id'];
if ($id>0) {
	$consulta="SELECT * FROM factura where id=".$id;
	$result=$conexion->query($consulta);

	$rows=$result->num_rows;
	if ($rows>0) {
	$eliminar="DELETE FROM factura where id=".$id;
	$res=mysqli_query($conexion, $eliminar)or die("no se pudo eliminar registro");
	echo "<h1 align='center' class='cedulaNoExiste'>Registro eliminado</h1>";
	echo "<meta http-equiv='refresh' content='0.7; URL=ver_pedidos.php'>";
	}
	else{
		echo "<h1 align='center' class='cedulaNoExiste'>La cédula no existe</h1>";
		echo "<meta http-equiv='refresh' content='1.5; URL=eliminar.php'>";

	}
}


?>
</body>
</html>