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
                            <h2><b>Cantidad de insumos utilizados por mes</b></h2>
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



    <script>
        //INSUMOS POR MES
let myChart = null;
let insumosAgregados = {}; // Objeto para almacenar insumos únicos

// Objeto para traducir nombres de meses
const mesesTraducidos = {
    January: 'Enero',
    February: 'Febrero',
    March: 'Marzo',
    April: 'Abril',
    May: 'Mayo',
    June: 'Junio',
    July: 'Julio',
    August: 'Agosto',
    September: 'Septiembre',
    October: 'Octubre',
    November: 'Noviembre',
    December: 'Diciembre'
};

// Función para traducir nombres de meses
function traducirMeses(mesesEnIngles) {
    return mesesEnIngles.map(mes => mesesTraducidos[mes] ?? mes);
}

function llenarSelectConInsumos(data) {
    const insumoSeleccionado = document.getElementById('selectInsumo');
    insumoSeleccionado.innerHTML = '<option selected>Seleccione el insumo a mostrar</option>';

    data.forEach(insumo => {
        // Verifica si el insumo ya ha sido agregado
        if (!insumosAgregados[insumo.nombre]) {
            const option = document.createElement('option');
            option.value = insumo.nombre;
            option.textContent = insumo.nombre;
            insumoSeleccionado.appendChild(option);

            // Marca el insumo como agregado para evitar duplicados
            insumosAgregados[insumo.nombre] = true;
        }
    });
}

function obtenerDatosDesdeBD(data) {
    const insumoSeleccionadoValue = document.getElementById('selectInsumo').value;
    const datosFiltrados = data.filter(item => item.nombre === insumoSeleccionadoValue);
    const mesesEnIngles = datosFiltrados.map(item => item.mes);
    const meses = traducirMeses(mesesEnIngles);
    const cantidades = datosFiltrados.map(item => item.cantidad_total);

    actualizarGraficoConDatos(meses, cantidades, insumoSeleccionadoValue);
}

const ctx = document.getElementById('graficoConsumoInsumos').getContext('2d');

document.addEventListener('DOMContentLoaded', function () {
    fetch('../solicitar_datos/datos_insu_grafico.php')
        .then(response => response.json())
        .then(data => {
            llenarSelectConInsumos(data);
            obtenerDatosDesdeBD(data); // Pasa los datos obtenidos para evitar hacer una segunda solicitud
        })
        .catch(error => {
            console.error('Error al obtener nombres de insumos:', error);
        });
});

function actualizarGraficoConDatos(meses, cantidades, insumoSeleccionado) {
    if (myChart) {
        myChart.destroy();
    }

    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: meses,
            datasets: [{
                label: `Consumo de ${insumoSeleccionado} (en unidades)`,
                data: cantidades,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Insumos'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Meses'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

document.getElementById('selectInsumo').addEventListener('change', function () {
    fetch('../solicitar_datos/datos_insu_grafico.php')
        .then(response => response.json())
        .then(data => {
            obtenerDatosDesdeBD(data);
        })
        .catch(error => {
            console.error('Error al obtener datos:', error);
        });
});



    </script>


</body>

</html>