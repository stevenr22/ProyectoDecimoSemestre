<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../bd/conexion.php');  // Asegúrate de incluir el archivo correcto donde está tu conexión a la base de datos.

header('Content-Type: application/json');  // Establecer el tipo de contenido JSON

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_usu_gerente = intval($_POST['id_usu_gerente']);
    
    $file_name = $_FILES['comprobante']['name'];
    $file_tmp_name = $_FILES['comprobante']['tmp_name'];
    
    if ($file_name != '') {
        $uploadsDirectory = '../reportes/';
        $newFileName = $uploadsDirectory . $file_name;  // Usar el nombre original del archivo
        
        // Mover el archivo a la carpeta 'reportes'
        if (move_uploaded_file($file_tmp_name, $newFileName)) {
            
            // Solo guardar el nombre del archivo en la base de datos
            $stmt = $conn->prepare("INSERT INTO comprobante(id_usu_gerente, contenido_pdf) VALUES (?, ?)");
            $stmt->bind_param("is", $id_usu_gerente, $file_name);  // Solo pasamos el nombre del archivo, no la ruta completa
            
            if ($stmt->execute()) {
                $response['success'] = true;
            } else {
                $response['error'] = $stmt->error;
            }
            
            $stmt->close();
        } else {
            $response['error'] = 'Error al mover el archivo al directorio.';
        }
    } else {
        $response['error'] = 'No se recibió ningún archivo.';
    }
}

echo json_encode($response);
$conn->close();
?>
