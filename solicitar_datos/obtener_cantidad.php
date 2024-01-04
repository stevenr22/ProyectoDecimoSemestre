<?php
include("../bd/conexion.php");

if (isset($_POST['nombre'])) {
    $nombreInsumo = $_POST['nombre'];

    // Consulta para obtener la suma total de cantidad_total para el nombre específico
    $query = "SELECT SUM(cantidad_total) AS cantidad_stock FROM insumos WHERE nombre = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $nombreInsumo); // Bind del nombre directamente
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            echo $row['cantidad_stock']; // Devuelve la suma total de cantidad_total para ese nombre
        } else {
            echo "No disponible";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt); // Cerrar la declaración preparada
    mysqli_close($conn); // Cerrar la conexión
}
?>
