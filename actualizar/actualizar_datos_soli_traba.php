<?php
session_start();
include("../bd/conexion.php");

$id_soli_actua = $_POST['id_soli_actua'];
$fecha_soli_actua = $_POST['fecha_soli_actua'];
$ti_insu_actua = $_POST['ti_insu_actua'];
$nom_insu_actua = $_POST['nom_insu_actua'];
$canti_insu_actua = $_POST['canti_insu_actua'];



// Primero, verificamos el estado actual de la solicitud
$sqlCheck = "SELECT estado FROM solicitudes WHERE id_solicitud = '$id_soli_actua'";
$resultCheck = $conn->query($sqlCheck);

if($resultCheck->num_rows > 0) {
    $row = $resultCheck->fetch_assoc();
    $estadoActual = $row['estado'];


    //VERIFICAMOS
    if ($estadoActual == 'Aprobado') {
        $response = array('status' => 'warning', 'message' => 'Esta solicitud ya fue procesada.');

    }else if($estadoActual == 'Recibido'){
        $response = array('status' => 'warning', 'message' => 'Esta solicitud ya fue recibida por los administradores para su analisis.');


    
    }else if($estadoActual == 'Verificando'){
        $response = array('status' => 'warning', 'message' => 'Esta solicitud ya esta en proceso de verificación.');


    }else if($estadoActual == 'Añadido'){
        $response = array('status' => 'warning', 'message' => 'Esta solicitud ya fue designado un proveedor.');


    } else {
        $sql = "UPDATE solicitudes SET fecha_solicitud='$fecha_soli_actua', 
        tipo_insumo='$ti_insu_actua', 
        nombre_insu='$nom_insu_actua',
        cantidad='$canti_insu_actua' WHERE id_solicitud = '$id_soli_actua'";
        if ($conn->query($sql) === TRUE) {
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error', 'message' => 'Error al actualizar los datos: ' . $conn->error);
        }

    }
    
}else{
    $response = array('status' => 'error', 'message' => 'No se encontró una solicitud con el ID proporcionado.');


}








$conn->close();

echo json_encode($response);
?>
