<?php
    require_once'conexion.php';
    $nombre = $_REQUEST["nombre"];
    $cantidad = $_REQUEST["cantidad"];
    $compra= $_REQUEST["compra"];
    $venta= $_REQUEST["venta"];
    $imagen=$_FILES["imagen"]["name"];
    $ruta=$_FILES["imagen"]["tmp_name"];
    $destino="photo/".$imagen;
    copy($ruta,$destino);

    $insertar = "INSERT INTO producto (nombre, cantidad, precio_compra, precio_venta, imagen) VALUES ('$nombre', '$cantidad', '$compra', '$venta', '$destino')";
    $ejecutar = mysqli_query($conexion, $insertar);

    if($ejecutar){
        echo "<h3>Insertado correctamente</h3>";
        header("location: agregar_inventario.php");
    }
    else{
        echo "botas bobo";
    }
        
   ?>

        