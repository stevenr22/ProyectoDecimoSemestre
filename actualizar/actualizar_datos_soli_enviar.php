<?php
session_start();
include("../bd/conexion.php");

$id_soli_reci = $_POST['id_soli_reci'];
$fecha_soli = $_POST['fecha_soli'];
$t_insu_soli = $_POST['t_insu_soli'];
$insu_soli = $_POST['insu_soli'];
$canti_soli = $_POST['canti_soli'];
$proveedor = $_POST['proveedor'];


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

$conn->close();

echo json_encode($response);
?>
