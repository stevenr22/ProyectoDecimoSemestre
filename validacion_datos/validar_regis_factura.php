<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../bd/conexion.php');  // Asegúrate de incluir el archivo correcto donde está tu conexión a la base de datos.

header('Content-Type: application/json');  // Establecer el tipo de contenido JSON

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $file_name = $_FILES['comprobante']['name'];
    
    // Verificar si ya existe un comprobante con el mismo nombre
    $stmt_check = $conn->prepare("SELECT id_comprobante FROM comprobante WHERE contenido_pdf = ?");
    $stmt_check->bind_param("s", $file_name);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $response['error'] = 'Ya se ha enviado una factura con el mismo nombre.';
    } else {
        $id_usu_gerente = intval($_POST['id_usu_gerente']);
        $file_tmp_name = $_FILES['comprobante']['tmp_name'];
        
        if ($file_name != '') {
            $uploadsDirectory = '../reportes/';
            $newFileName = $uploadsDirectory . $file_name;  // Usar el nombre original del archivo
            
            // Mover el archivo a la carpeta 'reportes'
            if (move_uploaded_file($file_tmp_name, $newFileName)) {
                
                // Insertar el nombre del archivo en la base de datos
                $stmt_insert = $conn->prepare("INSERT INTO comprobante(id_usu_gerente, contenido_pdf) VALUES (?, ?)");
                $stmt_insert->bind_param("is", $id_usu_gerente, $file_name);
                
                if ($stmt_insert->execute()) {
                    $response['success'] = true;
                } else {
                    $response['error'] = $stmt_insert->error;
                }
                
                $stmt_insert->close();
            } else {
                $response['error'] = 'Error al mover el archivo al directorio.';
            }
        } else {
            $response['error'] = 'No se recibió ningún archivo.';
        }
    }

    $stmt_check->close();
}

echo json_encode($response);
$conn->close();