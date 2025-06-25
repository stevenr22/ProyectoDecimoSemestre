<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta



$nom_parce = (isset($_POST['nom_parce'])) ? $_POST['nom_parce'] : '';
$ancho_parce = (isset($_POST['ancho_parce'])) ? $_POST['ancho_parce'] : '';
$alto_parce = (isset($_POST['alto_parce'])) ? $_POST['alto_parce'] : '';
$fecha_regis_parce = (isset($_POST['fecha_regis_parce'])) ? $_POST['fecha_regis_parce'] : '';


if (empty($nom_parce) || empty($ancho_parce) || empty($alto_parce)|| empty($fecha_regis_parce)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $query = "SELECT * FROM parcela WHERE nombre = '$nom_parce' AND (estado IS NULL OR estado <> 'Eliminado');";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'PARCELA YA SE ENCUENTRA REGISTRADA!';
    } 
    
    else {
      
       
        $sql = "INSERT INTO parcela (nombre, ancho, alto, fecha_registro) 
        VALUES ('$nom_parce', '$ancho_parce','$alto_parce','$fecha_regis_parce')";
        $resultado =  mysqli_query($conn,$sql);

        if($resultado) {
            $response['status'] = 'success';
            $response['message'] = 'PARCELA REGISTRADA CON EXITO!';
        }
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
