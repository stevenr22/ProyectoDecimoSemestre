<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../recursos/img/GESTIÓN MANGO.png', 10, 8, 33); // Ajusta la ruta y las coordenadas según tu necesidad
        // Título
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Historial de Insumos', 0, 1, 'C');
        $this->Ln(10); // Agregar espacio después del título
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de la clase PDF
$pdf = new PDF();
$pdf->AddPage();

// Conexión a la base de datos (debes configurar estas variables según tu entorno)
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "historial";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
// Consulta SQL
$sql = "SELECT id_cate, categoria_cate, nombre_cate, proveedor_cate, fecha_cate 
FROM Historial_deinsumos";

$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Cabecera de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'CÓDIGO', 1);
    $pdf->Cell(40, 10, 'CATEGORÍA', 1);
    $pdf->Cell(40, 10, 'NOMBRE', 1);
    $pdf->Cell(40, 10, 'PROVEEDOR', 1);
    $pdf->Cell(40, 10, 'Fecha de registro', 1);
    $pdf->Ln(); // Nueva línea

    // Mostrar datos
    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(30, 10, $fila['id_cate'], 1);
        $pdf->Cell(40, 10, $fila['categoria_cate'], 1);
        $pdf->Cell(40, 10, $fila['nombre_cate'], 1);
        $pdf->Cell(40, 10, $fila['proveedor_cate'], 1);
        $pdf->Cell(40, 10, $fila['fecha_cate'], 1);
        $pdf->Ln(); // Nueva línea
    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 0, 1, 'C');
}

// Cerrar la conexión a la base de datos
$conn->close();

// Salida del documento
$pdf->Output('D', 'Historial_de_Insumos.pdf');
?>
