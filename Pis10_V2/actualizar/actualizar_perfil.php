<?php
session_start(); // Asegúrate de iniciar la sesión si no lo has hecho antes
include("../bd/conexion.php");
// Verifica si hay una sesión activa
if (!isset($_SESSION['DBid_usu'])) {
    // Redirige o maneja la falta de sesión según tus necesidades
    die("No hay sesión activa");
}



// Recibe los datos del formulario
$NomCompleto = $_POST['NomCompleto'];
$correo = $_POST['correo'];
$NomUsuario = $_POST['NomUsuario'];
$DBid = $_POST['DBid'];

// Actualiza los datos en la base de datos
$sql = "UPDATE usuario SET nombre_completo='$NomCompleto', correo='$correo', nombre_usu='$NomUsuario' WHERE id_usu='$DBid' AND estado=1";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success", "message" => "Datos actualizados correctamente");
} else {
    $response = array("status" => "error", "message" => "Error al actualizar los datos: " . $conn->error);
}

// Cierra la conexión a la base de datos
$conn->close();

// Devuelve la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
