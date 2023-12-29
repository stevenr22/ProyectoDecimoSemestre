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
    <title>Solicitudes .:|:. Mango</title>
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
                            <h2><b>Solicitudes por verificar</b></h2>
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
                                            <th><b>Código de solicitud recibida</b></th>


                                            <th><b>Fecha solicitud</b></th>
                                            <th><b>Tipo insumo solicitado</b></th>
                                            <th><b>Nombre insumo solicitado</b></th>
                                            <th><b>Cantidad</b></th>
                                            <th><b>Proveedor</b></th>
                                            <th><b>Nombre remitente</b></th>
                                            <th><b>Cargo</b></th>

                                            <th><b>Estado</b></th>
                                            <th><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT s.id_solicitud, s.fecha_solicitud, s.tipo_insumo, s.nombre_insu, s.cantidad, u.nombre_completo, r.cargo, s.proveedor, s.estado
                                            FROM solicitudes AS s
                                            JOIN usuario AS u ON s.id_usu = u.id_usu
                                            JOIN rol AS r ON u.id_rol = r.id_rol
                                            WHERE s.estado != 'Enviado'");

                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];
                                               

                                                $clase_fila = ($estado == 'Aprobado') ? 'aprobado-row' : '';



                                                if ($estado == 'Recibido'){
                                                    $clase_estado = 'Recibido';
                                                }else if($estado == 'Aprobado'){
                                                    $clase_estado = 'Aprobado';
                                                } else if($estado== 'Entregado'){
                                                    $clase_estado = 'Entregado';
                                                }else if($estado== 'Verificando'){
                                                    // Actualiza el estado de "Enviado" a "Recibido"
                                                    $update = "UPDATE solicitudes SET estado = 'Recibido' WHERE id_solicitud = " . $arreglo['id_solicitud'];
                                                    $conn->query($update); // Ejecuta la consulta para actualizar el estado
                                                    $estado = 'Recibido'; // Actualiza el estado para mostrarlo en la tabla
                                                    $clase_estado = 'Recibido'; // Actualiza la clase CSS correspondiente
                                                }else{
                                                    $clase_estado = 'Denegado';
                                                }
                                                ?>
                                            <tr class="<?php echo $clase_fila; ?>">
                                                <td><?php echo $arreglo['id_solicitud'] ?></td>
                                                <td><?php echo $arreglo['fecha_solicitud'] ?></td>
                                                <td><?php echo $arreglo['tipo_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre_insu'] ?></td>
                                                <td><?php echo $arreglo['cantidad'] ?></td>
                                                <td><?php echo $arreglo['proveedor'] ?></td>
                                                <td><?php echo $arreglo['nombre_completo'] ?></td>
                                                <td><?php echo $arreglo['cargo'] ?></td>

                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
                                                <td>

                                                    <button type="button" class="btn btn-info" onclick="modalVerificarSoli(
                                                    '<?php echo $arreglo['id_solicitud'] ?>',
                                                    '<?php echo $arreglo['fecha_solicitud'] ?>',
                                                    '<?php echo $arreglo['tipo_insumo'] ?>',
                                                    '<?php echo $arreglo['nombre_insu'] ?>',
                                                    '<?php echo $arreglo['cantidad'] ?>',
                                                    '<?php echo $arreglo['proveedor'] ?>',
                                                    '<?php echo $arreglo['nombre_completo'] ?>',
                                                    '<?php echo $arreglo['cargo'] ?>',
                                                    '<?php echo $estado ?>');" id="celeste"><i
                                                            class="fa-solid fa-pencil"></i></button>

                                                    <button type="button" class="btn btn-danger" id="rojo"><i
                                                            class="fa-solid fa-trash-can"></i></button>




                                                </td>

                                            </tr>
                                            <?php } ?>


                                        </tbody>
                                    </table>



                                </div>

                            </div>


                        </div>
                    </div>

                </div>







                <!--MODAL VERIFICAR SOLICITUD-->
                <div id="modalVerificarSoli" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Verificar solicitud</h2>
                            <button class="close" onclick="cerrarGeneral()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-group" id="formVeriSoli">
                                <label>ID SOLICTUD</label>
                                <input type="text" name="id_soli_verificar" id="id_soli_verificar"
                                    class="form-control readonly-field" readonly><br>




                                <label for="Fecha">Fecha: </label>
                                <input type="date" class="form-control readonly-field" readonly
                                    id="fecha_soli_reci"><br>


                                <label for="tipi">Tipo insumo: </label>
                                <input type="text" name="ti_insu_reci" readonly id="ti_insu_reci"
                                    class="form-control readonly-field"><br>

                                <label for="NombreInsu">Nombre insumo: </label>
                                <input type="text" name="nom_insu_reci" readonly id="nom_insu_reci"
                                    class="form-control readonly-field"><br>

                                <label for="Cantidad">Cantidad: </label>
                                <input type="text" name="canti_insu_reci" readonly id="canti_insu_reci"
                                    class="form-control readonly-field"><br>


                                <label for="Prov">Proveedor: </label>
                                <input type="text" name="prov_reci" readonly id="prov_reci"
                                    class="form-control readonly-field"><br>

                                <label for="remitente">Nombre remitente: </label>
                                <input type="text" name="nom_remi_reci" readonly id="nom_remi_reci"
                                    class="form-control readonly-field"><br>

                                <label for="rol">Cargo: </label>
                                <input type="text" name="carg_remi" readonly id="carg_remi"
                                    class="form-control readonly-field"><br>

                                <label for="esta">Estado actual de la solicitud: </label>
                                <input type="text" readonly name="estado_soli_remi" id="estado_soli_remi"
                                    class="form-control readonly-field"><br>

                                <label for="Actu_estta">Verificación de solicitud</label>



                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="aprobado_soli_reci">
                                    <label class="form-check-label" for="aprobado_soli_reci">
                                        Aprobado
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="denegado_soli_reci">
                                    <label class="form-check-label" for="denegado_soli_reci">
                                        Denegado
                                    </label>
                                </div><br>





                                <br>
                                <button type="submit" class="btn btn-primary" id="btn_regis_soli">Actualizar</button>
                                <button type="button" class="btn btn-danger me-auto"
                                    onclick="cerrarGeneral()">Cerrar</button>
                                <br>




                            </form>



                        </div>



                    </div>
                </div>


            </div>


        </div>
    </div>
    <script>
    //Editar actualizar
    function modalVerificarSoli(id_soli, fecha, tipo_insu, nombre_insu, cantidad, proveedor, nombre_empleado, cargo,
        estado) {
        var modalVerificarSoli = document.getElementById('modalVerificarSoli');


        modalVerificarSoli.style.display = 'block';

        // Llenar el formulario con datos de la soli
        document.getElementById('id_soli_verificar').value = id_soli;

        document.getElementById('fecha_soli_reci').value = fecha;
        document.getElementById('ti_insu_reci').value = tipo_insu;
        document.getElementById('nom_insu_reci').value = nombre_insu;
        document.getElementById('canti_insu_reci').value = cantidad;
        document.getElementById('prov_reci').value = proveedor;
        document.getElementById('nom_remi_reci').value = nombre_empleado;
        document.getElementById('carg_remi').value = cargo;
        document.getElementById('estado_soli_remi').value = estado;



    }
    $(document).ready(function() {
        $("#formVeriSoli").submit(function(e) {
            e.preventDefault();


            var id_solicitud = $.trim($("#id_soli_verificar").val());
            console.log(id_solicitud);



            var aprobado_soli_reci = $("#aprobado_soli_reci").is(":checked") ? "Aprobado" : "";
            var denegado_soli_reci = $("#denegado_soli_reci").is(":checked") ? "Denegado" : "";

            // Verificar cuál tiene valor y almacenar en una variable
            var estadoSeleccionado = "";
            if (aprobado_soli_reci !== "") {
                estadoSeleccionado = aprobado_soli_reci;
            } else if (denegado_soli_reci !== "") {
                estadoSeleccionado = denegado_soli_reci;
            }
            $.ajax({
                url: "../actualizar/aprobar_soli_recibi.php",
                type: "POST",
                dataType: "json",
                data: {
                    id_solicitud: id_solicitud,
                    estadoSeleccionado: estadoSeleccionado
                },
                success: function(response) {
                    if (response.status === 'success') {


                        Swal.fire({
                            icon: 'success',
                            title: 'Verificación exitosa!',
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

    });














    function enviarDatosSolicitud(id_solicitud) {
        // Mostrar mensaje de confirmación
        Swal.fire({
            title: '¿Estás seguro de enviar esta solicitud para su compra?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                // Enviar los datos mediante AJAX
                $.ajax({
                    url: "../validacion_datos/enviar_compra.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id_solicitud: id_solicitud
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Envío exitoso!',
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
            }
        });
    }





    function cerrarGeneral() {
        var myModal = document.getElementById("myModal");
        var modalVerificarSoli = document.getElementById("modalVerificarSoli");

        if (myModal && myModal.style.display !== 'none') {
            myModal.style.display = 'none';
        }
        if (modalVerificarSoli && modalVerificarSoli.style.display !== 'none') {
            modalVerificarSoli.style.display = 'none';
        }
    }
    </script>



</body>

</html>