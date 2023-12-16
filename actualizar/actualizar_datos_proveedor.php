<?php
session_start();
include("../bd/conexion.php");

$id_prove_actua = $_POST['id_prove_actua'];
$nom_prove_actua = $_POST['nom_prove_actua'];
$nomb_trab_prov_actua = $_POST['nomb_trab_prov_actua'];
$direc_actua = $_POST['direc_actua'];
$telefo_actua = $_POST['telefo_actua'];
$fech_regis_prov_actua = $_POST['fech_regis_prov_actua'];

$sql = "UPDATE proveedor SET nombre_empre='$nom_prove_actua', nombre_traba='$nomb_trab_prov_actua', 
direccion='$direc_actua', num_tele='$telefo_actua', fecha_regis='$fech_regis_prov_actua' 
WHERE id_prove = '$id_prove_actua'";



if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success');
} else {
    $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
}

$conn->close();

echo json_encode($response);
?>
