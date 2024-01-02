<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tendencia insumos .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <style>
    .container {
        width: 100%;
        /* o un valor específico, como 500px */
        height: 400px;
        /* o un valor específico, como 300px */
    }
  

    </style>
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
                            <h2><b>Tendencia insumos</b></h2>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <select class="form-select" id="selectInsumo" aria-label="Seleccione el insumo a mostrar">
                        <option selected>Seleccione el insumo a mostrar</option>
                       
                    </select>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">



                            <div class="container">
                                <canvas id="graficoConsumoInsumos"></canvas>
                            </div>







                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script src="../js/graficas.js"></script>


</body>

</html>