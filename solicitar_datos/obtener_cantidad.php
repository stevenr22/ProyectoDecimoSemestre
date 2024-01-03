<?php
include("../bd/conexion.php");

if(isset($_POST['nombreInsumo'])) {
    $nombreInsumo = $_POST['nombreInsumo'];
    
    $query = "SELECT SUM(cantidad_total) AS cantidad_stock FROM insumos WHERE nombre = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $nombreInsumo); // Aquí vinculamos el nombre del insumo
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['cantidad_stock'];
    } else {
        echo "No disponible"; // O cualquier mensaje que quieras mostrar si no hay stock
    }
}
?>
