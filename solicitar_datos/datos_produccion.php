<?php
// Iniciar sesión si es necesario
session_start();

// Incluir el archivo de conexión a la base de datos
include("../bd/conexion.php");

// Establecer el encabezado para la respuesta JSON
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idParcela = $_POST['idParcela'];

    // Consulta SQL para obtener los datos de producción por parcela
    $sql = "SELECT t.nombre AS nombre_insumo, t.tipo, SUM(u.cantidad_utilizada) AS total_cantidad_utilizada, p.nombre AS nombre_parcela
            FROM total_insumos AS t
            JOIN uso_insumos AS u ON u.id_total_insumo = t.id_total_insumo
            JOIN parcela AS p ON p.id_parcela = u.id_parcela
            WHERE p.id_parcela = ? 
            GROUP BY t.nombre, t.tipo, p.nombre";
    
    // Preparar consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idParcela);
    $stmt->execute();

    $result = $stmt->get_result();

    // Array para almacenar datos
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Devolver datos en formato JSON
    echo json_encode($data);
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
