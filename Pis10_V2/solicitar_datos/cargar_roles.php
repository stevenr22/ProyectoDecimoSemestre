<?php
include("../bd/conexion.php");

// Obtener el id_usuario del POST
if (isset($_POST['id_usuario'])) {
    $idUsuario = $_POST['id_usuario'];

    // Consulta para obtener el rol actual del usuario
    $sqlRolActual = "SELECT id_rol FROM usuario WHERE id_usu = '$idUsuario'";
    $resultRolActual = $conn->query($sqlRolActual);
    $filaRolActual = $resultRolActual->fetch_assoc();
    $rolActualUsuario = $filaRolActual['id_rol'];

    // Consulta para obtener todos los roles
    $sql = "SELECT id_rol, cargo FROM rol";
    $result = $conn->query($sql);

    // Inicio de las opciones del select
    $options = "<option value='' selected disabled>Actualice el rol</option>";


    // Generar las opciones del select
    while ($row = $result->fetch_assoc()) {
        $selected = ($rolActualUsuario == $row['id_rol']) ? "selected" : "";
        $options .= "<option value='" . $row['id_rol'] . "' $selected>" . $row['cargo'] . "</option>";
    }

    // Devolver las opciones generadas
    echo $options;

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se proporciona el id_usuario, devolver un mensaje de error
    echo "<option value='' disabled>Error al cargar las opciones del rol.</option>";
}
?>
