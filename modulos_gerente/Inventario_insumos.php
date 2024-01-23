<?php
session_start();
include('../bd/conexion.php');
if (isset($_SESSION['DBid_usu']) == false) header("location:../index.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Inventario insumos .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>


</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="../inicio/dashboard.php" class="text-nowrap logo-img">
                        <img src="../recursos/img/GESTIÓN MANGO.png" width="100%" height="100%" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <?php include("../partes/menu.php");?>
            </div>
        </aside>
        <div class="body-wrapper">
            <?php include("../partes/encabezado.php");?>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Inventario disponible</b></h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">




                        <div class="container justify-content-center align-items-center" style="width: 400px; height: 400px;">
                            <canvas id="graficoInventario" style="width: 100%; height: 100%;"></canvas>
                        </div>



                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script>
   document.addEventListener('DOMContentLoaded', function() {
    // Realizar una solicitud AJAX para obtener los datos de insumos desde tu backend
    fetch('../solicitar_datos/datos_inventario.php')
        .then(response => response.json()) // Convertir la respuesta a formato JSON
        .then(data => {
            // Extraer y ordenar los datos necesarios para el gráfico
            const insumosData = data.sort((a, b) => b.cantidad_total_usada - a.cantidad_total_usada);
            const insumos = insumosData.map(item => item.nombre);
            const cantidades = insumosData.map(item => item.cantidad_total_usada);

            // Obtener el contexto del canvas
            const pie = document.getElementById('graficoInventario').getContext('2d');

            // Crear el gráfico de pastel con los datos obtenidos
            new Chart(pie, {
                type: 'pie',
                data: {
                    labels: insumos,
                    datasets: [{
                        data: cantidades,
                        backgroundColor: [
                                'rgba(255, 99, 132, 0.6)', // Rojo
                                'rgba(54, 162, 235, 0.6)', // Azul
                                'rgba(255, 206, 86, 0.6)', // Amarillo
                                'rgba(75, 192, 192, 0.6)', // Verde agua
                                'rgba(153, 102, 255, 0.6)', // Morado
                                'rgba(255, 159, 64, 0.6)', // Naranja
                                'rgba(255, 0, 255, 0.6)', // Magenta
                                'rgba(0, 255, 255, 0.6)', // Cian
                                'rgba(128, 128, 128, 0.6)', // Gris
                                'rgba(0, 0, 0, 0.6)' // Negro
                                // Puedes seguir añadiendo más colores según lo necesites
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 0, 255, 1)',
                                'rgba(0, 255, 255, 1)',
                                'rgba(128, 128, 128, 1)',
                                'rgba(0, 0, 0, 1)'
                                // Asegúrate de mantener el mismo orden y cantidad de colores en ambos arrays
                            ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Inventario de Insumos'
                    },
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
});

    </script>


</body>

</html>