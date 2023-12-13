<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta



$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$nombre_completo = (isset($_POST['nombre_completo'])) ? $_POST['nombre_completo'] : '';
$contraseña = (isset($_POST['contraseña'])) ? $_POST['contraseña'] : '';


if (empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contraseña)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $query = "SELECT * FROM usuario WHERE nombre_usu = '$usuario'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'USUARIO REGISTRADO!';
    } else {
        $asignar_idRol = mysqli_query($conn, "SELECT id_rol FROM rol WHERE cargo = 'Empleado'");
        $id = mysqli_fetch_array($asignar_idRol);
       
        $sql = "INSERT INTO usuario (nombre_usu, contraseña, nombre_completo, correo, id_rol) 
        VALUES ('$usuario', '$contraseña','$nombre_completo','$correo','$id[0]')";
        $resultado =  mysqli_query($conn,$sql);

        if($resultado) {
            $response['status'] = 'success';
            $response['message'] = 'DATOS REGISTRADOS CORRECTAMENTE!';
        }
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
