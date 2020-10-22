<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/css?family=Dosis|Raleway|Ruda|Oswald|Roboto+Condensed" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/stylos.css">
<script src="peticionInven.js"></script>
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
    <li><a href="agregar_inventario.php">GESTIONAR INVENTARIO</a></li> 
    <li><a href="bus.php"  >GESTIONAR PERSONAS</a></li> 
    <li><a href="agregar_pedidos.php" class="current">GESTIONAR PEDIDOS</a></li>
    <li><a href="finanzas.php" >GESTIONAR FINANZAS</a></li>
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
<section>
    <?php
  
$tabla="";
$query="SELECT * FROM factura ORDER BY id";


$buscarpedidos=$conexion->query($query);
if ($buscarpedidos->num_rows > 0)
{
  $tabla.= 
  '<table class="table">
    <tr class="bg-primary tabla">
      <td>ID</td>
      <td>Fecha</td>
      <td>Usuario</td>
      <td>Productos</td>
      <td>Total</td>
       <td>Estado</td>
      <td></td>

    </tr>';

  while($filaid= $buscarpedidos->fetch_assoc())
  {
    $tabla.=
    '<tr>
      <td>'.$filaid['id'].'</td>
      <td>'.$filaid['fecha'].'</td>
      <td>'.$filaid['id_usuario'].'</td>
      <td>'."<a href=factura2.php?id=".$filaid['id'].">Ver factura</a>".'</td>
      <td>'.$filaid['total'].'</td>
      <td>'.$filaid['estado'].'</td>
      <td>'."<a href=eliminar3.php?id=".$filaid['id'].">Eliminar</a>".'</td>
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
