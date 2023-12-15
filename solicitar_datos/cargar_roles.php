<?php
session_start();
include("../bd/conexion.php");

// Consulta para obtener los roles
$sql = "SELECT id_rol, cargo FROM rol";
$result = $conn->query($sql);

// Iterar sobre los resultados y mostrar cada opción
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id_rol'] . "'>" . $row['cargo'] . "</option>";
}

// Cerrar la conexión después de obtener los resultados
$conn->close();
?>
