<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
include("../bd/conexion.php");
// Consulta SQL para obtener datos
$sql = "SELECT 
MONTHNAME(fecha_regis) AS mes, 
SUM(cantidad) AS cantidad_total,
nombre
FROM 
insumos
GROUP BY 
MONTHNAME(fecha_regis), nombre
ORDER BY 
MONTH(fecha_regis);
";
$result = $conn->query($sql);

$data = [];

// Convertir resultados a formato JSON
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = [
            "mes" => $row["mes"],
            "cantidad_total" => $row["cantidad_total"],
            "nombre" => $row["nombre"]
        ];
    }
}

echo json_encode($data);

$conn->close();
?>
