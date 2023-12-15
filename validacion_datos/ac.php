<?php

// ac.php

// Verificar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_completo = $_POST['NomCompleto'];
    $correo = $_POST['correo'];
    $nombre_usuario = $_POST['NomUsuario'];
    $nombre_usuario = $_POST['NomUsuario'];

    // Aquí debes agregar la lógica de actualización en la base de datos
    // Puedes usar consultas SQL con MySQLi o PDO para actualizar los datos

    // Ejemplo con MySQLi
    $mysqli = new mysqli("localhost", "root", "", "gestion_mango");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("La conexión ha fallado: " . $mysqli->connect_error);
    }

    // Preparar la consulta de actualización
    $sql = "UPDATE usuario SET nombre_completo=?, correo=?, nombre_usu=? WHERE id_usu=1";

    // Preparar la declaración
    $stmt = $mysqli->prepare($sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("sss", $nombre_completo, $correo, $nombre_usuario);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La actualización fue exitosa

            // Puedes enviar una respuesta al AJAX
            $response['status'] = 'success';
            $response['message'] = 'Perfil actualizado correctamente';

            echo json_encode($response);
        } else {
            // La actualización falló

            // Puedes enviar una respuesta al AJAX
            $response['status'] = 'error';
            $response['message'] = 'Error al actualizar el perfil';

            echo json_encode($response);
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        // La preparación de la consulta falló

        // Puedes enviar una respuesta al AJAX
        $response['status'] = 'error';
        $response['message'] = 'Error en la preparación de la consulta';

        echo json_encode($response);
    }

    // Cerrar la conexión
    $mysqli->close();
}




?>
