<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta



$nombre_insu = (isset($_POST['nombre_insu'])) ? $_POST['nombre_insu'] : '';
$tip_insu = (isset($_POST['tip_insu'])) ? $_POST['tip_insu'] : '';
$canti_insu = (isset($_POST['canti_insu'])) ? $_POST['canti_insu'] : '';
$f_regis = (isset($_POST['f_regis'])) ? $_POST['f_regis'] : '';


if (empty($nombre_insu) || empty($tip_insu) || empty($canti_insu)|| empty($f_regis)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $query = "SELECT * FROM insumos WHERE nombre = '$nombre_insu' AND (estado IS NULL OR estado <> 'Eliminado');";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'INSUMO YA SE ENCUENTRA REGISTRADA!';
    } 
    
    else {
      
       
        $sql = "INSERT INTO insumos (nombre, tipo, fecha_regis, cantidad) 
        VALUES ('$nombre_insu', '$tip_insu','$f_regis','$canti_insu')";
        $resultado =  mysqli_query($conn,$sql);

        if($resultado) {
            $response['status'] = 'success';
            $response['message'] = 'INSUMO REGISTRADO CON EXITO!';
        }
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
