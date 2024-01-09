<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tendencia producción .:|:. Mango</title>
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
                            <h2><b>Insumos utilizados por parcela</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <?php
                        include("../bd/conexion.php");
                        // Consulta SQL para obtener las parcelas
                        $sql = "SELECT id_parcela, nombre FROM parcela WHERE estado = 'Operando' ORDER BY nombre";

                        // Ejecutar consulta
                        $resultado = $conn->query($sql);

                        echo '<select id="selectParcela" class="form-select" onchange="actualizarGrafico()">';
                        echo '<option value="" selected disabled>Seleccione la parcela</option>'; // Placeholder

                        // Verificar si hay resultados en la consulta
                        if ($resultado->num_rows > 0) {
                            // Generar las opciones del select con los datos obtenidos de la base de datos
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="' . $row['id_parcela'] . '">' . $row['nombre'] . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No hay parcelas disponibles</option>';
                        }

                        echo '</select>';

                        // Una vez que se haya generado el select, puedes llamar a actualizarGrafico() para que se carguen los datos de la primera parcela
                        echo '<script>actualizarGrafico();</script>';
                    ?>
                </div>



                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                       
                            <div class="container justify-content-center align-items-center">
                                <canvas id="graficoProduccion"></canvas>
                            </div>


                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
  
    //GRAFICO
    function actualizarGrafico() {
    const idParcelaSeleccionada = document.getElementById('selectParcela').value;

    // Crear los datos que se enviarán en la solicitud POST
    const formData = new FormData();
    formData.append('idParcela', idParcelaSeleccionada);

    fetch('../solicitar_datos/datos_produccion.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const labels = []; 
            const datasetsData = [];

            data.forEach(item => {
                labels.push(`${item.nombre_insumo}`);
                datasetsData.push(item.total_cantidad_utilizada);
            });

            const ctx = document.getElementById('graficoProduccion').getContext('2d');
            ctx.canvas.width = 800;
            ctx.canvas.height = 600;


            if (window.myChart) {
                window.myChart.destroy();
            }

            window.myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad Utilizada por Parcela',
                        data: datasetsData,
                        borderWidth: 1,
                        pointStyle: 'circle',  // Puedes cambiar el estilo aquí (e.g., 'triangle', 'rect', etc.)
                        pointRadius: 5,  // Tamaño del punto
                        pointBorderColor: 'rgba(75, 192, 192, 1)',  // Color del borde del punto
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)'  // Color de fondo del punto
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Título del Gráfico Modificado',  // Aquí cambias el título del gráfico
                        fontSize: 16
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
}

    </script>



</body>

</html>