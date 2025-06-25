<?php
session_start();
include("../bd/conexion.php");


$id_solicitud = $_POST["id_solicitud"];
if(isset($id_solicitud)&& $id_solicitud != null){
    if($registrar = mysqli_query($conn, "UPDATE solicitudes SET estado = 'Eliminado' WHERE id_solicitud='$id_solicitud' ")){
        return "ok";
    }else{
        return "error";
    }
}else{
    return "error";
}

mysqli_free_result($registrar);
mysqli_close($conn);