<?php
session_start();
include("../bd/conexion.php");

$id_rol_act = $_POST['id_rol_act'];
$nom_rol_actu = $_POST['nom_rol_actu'];
$decrip_rol_actu = $_POST['decrip_rol_actu'];

$sql = "UPDATE rol SET cargo='$nom_rol_actu', descripcion='$decrip_rol_actu' WHERE id_rol = '$id_rol_act'";



if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success');
} else {
    $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
