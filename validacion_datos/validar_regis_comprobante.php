<?php
session_start();
include("../bd/conexion.php");

// Recibir datos del formulario
$id_usu_gerente = isset($_POST['id_usu_gerente']) ? $_POST['id_usu_gerente'] : '';
$comprobante = isset($_FILES['comprobante']) ? $_FILES['comprobante'] : '';

$response = array();

if (empty($id_usu_gerente) || empty($comprobante)) {
    $response = array(
        'status' => 'error',
        'message' => 'Todos los campos son obligatorios.'
    );
} else {
    // Generar un nombre único para el archivo
    $timestamp = time();  // Puedes usar el timestamp actual
    $nombre_archivo = 'comprobante_' . $id_usu_gerente . '_' . $timestamp . '.pdf';  // Ejemplo de nombre único

    // Ruta completa donde se guardará el archivo
    $uploadDir = '../reportes';
    $uploadPath = $uploadDir . '/' . $nombre_archivo;

    if (move_uploaded_file($comprobante['tmp_name'], $uploadPath)) {
        // Comprobante cargado con éxito, ahora insertar en la base de datos
        $sql = "INSERT INTO comprobante (id_usu_gerente, contenido_pdf) VALUES ('$id_usu_gerente', '$nombre_archivo')";

        if ($conn->query($sql) === TRUE) {
            $response = array(
                'status' => 'success',
                'message' => 'Comprobante cargado y registrado correctamente.'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error al registrar en la base de datos: ' . $conn->error
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error al cargar el comprobante.'
        );
    }
}

// Cerrar conexión
$conn->close();

// Devolver la respuesta al cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>










