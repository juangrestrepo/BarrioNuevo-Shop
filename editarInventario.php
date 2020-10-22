<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">
	<title class="welcome">Búsqueda</title>
	<a href="cierre.php"><img src="images/cierre.jpg" class="cierreSesion" title="Cerrar sesión"> </a><br>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!-- SCRIPTS JS-->
		<script src="peticion.js"></script>
	</head>
	<body>
		<header>
			<p class="titulo" >BARRIONUEVO SHOP </p>
			</div>
		</header><br>
			<h2 class="busqueda">Editar Inventario</h2>
			<section>

<?php
include_once("conexion.php");
session_start();
if (isset($_SESSION['entrar'])) {
$id =$_REQUEST['id'];

if ($id >0) {
$consulta="SELECT * FROM producto where id=".$id;
$resultado=mysqli_query($conexion, $consulta)or die("error al conectar con la base de datos");

	$nombre = $_SESSION['nombre'];
	$correo = $_SESSION['usuario'];
	$sql="SELECT nombre FROM personas WHERE correo='$correo'";
	$resultado1=$conexion->query($sql);
	$rows=$resultado1->num_rows;
	$rows=$resultado1->fetch_assoc();
	$perfil=$rows['nombre'];
	$nombre=$rows['nombre'];

	date_default_timezone_set ('America/Bogota');
    $date = date ("H");

    if ($date < 12) {echo "<section class='welcome'>Buenos días, ".$nombre."</section>";}
    else if ($date < 18) {echo "<section class='welcome'>Buenas tardes, ".$nombre."</section>";}
    else {echo "<section class='welcome'>Buenas noches, ".$nombre."</section>";}

if (mysqli_num_rows($resultado)>0) {
	echo "&nbsp";

while ($fila=mysqli_fetch_array($resultado)) {
extract($fila);

	?>
	<h1 class="tituEditar">FORMULARIO DE MODIFICACIÓN</h1>
	<p><br>
	<form method="POST" name="frmdatos" action="editarInventario2.php"class="formularioEditar">

	<div>
	<label>ID</label>
	<input  name="id" type="number" id="txtcedula" value="<?php echo $fila['id'];?>">
	</div>

	<div>
	<label>Nombre</label>
	<input name="nombre" type="text" id="txtNombre" value="<?php echo $fila['nombre'];?>">
	</div>

	<div>
	<label>Cantidad</label>
	<input name="cantidad" type="text" id="txtEdad" value="<?php echo $fila['cantidad'];?>">
	</div>

	<div>
	<label>Precio de compra</label>
	<input  name="precio_compra" type="varchar" id="numdireccion" value="<?php echo $fila['precio_compra'];?>">
	</div>

	<div>
	<label>Precio de venta</label>
	<input  name="precio_venta" type="varchar" id="numdireccion" value="<?php echo $fila['precio_venta'];?>">
	</div>
<p>
<div align="center">
  <button type="submit" class="btn btn-default btn-lg">Actualizar</button>
  <a href="bus.php" class="btn ">Volver</a>
</div>
</form>
</section>
<?php
}
}

}
else
{
	echo "<p align='center'>Producto no encontrado</p>";
}
}
?>
</body>
</html>
