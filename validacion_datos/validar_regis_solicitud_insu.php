<?php
session_start();
include("../bd/conexion.php");
$response = array(); // Inicializamos el array de respuesta

$fechSoli = (isset($_POST['fechSoli'])) ? $_POST['fechSoli'] : '';
$selecttipoIns = (isset($_POST['selecttipoIns'])) ? $_POST['selecttipoIns'] : '';
$nom_insu = (isset($_POST['nom_insu'])) ? $_POST['nom_insu'] : '';
$Canti = (isset($_POST['Canti'])) ? $_POST['Canti'] : '';
$id_usuario_empleado = (isset($_POST['id_usuario_empleado'])) ? $_POST['id_usuario_empleado'] : '';

if (empty($fechSoli) || empty($selecttipoIns) || empty($nom_insu) || empty($Canti)){
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    // Consulta el stock disponible para el insumo seleccionado
    $consultaStock = "SELECT SUM(cantidad_total) as stock FROM insumos WHERE tipo = '$selecttipoIns' AND nombre = '$nom_insu'";
    $resultadoStock = mysqli_query($conn, $consultaStock);

    if ($resultadoStock && mysqli_num_rows($resultadoStock) > 0) {
        $fila = mysqli_fetch_assoc($resultadoStock);
        $stockDisponible = $fila['stock'];

        // Verifica si el stock es igual a 0 para permitir la solicitud
        if ($stockDisponible == 0) {
            // Inserta la solicitud
            $sql = "INSERT INTO solicitudes (fecha_solicitud, tipo_insumo, nombre_insu, cantidad, id_usu) 
                    VALUES ('$fechSoli','$selecttipoIns','$nom_insu','$Canti','$id_usuario_empleado')";
            
            $resultado = mysqli_query($conn, $sql);

            if (!$resultado) {
                $response['status'] = 'error';
                $response['message'] = 'Error en la consulta SQL: ' . mysqli_error($conn);
            } elseif (mysqli_affected_rows($conn) > 0) {
                $response['status'] = 'success';
                $response['message'] = 'INSUMO REGISTRADO CON EXITO!';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'No se pudo insertar el insumo.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Ya existe stock disponible para este insumo.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error al obtener el stock del insumo seleccionado.';
    }
}

// Enviar respuesta en formato JSON
echo json_encode($response);
?>
