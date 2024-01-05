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
    <title>Uso de insumos.:|:. Mango</title>
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
                    <a href="../modulos_admin/dashboard.php" class="text-nowrap logo-img">
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
                            <h2><b>Registro uso de insumos</b></h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form id="formRegisUsoInsu" class="form-group">
                                    <input type="text" class="form-control readonly-field" readonly name="id_usu"
                                        id="id_usu" value="<?php echo $_SESSION['DBid_usu'] ?>"><br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Fecha">Fecha de uso: </label>
                                            <input type="date" id="fechUso" class="form-control">
                                        </div>
                                        <div class="col">
                                            <?php
                                                // Suponiendo que ya tienes una conexión a la base de datos, por ejemplo, $conn
                                                include("../bd/conexion.php");

                                                // Consulta SQL para obtener las parcelas
                                                $query = "SELECT id_parcela, nombre FROM parcela WHERE estado = 'Operando'";
                                                $result = mysqli_query($conn, $query);

                                                // Crear un array para almacenar las parcelas
                                                $parcelas = [];

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $parcelas[] = $row;
                                                    }
                                                }
                                            ?>

                                            <label for="selectParcela">Parcela a aplicar</label>
                                            <select name="selectParcela" class="form-select" id="selectParcela">
                                                <option value="" selected disabled>Seleccione la parcela</option>

                                                <?php foreach ($parcelas as $parcela): ?>
                                                <option value="<?php echo $parcela['id_parcela']; ?>">
                                                    <?php echo $parcela['nombre']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col">
                                            <?php
                                            // Suponiendo que ya tienes una conexión a la base de datos, por ejemplo, $conn
                                            include("../bd/conexion.php");

                                            // Consulta SQL para obtener los tipos de insumos
                                            $query = "SELECT id_total_insumo, tipo FROM total_insumos";
                                            $result = mysqli_query($conn, $query);

                                            // Crear un array temporal para almacenar tipos únicos
                                            $tempArray = [];

                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    // Verifica si el tipo de insumo ya está en el array temporal
                                                    if (!isset($tempArray[$row['tipo']])) {
                                                        $tempArray[$row['tipo']] = $row['id_total_insumo'];
                                                    }
                                                }
                                            }

                                            // Convertir el array temporal en el formato deseado para $ti_insu
                                            $ti_insu = [];
                                            foreach ($tempArray as $tipo => $id_insumo) {
                                                $ti_insu[] = ['tipo' => $tipo, 'id_total_insumo' => $id_insumo];
                                            }

                                            ?>


                                            <label for="selecttipoIns">
                                                Tipo de insumo
                                            </label>
                                            <select name="selecttipoIns" class="form-select" id="selecttipoIns"
                                                onchange="cargarInsumos()">
                                                <!-- Opción inicial como placeholder -->
                                                <option value="" selected disabled>Seleccione un tipo de insumo</option>

                                                <?php foreach ($ti_insu as $ti_insumo): ?>
                                                <option value="<?php echo $ti_insumo['tipo']; ?>">
                                                    <?php echo $ti_insumo['tipo']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select><br>
                                        </div>

                                        <div class="row">

                                            <div class="col">
                                                <label for="selectInsumos">Insumo</label>
                                                <select name="selectInsumos" class="form-select" id="selectInsumos">

                                                    <!-- Las opciones se cargarán aquí mediante AJAX -->
                                                </select>
                                            </div>


                                            <div class="col">
                                                <label for="Canti">Unidades en stock disponible: </label>
                                                <input type="text" class="form-control readonly-field"
                                                    id="cantidadStockInput" readonly><br>


                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="CantidadUsar">Cantidad a utilizar:</label>
                                                <input type="text" class="form-control" name="canti_utili"
                                                    id="canti_utili">

                                            </div>

                                        </div>




                                    </div><br>

                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="enviarUsoCantiInsu();" id="btn_regis"
                                    class="btn btn-info">Registrar</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

    <script>
    function cargarInsumos() {
        var tipoInsumo = $('#selecttipoIns').val();

        $.ajax({
            url: '../solicitar_datos/datos_insumos.php',
            type: 'POST',
            data: {
                tipoInsumo: tipoInsumo
            },
            success: function(response) {
                $('#selectInsumos').empty(); // Limpiar el select actual
                $('#selectInsumos').append(response); // Agregar nuevas opciones al select
                $('#cantidadStockInput').val(''); // Limpiar el campo de cantidad
            }
        });
    }


    // Este código se ejecutará cuando cambies la opción seleccionada en el select
    $('#selectInsumos').change(function() {
        let id_insumo = $(this).val(); // Obtener el valor seleccionado
        let nombre = $('#selectInsumos option:selected').text(); // Obtener el texto seleccionado

    });


    $(document).ready(function() {
        $('#selectInsumos').change(function() {
            var stockData = $('#selectInsumos option:selected').data('stock');

            if (stockData !== undefined) {
                $('#cantidadStockInput').val(stockData); // Si tiene stock, muestra la cantidad
            } else {
                $('#cantidadStockInput').val(''); // Si no tiene stock (undefined), limpia el campo
            }
        });
    });










    function enviarUsoCantiInsu() {
    var cantidad_a_restar = document.getElementById("canti_utili").value;
    var nombre_de_insumo_a_restar = $('#selectInsumos option:selected').text();
    var id_usuario = document.getElementById("id_usu").value;
    var id_parcela = $('#selectParcela').val();
    var id_insumo = $('#selectInsumos').val();

    var fech_uso = document.getElementById("fechUso").value;
    var unidades_stock = document.getElementById("cantidadStockInput").value;

    console.log("Cantidad a restar: " + cantidad_a_restar +
        "ID INSUMOS : " + id_insumo +
        ", Nombre de insumo a restar: " +
        nombre_de_insumo_a_restar + ", ID usuario: " +
        id_usuario + ", ID parcela: " + id_parcela +
        ", Fecha de uso: " + fech_uso +
        "CANTIDAD STOCK: " + unidades_stock);

    // Validar campos vacíos
    if (id_insumo === "" || cantidad_a_restar === "" || nombre_de_insumo_a_restar === "" || id_usuario === "" 
    || id_parcela === "" || fech_uso === "") {
        Swal.fire({
            title: '¡Advertencia!',
            text: 'Todos los campos son obligatorios.',
            icon: 'warning',
            confirmButtonText: 'Aceptar'
        });
        return; // Detener la ejecución si hay campos vacíos
    }

    $.ajax({
        url: '../validacion_datos/restar_cantidad_insu.php',
        type: 'POST',
        data: {
            cantidad_a_restar: cantidad_a_restar,
            nombre_de_insumo_a_restar: nombre_de_insumo_a_restar,
            id_insumo: id_insumo,
            id_usuario: id_usuario,
            id_parcela: id_parcela,
            fech_uso: fech_uso
        },
        success: function(response) {
            var responseData = JSON.parse(response); 

            if (responseData.success) {
                Swal.fire({
                    title: '¡Inserción exitosa!',
                    text: responseData.message,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); 
                    }
                });
            } else {
                Swal.fire({
                    title: '¡Advertencia!',
                    text: responseData.message,
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
            }
        },
        error: function() {
            Swal.fire({
                title: '¡Error!',
                text: 'Hubo un error al procesar la solicitud.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
}

    </script>

</body>

</html>