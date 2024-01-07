<?php
session_start();
include("../bd/conexion.php");

$id_soli_reci = $_POST['id_soli_reci'];
$fecha_soli = $_POST['fecha_soli'];
$t_insu_soli = $_POST['t_insu_soli'];
$insu_soli = $_POST['insu_soli'];
$canti_soli = $_POST['canti_soli'];
$proveedor = $_POST['proveedor'];

// Primero, verificamos el estado actual de la solicitud
$sqlCheck = "SELECT estado FROM solicitudes WHERE id_solicitud = '$id_soli_reci'";
$resultCheck = $conn->query($sqlCheck);

if ($resultCheck->num_rows > 0) {
    $row = $resultCheck->fetch_assoc();
    $estadoActual = $row['estado'];

    // Verificamos si el estado es 'Añadido'
    if ($estadoActual == 'Añadido') {
        $response = array('status' => 'warning', 'message' => 'Ya se asigno un proveedor para esta solicitud.');
    } else if($estadoActual == 'Aprobado'){
        $response = array('status' => 'warning', 'message' => 'La solicitud ya fue aprobada.');


    }else if($estadoActual == 'Verificando'){
        $response = array('status' => 'warning', 'message' => 'No es posible editar ni añadir un proveedor, debido a que su solicitud esta en estado de verificación.');

    }else {
        // Si el estado no es 'Añadido', procedemos con la actualización
        $sql = "UPDATE solicitudes SET fecha_solicitud='$fecha_soli', 
        tipo_insumo='$t_insu_soli', 
        nombre_insu='$insu_soli',
        cantidad='$canti_soli',
        proveedor='$proveedor' WHERE id_solicitud = '$id_soli_reci'";

        if ($conn->query($sql) === TRUE) {
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
        }
    }
} else {
    // Si no se encontró la solicitud, envía un mensaje de error
    $response = array('status' => 'error', 'message' => 'No se encontró una solicitud con el ID proporcionado.');
}

$conn->close();

echo json_encode($response);
?>
