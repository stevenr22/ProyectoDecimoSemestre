<?php
session_start();
include("../bd/conexion.php");
// Verificar si se reciben los datos del formulario
if(isset($_POST['nombre_comple_pag'], 
        $_POST['correo_pag'], 
        $_POST['nusu_pag'], 
        $_POST['DBid_usu_en_sesion'])) {
    // Obtener los valores enviados por POST
    $nombre_comple_pag = $_POST['nombre_comple_pag'];
    $correo_pag = $_POST['correo_pag'];
    $nusu_pag = $_POST['nusu_pag'];
    $DBid_usu_en_sesion = $_POST['DBid_usu_en_sesion'];



  
    $query = "UPDATE usuario SET nombre_usu='$nusu_pag', nombre_completo='$nombre_comple_pag', 
    correo='$correo_pag' WHERE id_usu='$DBid_usu_en_sesion'";
    $resultado = mysqli_query($conn, $query);

    // Verificar si la actualización fue exitosa
    if($resultado) {
        $response = array('status' => 'success');
     } else {
        $response = array('status' => 'error', 'message' => 'Error al actualizar el perfil');
     }

    // Si todo está correcto, envía una respuesta JSON
    echo json_encode($response);
} else {
    $response = array('status' => 'error', 'message' => 'No se recibieron los datos correctamente');
    echo json_encode($response);
}
?>
