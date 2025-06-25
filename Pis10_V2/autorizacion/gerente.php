<?php
session_start();
include('../bd/conexion.php');

if (!isset($_SESSION['DBid_usu']) || $_SESSION['DBcargo'] !== 'Gerente') {
    echo '
        <script src="../recursos/alertas/sweetalert2.js"></script>
        <link rel="stylesheet" href="../recursos/alertas/sweetalert2.css">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Acceso denegado",
                    text: "Este módulo es exclusivo para gerentes.",
                    confirmButtonText: "Aceptar"
                }).then(function() {
                    window.location.href = "../index.php";
                });
            });
        </script>';
    exit();
}
?>
