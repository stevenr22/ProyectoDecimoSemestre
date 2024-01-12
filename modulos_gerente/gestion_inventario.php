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
    <title>Inventario .:|:. Mango</title>
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
                            <h2><b>Stock disponible</b></h2>
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
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Cantiadad Restada por aplicación</th>


                                            <th>Cantidad Actual</th>


                                            <th>Estado</th>




                                        </thead>
                                        <tbody>
                                            <?php
                                                include("../bd/conexion.php");
                                                $senten = $conn->query("SELECT * FROM total_insumos");
                                                while ($arreglo = $senten->fetch_array()) {
                                                    $estado = $arreglo['estado'];

                                                    // Cambiar el estado a "Agotado" si cantidad_total_usada es 0
                                                    if ($arreglo['cantidad_total_usada'] == 0) {
                                                        $estado = 'Agotado';
                                                    }

                                                    if ($estado == 'Disponible') {
                                                        $clase_estado = 'Disponible';
                                                    } else if($estado == 'Agotado') {
                                                        $clase_estado = 'Agotado';  // Puedes definir una clase CSS específica para "Agotado" si lo deseas
                                                    }
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_total_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre'] ?></td>
                                                <td><?php echo $arreglo['tipo'] ?></td>
                                                <td>
                                                    <p id="crojo">
                                                        <?php echo $arreglo['cantidad_restada'] ?>


                                                    </p>
                                                </td>

                                                <td>
                                                    <h3 id="stock">
                                                        <?php echo $arreglo['cantidad_total_usada'] ?>
                                                    </h3>
                                                </td>
                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
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



</body>

</html>