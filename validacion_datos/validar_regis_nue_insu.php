<?php
session_start();
include("../bd/conexion.php");

$response = array();

$nombre_insu = isset($_POST['nombre_insu']) ? $_POST['nombre_insu'] : '';
$tip_insu = isset($_POST['tip_insu']) ? $_POST['tip_insu'] : '';
$canti_insu = isset($_POST['canti_insu']) ? $_POST['canti_insu'] : '';
$f_regis = isset($_POST['f_regis']) ? $_POST['f_regis'] : '';

if (empty($nombre_insu) || empty($tip_insu) || empty($canti_insu) || empty($f_regis)) {
    $response['status'] = 'warning';
    $response['message'] = 'CAMPOS VACIOS!';
} else {
    $sql = "INSERT INTO insumos (nombre, tipo, fecha_regis, cantidad) 
            VALUES ('$nombre_insu', '$tip_insu','$f_regis','$canti_insu')";
    
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        $response['status'] = 'success';
        $response['message'] = 'INSUMO REGISTRADO CON EXITO!';

        //CANTIDAD ACTUAL ALMACENADA
        $sql_total_insu = "SELECT SUM(cantidad) AS total_cantidad_insu FROM insumos WHERE nombre = '$nombre_insu' AND fecha_regis = '$f_regis'";
        $resultado_total_insu = mysqli_query($conn, $sql_total_insu);
        $fila_total_insu = mysqli_fetch_assoc($resultado_total_insu);
        $total_cantidad_insu = $fila_total_insu['total_cantidad_insu']; //40

        // Verificar si ya existe un registro en total_insumos
        $sql_verificar_insu = "SELECT COUNT(*) AS total FROM total_insumos WHERE nombre = '$nombre_insu'";
        $resultado_verificar_insu = mysqli_query($conn, $sql_verificar_insu);
        $fila_verificar_insu = mysqli_fetch_assoc($resultado_verificar_insu);
        $existe_insu = $fila_verificar_insu['total']; //1 QUE SI EXISTE

        if ($existe_insu > 0) { //VALIDA QUE EXISTA, EN ESTE CASO SI EXISTE
              // Actualizar la cantidad total usada y sumar la nueva cantidad
              $sql_actualizar_insu = "UPDATE total_insumos 
              SET cantidad_total_usada = cantidad_total_usada+$canti_insu, cantidad_sumada = cantidad_sumada + $canti_insu
              WHERE nombre = '$nombre_insu'";

            /*$sql_actualizar_insu = "UPDATE total_insumos 
            SET cantidad_total_usada = $total_cantidad_insu, cantidad_sumada = CONCAT('+', $canti_insu)
            WHERE nombre = '$nombre_insu'";*/



            mysqli_query($conn, $sql_actualizar_insu);
        } else {
            $sql_insertar_insu = "INSERT INTO total_insumos (nombre, tipo, cantidad_total_usada, fecha_agregada) 
            VALUES ('$nombre_insu', '$tip_insu', $total_cantidad_insu, CURDATE())";

            mysqli_query($conn, $sql_insertar_insu);
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'ERROR AL REGISTRAR EL INSUMO!';
    }
}

echo json_encode($response);
?>
