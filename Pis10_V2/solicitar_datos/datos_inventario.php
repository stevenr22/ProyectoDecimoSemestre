<?php
session_start();
include("../bd/conexion.php");

// Consulta SQL para obtener datos
$sql = "SELECT nombre, cantidad_total_usada FROM total_insumos";
$result = $conn->query($sql);

// Array para almacenar datos
$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Devolver datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar conexión
$conn->close();
?>
