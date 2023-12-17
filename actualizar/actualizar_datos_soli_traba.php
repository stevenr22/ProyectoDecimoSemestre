<?php
session_start();
include("../bd/conexion.php");

$id_soli_actua = $_POST['id_soli_actua'];
$fecha_soli_actua = $_POST['fecha_soli_actua'];
$ti_insu_actua = $_POST['ti_insu_actua'];
$nom_insu_actua = $_POST['nom_insu_actua'];
$canti_insu_actua = $_POST['canti_insu_actua'];

$sql = "UPDATE solicitudes SET fecha_solicitud='$fecha_soli_actua', 
tipo_insumo='$ti_insu_actua', 
nombre_insu='$nom_insu_actua',
cantidad='$canti_insu_actua' WHERE id_solicitud = '$id_soli_actua'";



if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success');
} else {
    $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
