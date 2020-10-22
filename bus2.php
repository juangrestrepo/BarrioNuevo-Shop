<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<title>Busqueda</title>
</head>
<body>


<?php
include_once("conexion.php");
$cedula=$_REQUEST['cedula'];
if ($cedula >0) {
$consulta="SELECT * FROM personas where cedula=".$cedula;
$resultado=mysqli_query($conexion, $consulta)or die("error al conectar con la base de datos");

if (mysqli_num_rows($resultado)>0) {
echo "<table width='438'border=1 align='center'";
	echo "<tr><td colspan='2' span class='style30'align='center'>Formulario de modificacion</td></tr>";

while ($fila=mysqli_fetch_array($resultado)) {
extract($fila);

	?>
	<form method="POST" name="frmdatos" action="bus3.php">
	<table width="438" border="1" align="center"><label>
	<tr>
	<td width="258"><span class="Estilo1">C&eacute;dula</span></td>
    <td width="364"><label>
    	
<input  name="cedula" type="number" id="txtcedula" value="<?php echo $fila['cedula'];?>"
/>

</label></td>
</tr>
<tr>
<td><span class="Estilo1">Nombre</span></td>
<td> <label>
<input  name="nombre" type="text" id="txtNombre" value="<?php echo $fila['nombre'];?>"
</label></td>
</tr>
<tr>
<td><span class="Estilo1">Apellido</span></td>
<td> <label>
<input  name="apellido" type="text" id="txtEdad" value="<?php echo $fila['apellido'];?>"
</label></td>
</tr>
<tr>
<td><span class="Estilo1">Direccion</span></td>
<td> <label>
<input  name="direccion" type="varchar" id="numdireccion" value="<?php echo $fila['direccion'];?>"
</label></td>
</tr>
<tr>
<td><span class="Estilo1">Telefono</span></td>
<td> <label>
<input  name="telefono" type="num" id="numtelefono" value="<?php echo $fila['telefono'];?>"
</label></td>
</tr>
<tr>
<td><span class="Estilo1">Correo</span></td>
<td> <label>
<input  name="correos" type="email" id="txtcorreo" value="<?php echo $fila['correo'];?>"
</label></td>
</tr>
<tr>
<td><span class="Estilo1">Contraseña</span></td>
<td> <label>
<input  name="claveusu" type="num" id="txtcontraseña" value="<?php echo $fila['claveusu'];?>">
</label></td>
</tr>
<tr>
<td><span class="Estilo1">&nbsp</span></td>
<td> <label>
<input  name="claveusu" type="num" id="txtcontraseña" value="<?php echo $fila['claveusu'];?>">
</label></td>
</tr>
</table>
<p>&nbsp;</p>
<p>
<label>
<div align="center">
<div align="center">
<input type="submit" name="submit" value="actualizar"/>
</div>
</label>
</form>
<?php
}
}
}
else
{
	echo "<p align='center'>cedula no encontrada</p>";
}

?>
</body>
</html>
