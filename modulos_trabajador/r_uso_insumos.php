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
                                                $query = "SELECT id_parcela, nombre FROM parcela";
                                                $result = mysqli_query($conn, $query);

                                                // Crear un array para almacenar las parcelas
                                                $parcelas = [];

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $parcelas[] = $row;
                                                    }
                                                }
                                            ?>

                                            <label for="selectParcela">Seleccione la parcela a aplicar</label>
                                            <select name="selectParcela" class="form-select" id="selectParcela">
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
                                            $query = "SELECT id_insumo, tipo FROM insumos";
                                            $result = mysqli_query($conn, $query);

                                            // Crear un array temporal para almacenar tipos únicos
                                            $tempArray = [];

                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    // Verifica si el tipo de insumo ya está en el array temporal
                                                    if (!isset($tempArray[$row['tipo']])) {
                                                        $tempArray[$row['tipo']] = $row['id_insumo'];
                                                    }
                                                }
                                            }

                                            // Convertir el array temporal en el formato deseado para $ti_insu
                                            $ti_insu = [];
                                            foreach ($tempArray as $tipo => $id_insumo) {
                                                $ti_insu[] = ['tipo' => $tipo, 'id_insumo' => $id_insumo];
                                            }

                                            ?>


                                            <label for="selecttipoIns">Seleccione el tipo de insumo</label>
                                            <select name="selecttipoIns" class="form-select" id="selecttipoIns"
                                                onchange="cargarInsumos()">
                                                <?php foreach ($ti_insu as $ti_insumo): ?>
                                                <option value="<?php echo $ti_insumo['tipo']; ?>">
                                                    <?php echo $ti_insumo['tipo']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select><br>
                                        </div>

                                        <div class="row">

                                            <div class="col">
                                                <label for="selectInsumos">Seleccione el insumo</label>
                                                    <select name="selectInsumos" class="form-select" id="selectInsumos">
                                                        <!-- Las opciones se cargarán aquí mediante AJAX -->
                                                    </select>
                                            </div>


                                            <div class="col">
                                                <label for="Canti">Unidades en stock disponible: </label>
                                                <input type="text" class="form-control readonly-field" id="cantidadStock" readonly><br>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="CantidadUsar">Cantidad a utilizar:</label>
                                                <input type="text" class="form-control" name="canti_utili" id="canti_utili">

                                            </div>
                                            
                                        </div>




                                    </div><br>

                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btn_regis" class="btn btn-info">Registrar</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

    <script>
    function cargarInsumos() {
        var tipoInsumo = $('#selecttipoIns').val(); // Obtiene el valor seleccionado del primer select
        console.log(tipoInsumo);

        // Realiza la llamada AJAX
        $.ajax({
            url: '../solicitar_datos/datos_insumos.php', // Archivo PHP que manejará la petición
            type: 'POST',
            data: {
                tipoInsumo: tipoInsumo
            },
            success: function(response) {
                $('#selectInsumos').html(response); // Actualiza el segundo select
                mostrarCantidad();
            }
        });
    }


    function mostrarCantidad() {
        var nombreInsumo = $('#selectInsumos').val();
        console.log(nombreInsumo);


        $.ajax({
            url: '../solicitar_datos/obtener_cantidad.php', // Crearemos este archivo para obtener la cantidad en stock por nombre
            type: 'POST',
            data: { nombreInsumo: nombreInsumo },
            success: function(response) {
                $('#cantidadStock').val(response); // Actualizar el valor del input con la cantidad en stock
            }
        });
    }
    </script>

</body>

</html>