<?php
session_start();
$posicion=$_REQUEST['posicion'];
$datos=$_SESSION['carrito'];

//El 1 quiere decir que se elimina sólo la posición indicada. Si hubiera un 2 se borraría la indicada y la que sigue.
//Si no se pone nada, se eliminan todas las que van después
array_splice($datos,$posicion,1);

print_r($datos);
header("location: carrito.php");
$_SESSION['carrito'] = $datos;
?>