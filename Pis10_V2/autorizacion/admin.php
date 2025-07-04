<?php
session_start();
include('../bd/conexion.php');

// Si no hay sesión activa o el rol no es "Administrador", bloquear el acceso
if (!isset($_SESSION['DBid_usu']) || $_SESSION['DBcargo'] !== 'Administrador') {
    echo '
        <script src="../recursos/alertas/sweetalert2.js"></script>
        <link rel="stylesheet" href="../recursos/alertas/sweetalert2.css">

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Acceso denegado",
                    text: "Este módulo está restringido solo para administradores.",
                    confirmButtonText: "Aceptar"
                }).then(function() {
                    window.location.href = "../index.php";
                });
            });
        </script>
    ';
    exit(); // Detener ejecución
}
?>
