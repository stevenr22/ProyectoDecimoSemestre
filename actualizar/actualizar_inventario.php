<?php
include("../bd/conexion.php");
$response = array();

if (isset($_POST['id_insu_recep'], $_POST['canti_suma'])) {
    $idInsumo = $_POST['id_insu_recep'];
    $nuevaCantidad = $_POST['canti_suma'];

    // Obtener el valor actual de 'cantidad_total' del insumo específico
    $querySelect = "SELECT cantidad_total FROM insumos WHERE id_insumo = '$idInsumo'";
    $result = mysqli_query($conn, $querySelect);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cantidadActual = $row['cantidad_total'];

        // Sumar el valor actual con la nueva cantidad
        $cantidadSumada = $cantidadActual + $nuevaCantidad;

        // Actualizar los valores en la base de datos
        $queryUpdate = "UPDATE insumos SET cantidad_previa = '$cantidadActual', cantidad_sumada = CONCAT('+','$nuevaCantidad'), cantidad_total = '$cantidadSumada' WHERE id_insumo = '$idInsumo'";
        
        if (mysqli_query($conn, $queryUpdate)) {
            $response['status'] = 'success';
            $response['message'] = 'Registro actualizado con éxito';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error al actualizar el registro';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Insumo no encontrado';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Datos faltantes';
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
