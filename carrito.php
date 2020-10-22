<?php
include_once("conexion.php");
include_once("carrito2.php");
?>


<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis:200|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/scripts.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
<head>
	<title>Catálogo</title>
</head>
<body>	
<header>
	<a href="index.php"class="titulo" style="padding: 10px;">BARRIONUEVO SHOP </a>
</head>
<?php
if ($_SESSION['entrar']=true){
	?>
<a href="cierre.php"><img src="images/cierre.jpg" class="cierreSesion" title="Cerrar sesión"> </a><br>
<body>
<!--EMPIEZA FORMULARIO DE INICIO DE SESIÓN -->
<!--TERMINA FORMULARIO DE INICIO DE SESIÓN -->
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
                
			</ul>
		</div>
	<section>
		<?php
			

		

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
	    
	  

			
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
						<img  class="imagen" src="<?php echo $datos[$i]['Imagen'];?>"><br>
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
						<span>Cantidad: 
							<input type="number" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span>fsdf <?php echo"".$datos[$i]['Id'];?></span><br>
						<span class="subtotal">Subtotal:<?php $subtotal= $datos[$i]['Cantidad']*$datos[$i]['Precio']; echo $subtotal;?></span><br>
						<span><?php echo"<a href=eliminarCarrito.php?posicion=".$i.">Eliminar</a><br>";?></span>
						<? //if ($posicion) {
							//$posicion=$_REQUEST['id'];
						//$datos=$_SESSION['carrito'];

						//array_splice($datos,$posicion);
						//print_r($datos);
						//header("location: carrito.php");

						//}
					?>
					</center>
				</div>
			<?php
				$_SESSION['total']=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
				$total=$_SESSION['total'];
			}
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
		
		?>
		<br>
		<div align="center">
		<form method="POST" action="pedido.php">
			<button type="submit" class="btn btn-primary navbar-inverse boton" >Realizar compra</button>
		</form><br>
		</div>
		<center><a href="productos.php">Ver catalogo</a></center>
	
	</section>
	<?php
		}
		else{
			echo "<h1 class=formularioCarrito>Por favor inicia sesión</h1>";
			?>
			<!--EMPIEZA FORMULARIO DE INICIO DE SESIÓN -->
	<div class="formularioInventario">
    <form method="POST" action="servidor.php" >
  <fieldset>
    <legend>Ingresa</legend>
    <div class="form-group formuCarrito">
      <label for="inputEmail" class="col-md-2 control-label">Email</label>
      <div class="col-md-10">
        <input type="email" class="form-control"  placeholder="Email" name="correousu">
      </div>
    </div>

    <div class="form-group formuCarrito">
      <label for="inputPassword" class="col-md-2 control-label">Contraseña</label>

      <div class="col-md-10">
        <input type="password" class="form-control" placeholder="Contraseña" name="claveusu">
        </div>
        </div>
        <a href="registro.php">¿No estás registrado?</a><br>
        <button type="submit" class="btn btn-primary navbar-inverse boton" >Iniciar sesión</button>
      </div>
      </fieldset>
      
      </form>
      </div>
      <!--TERMINA FORMULARIO DE INICIO DE SESIÓN -->
      <?php
		}
	?>
</body>
</html>