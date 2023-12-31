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
    <title>Historial Facturas .:|:. Mango</title>
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
                            <h2><b>Historial de Facturas recibidas</b></h2>
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
                                            <th>Código</th>

                                            <th>Documento</th>

                                            
                                            <th>Acciones</th>
                                           


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT * FROM pdf_files");

                                            while ($arreglo = $senten->fetch_array()) {
                                              
                                               
                                                ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_pdf'] ?></td>
                                                <td><?php echo $arreglo['file_name'] ?></td>


                                                <td>


                                                    <button type="button" class="btn btn-info" onclick="descargarPDF('<?php echo $arreglo['file_name']; ?>')">
                                                        <i class="fas fa-download"></i>
                                                    </button>

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

               

            </div>


        </div>
    </div>
    <script>
        function descargarPDF(fileName) {
            // Mostrar el toast antes de iniciar la descarga.
            toastr.info("<span style='color:white; font-weight:bold;'>Descargando</span>", {
            "toastClass": "blue-toast",
            "timeOut": 3000,
            "positionClass": "toast-bottom-right",
            "progressBar": true,
            "extendedTimeOut": 1000,
            "showDuration": 300,
            "hideDuration": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });



          


            // Crear un enlace temporal y simular un clic en él.
            var link = document.createElement('a');
            link.href = '../reportes/' + fileName;
            link.download = fileName;  // Esto hará que se descargue el archivo con el nombre original.
            document.body.appendChild(link);  // Agregar el enlace al cuerpo del documento.
            link.click();  // Simular el clic en el enlace.

            // Eliminar el enlace del cuerpo del documento después de iniciar la descarga.
            document.body.removeChild(link);
        }

   
    </script>



</body>

</html>