<?php
session_start();
include("../bd/conexion.php");
date_default_timezone_set("America/Guayaquil");

// Obtener los datos del POST
$Rol_regis = isset($_POST['nom_rol']) ? $_POST['nom_rol'] : '';
$descri_regis = isset($_POST['decrip_rol']) ? $_POST['decrip_rol'] : '';

// Verificar si los datos son válidos
if (!empty($Rol_regis) && !empty($descri_regis)) {
    // Insertar los datos en la base de datos
    $query = "INSERT INTO rol (cargo, descripcion, estado) VALUES ('$Rol_regis', '$descri_regis', 1)";

    if (mysqli_query($conn, $query)) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al registrar el rol: ' . mysqli_error($conn));
    }
} else {
    $response = array('status' => 'error', 'message' => 'Todos los campos son requeridos');
}

// Devolver la respuesta en formato JSON
echo json_encode($response);

mysqli_close($conn);
?>
