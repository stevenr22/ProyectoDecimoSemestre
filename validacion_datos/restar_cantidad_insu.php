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

    // Consulta para obtener el stock disponible del insumo
    $consultaStock = "SELECT SUM(cantidad_total) as stock FROM insumos WHERE nombre = ?";
    $stmtStock = mysqli_prepare($conn, $consultaStock);
    mysqli_stmt_bind_param($stmtStock, "s", $nombre_de_insumo_a_restar);
    mysqli_stmt_execute($stmtStock);
    $resultStock = mysqli_stmt_get_result($stmtStock);
    $rowStock = mysqli_fetch_assoc($resultStock);
    $stockDisponible = $rowStock['stock'];

    mysqli_stmt_close($stmtStock);

    // Validar si la cantidad a restar es menor o igual al stock disponible
    if ($cantidad_a_restar <= $stockDisponible) {
        // Restar la cantidad a restar al stock disponible
        $nuevoStock = $stockDisponible - $cantidad_a_restar;

        // Actualizar el stock en la tabla insumos
        $actualizarStockQuery = "UPDATE insumos SET cantidad_total = ? WHERE nombre = ?";
        $stmtActualizarStock = mysqli_prepare($conn, $actualizarStockQuery);
        mysqli_stmt_bind_param($stmtActualizarStock, "is", $nuevoStock, $nombre_de_insumo_a_restar);
        mysqli_stmt_execute($stmtActualizarStock);

        if (mysqli_stmt_affected_rows($stmtActualizarStock) > 0) {
            // Preparar la consulta para insertar en la tabla uso_insumo
            $query = "INSERT INTO uso_insumos (fech_uso, cantidad_utilizar, id_usuario, nombre_insumo, id_parcela) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssisi", $fech_uso, $cantidad_a_restar, $id_usuario, $nombre_de_insumo_a_restar, $id_parcela);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo json_encode(['success' => true, 'message' => 'Datos insertados correctamente']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al insertar datos']);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el stock']);
        }

        mysqli_stmt_close($stmtActualizarStock);
    } else {
        echo json_encode(['success' => false, 'message' => 'La cantidad a restar es mayor que el stock disponible']);
    }

    mysqli_close($conn);
}
?>
