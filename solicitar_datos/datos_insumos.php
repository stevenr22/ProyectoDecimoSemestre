<?php
include("../bd/conexion.php");

if(isset($_POST['tipoInsumo'])) {
    $tipoInsumo = $_POST['tipoInsumo'];
    
    // Opción inicial como placeholder
    $options = "<option value='' selected disabled>Seleccione un insumo</option>";
    
    $query = "SELECT
    id_insumo, 
    nombre, 
    SUM(cantidad_total) AS cantidad_stock 
FROM 
    insumos 
WHERE tipo = '$tipoInsumo'
GROUP BY 
    nombre;
";
    
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='".$row['id_insumo']."' data-stock='".$row['cantidad_stock']."'>".$row['nombre']."</option>";
    }

    echo $options;
}

?>
