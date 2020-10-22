<?php
include_once('conexion.php');
$consulta1="SELECT sum(total) as total from factura";
$resultado=$conexion->query($consulta1);
$rows=mysqli_fetch_array($resultado);
$total=$rows['total'];
$consulta2="SELECT * from producto";
$resultado2=$conexion->query($consulta2);
?>
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
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<header>
      <p class="titulo_admin" >BARRIONUEVO SHOP </p>
</header>
<a href="cierre.php"><img src="images/cierre.jpg" class="cierreSesion" title="Cerrar sesión"> </a><br>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/><br>
  <ul class="headi">
    <li><a href="agregar_inventario.php" >GESTIONAR INVENTARIO</a></li> 
    <li><a href="bus.php"  >GESTIONAR PERSONAS</a></li> 
    <li><a href="ver_pedidos.php" >GESTIONAR PEDIDOS</a></li>
    <li><a href="finanzas.php" class="current" >GESTIONAR FINANZAS</a></li>
  </ul>

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
?>
<h1 class="subtitulo2" align="center">FINANZAS</h1>

<p class="contacto" align="center">El total de ventas fue: <?php echo $total;?></p>
<p class="contacto" align="center">El total de compras hechas al proveedor fue:
<?php 
$totalcompleto=0;
while ($fila=mysqli_fetch_array($resultado2)) {
	extract($fila);
	$total=$fila['precio_compra']*$fila['cantidad'];
	$totalcompleto=$totalcompleto+$total;
} echo $totalcompleto?></p>
</p>

</table>

	<table align="center">

		<h2 class="subtitulo2">Ranking de los productos más vendidos</h2>

		<?php
			include_once("conexion.php");
          $consulta3="SELECT sum(cant) as totali,nombre from detalle_fac GROUP BY nombre ORDER by sum(cant) DESC";
          $resultado3=$conexion->query($consulta3);
          while ($fila=mysqli_fetch_array($resultado3)) {
          	extract($fila)
          
			?>
      <div align="center">
        <p class="contacto"><?php echo $fila['nombre']; ?>
        <b>Cantidades vendidas: </b> <?php echo $fila['totali']; ?> </p>
      </div>
		</tr>
			<?php
}
	?>
</table>
<footer>

  <div class="footer"><br>
    
    © 2017 ERIKA MARÍN<br>
  <a href="http://www.facebook.com" c> <img src="images/fb.jpg" class="fb" align="center"> </a></div>
</footer>
</html>