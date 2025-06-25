<?php
session_start();
include("../bd/conexion.php");


$id_rol = $_POST["id_rol"];
$cargo = $_POST["cargo"];
if(isset($id_rol)&& $id_rol != null){
    if($registrar = mysqli_query($conn, "UPDATE rol SET estado = 0 WHERE id_rol='$id_rol' ")){
        return "ok";
    }else{
        return "error";
    }
}else{
    return "error";
}

mysqli_free_result($registrar);
mysqli_close($conn);