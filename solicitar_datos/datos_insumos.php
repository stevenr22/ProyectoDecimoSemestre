<?php
// Incluir tu archivo de conexión o cualquier otro archivo necesario
include("../bd/conexion.php");

// Verificar si se recibió el ID del tipo de insumo por POST
if (isset($_POST['id_tipo_insumo'])) {
    // Obtener el ID del tipo de insumo enviado por POST
    $tipoInsumoId = $_POST['id_tipo_insumo'];

    // Consulta SQL para obtener los nombres de los insumos basados en el ID del tipo de insumo
    $query = "SELECT id_insumo, nombre FROM insumos WHERE tipo = ?"; // Ajusta la consulta según tu estructura de BD
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $tipoInsumoId); // Aquí asumimos que el tipo es una cadena, ajusta según tu estructura
    $stmt->execute();
    $result = $stmt->get_result();

    $insumos = [];
    while ($row = $result->fetch_assoc()) {
        $insumos[] = [
            'id_insumo' => $row['id_insumo'],
            'nombre' => $row['nombre']
        ];
    }

    // Devolver los datos como respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($insumos);
} else {
    // Si no se proporcionó un ID de tipo de insumo, puedes manejarlo como consideres necesario
    echo json_encode(['error' => 'ID de tipo de insumo no proporcionado']);
}

// Cerrar la conexión y liberar recursos si es necesario
$stmt->close();
$conn->close();
?>
