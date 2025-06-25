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
            <?php include("../partes/encabezado.php");?>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Proveedores registrados</b></h2>
                        </div>
                    </div>
                </div>
                <div class="botones_container">
                    <div class="rojo">
                        <button type="button" id="btn_pdf_arriba" onclick="exportarPDF();" class="btn">Exportar reporte
                            <i class="fa-solid fa-download" 
                            style="vertical-align: middle;"></i>
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
                                               
                                               

                                            </tr>


                                        </tbody>
                                        <?php } ?>



                                    </table>



                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
            //Exportar reporte
    function exportarPDF() {
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