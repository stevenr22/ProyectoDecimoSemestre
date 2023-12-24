<?php
// error_reporting(E_ALL); // Desactiva esta línea en producción
// ini_set('display_errors', 1); // Desactiva esta línea en producción

session_start();
include('../bd/conexion.php');  // Asegúrate de incluir el archivo correcto donde está tu conexión a la base de datos.

header('Content-Type: application/json');  // Establecer el tipo de contenido JSON

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $file_name = $_FILES['comprobante']['name'];
    
    // Obtén el id_solicitud de $_POST
    $id_solicitud = intval($_POST['id_solicitud']);
    
    // Verificar si ya existe un comprobante para la solicitud específica
    $stmt_check = $conn->prepare("SELECT id_solicitudes FROM comprobante WHERE id_solicitudes = ?");
    $stmt_check->bind_param("i", $id_solicitud);  // Cambiado de "s" a "i" y vinculado con $id_solicitud
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $response['error'] = 'Ya se ha enviado un Comprobante para esta solicitud.';
    } else {
        $id_usu_gerente = intval($_POST['id_usu_gerente']);
        $id_solicitud = intval($_POST['id_solicitud']);
        $id_solicitud_reci = intval($_POST['id_solicitud_reci']);
        $file_tmp_name = $_FILES['comprobante']['tmp_name'];
        
        if ($file_name != '') {
            $uploadsDirectory = '../reportes/';
            $newFileName = $uploadsDirectory . $file_name;  // Usar el nombre original del archivo
            
            // Mover el archivo a la carpeta 'reportes'
            if (move_uploaded_file($file_tmp_name, $newFileName)) {
                
                // Insertar el nombre del archivo en la base de datos
                $stmt_insert = $conn->prepare("INSERT INTO comprobante(id_usu_gerente, id_solicitudes, contenido_pdf) VALUES (?, ?, ?)");
                $stmt_insert->bind_param("iis", $id_usu_gerente, $id_solicitud, $file_name);
                
                if ($stmt_insert->execute()) {
                    $stmt_update_estado = $conn->prepare("UPDATE soli_recibidas SET estado = 'Entregado' WHERE id_soli_reci = ?");
                    $stmt_update_estado->bind_param("i", $id_solicitud_reci);

                    if ($stmt_update_estado->execute()) {
                        $response['success'] = true;
                    } else {
                        $response['error'] = 'Error al actualizar el estado de la solicitud.';
                    }
                    
                    $stmt_update_estado->close();
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
?>
