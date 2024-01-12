<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Parcelas .:|:. Mango</title>
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
            <!--  Header Start -->
            <?php include("../partes/encabezado.php");?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Registro de parcelas</b></h2>
                        </div>
                    </div>
                </div>



                <div class="botones_container">
                    <div class="celeste">
                        <button type="button" id="btn_regis_parcela" class="btn">Registrar nueva parcela
                            <i class="fa-solid fa-circle-plus" style="vertical-align: middle;"></i>
                        </button>

                    </div>


                    <div class="rojo">
                        <button type="button" id="btn_pdf_arriba" onclick="exportarPDF();" class="btn">Exportar reporte
                            <i class="fa-solid fa-download" style="vertical-align: middle;"></i>
                        </button>

                    </div>

                </div><br>





                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Ancho</th>
                                            <th>Alto</th>
                                            <th>Fecha de registro</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>


                                        </thead>
                                        <tbody>
                                            <?php
                                                include("../bd/conexion.php");
                                                $senten = $conn->query("SELECT * FROM parcela WHERE estado = 'Operando' or estado = 'Deshabilitado' ORDER BY nombre");
                                                while ($arreglo = $senten->fetch_array()) {
                                                    $estado = $arreglo['estado'];

                                                    if ($estado == 'Operando') {
                                                        $clase_estado = 'operando';
                                                    } else {
                                                        $clase_estado = 'Deshabilitado';
                                                    }
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_parcela'] ?></td>
                                                <td><?php echo $arreglo['nombre'] ?></td>
                                                <td><?php echo $arreglo['ancho'] ?></td>
                                                <td><?php echo $arreglo['alto'] ?></td>
                                                <td><?php echo $arreglo['fecha_registro'] ?></td>


                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>


                                                <td>

                                                    <button type="button" class="btn btn-info"
                                                        onclick="modalActuParce('<?php echo $arreglo['id_parcela'] ?>','<?php echo $arreglo['nombre'] ?>','<?php echo $arreglo['ancho'] ?>','<?php echo $arreglo['alto'] ?>','<?php echo $arreglo['fecha_registro'] ?>');"
                                                        id="celeste"><i class="fa-solid fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-warning"
                                                        onclick="desabilitarParcela('<?php echo $arreglo['id_parcela'] ?>','<?php echo $arreglo['nombre'] ?>');"
                                                        id="naranja"><i class="ti ti-mist-off"></i></button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="eliminarParcela('<?php echo $arreglo['id_parcela'] ?>','<?php echo $arreglo['nombre'] ?>');"
                                                        id="rojo"><i class="fa-solid fa-trash-can"></i></button>

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
    // Obtener elementos del DOM
    var modal_parce = document.getElementById('modalParcela');
    var btn_regis_parcela = document.getElementById('btn_regis_parcela');

    // Evento para abrir el modal
    btn_regis_parcela.onclick = function() {
        modal_parce.style.display = 'block';
    }






    //----------------------------------------------------------------


    function cerrarGeneral() {
        var modal_parce = document.getElementById("modalParcela");
        var modalActuaParce = document.getElementById("modalActuParce");

        if (modal_parce || modalActuaParce) {
            if (modal_parce) {
                modal_parce.style.display = 'none';
            }

            if (modalActuaParce) {
                modalActuaParce.style.display = 'none';
            }
        }
    }


    //----------------------------------------------------------------
    //Registrar parcela

    $("#formRegisParce").submit(function(e) {
        e.preventDefault();

        // Obtener los valores del formulario
        var nom_parce = $.trim($("#nom_parce").val());
        var ancho_parce = $.trim($("#ancho_parce").val());
        var alto_parce = $.trim($("#alto_parce").val());
        var fecha_regis_parce = $.trim($("#fecha_regis_parce").val());




        // Enviar los datos mediante AJAX
        $.ajax({
            url: "../validacion_datos/validar_regis_parcela.php", // Reemplaza esto con la ruta de tu script de servidor que procesa el registro
            type: "POST",
            dataType: "json",
            data: {
                nom_parce: nom_parce,
                ancho_parce: ancho_parce,
                alto_parce: alto_parce,
                fecha_regis_parce: fecha_regis_parce
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso!',
                    }).then((result) => {
                        if (result.value) {
                            // Puedes redirigir a otra página o hacer algo más después del registro exitoso
                            window.location.href = "../modulos_admin/r_parcelas.php";
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


    //----------------------------------------------------------------
    //Editar actualizar
    function modalActuParce(id_parce, nombre, alto, ancho, fecha) {
        var modalActuParce = document.getElementById('modalActuParce');
        modalActuParce.style.display = 'block';

        // Llenar el formulario con datos del usuario
        document.getElementById('id_parce_actu').value = id_parce;
        document.getElementById('nom_parce_actu').value = nombre;
        document.getElementById('alto_parce_actu').value = alto;
        document.getElementById('ancho_parce_actu').value = ancho;
        document.getElementById('fecha_regis_parce_actu').value = fecha;


    }

    $(document).ready(function() {
        $("#modalActuParce").submit(function(e) {
            e.preventDefault();
            var id_parce_actu = $.trim($("#id_parce_actu").val());
            var nom_parce_actu = $.trim($("#nom_parce_actu").val());
            var alto_parce_actu = $.trim($("#alto_parce_actu").val());
            var ancho_parce_actu = $.trim($("#ancho_parce_actu").val());
            var fecha_regis_parce_actu = $.trim($("#fecha_regis_parce_actu").val());



            $.ajax({
                url: "../actualizar/actualizar_datos_parcela.php",
                type: "POST",
                dataType: "json",
                data: {
                    id_parce_actu: id_parce_actu,
                    nom_parce_actu: nom_parce_actu,
                    alto_parce_actu: alto_parce_actu,
                    ancho_parce_actu: ancho_parce_actu,
                    fecha_regis_parce_actu: fecha_regis_parce_actu
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Actualización exitosa!',
                        }).then((result) => {
                            if (result.value) {
                                location.reload(); // Recargar la página
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


    //----------------------------------------------------------------
    //deshabilitar parcela
    function desabilitarParcela(id_parcela, nombre) {
        swal.fire({
            title: 'Está seguro?',
            icon: 'warning',
            text: 'Desea deshabilitar la parcela:' + nombre,
            confirmButtonText: 'Sí, Eliminar',
            showDenyButton: true,
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../eliminar/deshabilitar_parcela.php',
                    type: 'POST',
                    data: {
                        id_parcela: id_parcela
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deshabilitado',
                            icon: 'success',
                            text: 'La parcela' + nombre + 'se ha deshabilitado con exito!',
                            confirmButtonText: 'ok',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */

                            location.reload(); // Recarga la página actual

                        })
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('No se ha deshabilitado la parcela', '', 'info')
            }
        })
    }

    //----------------------------------------------------------------
    //Eliminar parcela
    function eliminarParcela(id_parcela, nombre) {
        swal.fire({
            title: 'Está seguro?',
            icon: 'warning',
            text: 'Desea eliminar la parcela:' + nombre,
            confirmButtonText: 'Sí, Eliminar',
            showDenyButton: true,
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../eliminar/eliminar_parcela.php',
                    type: 'POST',
                    data: {
                        id_parcela: id_parcela
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Eiminado',
                            icon: 'success',
                            text: 'La parcela' + nombre + 'se ha eliminado con exito!',
                            confirmButtonText: 'ok',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */

                            location.reload(); // Recarga la página actual

                        })
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('No se ha eliminado la parcela', '', 'info')
            }
        })
    }

    //Exportar reporte
    function exportarPDF() {
        var btn_pdf = document.getElementById("btnPDF");

        toastr.success("Descargando...", "", {
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 3000,
            extendedTimeOut: 1000,
            showDuration: 300,
            hideDuration: 1000,
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
        window.location.href = '../reportes/reporte_parcelas.php';
    }

    //VALIDAR LETRAS
    function soloLetras(e) {
        var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales = [8, 37, 39, 46],
            tecla_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }
    //VALIDAR NUMEOS
    function validarNumeros(evt) {
        let key = evt.key || String.fromCharCode(evt.which || evt.keyCode);
        let input = evt.target.value;

        // Permitir números, tecla de retroceso, tecla de entrada, y punto decimal
        if (/[\d\b\r.]/.test(key)) {
            // Si ya hay un punto decimal, y después de él hay dos dígitos, no permitir más
            if (input.includes('.') && input.split('.')[1] && input.split('.')[1].length >= 2) {
                evt.preventDefault();
                return false;
            }
            return true;
        } else {
            evt.preventDefault();
            return false;
        }
    }
    </script>







</body>

</html>