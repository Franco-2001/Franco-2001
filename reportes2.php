<?php
$dni=$_POST["dni"];
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
        $this->Cell(50,10,'Mis compras',1,0,'C');
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
    $com = "SELECT dni,nombre_ciudad ,importe,fecha ,fecha_salida,descripcion FROM ventas 
    inner join destinos on ventas.destino=destinos.id 
    inner join formas_pago on ventas.forma_pago=formas_pago.id
    where dni='$dni'";
    $result = $conn->query($com);
        
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,10,'DNI',1,0,'c',0);
$pdf->Cell(29,10,'CIUDAD',1,0,'c',0);
$pdf->Cell(22,10,'IMPORTE',1,0,'c',0);
$pdf->Cell(34,10,'FECHA DE COMPRA',1,0,'c',0);
$pdf->Cell(31,10,'FECHA DE SALIDA',1,0,'c',0);
$pdf->Cell(31,10,'FORMA DE PAGO',1,1,'c',0);
while($row = $result->Fetch_assoc()){
    $pdf->Cell(20,10,$row['dni'],1,0,'c',0);
    $pdf->Cell(29,10,$row['nombre_ciudad'],1,0,'c',0);
    $pdf->Cell(22,10,$row['importe'],1,0,'c',0);
    $pdf->Cell(34,10,$row['fecha'],1,0,'c',0);
    $pdf->Cell(31,10,$row['fecha_salida'],1,0,'c',0);
    $pdf->Cell(31,10,$row['descripcion'],1,1,'c',0);
}

$pdf->Output();

?>