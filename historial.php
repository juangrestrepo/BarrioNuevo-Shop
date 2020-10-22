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

  <?php
  if ($_SESSION['usuario']){
    echo "<a href='cierre.php'><img src='images/cierre.jpg' class='cierreSesion' title='Cerrar sesión'> </a><br>"; }
  ?>
          
</header>
    <div>
    <div>
    </div>
    <div class='headi'>
      <ul>
        <li><a href="index.php" >Inicio</a></li> 
        <li><a href="productos.php">Catálogo</a></li> 
        <li><a href="quienes.php">¿Quiénes somos?</a></li> 
        <li><a href="contacto.php">Contáctenos</a> </li>
        <li><a href="" class="current" >Mi perfil</a> </li>       
      </ul>
    </div>
  <section>
  <?php
  if ($_SESSION['usuario']){
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
<section>
    <?php
  
$id=$_SESSION['idNombre'];
$query="SELECT * FROM factura WHERE id_usuario='$id' ORDER BY fecha";

$buscarpedidos=$conexion->query($query);
if ($buscarpedidos->num_rows > 0)
{
  $tabla.= 
  '<table class="table">
    <tr class="bg-primary tabla">
      <td>ID</td>
      <td>Fecha</td>
      <td>Productos</td>
      <td>Total</td>
       <td>Estado</td>
    </tr>';

  while($filaid= $buscarpedidos->fetch_assoc())
  {
    $tabla.=
    '<tr>
      <td>'.$filaid['id'].'</td>
      <td>'.$filaid['fecha'].'</td>
      <td>'."<a href=factura2.php?id=".$filaid['id'].">Ver factura</a>".'</td>
      <td>'.$filaid['total'].'</td>
      <td>'.$filaid['estado'].'</td>
     </tr>
    ';
  }

  $tabla.='</table>';
} else
  {
    $tabla="No se han encontrado pedidos a su nombre.";
  }


echo $tabla;
}else{
echo "<h1 class='subtitulo2' align='center'>Por favor inicia sesión</h1>";?>
<!--EMPIEZA FORMULARIO DE INICIO DE SESIÓN -->
<br><br><br><div class="container" align="center">
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
        <input type="password" class="form-control" placeholder="Contraseña" name="claveusu" required>
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
<?php } ?>

    </body>
</html>
