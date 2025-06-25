<?php
include("../bd/conexion.php");

if (isset($_POST['id_usuario']) && isset($_POST['nuevo_rol'])) {
    $idUsuario = $_POST['id_usuario'];
    $nuevoRol = $_POST['nuevo_rol'];

    // Actualizar el rol del usuario en la base de datos
    $sentencia = $conn->prepare("UPDATE usuario SET id_rol = ? WHERE id_usu = ?");
    $sentencia->bind_param("ii", $nuevoRol, $idUsuario);

    if ($sentencia->execute()) {
        // La actualización fue exitosa
        echo json_encode(array('success' => true));
    } else {
        // La actualización falló
        echo json_encode(array('success' => false));
    }

    // Cerrar la conexión
    $sentencia->close();
} else {
    // Datos insuficientes en la solicitud POST
    echo json_encode(array('success' => false, 'error' => 'Datos insuficientes'));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
