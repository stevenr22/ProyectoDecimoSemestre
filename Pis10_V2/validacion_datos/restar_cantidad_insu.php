<?php
// Incluye la conexión a la base de datos
include("../bd/conexion.php");

// Inicializa la respuesta como un array
$response = array();

// Recibe los datos enviados por AJAX
$cantidad_a_restar = $_POST['cantidad_a_restar'];
$id_insumo = $_POST['id_insumo'];
$nombre_de_insumo_a_restar = $_POST['nombre_de_insumo_a_restar'];
$id_usuario = $_POST['id_usuario'];
$id_parcela = $_POST['id_parcela'];
$fech_uso = $_POST['fech_uso'];

// Verificar si hay suficientes unidades en stock para restar
$sql_stock = "SELECT cantidad_total_usada FROM total_insumos WHERE id_total_insumo = $id_insumo";
$resultado_stock = mysqli_query($conn, $sql_stock);
if ($fila = mysqli_fetch_assoc($resultado_stock)) {
    $stock_actual = $fila['cantidad_total_usada'];
    if ($stock_actual < $cantidad_a_restar) {
        $response['success'] = false;
        $response['message'] = 'No hay suficiente stock para realizar esta operación.';
        echo json_encode($response);
        exit(); // Detener el script si no hay suficiente stock
    }
}

// Restar la cantidad utilizada del stock en total_insumos
$nuevo_stock = $stock_actual - $cantidad_a_restar;
$sql_actualizar_stock = "UPDATE total_insumos SET cantidad_total_usada = $nuevo_stock, cantidad_restada = CONCAT('-','$cantidad_a_restar')
WHERE id_total_insumo = $id_insumo";
if (!mysqli_query($conn, $sql_actualizar_stock)) {
    $response['success'] = false;
    $response['message'] = 'Error al actualizar el stock de insumos.';
    echo json_encode($response);
    exit(); // Detener el script si hay un error al actualizar el stock
}

// Registrar el uso del insumo en uso_insumos
$sql_registrar_uso = "INSERT INTO uso_insumos (id_parcela, id_total_insumo, cantidad_utilizada, fecha_utilizacion) 
VALUES ($id_parcela, $id_insumo, $cantidad_a_restar, '$fech_uso')";
if (mysqli_query($conn, $sql_registrar_uso)) {
    $response['success'] = true;
    $response['message'] = 'Uso del insumo registrado correctamente.';
} else {
    $response['success'] = false;
    $response['message'] = 'Error al registrar el uso del insumo.';
}

// Devuelve la respuesta como JSON
echo json_encode($response);

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
