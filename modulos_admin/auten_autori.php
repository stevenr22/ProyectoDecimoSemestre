<?php include("../autorizacion/admin.php");?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Roles .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css">
   
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   
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
                        <div class="card-title"><h2><b>Asignar rol</b></h2></div>
                    </div>  
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla_asig_rol" class="table table-bordered">
                                        <thead>
                                            <th><b>N° cédula</b></th>
                                            <th><b>Nombres y Apellidos</b></th>
                                            <th><b>Nombre de usuario</b></th>
                                            <th><b>rol</b></th>
                                            <th><b>Correo electronico</b></th>
                                            <th><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                        <?php
                                            include("../bd/conexion.php");

                                            $senten = "SELECT u.id_usu, u.nombre_usu, u.nombre_completo, r.cargo, r.id_rol,
                                            u.correo
                                            FROM usuario as u , rol as r WHERE u.id_rol=r.id_rol and r.estado = 1 AND u.estado = 1";
                                            $respuesta = $conn->query($senten);
                                            while ($arreglo = $respuesta->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_usu'] ?></td>
                                                <td><?php echo $arreglo['nombre_completo'] ?></td>
                                                <td><?php echo $arreglo['nombre_usu'] ?></td>
                                                <td><?php echo $arreglo['cargo'] ?></td>
                                                <td><?php echo $arreglo['correo'] ?></td>
                                                    
                                                <td>
                                                    <button type="button" id="celeste"><i class="fa-solid fa-pencil"></i></button>

                                                    <button type="button" id="rojo"><i class="fa-solid fa-trash-can"></i></button>
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

 
    
</body>
</html>