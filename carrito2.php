<?php
if ($_SESSION['entrar']=true){
session_start();
include_once("conexion.php");
if (isset($_SESSION['carrito'])) {
	if (isset($_GET['id'])) {
		# code...
	
	              $arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;

						}
					}
					if ($encontro==true) {
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
						header("location:carrito.php");
					}else{
						   $nombre="";
		                   $precio=0;
		                   $imagen="";
		                  $re="SELECT * FROM producto where id=".$_GET['id'];
		                  $resultado=mysqli_query($conexion,$re);
		                  while ($f=$resultado->fetch_array()) {
		                  	$nombre=$f['nombre'];
		                  	$precio=$f['precio_venta'];
		                  	$imagen=$f['imagen'];
		                  	$id=$f['id'];
		                  }
		                  $datosNuevos=array('Id'=>$_GET['id'], 
		                  'Nombre'=>$nombre,
		                  'Precio'=>$precio,
		                  'Imagen'=>$imagen,
		                  'Cantidad'=>1);
		                  array_push($arreglo, $datosNuevos);
		                  $_SESSION['carrito']=$arreglo;
		                  header("location:carrito.php");
					}
				}
}else{
	if (isset($_GET['id'])) {
		$nombre="";
		$precio=0;
		$imagen="";
		$re="SELECT * FROM producto where id=".$_GET['id'];
		$resultado=mysqli_query($conexion,$re);
		while ($f=$resultado->fetch_array()) {
			$nombre=$f['nombre'];
			$precio=$f['precio_venta'];
			$imagen=$f['imagen'];
		}
		$arreglo[]=array('Id'=>$_GET['id'],
		'Nombre'=>$nombre,
		'Precio'=>$precio,
		'Imagen'=>$imagen,
		'Cantidad'=>1);
		$_SESSION['carrito']=$arreglo;
		header("location:carrito.php");
	}
}
}
?>