<?php
session_start();
include("../bd/conexion.php");

$usu = (isset($_POST['Nusu'])) ? $_POST['Nusu'] : '';
$contra = (isset($_POST['Ncontra'])) ? $_POST['Ncontra'] : '';

$response = array();

if (empty($usu) || empty($contra)) {
    $response = array(
        'message' => 'Rellene todos los campos',
        'type' => 'warning'
    );
} else {
    $sentencia = "SELECT u.id_usu, r.id_rol, u.nombre_usu, u.nombre_completo, u.clave, r.cargo, u.correo 
    FROM usuario  as u , rol as r 
    WHERE (r.id_rol=u.id_rol) AND (u.nombre_usu='$usu' AND u.clave='$contra')";

    $respuesta = $conn->query($sentencia);

    if ($respuesta->num_rows > 0) {
        while ($fila = $respuesta->fetch_array()) {
            $_SESSION['DBid_usu'] = $fila['id_usu'];
            $_SESSION['DBnombre_usu'] = $fila['nombre_usu'];
            $_SESSION['DBnombre_completo'] = $fila['nombre_completo'];
            $_SESSION['DBcorreo'] = $fila['correo'];
            $_SESSION['DBcargo'] = $fila['cargo'];
            $_SESSION['DBid_rol'] = $fila['id_rol'];

            $response = array(
                'message' => 'Sesión iniciada correctamente.',
                'type' => 'success'
            );
        }
    } else {
        $response = array(
            'message' => 'El usuario o contraseña no son correctos, intente nuevamente',
            'type' => 'warning'
        );
    }
}

if (empty($response)) {
    $response = array(
        'message' => 'El usuario o contraseña no son correctos, intente nuevamente',
        'type' => 'error'
    );
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
