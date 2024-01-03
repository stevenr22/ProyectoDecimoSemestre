<?php
include("../bd/conexion.php");

if(isset($_POST['tipoInsumo'])) {
    $tipoInsumo = $_POST['tipoInsumo'];
    
    $query = "SELECT id_insumo, nombre, SUM(cantidad_total) AS cantidad_stock FROM insumos WHERE tipo = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $tipoInsumo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $options = "";
    while($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
        // Aquí puedes agregar lógica para mostrar la cantidad en stock en un input si lo necesitas
    }

    echo $options;
}
?>
