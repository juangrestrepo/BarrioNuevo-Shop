<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://fonts.googleapis.com/css?family=Dosis|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">

	<title class="welcome">Busqueda</title>
</head>
<body>
<?php
include_once("conexion.php");
session_start();

if (isset($_SESSION['entrar'])){

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

    if ($date < 12) {echo "<section class='welcome'>Buenos días, ".$nombre."</section><br>";}
    else if ($date < 18) {echo "<section class='welcome'>Buenas tardes, ".$nombre."</section><br>";}
    else {echo "<section class='welcome'>Buenas noches, ".$nombre."</section><br>";}
    
	}

$tabla="";
$query="SELECT * FROM personas ORDER BY cedula";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['personas']))
{

	$q=$conexion->real_escape_string($_POST['personas']);
	$query="SELECT * FROM personas WHERE 
	    cedula LIKE '%".$q."%' OR
	    nombre LIKE '%".$q."%' OR
		apellido LIKE '%".$q."%' OR
		direccion LIKE '%".$q."%' OR
		telefono LIKE '%".$q."%' OR
		correo LIKE '%".$q."%'";
}

$buscarpersonas=$conexion->query($query);
if ($buscarpersonas->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary tabla">
			<td>Cédula</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Direccion</td>
			<td>Teléfono</td>
			<td>Correo</td>
			<td></td>
			<td></td>

		</tr>';

	while($filapersonas= $buscarpersonas->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filapersonas['cedula'].'</td>
			<td>'.$filapersonas['nombre'].'</td>
			<td>'.$filapersonas['apellido'].'</td>
			<td>'.$filapersonas['direccion'].'</td>
			<td>'.$filapersonas['telefono'].'</td>
			<td>'.$filapersonas['correo'].'</td>
			<td>'."<a href=editar.php?ID=".$filapersonas['cedula'].">editar</a>".'</td>
			<td>'."<a href=eliminar2.php?ID=".$filapersonas['cedula'].">Eliminar</a>".'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;

?>



</body>
</html>
<?php
ob_end_flush();
?>