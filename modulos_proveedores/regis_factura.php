<?php
session_start();
include("../bd/conexion.php");

$response = array(); // Inicializamos el array de respuesta

$id_compro = (isset($_POST['id_compro'])) ? $_POST['id_compro'] : '';
$fech_emision = (isset($_POST['fech_emision'])) ? $_POST['fech_emision'] : '';
$total_fac = (isset($_POST['total_fac'])) ? $_POST['total_fac'] : '';

if (empty($id_compro) || empty($fech_emision) || empty($total_fac)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    // Verificar si el id_compro ya existe en la base de datos
    $check_sql = "SELECT id_comprobante FROM factura WHERE id_comprobante = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $id_compro);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $response['status'] = 'error';
        $response['message'] = 'El ID del comprobante ya está registrado.';
    } else {
        // Utilizando una declaración preparada para prevenir inyección SQL
        $sql = "INSERT INTO factura (id_comprobante, fecha_emision, total) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_compro, $fech_emision, $total_fac); // asumiendo que id_comprobante es de tipo int
        
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'FACTURA REGISTRADA CON EXITO!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error al registrar la factura: ' . $conn->error;
        }
        
        // Cerrar la declaración preparada
        $stmt->close();
    }

    // Cerrar la declaración preparada de verificación
    $stmt_check->close();
}

// Enviar respuesta en formato JSON
echo json_encode($response);

// Cerrar conexión
$conn->close();
?>
