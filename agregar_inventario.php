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
    <li><a href="agregar_inventario.php" class="current">GESTIONAR INVENTARIO</a></li> 
    <li><a href="bus.php"  >GESTIONAR PERSONAS</a></li> 
    <li><a href="ver_pedidos.php" >GESTIONAR PEDIDOS</a></li>
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
     
<section >
     <form method="POST" action="mostrar_inventario.php" enctype="multipart/form-data" class="formu">
      <div>
        <label>Nombre&nbsp;producto</label>
        <input class="regi" type="text" name="nombre" placeholder="Ingrese su nombre" required*/>
      </div>

      <div>
        <label>Cantidad</label>
        <input class="regi" type="number" name="cantidad" placeholder="cantidad producto" required*/>
      </div>
      <div>
        <label>Precio&nbsp;de&nbsp;compra</label>
        <input class="regi" type="number" name="compra" placeholder="precio de compra" required*/>
      </div>

      <div>
        <label>Precio&nbsp;de&nbsp;Venta</label>
        <input class="regi" type="number" name="venta" placeholder="precio de venta" required*/>
      </div>
      <div>
        <label for="file-upload" class="custom-file-upload">Agregar&nbsp;Imagen</label>
        <input id="file-upload" type="file" name="imagen" placeholder="imagen" id="imagen" class="imagen" required*/>
      </div>
      <div>
        <button type="submit" 
        >Insertar datos</button>
      </div>
   
  </section>
  </form>
  <p>
    <?php


$tabla="";
$query="SELECT * FROM producto ORDER BY nombre";

$buscarpersonas=$conexion->query($query);
if ($buscarpersonas->num_rows > 0)
{
  $tabla.= 
  '<table class="table">
    <tr class="bg-primary tabla">
      <td>ID</td>
      <td>Nombre</td>
      <td>Cantidad</td>
      <td>Precio de Compra</td>
      <td>Precio de Venta</td>
      <td></td>
      <td></td>
    </tr>';

  while($filapersonas= $buscarpersonas->fetch_assoc())
  {
    $tabla.=
    '<tr>
      <td>'.$filapersonas['id'].'</td>
      <td>'.$filapersonas['nombre'].'</td>
      <td>'.$filapersonas['cantidad'].'</td>
      <td>'.$filapersonas['precio_compra'].'</td>
      <td>'.$filapersonas['precio_venta'].'</td>
      <td>'."<a href=eliminarInventario.php?id=".$filapersonas['id'].">Eliminar</a>".'</td>
      <td>'."<a href=editarInventario.php?id=".$filapersonas['id'].">Editar</a>".'</td>
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
