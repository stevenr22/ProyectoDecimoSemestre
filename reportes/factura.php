<?php

include "../fpdf/fpdf.php";
include("../bd/conexion.php");




// Realizar la consulta
$query = "SELECT f.id_factura,  f.fecha_emision, s.nombre_insu as DETALLES, s.cantidad, f.valor, f.total, p.nombre_empre, p.nombre_traba, p.direccion, p.num_tele
FROM solicitudes as s, factura as f, proveedor as p
Where f.id_solicitud = s.id_solicitud and f.estado = 'Recibido' and p.nombre_empre='Ecua S.A.'";

$result = $conn->query($query);

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);

// Array para guardar los productos
$products = array();

// Si hay resultados en la consulta, los guardamos en $products
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;  // Añade cada fila al array $products
    }
}

if (!empty($products)) {
    $row = $products[0];  // Suponiendo que sólo trabajamos con el primer producto para los datos de la factura

    // Agregamos los datos de la empresa
    $pdf->Cell(5, $textypos, $row['nombre_empre']);
    $pdf->SetFont('Arial','B',15);    
    $pdf->setY(30);$pdf->setX(10);
    $pdf->Cell(5, $textypos, "DE:");
    $pdf->SetFont('Arial','',10);    
    $pdf->setY(35);$pdf->setX(10);
    $pdf->Cell(5, $textypos, $row['nombre_empre']);
    $pdf->setY(40);$pdf->setX(10);
    $pdf->Cell(5, $textypos, $row['direccion']);
    $pdf->setY(45);$pdf->setX(10);
    $pdf->Cell(5, $textypos, $row['num_tele']);
    $pdf->setY(50);$pdf->setX(10);
    $pdf->Cell(5, $textypos, "ecua@gmail.com");

    // ... [Resto del código para agregar detalles del cliente y factura]
    // Agregamos los datos del cliente
    $pdf->SetFont('Arial','B',10);    
    $pdf->setY(30);$pdf->setX(75);
    $pdf->Cell(5,$textypos,"PARA:");
    $pdf->SetFont('Arial','',10);    
    $pdf->setY(35);$pdf->setX(75);
    $pdf->Cell(5,$textypos,"Gestion mango S.A.");
    $pdf->setY(40);$pdf->setX(75);
    $pdf->Cell(5,$textypos,"Av. 25 de julio");
    $pdf->setY(45);$pdf->setX(75);
    $pdf->Cell(5,$textypos,"(04)-345-980)");
    $pdf->setY(50);$pdf->setX(75);
    $pdf->Cell(5,$textypos,"gmango@gmail.com");

    // Agregamos los datos del cliente
    $pdf->SetFont('Arial','B',10);    
    $pdf->setY(30);$pdf->setX(135);
   
    $pdf->SetFont('Arial','',10);    
    $pdf->setY(35);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"Fecha de emisión: " . $row['fecha_emision']);
    $pdf->setY(40);$pdf->setX(135);

    $pdf->Cell(5,$textypos,"");
    $pdf->setY(50);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"");




    // Apartir de aquí empezamos con la tabla de productos
    $pdf->setY(60);
    $pdf->setX(135);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(200, 220, 255);
    
    // Array de Cabecera
    $header = array("Cod.", "Descripcion", "Cant.", "Valor", "Total");

    // Column widths
    $w = array(20, 87, 30, 30, 30);
    foreach ($header as $col) {
        $pdf->Cell($w[array_search($col, $header)], 7, $col, 1, 0, 'C', true);
    }
    $pdf->Ln();

    // Variables para acumular totales
    $total_subtotal = 0; // Para el subtotal
    $total_general = 0;  // Para el total general

    // Datos de los productos
    $pdf->SetFont('Arial', '', 10);
    foreach ($products as $row) {
        $pdf->Cell($w[0], 6, $row['id_factura'], 1);
        $pdf->Cell($w[1], 6, $row['DETALLES'], 1);
        $pdf->Cell($w[2], 6, $row['cantidad'], 1, 0, 'C');
        $pdf->Cell($w[2], 6, $row['valor'], 1, 0, 'C');
        $pdf->Cell($w[2], 6, $row['total'], 1, 0, 'C');

        // Calcular subtotal por producto (cantidad x valor)
        $subtotal_producto = $row['cantidad'] * $row['valor'];
        $total_subtotal += $subtotal_producto;  // Acumular subtotal

        $pdf->Ln();
    }
    // Cálculo del total general (usando el subtotal por ahora, pero puedes ajustarlo según tus necesidades)
    $total_general = $total_subtotal; 

    //// Apartir de aqui esta la tabla con los subtotales y totales
	$yposdinamic = 60 + (count($products)*10);
	
	$pdf->setY($yposdinamic);
	$pdf->setX(235);
	$pdf->Ln();
	/////////////////////////////
	$header = array("", "");



    $data2 = array(
        array("Subtotal", $total_subtotal),
        array("Descuento", 0),  // Puedes ajustar este valor si tienes descuentos
        array("Impuesto", 0),   // Puedes ajustar este valor si tienes impuestos
        array("Total", $total_general),
    );
	    // Column widths
	    $w2 = array(40, 40);
	    // Header
	
	    $pdf->Ln();
	    // Data
	    foreach($data2 as $row)
	    {
	$pdf->setX(115);
	        $pdf->Cell($w2[0],6,$row[0],1);
	        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');
	
	        $pdf->Ln();
	    }
	/////////////////////////////
	
	$yposdinamic += (count($data2)*10);
	$pdf->SetFont('Arial','B',10);    
	
	$pdf->setY($yposdinamic);
	$pdf->setX(10);
	$pdf->Cell(5,$textypos,"TERMINOS Y CONDICIONES");
	$pdf->SetFont('Arial','',10);    
	
	$pdf->setY($yposdinamic+10);
	$pdf->setX(10);
	$pdf->Cell(5,$textypos,"El cliente se compromete a pagar la factura.");
	$pdf->setY($yposdinamic+20);
	$pdf->setX(10);
	$pdf->Cell(5,$textypos,"Powered by Ecua S.A.");
	
	
$pdf->Output('factura.pdf', 'D');
  
} else {
    echo "No se encontraron productos para mostrar en el PDF.";
}
?>
