<?php
$conexion= new mysqli("localhost", "root", "", "tienda_abarrotes")or die("error al conectar con la base de datos");
mysqli_set_charset($conexion,"utf8");
if (mysqli_connect_error()) {
	echo 'error', mysqli_connect_error();
	exit();
}



?>