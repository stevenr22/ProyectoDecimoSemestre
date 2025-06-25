<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../bd/conexion.php');  // Asegúrate de incluir el archivo correcto para la conexión.

header('Content-Type: application/json');  // Establecer el tipo de contenido JSON

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Validar tipo de archivo
    $allowedExtensions = ['pdf'];
    $fileExtension = strtolower(pathinfo($_FILES['comprobante']['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        $response['error'] = 'Solo se permiten archivos PDF.';
        echo json_encode($response);
        exit;
    }
    
    // Verificar el tamaño del archivo (por ejemplo, 5 MB)
    if ($_FILES['comprobante']['size'] > 5 * 1024 * 1024) {
        $response['error'] = 'El archivo es demasiado grande. El límite es de 5 MB.';
        echo json_encode($response);
        exit;
    }

    $file_name = $_FILES['comprobante']['name'];  // Nombre original del archivo
    
    // Ruta donde se guardará el archivo
    $uploadsDirectory = '../reportes/';
    $newFileName = $uploadsDirectory . $file_name;

    // Verificar si el archivo ya existe en la base de datos por su nombre
    $stmt_check = $conn->prepare("SELECT file_name FROM pdf_files WHERE file_name = ?");
    $stmt_check->bind_param("s", $file_name);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $response['error'] = 'El archivo ya ha sido enviado con el mismo nombre.';
        echo json_encode($response);
        exit;
    }

    $stmt_check->close();

    if (move_uploaded_file($_FILES['comprobante']['tmp_name'], $newFileName)) {
        
        // Insertar el nombre del archivo en la tabla pdf_files
        $stmt_insert = $conn->prepare("INSERT INTO pdf_files(file_name) VALUES (?)");
        
        $stmt_insert->bind_param("s", $file_name);  // s es para una cadena
        
        if ($stmt_insert->execute()) {
            
            // Actualizar el estado de todos los registros en la tabla factura a "enviado"
            $stmt_update = $conn->prepare("UPDATE factura SET estado = 'Enviado'");
            $stmt_update->execute();
            $stmt_update->close();

            $response['success'] = true;
        } else {
            $response['error'] = 'Error al insertar en la base de datos: ' . $stmt_insert->error;
        }
        
        $stmt_insert->close();
    } else {
        $response['error'] = 'Error al mover el archivo al directorio.';
    }

    echo json_encode($response);
    $conn->close();  // Cerrar la conexión con la base de datos.
} else {
    $response['error'] = 'Método no permitido.';
    echo json_encode($response);
}
?>
