<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores .:|:. Mango</title>
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
                            <h2><b>Proveedores</b></h2>
                        </div>
                    </div>
                </div>

                <div class="botones_container">
                    <div class="celeste">
                        <button type="button" id="btn_regis_proveedor" class="btn">Registrar nuevo proveedor
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
                                    <table id="miTablaprovee" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th>Código</th>
                                            <th>Empresa</th>
                                            <th>Nombre contacto</th>
                                            <th>Dirección</th>
                                            <th>N° de teléfono</th>
                                            <th>Fecha de registro</th>
                                            <th>Estado</th>
                                            <th class="acciones">Acciones</th>


                                        </thead>
                                        <tbody>
                                            <?php
                                                include("../bd/conexion.php");
                                                $senten = $conn->query("SELECT * FROM proveedor WHERE estado = 'Operando' or estado = 'Deshabilitado' ORDER BY nombre_empre");
                                                while ($arreglo = $senten->fetch_array()) {
                                                    $estado = $arreglo['estado'];

                                                    if ($estado == 'Operando') {
                                                        $clase_estado = 'operando';
                                                    } else {
                                                        $clase_estado = 'Deshabilitado';
                                                    }
                                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_prove'] ?></td>
                                                <td><?php echo $arreglo['nombre_empre'] ?></td>
                                                <td><?php echo $arreglo['nombre_traba'] ?></td>
                                                <td><?php echo $arreglo['direccion'] ?></td>
                                                <td><?php echo $arreglo['num_tele'] ?></td>
                                                <td><?php echo $arreglo['fecha_regis'] ?></td>
                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
                                                <td class="text-center">

                                                    <button type="button" class="btn btn-info"
                                                        onclick="modalActuProvee('<?php echo $arreglo['id_prove'] ?>','<?php echo $arreglo['nombre_empre'] ?>','<?php echo $arreglo['nombre_traba'] ?>','<?php echo $arreglo['direccion'] ?>','<?php echo $arreglo['num_tele'] ?>','<?php echo $arreglo['fecha_regis'] ?>','<?php echo $arreglo['estado'] ?>');"
                                                        id="celeste"><i class="fa-solid fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-warning"
                                                        onclick="desabilitarProvee('<?php echo $arreglo['id_prove'] ?>','<?php echo $arreglo['nombre_empre'] ?>');"
                                                        id="naranja"><i class="ti ti-user-off"></i></button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="eliminarProveedor('<?php echo $arreglo['id_prove'] ?>','<?php echo $arreglo['nombre_empre'] ?>');"
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
    var modalRegisProveedores = document.getElementById('modalRegisProveedores');
    var btn_regis_proveedor = document.getElementById('btn_regis_proveedor');

    // Evento para abrir el modal
    btn_regis_proveedor.onclick = function() {
        modalRegisProveedores.style.display = 'block';
    }








    function cerrarGeneral() {
        var modalRegisProveedores = document.getElementById("modalRegisProveedores");
        var modalActuaProvee = document.getElementById("modalActuaProveedores");

        if (modalRegisProveedores || modalActuaProvee) {
            if (modalRegisProveedores) {
                modalRegisProveedores.style.display = 'none';
            }

            if (modalActuaProvee) {
                modalActuaProvee.style.display = 'none';
            }
        }
    }




    //----------------------------------------------------------------
    //Registrar parcela

    $("#formRegisProveedor").submit(function(e) {
        e.preventDefault();

        // Obtener los valores del formulario
        var nom_prove = $.trim($("#nom_prove").val());
        var nomb_trab_prov = $.trim($("#nomb_trab_prov").val());
        var direc = $.trim($("#direc").val());
        var telefo = $.trim($("#telefo").val());
        var fech_regis_prov = $.trim($("#fech_regis_prov").val());




        // Enviar los datos mediante AJAX
        $.ajax({
            url: "../validacion_datos/validar_regis_proveedor.php", // Reemplaza esto con la ruta de tu script de servidor que procesa el registro
            type: "POST",
            dataType: "json",
            data: {
                nom_prove: nom_prove,
                nomb_trab_prov: nomb_trab_prov,
                direc: direc,
                telefo: telefo,
                fech_regis_prov: fech_regis_prov
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso!',
                    }).then((result) => {
                        if (result.value) {
                            // Puedes redirigir a otra página o hacer algo más después del registro exitoso
                            window.location.href = "../modulos_admin/r_proveedor.php";
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


    //Editar actualizar
    function modalActuProvee(id_proveedor, nombre_empre, nombre_contac, direccion, telefo, fecha_regis) {
        var modalActuParce = document.getElementById('modalActuaProveedores');
        modalActuParce.style.display = 'block';

        // Llenar el formulario con datos del usuario
        document.getElementById('id_prove_actua').value = id_proveedor;
        document.getElementById('nom_prove_actua').value = nombre_empre;
        document.getElementById('nomb_trab_prov_actua').value = nombre_contac;
        document.getElementById('direc_actua').value = direccion;
        document.getElementById('telefo_actua').value = telefo;
        document.getElementById('fech_regis_prov_actua').value = fecha_regis;



    }

    $(document).ready(function() {
        $("#modalActuaProveedores").submit(function(e) {
            e.preventDefault();
            var id_prove_actua = $.trim($("#id_prove_actua").val());
            var nom_prove_actua = $.trim($("#nom_prove_actua").val());
            var nomb_trab_prov_actua = $.trim($("#nomb_trab_prov_actua").val());
            var direc_actua = $.trim($("#direc_actua").val());
            var telefo_actua = $.trim($("#telefo_actua").val());
            var fech_regis_prov_actua = $.trim($("#fech_regis_prov_actua").val());




            $.ajax({
                url: "../actualizar/actualizar_datos_proveedor.php",
                type: "POST",
                dataType: "json",
                data: {
                    id_prove_actua: id_prove_actua,
                    nom_prove_actua: nom_prove_actua,
                    nomb_trab_prov_actua: nomb_trab_prov_actua,
                    direc_actua: direc_actua,
                    telefo_actua: telefo_actua,
                    fech_regis_prov_actua: fech_regis_prov_actua
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
    function desabilitarProvee(id_prove, nombre_empre) {
        swal.fire({
            title: 'Está seguro?',
            icon: 'warning',
            text: 'Desea deshabilitar el proveedor:' + nombre_empre,
            confirmButtonText: 'Sí, Eliminar',
            showDenyButton: true,
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../eliminar/deshabilitar_proveedor.php',
                    type: 'POST',
                    data: {
                        id_prove: id_prove
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deshabilitado',
                            icon: 'success',
                            text: 'El proveedor' + nombre_empre +
                                'se ha deshabilitado con exito!',
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
    function eliminarProveedor(id_prove, nombre_empre) {
        swal.fire({
            title: 'Está seguro?',
            icon: 'warning',
            text: 'Desea eliminar el proveedor:' + nombre_empre,
            confirmButtonText: 'Sí, Eliminar',
            showDenyButton: true,
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../eliminar/eliminar_proveedor.php',
                    type: 'POST',
                    data: {
                        id_prove: id_prove
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Eiminado',
                            icon: 'success',
                            text: 'El proveedor' + nombre_empre +
                                'se ha eliminado con exito!',
                            confirmButtonText: 'ok',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */

                            location.reload(); // Recarga la página actual

                        })
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('No se ha eliminado el proveedor', '', 'info')
            }
        })
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

    //VALIDAR LETRAS Y NUMEROS
    function soloLetrasYNumeros(e) {
        var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            caracteresPermitidos = "0123456789 áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales = [8, 37, 39, 46],
            tecla_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (caracteresPermitidos.indexOf(tecla) == -1 && !tecla_especial) {
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
        window.location.href = '../reportes/reporte_proveedores.php';
    }

    </script>






</body>

</html>