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
    <title>Solicitud .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/noti/toastr.css">
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css">

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
                            <h2><b>Registro de solicitud de insumo</b></h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form id="formRegisSoliInsuFalto" class="form-group">

                                    <input type="hidden" id="id_usuario_empleado"
                                        value="<?php echo $datos["DBid_usuV2"]?>" class="form-control"><br>


                                    <label for="Fecha">Fecha de registro: </label>
                                    <input type="date" id="fechSoli" class="form-control"><br>




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
                                        Tipo de insumo:
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
                                        <option value="otro">Otro</option>
                                    </select><br>

                                    <div id="otroInsumo" style="display: none;">
                                        <label for="inputOtro">Ingrese otro tipo de insumo:</label>
                                        <input type="text" class="form-control" id="inputOtro" name="inputOtro">
                                    </div><br>


                                    <!--NOMMBRE INSUMOS-->


                                    <label for="selectInsumos">Nombre del insumo:</label>
                                    <select name="selectInsumos" class="form-select" id="selectInsumos">
                                        <option value="" selected disabled>Seleccione el nombre del insumo</option>

                                        <!-- Las opciones se cargarán aquí mediante AJAX -->
                                    </select>


                                    <div id="otroNombreInsumo" style="display: none;">
                                        <label for="inputOtroNombre">Ingrese nombre del insumo:</label>
                                        <input type="text" class="form-control" id="inputOtroNombre"
                                            name="inputOtroNombre">
                                    </div><br>



                                    <label for="Canti">Cantidad: </label>
                                    <input type="number" id="Canti" class="form-control">
                                    <br>
                                    <button type="submit" id="btn_regis" class="btn btn-info">Enviar</button>
                                    <br>




                                </form>
                            </div>


                        </div>
                    </div>

                </div>
                <!--TABLA DE SOLICITUDES-->

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Estado de solicitud</b></h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th><b>Código</b></th>
                                            <th><b>Fecha solicitud</b></th>
                                            <th><b>Tipo insumo solicitado</b></th>
                                            <th><b>Nombre insumo solicitado</b></th>
                                            <th><b>Cantidad</b></th>
                                            <th><b>Estado</b></th>
                                            <th><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT id_solicitud, fecha_solicitud, tipo_insumo, nombre_insu, cantidad, proveedor, id_usu, estado
                                            FROM solicitudes WHERE estado = 'Enviado' or estado = 'Verificando' or estado = 'Denegado' or estado = 'Aprobado' or estado = 'Recibido' or estado = 'Añadido' ORDER BY id_solicitud");
                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];

                                                if ($estado == 'Enviado') {
                                                    $clase_estado = 'Enviado';
                                                }else if($estado == 'Aprobado'){
                                                    $clase_estado = 'Aprobado';
                                                    
                                                    
                                                }else if($estado == 'Añadido'){
                                                    $clase_estado = 'Añadido';
                                                }else if($estado == 'Verificando'){
                                                    $clase_estado = 'Verificando';
                                                }
                                                else if($estado == 'Recibido'){
                                                   
                                                    $clase_estado = 'Recibido';
                                                }
                                                else {
                                                    $clase_estado = 'Denegado';
                                                }
                                                        
                                                ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_solicitud'] ?></td>
                                                <td><?php echo $arreglo['fecha_solicitud'] ?></td>
                                                <td><?php echo $arreglo['tipo_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre_insu'] ?></td>
                                                <td><?php echo $arreglo['cantidad'] ?></td>
                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>

                                                <td>
                                                    <button type="button" class="btn btn-info" onclick="modalActuSoliTraba('<?php echo $arreglo['id_solicitud'] ?>',
                                                        '<?php echo $arreglo['fecha_solicitud'] ?>',
                                                        '<?php echo $arreglo['tipo_insumo'] ?>',
                                                        '<?php echo $arreglo['nombre_insu'] ?>',
                                                        '<?php echo $arreglo['cantidad'] ?>');" id="celeste"><i
                                                            class="fa-solid fa-pencil"></i>
                                                    </button>
                                                </td>

                                            </tr>

                                        </tbody>
                                        <?php } ?>

                                    </table>



                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <?php include("../recursos/modals/modales.php");?>

            </div>


        </div>
    </div>

    <script>
    function cerrarGeneral() {
        var modalAsignarRol = document.getElementById("modalSoliciTrabajadorActua");

        if (modalAsignarRol) {
            modalAsignarRol.style.display = 'none';
        }
    }


    //----------------------------------------------------------------
    //Registrar soli trabajador





    //Editar actualizar
    function modalActuSoliTraba(id_soli, fecha, tipo_insu, nombre_insu, cantidad) {
        var modalSoliciTrabajadorActua = document.getElementById('modalSoliciTrabajadorActua');

        modalSoliciTrabajadorActua.style.display = 'block';

        // Llenar el formulario con datos del usuario
        document.getElementById('id_soli_actua').value = id_soli;
        document.getElementById('fecha_soli_actua').value = fecha;
        document.getElementById('ti_insu_actua').value = tipo_insu;
        document.getElementById('nom_insu_actua').value = nombre_insu;
        document.getElementById('canti_insu_actua').value = cantidad;

    }

    $(document).ready(function() {
        $("#formActuaSoliTra").submit(function(e) {
            e.preventDefault();
            var id_soli_actua = $.trim($("#id_soli_actua").val());
            var fecha_soli_actua = $.trim($("#fecha_soli_actua").val());
            var ti_insu_actua = $.trim($("#ti_insu_actua").val());
            var nom_insu_actua = $.trim($("#nom_insu_actua").val());
            var canti_insu_actua = $.trim($("#canti_insu_actua").val());
            $.ajax({
                url: "../actualizar/actualizar_datos_soli_traba.php",
                type: "POST",
                dataType: "json",
                data: {
                    id_soli_actua: id_soli_actua,
                    fecha_soli_actua: fecha_soli_actua,
                    ti_insu_actua: ti_insu_actua,
                    nom_insu_actua: nom_insu_actua,
                    canti_insu_actua: canti_insu_actua
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Actualización exitosa!',
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload(); // Recargar la página
                            }
                        });
                    } else if (response.status === 'warning') {
                        // Mostrar un mensaje si el estado es 'Añadido'
                        toastr.warning(response.message, '', {
                            progressBar: true,
                            positionClass: "toast-top-right",
                            timeOut: 3000,
                            extendedTimeOut: 1000,
                            showDuration: 300,
                            hideDuration: 1000,
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",

                        });
                    } else {
                        Swal.fire({
                            title: response.message,
                            icon: 'warning'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error en la solicitud',
                        icon: 'error'
                    });
                }
            });
        });
    });



    //INPUT DINAMICO
    function cargarInsumos() {
        var select = document.getElementById("selecttipoIns");
        var otroInsumo = document.getElementById("otroInsumo");
        var otroNombreInsumo = document.getElementById("otroNombreInsumo");
        var selectInsumos = document.getElementById("selectInsumos");




        var tipoInsumo = $('#selecttipoIns').val();

        if (tipoInsumo === "otro") {
            // Mostrar campos de entrada, ocultar select y ocultar label
            $("#otroInsumo, #otroNombreInsumo").show();
            $("#selectInsumos, label[for='selectInsumos']").hide();
        } else {
            // Ocultar campos de entrada, mostrar select y mostrar label
            $("#otroInsumo, #otroNombreInsumo").hide();
            $("#selectInsumos, label[for='selectInsumos']").show();
        }

        $.ajax({
            url: '../solicitar_datos/tipo_insumo.php',
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


        });
    });

    //REGISTRAR SOLICITUD


    $("#formRegisSoliInsuFalto").submit(function(e) {
        e.preventDefault();

        // Obtener los valores del formulario
        var fechSoli = $.trim($("#fechSoli").val());
        var selecttipoIns = $('#selecttipoIns').val(); // Mantener el valor seleccionado del select sin trim
        var nom_insu = selecttipoIns === 'otro' ? $.trim($("#inputOtroNombre").val()) : $.trim($(
            '#selectInsumos option:selected').text());
        var Canti = $.trim($("#Canti").val());
        var id_usuario_empleado = $.trim($("#id_usuario_empleado").val());

        // Si se seleccionó "Otro", asignar el valor del input al tipo de insumo
        if (selecttipoIns === 'otro') {
            selecttipoIns = $.trim($("#inputOtro").val());
        }

        console.log("Datos enviados:", {
            fechSoli: fechSoli,
            selecttipoIns: selecttipoIns,
            nom_insu: nom_insu,
            Canti: Canti,
            id_usuario_empleado: id_usuario_empleado
        });


        // Enviar los datos mediante AJAX
        $.ajax({
            url: "../validacion_datos/validar_regis_solicitud_insu.php", // Asegúrate de que esta ruta sea correcta
            type: "POST",
            dataType: "json",
            data: {
                fechSoli: fechSoli,
                selecttipoIns: selecttipoIns,
                nom_insu: nom_insu, // Usamos el valor ajustado aquí
                Canti: Canti,
                id_usuario_empleado: id_usuario_empleado
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso!',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: response.message,
                        icon: 'warning'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Error en la solicitud',
                    icon: 'error'
                });
            }
        });
    });
    </script>

</body>

</html>