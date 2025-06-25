<?php
session_start();
include("../bd/conexion.php");

$id_parce_actu = $_POST['id_parce_actu'];
$nom_parce_actu = $_POST['nom_parce_actu'];
$alto_parce_actu = $_POST['alto_parce_actu'];
$ancho_parce_actu = $_POST['ancho_parce_actu'];
$fecha_regis_parce_actu = $_POST['fecha_regis_parce_actu'];

$sql = "UPDATE parcela SET nombre='$nom_parce_actu', ancho='$ancho_parce_actu', alto='$alto_parce_actu',
fecha_registro='$fecha_regis_parce_actu' WHERE id_parcela = '$id_parce_actu'";



if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success');
} else {
    $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
