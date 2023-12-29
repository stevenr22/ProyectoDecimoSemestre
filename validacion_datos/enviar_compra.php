<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta



$id_solicitud = (isset($_POST['id_solicitud'])) ? $_POST['id_solicitud'] : '';
$fech_soli = (isset($_POST['fech_soli'])) ? $_POST['fech_soli'] : '';
$tipo_insu = (isset($_POST['tipo_insu'])) ? $_POST['tipo_insu'] : '';
$nomb_insu = (isset($_POST['nomb_insu'])) ? $_POST['nomb_insu'] : '';
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
$id_usu = (isset($_POST['id_usu'])) ? $_POST['id_usu'] : '';
$id_prove = (isset($_POST['id_prove'])) ? $_POST['id_prove'] : '';




if (empty($id_solicitud) || empty($fech_soli) || empty($tipo_insu)
|| empty($nomb_insu) || empty($cantidad) || empty($id_usu) ||  empty($id_prove)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $query = "SELECT * FROM detalle_solicitud WHERE id_solicitud = '$id_solicitud';";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'SOLICITUDD YA SE ENCUENTRA ENVIADA!';
    } 
    
    else {
      
       
        $sql = "INSERT INTO detalle_solicitud (fech_solicitud, tipo_insu,nombre_insu, cantidad_insu, id_solicitud, id_usuario, id_prove) 
        VALUES ('$fech_soli','$tipo_insu','$nomb_insu','$cantidad','$id_solicitud','$id_usu','$id_prove')";
        $resultado =  mysqli_query($conn,$sql);

        if($resultado) {
            $response['status'] = 'success';
            $response['message'] = 'SOLICITUD ENVIADA CON EXITO!';
        }
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
