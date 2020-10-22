<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
include_once("conexion.php");
if (!empty($_POST)) {
	

$correousu=$_REQUEST['correousu'];
$claveusu=$_REQUEST['claveusu'];

 
$sql="SELECT * FROM personas where correo='$correousu' and claveusu='$claveusu'";
$resultado=$conexion->query($sql);
$rows=$resultado->num_rows;
if ($rows>0) {
	session_start();
	$rows=$resultado->fetch_assoc();
	$perfil=$rows['tipousu'];
	$_SESSION['nombre']=$rows['nombre'];
	$_SESSION['idNombre']=$rows['cedula'];
	$_SESSION['correo']=$rows['correousu'];
	$_SESSION['usuario']=$correousu;
	$_SESSION['entrar']=true;
	$_SESSION['tipousu']=$perfil;

	switch ($perfil) {
		case 1:
			header("location:productos.php");
			break;
		
		case 2:
			header("location:bus.php");
			break;
	}



}else{
	header("location: incorrecto.php");
}

}
?>

</body>
</html>