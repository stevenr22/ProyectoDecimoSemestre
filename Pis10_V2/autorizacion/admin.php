<?php
session_start();
include('../bd/conexion.php');

?>

<script src="../recursos/alertas/sweetalert2.js"></script>
<link rel="stylesheet" href="../recursos/alertas/sweetalert2.css">

<?php
// Verificar si la sesión está establecida y si el usuario tiene privilegios de administrador
if (!isset($_SESSION['DBid_usu']) || $_SESSION['DBcargo'] !== 'Administrador') {
    // Mostrar alerta con Swal.fire
    echo '
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Acceso denegado",
                    text: "No tienes privilegios de administrador",
                    confirmButtonText: "Aceptar"
                }).then(function() {
                    window.location.href = "../index.php"; // Redirigir a la página de inicio de sesión
                });
            });
        </script>
    ';

    exit(); // Asegurar que el script se detenga después de la alerta
}
?>
