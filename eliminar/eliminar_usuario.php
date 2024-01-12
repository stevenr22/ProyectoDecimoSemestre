<?php
session_start();
include("../bd/conexion.php");

$id_usuario = $_POST["id_usuario"];

if (isset($id_usuario) && $id_usuario != null) {
    // Consulta para obtener el rol del usuario
    $consultaRol = mysqli_query($conn, "SELECT u.id_usu, u.id_rol, u.nombre_completo, r.cargo
    FROM usuario as u
    JOIN rol as r ON u.id_rol = r.id_rol
    WHERE u.id_usu = '$id_usuario'");
    
    if ($consultaRol) {
        $fila = mysqli_fetch_assoc($consultaRol);
        $rol = $fila['cargo'];

        // Verificar si el rol es 'administrador'
        if ($rol == 'Administrador') {
            echo "No puedes eliminar a un usuario con rol de administrador.";
        } else {
            // Si no es administrador, procede con la eliminación
            if ($registrar = mysqli_query($conn, "UPDATE usuario SET estado = 0 WHERE id_usu = '$id_usuario'")) {
                echo "ok";
            } else {
                echo "error";
            }
        }
        
        mysqli_free_result($consultaRol);
    } else {
        echo "error al obtener el rol del usuario";
    }
} else {
    echo "error";
}

mysqli_close($conn);
?>
