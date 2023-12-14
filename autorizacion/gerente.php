<?php
session_start();
include('../bd/conexion.php');

// Verificar si la sesión está establecida y si el usuario tiene privilegios de administrador
if (!isset($_SESSION['DBid_usu']) || $_SESSION['DBcargo'] !== 'Gerente') {
    echo '<script>alert("Acceso denegado");</script>';
}
?>