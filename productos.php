<?php
include_once("conexion.php");
include_once("carrito2.php");
error_reporting(0);
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
	<title>Catálogo</title>
</head>
<body>	
<header>
	<p class="titulo" style="padding: 10px;">BARRIONUEVO SHOP </p>
</head>
<?php
if (!$_SESSION['usuario']){

?>
<!--EMPIEZA FORMULARIO DE INICIO DE SESIÓN -->
<br><br><br><div class="container inicio">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Iniciar sesión</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    

    <form class="form-horizontal" method="POST" action="servidor.php">
  <fieldset>
    <legend>Ingresa</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Email</label>

      <div class="col-md-10">
        <input type="email" class="form-control"  placeholder="Email" name="correousu" required>
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword" class="col-md-2 control-label">Contraseña</label>

      <div class="col-md-10">
        <input type="password" class="form-control" placeholder="contraseña" name="claveusu" required>
        </div>
        </div>
        <a href="registro.php">¿No estás registrado?</a>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           <button type="submit" class="btn btn-primary navbar-inverse ">Iniciar</button>
        </div>
      </div>
      </fieldset>
      </form>
      <!--TERMINA FORMULARIO DE INICIO DE SESIÓN -->
      <?php
      	}
      	else{
      		echo "<a href='cierre.php'><img src='images/cierre.jpg' class='cierreSesion' title='Cerrar sesión'> </a><br>";}
      		?>
      		
<body>

</header>
		<div>
		<div>
		</div>
		<div class='headi'>
			<ul>
				<li><a href="index.php" >Inicio</a></li> 
				<li><a href="" class="current"  >Catálogo</a></li> 
				<li><a href="quienes.php">¿Quiénes somos?</a></li> 
				<li><a href="contacto.php">Contáctenos</a> </li>
				<li><a href="historial.php">Mi perfil</a> </li>
                
			</ul>
		</div>
		
	<section>
		<?php

	  error_reporting(0);
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
	    ?>
	    
	    <form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formu"> 
   <input id="buscar" class="regi" name="buscar" type="search" placeholder="Buscar aquí tus productos...." autofocus >
   <input class="btn btn-primary navbar-inverse " type="submit" name="buscador" value="Buscar">
</form>

<?php
include_once("conexion.php");
if ($_POST) {
	

$busqueda=trim($_REQUEST['buscar']);
if (empty($busqueda)) {
	echo("No hay resultados");
}
else{
$consulta="SELECT * from producto WHERE nombre LIKE '%" .$busqueda. "%'";
$resultado=mysqli_query($conexion,$consulta);
$rows=mysqli_num_rows($resultado);
$rows=$resultado->fetch_assoc();
if ($rows>0) {
while ($f=$resultado->fetch_array()) {

?>

<div class="producto">
			<center>
				<img class="imagen" src="<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio_venta'];?></span><br>
				<?php if (isset($_SESSION['usuario'])){
				 ?>
					<a  href="carrito.php?id=<?php  echo $f['id'];?>">Añadir al carrito de compras</a>
				<?php } ?>
			</center>
		</div>
<?php

}
}
else{
	echo "No hay ningún producto con el nombre";
}
}

}

?>
	    <?php
	    
		include_once('conexion.php');
		
		$re="SELECT * from producto";
		$resultado=mysqli_query($conexion,$re);
		while ($f=$resultado->fetch_array()) {
		?>
			<div class="producto">
			<center>
				<div class="imagen">
				<img class="imagen" src="<?php echo $f['imagen'];?>"><br></div>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio_venta'];?></span><br>
				<?php if (isset($_SESSION['usuario'])){
				 ?>
					<a href="carrito.php?id=<?php  echo $f['id'];?>">Añadir al carrito de compras</a>
				<?php } ?>
			</center>
			<br>
		</div>
	<?php
		}
	?>

	</section>
</body>
<footer>

	<div class="site-footer"><br>
		<h3 class="mapa">Servicios</h3>
   			<li><a href="catalogo.php">Catálogo</a></li> 
			<li><a href="">Compra</a></li> 

		<h3 class="mapa">Nosotros</h3>
	        <li><a href="quienes.php"  >¿Quienes Somos?</a></li> <br>

		<h3 class="mapa">Contacto</h3>
			<li><a href="contacto.php">Contáctenos</a> </li><br><br>
		Todas las imágenes utilizadas son propiedad de MercadoEnLínea.com<br>
		© 2017 ERIKA MARÍN<br>
	<a href="http://www.facebook.com" c> <img src="images/fb.jpg" class="fb" align="center"> </a></div>
</footer>
</html>