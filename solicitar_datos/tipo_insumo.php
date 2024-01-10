<?php
session_start();
include("../bd/conexion.php");
// Verificar si se está solicitando cargar nombres de insumo basados en un tipo específico
if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    $stmt = $pdo->prepare("SELECT nombre FROM insumos WHERE tipo = :tipo AND stock = 0");
    $stmt->execute(['tipo' => $tipo]);
    
    $nombres = [];
    while ($row = $stmt->fetch()) {
        $nombres[] = $row['nombre'];
    }
    
    echo json_encode($nombres);
    exit;
}

// Procesar solicitud de insumo
if (isset($_POST['tipo'], $_POST['nombre'], $_POST['cantidad'])) {
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    
    // Aquí deberías insertar la solicitud en tu base de datos, actualizar stock, etc.
    // Por simplicidad, este es un ejemplo básico:
    // $stmt = $pdo->prepare("INSERT INTO solicitudes (tipo, nombre, cantidad) VALUES (:tipo, :nombre, :cantidad)");
    // $stmt->execute(['tipo' => $tipo, 'nombre' => $nombre, 'cantidad' => $cantidad]);

    echo "Solicitud registrada con éxito para el insumo $nombre del tipo $tipo, cantidad: $cantidad.";
    exit;
}

echo "Error: Datos insuficientes para procesar la solicitud.";
?>
