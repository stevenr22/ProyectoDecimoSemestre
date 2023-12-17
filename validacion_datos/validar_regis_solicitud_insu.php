<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta



$fechSoli = (isset($_POST['fechSoli'])) ? $_POST['fechSoli'] : '';
$selecttipoIns = (isset($_POST['selecttipoIns'])) ? $_POST['selecttipoIns'] : '';
$nom_insu = (isset($_POST['nom_insu'])) ? $_POST['nom_insu'] : '';
$Canti = (isset($_POST['Canti'])) ? $_POST['Canti'] : '';


if (empty($fechSoli) || empty($selecttipoIns) || empty($nom_insu)|| empty($Canti)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
      
       
        $sql = "INSERT INTO solicitudes (fecha_solicitud, tipo_insumo, nombre_insu, cantidad) 
        VALUES ('$fechSoli','$selecttipoIns','$nom_insu','$Canti')";
        $resultado =  mysqli_query($conn,$sql);

        if($resultado) {
            $response['status'] = 'success';
            $response['message'] = 'INSUMO REGISTRADO CON EXITO!';
        }
    }


// Enviar respuesta en formato JSON
echo json_encode($response);
?>
