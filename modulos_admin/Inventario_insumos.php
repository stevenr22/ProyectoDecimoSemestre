<?php include("../autorizacion/admin.php");?>
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
                        <div class="card w-100">



                         
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
        // Datos de ejemplo para los insumos y sus cantidades
        var insumos = ['Insumo A', 'Insumo B', 'Insumo C'];
        var cantidades = [100, 150, 75];

        // Calcula el total de cantidades para calcular porcentajes
        var total = cantidades.reduce((a, b) => a + b, 0);

        // Calcula los porcentajes para cada insumo
        var porcentajes = cantidades.map(cantidad => (cantidad / total) * 100);

        // Obtén el contexto del canvas
        const pie = document.getElementById('graficoInventario').getContext('2d');

        // Crea el gráfico de pastel
        new Chart(pie, {
            type: 'pie',
            data: {
                labels: insumos,
                datasets: [{
                    data: porcentajes,
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false // Esto permite que el gráfico se ajuste al tamaño del contenedor
            }
        });

    </script>


</body>

</html>