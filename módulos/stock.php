<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock .:|:. Mango</title>
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
                    <a href="#" class="text-nowrap logo-img">
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
                        <div class="card-title">Insumos disponibles</div>
                    </div>  
                </div>
                <div class="card-body table-responsive">
                    <table id="mitabla" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>CÓDIGO</th>
                            <th>TIPO</th>
                            <th>NOMBRE</th>
                            <th>PROVEEDOR</th>
                            <th>USO</th>
                            <th>ACCIONES</th>


                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Insecticida</td>
                                <td>Sulfato de amonio</td>
                                <td>Ecua S.A.</td>
                                <td>Aplicación en parcela A</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info"  data-bs-toggle="tooltip"  data-bs-title="Sincronizar producto"><i class="ti ti-pencil" ></i></button>

                                    <button class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                

                <div class="card-footer">
                    <?php include("../partes/footer.php");?>
                </div>
            </div>

        </div>

    </div>
</body>
</html>