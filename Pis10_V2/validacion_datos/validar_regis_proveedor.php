<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta



$nom_prove = (isset($_POST['nom_prove'])) ? $_POST['nom_prove'] : '';
$nomb_trab_prov = (isset($_POST['nomb_trab_prov'])) ? $_POST['nomb_trab_prov'] : '';
$direc = (isset($_POST['direc'])) ? $_POST['direc'] : '';
$telefo = (isset($_POST['telefo'])) ? $_POST['telefo'] : '';
$fech_regis_prov = (isset($_POST['fech_regis_prov'])) ? $_POST['fech_regis_prov'] : '';



if (empty($nom_prove) || empty($nomb_trab_prov) || empty($direc) || empty($telefo) || empty($fech_regis_prov)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $query = "SELECT * FROM proveedor WHERE nombre_empre = '$nom_prove' AND (estado IS NULL OR estado <> 'Eliminado');";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 'warning';
        $response['message'] = 'PROVEEDOR YA SE ENCUENTRA REGISTRADA!';
    } 
    
    else {
      
       
        $sql = "INSERT INTO proveedor (nombre_empre, nombre_traba, direccion, num_tele, fecha_regis) 
        VALUES ('$nom_prove', '$nomb_trab_prov','$direc','$telefo','$fech_regis_prov')";
        $resultado =  mysqli_query($conn,$sql);

        if($resultado) {
            $response['status'] = 'success';
            $response['message'] = 'PROVEEDOR REGISTRADA CON EXITO!';
        }
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
