<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial solicitudes .:|:. Mango</title>
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
                        <div class="card-title"><h2><b>Historial de solicitudes generales</b></h2></div>
                    </div>  
                </div>
                <div class="botones_container">
                  
             
                  <div class="rojo">
                      <button type="button" id="btn_pdf_arriba" class="btn" >Exportar reporte   
                          <i class="fa-solid fa-download" style="vertical-align: middle;"></i>
                      </button>

                  </div>
                  
              </div><br>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="tabla_solici_histori" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th><b>Código</b></th>
                                            <th><b>Fecha solicitud</b></th>
                                            <th><b>Tipo insumo solicitado</b></th>
                                            <th><b>Nombre insumo solicitado</b></th>
                                            <th><b>Cantidad</b></th>
                                            <th><b>Nombre remitente</b></th>
                                            <th><b>Cargo</b></th>

                                            <th><b>Estado</b></th>


                                        </thead>
                                        <tbody>
                                        <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT s.id_solicitud, s.fecha_solicitud, s.tipo_insumo, s.nombre_insu, s.cantidad,
                                            u.nombre_completo, r.cargo, s.estado
                                            FROM usuario as u
                                            JOIN rol as r ON u.id_rol = r.id_rol
                                            JOIN solicitudes as s ON s.id_usu = u.id_usu
                                            WHERE r.cargo = 'Empleado' AND (s.estado = 'Enviado' OR s.estado = 'Denegado' OR s.estado = 'Aprobado')
                                            ORDER BY s.id_solicitud;
                                            ");
                                             while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];

                                                if ($estado == 'Enviado') {
                                                    $clase_estado = 'Enviado';
                                                }else if($estado == 'Aprobado'){
                                                    $clase_estado = 'Aprobado';
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

                                                <td  class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
                                                
                                            
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
    

 
    
</body>
</html>