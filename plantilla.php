<?php 
require "fpdf/fpdf.php";
class PDF extends FPDF
{
	function header()
	{
		$this->Image('images/logo.jpg', 5,5,30);
		$this->SetFont('arial', 'B', 15);
		$this->Cell(82);
		$this->Cell(1900, 6, 'Tu factura',0,0, 'c');

		$this->Ln(6);
		$this->SetFont('arial', '', 15);
		$this->Cell(70, 10);
		$this->Cell(1600, 6, 'Tienda Barrio Nuevo',0,1, 'c');

		$this->Ln(0);
		$this->SetFont('arial', '', 15);
		$this->Cell(67, 10);
		$this->Cell(1500, 6, 'NIT 33570974 del 2008',0,1, 'c');

		$this->Ln(0);
		$this->SetFont('arial', '', 15);
		$this->Cell(48, 10);
		$this->Cell(1300, 6, 'Carrera 68 #65-50, El Salado, Envigado',0,1, 'c');

		$this->Ln(4);
		$this->SetFont('arial', 'B', 15);
		$this->Cell(60, 10);
		$this->Cell(1500, 6, 'GRACIAS POR TU COMPRA',0,1, 'c');
		$this->Ln(10);

	}
	function Footer(){
		$this->SetFont('arial', 'B', 20);
		$this->Cell(40, 90);
		$this->Cell(1500, 300, 'VOLVER A BARRIONUEVO.COM',0,1, 'c', 0, 'productos.php');


   $this->SetY(-15);
   $this->SetFont('arial', 'B', 20);
   date_default_timezone_set("America/Bogota");
   $this->SetFont('arial', 'B', 15);
$this->Cell(0,10,date('l jS \of F Y h:i:s A'),0,2,'R');
	}
}
 ?>
