<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Solicitud .:|:. Mango</title>
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
                            <h2><b>Solicitudes recibidas</b></h2>
                        </div>
                    </div>
                </div>


          







                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th><b>Código</b></th>
                                            <th><b>Fecha solicitud</b></th>
                                            <th><b>Tipo insumo solicitado</b></th>
                                            <th><b>Nombre insumo solicitado</b></th>
                                            <th><b>Cantidad</b></th>
                                            <th><b>Nombre remitente</b></th>
                                            <th><b>Cargo</b></th>

                                            <th><b>Estado</b></th>
                                            <th class="acciones"><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                              
                                            
                                            
                                            $senten = $conn->query("SELECT s.id_solicitud, s.fecha_solicitud, s.tipo_insumo, s.nombre_insu, s.cantidad, u.nombre_completo, r.cargo, s.proveedor, s.estado
                                            FROM solicitudes as s
                                            JOIN usuario as u ON s.id_usu = u.id_usu
                                            JOIN rol as r ON u.id_rol = r.id_rol
                                            WHERE (s.estado = 'Recibido' OR s.estado = 'Añadido' OR s.estado = 'Aprobado' OR s.estado = 'Verificado' OR s.estado = 'Enviado' OR s.estado = 'Denegado')
                                            
                                            ");

                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];
                                                if ($estado == 'Añadido') {
                                                    $mostrarBotonEnviar = true; // Mostrar el botón si el estado es 'Añadido'
                                                } else {
                                                    $mostrarBotonEnviar = false; // No mostrar el botón para cualquier otro estado
                                                }
                                                


                                                if ($estado == 'Recibido') {
                                                    $clase_estado = 'Recibido';
                                                }else if($estado == 'Añadido'){
                                                    $clase_estado = 'Añadido';
                                                }else if($estado == 'Aprobado'){
                                                    $clase_estado = 'Aprobado';
                                                } else if($estado == 'Verificando'){
                                                    $clase_estado = 'Verificando';
                                                }elseif($estado == 'Enviado'){
                                                    // Actualiza el estado de "Enviado" a "Recibido"
                                                    $update = "UPDATE solicitudes SET estado = 'Recibido' WHERE id_solicitud = " . $arreglo['id_solicitud'];
                                                    $conn->query($update); // Ejecuta la consulta para actualizar el estado
                                                    $estado = 'Recibido'; // Actualiza el estado para mostrarlo en la tabla
                                                    $clase_estado = 'Recibido'; // Actualiza la clase CSS correspondiente
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

                                                <td><?php echo $arreglo['nombre_completo'] ?></td>
                                                <td><?php echo $arreglo['cargo'] ?></td>

                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
                                                
                                                
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info" onclick="modalActuSoliTraba('<?php echo $arreglo['id_solicitud'] ?>',
                                                    '<?php echo $arreglo['fecha_solicitud'] ?>',
                                                    '<?php echo $arreglo['tipo_insumo'] ?>',
                                                    '<?php echo $arreglo['nombre_insu'] ?>',
                                                    '<?php echo $arreglo['cantidad'] ?>');" id="celeste">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger" id="rojo" onclick="eliminarSolicitud('<?php echo $arreglo['id_solicitud'] ?>');">
                                                        
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>

                                                    <?php if ($mostrarBotonEnviar): ?>
                                                        <button type="button" class="btn btn-success btn_enviar" 
                                                            onclick="enviarDatosSolicitud('<?php echo $arreglo['id_solicitud']; ?>')">
                                                            <i class="fa-solid fa-paper-plane"></i>
                                                        </button>
                                                    <?php endif; ?>
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
                <?php include("../recursos/modals/modales.php");?>
            </div>
        </div>
    </div>
    <script>
    function cerrarGeneral() {
        var modalEditEnviSoli = document.getElementById("modalEditEnviSoli");
        if (modalEditEnviSoli) {
            modalEditEnviSoli.style.display = 'none';
        }
    }

    //ELIMINAR SOLICITUD
    function eliminarSolicitud(id_solicitud) {
        swal.fire({
            title: 'Está seguro?',
            icon: 'warning',
            text: 'Desea eliminar la la solicitud',
            confirmButtonText: 'Sí, Eliminar',
            showDenyButton: true,
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../eliminar/eliminar_solicitud.php',
                    type: 'POST',
                    data: {
                        id_solicitud: id_solicitud
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Eiminado',
                            icon: 'success',
                            text: 'La solicitud se ha eliminado con exito!',
                            confirmButtonText: 'ok',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */

                            location.reload(); // Recarga la página actual

                        })
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('No se ha eliminado la solicitud', '', 'info')
            }
        })
    }



    //VERIFICAR PARA ENVIAR -------------------------------------
    //Editar actualizar
    function modalActuSoliTraba(id_soli, fecha, tipo_insu, nombre_insu, cantidad) {
    var modalEditEnviSoli = document.getElementById('modalEditEnviSoli');
    modalEditEnviSoli.style.display = 'block';

    // Llenar el formulario con datos del usuario
    document.getElementById('id_soli_reci').value = id_soli;
    document.getElementById('fecha_soli').value = fecha;
    document.getElementById('t_insu_soli').value = tipo_insu;
    document.getElementById('insu_soli').value = nombre_insu;
    document.getElementById('canti_soli').value = cantidad;
}

$(document).ready(function() {
    $("#formEditSoli").submit(function(e) {
        e.preventDefault();
        
        var id_soli_reci = $.trim($("#id_soli_reci").val());
        var fecha_soli = $.trim($("#fecha_soli").val());
        var t_insu_soli = $.trim($("#t_insu_soli").val());
        var insu_soli = $.trim($("#insu_soli").val());
        var canti_soli = $.trim($("#canti_soli").val());
        var proveedor = $.trim($("#select_prove_soli").val());

        $.ajax({
            url: "../actualizar/actualizar_datos_soli_enviar.php",
            type: "POST",
            dataType: "json",
            data: {
                id_soli_reci: id_soli_reci,
                fecha_soli: fecha_soli,
                t_insu_soli: t_insu_soli,
                insu_soli: insu_soli,
                canti_soli: canti_soli,
                proveedor: proveedor
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Actualización exitosa!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
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


   


    //SCRIPT PARA ENVIAR LA SOLICITUD AL MODULO GERENTE PARA SU VERIFICACION
    function enviarDatosSolicitud(id_solicitud) {
        // Mostrar mensaje de confirmación
        Swal.fire({
            title: '¿Estás seguro de enviar esta solicitud para su verificación?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                // Enviar los datos mediante AJAX
                $.ajax({
                    url: "../validacion_datos/enviar_datos_soli.php",
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
   
 
    </script>

</body>

</html>