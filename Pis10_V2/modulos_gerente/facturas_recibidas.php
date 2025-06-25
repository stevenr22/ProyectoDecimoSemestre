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
    <title>Facturas .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/noti/toastr.css">

    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../recursos/noti/toastr.css">


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
                            <h2><b>Facturas recibidas por el proveedor</b></h2>
                        </div>
                    </div>
                </div>
                <div class="botones_container">


                    <div class="rojo">
                        <button type="button" onclick="exportarPDF();" id="btn_pdf_factura" class="btn">Generar factura
                            de compra
                            <i class="fa-solid fa-download" style="vertical-align: middle;"></i>
                        </button>

                    </div>

                </div><br>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Código de factura</th>

                                            <th>Fecha de emisión</th>

                                            <th>Total</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                           


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT * FROM factura WHERE estado = 'Recibido' OR estado='Enviado'");

                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];
                                                if ($estado == 'Recibido') {
                                                    $clase_estado = 'Recibido';
                                                }else{
                                                    $clase_estado = 'Enviado';


                                                }
                                               
                                                ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_factura'] ?></td>
                                                <td><?php echo $arreglo['fecha_emision'] ?></td>
                                                <td><?php echo $arreglo['total'] ?></td>
                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>


                                                <td>


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

                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Enviar factura al administrador</b></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form id="formRegistroFactura" class="form-group" enctype="multipart/form-data">
                                   


                                    <label>Cargue la factura</label><br><br>
                                    <input class="form-control" type="file" name="comprobante" id="comprobante">
                                    <br>
                                    <button id="btn_enviar_comprobante" class="btn btn-success"
                                        type="button">Enviar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
    <script>
    //------GENERAR PDF--------------------
    function exportarPDF() {
        // Realiza una petición AJAX para verificar el estado
        fetch('../validacion_datos/estado_factura.php')
        .then(response => response.json())
        .then(data => {
            if (data.estado === 'Recibido') {
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
                window.location.href = '../reportes/factura.php';
            } else {
                // Si el estado no es 'Recibido', muestra un mensaje de error o haz lo que necesites
                

                toastr.warning("<span style='color:white; font-weight:bold;'>No tienes facturas recibidas</span>",{
                    "toastClass": "blue-toast",
                    "timeOut": "3000"
                });
            }
        })
        .catch(error => {
            console.error("Error al verificar el estado:", error);
        });
    }



    //ENVIAR PDF--------------------------------------------------------------------
    $(document).ready(function() {
        $('#btn_enviar_comprobante').click(function() {
            var formData = new FormData($('#formRegistroFactura')[0]);


            $.ajax({
                url: '../validacion_datos/validar_regis_factura.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Factura enviado con exito!',
                        }).then((result) => {
                            // Si el usuario hace clic en "Aceptar" o si se cierra la notificación
                            if (result.isConfirmed || result.isDismissed) {
                                // Redireccionar a otra página
                                location.reload();
                            }
                        });


                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error al guardar el archivo y datos. Detalles: ' +
                                response.error,
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                    console.log("Response Text: " + jqXHR
                    .responseText); // Esto mostrará el mensaje de error del servidor.

                    Swal.fire({
                        icon: 'error',
                        title: 'Error en la solicitud AJAX.',
                    });


                }
            });
        });
    });
    </script>



</body>

</html>