<?php
require('reporte/fpdf.php');

class PDF extends FPDF

{
    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(50,10,'Mis ventas',1,0,'C');
        // Salto de línea
        $this->Ln(20);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }


    $conn = mysqli_connect("localhost:3306", "root", "river2001", "turismo");
    $com ="SELECT id_venta,dni,nombre_ciudad,descripcion,fecha  FROM ventas 
    inner join destinos on ventas.destino=destinos.id
    inner join formas_pago on ventas.forma_pago=formas_pago.id";
    $result = $conn->query($com);
        
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,10,'ID DE VENTA',1,0,'c',0);
$pdf->Cell(18,10,'DNI',1,0,'c',0);
$pdf->Cell(30,10,'DESTINO',1,0,'c',0);
$pdf->Cell(33,10,'FORMA DE PAGO',1,0,'c',0);
$pdf->Cell(25,10,'FECHA',1,1,'c',0);
while($row = $result->Fetch_assoc()){
    $pdf->Cell(25,10,$row['id_venta'],1,0,'c',0);
    $pdf->Cell(18,10,$row['dni'],1,0,'c',0);
    $pdf->Cell(30,10,$row['nombre_ciudad'],1,0,'c',0);
    $pdf->Cell(33,10,$row['descripcion'],1,0,'c',0);
    $pdf->Cell(25,10,$row['fecha'],1,1,'c',0);
}

$pdf->Output();

?>