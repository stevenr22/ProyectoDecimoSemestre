<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta

//$fechSoli = (isset($_POST['fechSoli'])) ? $_POST['fechSoli'] : '';
//$selecttipoIns = (isset($_POST['selecttipoIns'])) ? $_POST['selecttipoIns'] : '';
//$nom_insu = (isset($_POST['nom_insu'])) ? $_POST['nom_insu'] : '';
//$Canti = (isset($_POST['Canti'])) ? $_POST['Canti'] : '';
//$id_usuario_empleado = (isset($_POST['id_usuario_empleado'])) ? $_POST['id_usuario_empleado'] : '';
$fechSoli = '2023-12-12';
$selecttipoIns = 'Herramienta';
$nom_insu = 'Pla';
$Canti = 45;
$id_usuario_empleado = 3;








if (empty($fechSoli) || empty($selecttipoIns) || empty($nom_insu) || empty($Canti)){
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $sql = "INSERT INTO solicitudes (fecha_solicitud, tipo_insumo, nombre_insu, cantidad, id_usu) 
            VALUES ('$fechSoli','$selecttipoIns','$nom_insu','$Canti','$id_usuario_empleado')";
    
    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        $response['status'] = 'error';
        $response['message'] = 'Error en la consulta SQL: ' . mysqli_error($conn);
    } elseif (mysqli_affected_rows($conn) > 0) { // Verifica si se afectó alguna fila
        $response['status'] = 'success';
        $response['message'] = 'INSUMO REGISTRADO CON EXITO!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No se pudo insertar el insumo.';
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
