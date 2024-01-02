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
