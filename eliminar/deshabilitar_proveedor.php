<?php
session_start();
include("../bd/conexion.php");


$id_prove = $_POST["id_prove"];
if(isset($id_prove)&& $id_prove != null){
    if($registrar = mysqli_query($conn, "UPDATE proveedor SET estado = 'Deshabilitado' WHERE id_prove='$id_prove' ")){
        return "ok";
    }else{
        return "error";
    }
}else{
    return "error";
}

mysqli_free_result($registrar);
mysqli_close($conn);