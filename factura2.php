<?php
include_once("plantilla.php");
include_once("conexion.php");
$id=$_REQUEST['id'];

$consulta2="SELECT * FROM detalle_fac WHERE id_factu=".$id;
		$resultado2 = $conexion->query($consulta2) or die($conexion->error);
		$rows=$resultado2->num_rows;
		if ($rows>0) {	

$consulta3="SELECT sum(subtotal) as total from detalle_fac where id_factu=$id";
$resultado3=$conexion->query($consulta3)or die($conexion->error);
$rows3=mysqli_fetch_array($resultado3);
$total=$rows3['total'];
if ($rows3>0) {
	
	

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Addpage();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(25, 6, 'id', 1, 0, 'C', 1);
$pdf->Cell(30, 5, 'nombre', 1, 0, 'C', 1);
$pdf->Cell(39, 5, 'cantidad', 1, 0, 'C', 1);
$pdf->Cell(30, 5, 'subtotal', 1, 0, 'C', 1);


$pdf->SetFont('Arial','',9);
$pdf->Ln();

	
	while($row = $resultado2->fetch_assoc())
	{
      $pdf->Cell(25, 5,$row['id_factu'], 1, 0, 'C', 1);
      $pdf->Cell(30, 5, $row ['nombre'], 1, 0, 'C', 1);
      $pdf->Cell(39, 5, $row['cant'], 1, 0, 'C', 1);
      $pdf->Cell(30, 5, $row['subtotal'], 1, 0, 'C', 1);

      $pdf->Ln();
}


$pdf->SetXY(10, 90);
$pdf->Cell(94, 10, 'TOTAL', 1, 0, 'C', 1);
$pdf->Cell(30,10, $total, 1, 1, 'C', 1);


}
}

$pdf->Output()


?>