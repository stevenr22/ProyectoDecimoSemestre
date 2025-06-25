<?php
// Incluir el archivo de conexión a la base de datos
include "../bd/conexion.php";

// Inicializar un array de respuesta
$response = ['estado' => ''];

// Consulta SQL para verificar si existe alguna factura con estado 'Recibido'
$query = "SELECT COUNT(*) as total FROM factura WHERE estado = 'Recibido'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['total'] > 0) {
        $response['estado'] = 'Recibido';
    } else {
        $response['estado'] = 'Enviado';
    }
} else {
    $response['estado'] = 'Error al verificar';
}

// Cerrar la conexión y enviar la respuesta
$conn->close();

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
