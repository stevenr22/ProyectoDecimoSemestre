<?php
include("../bd/conexion.php");

if (
    isset($_POST['cantidad_a_restar']) && 
    isset($_POST['nombre_de_insumo_a_restar']) && 
    isset($_POST['id_usuario']) && 
    isset($_POST['id_parcela']) && 
    isset($_POST['fech_uso'])
) {
    $cantidad_a_restar = $_POST['cantidad_a_restar'];
    $id_usuario = $_POST['id_usuario'];
    $id_parcela = $_POST['id_parcela'];
    $fech_uso = $_POST['fech_uso'];

    $nombre_de_insumo_a_restar = $_POST['nombre_de_insumo_a_restar'];

    // Preparar la consulta para insertar en la tabla uso_insumo
    $query = "INSERT INTO uso_insumos (fech_uso, cantidad_utilizar, id_usuario, nombre_insumo, id_parcela) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssisi", $fech_uso, $cantidad_a_restar, $id_usuario, $nombre_de_insumo_a_restar, $id_parcela); // Asegúrate de que los tipos de datos coincidan
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo json_encode(['success' => true, 'message' => 'Datos insertados correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al insertar datos']);
    }
    

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
