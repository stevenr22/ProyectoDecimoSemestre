<?php
session_start();
include("../bd/conexion.php");


$id_parcela = $_POST["id_parcela"];
if(isset($id_parcela)&& $id_parcela != null){
    if($registrar = mysqli_query($conn, "UPDATE parcela SET estado = 'Deshabilitado' WHERE id_parcela='$id_parcela' ")){
        return "ok";
    }else{
        return "error";
    }
}else{
    return "error";
}

mysqli_free_result($registrar);
mysqli_close($conn);