<?php include("../autorizacion/admin.php");
    $query = "SELECT * FROM parcela WHERE estado = 'Operando' or estado = 'Deshabilitado'
    ORDER BY nombre ";
    $result = mysqli_query($conn, $query);

    // Verificar si hay resultados
    if ($result) {
        $parcelas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        die("Error al obtener las parcelas: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento de insumos.:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   
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
                   <div class="card-title"><h2><b>Seguimiento de insumos</b></h2></div>
               </div>  
           </div>

          

           <div class="row justify-content-center">
                <?php
                    // Utiliza un bucle para recorrer las parcelas y generar las tablas
                    foreach ($parcelas as $parcela) {
                        $id_parcela = $parcela['id_parcela'];
                        $nombre_parcela = $parcela['nombre'];
                        $alto = $parcela['alto'];
                        $ancho = $parcela['ancho'];
                        $fecha_registro = $parcela['fecha_registro'];
                        $estado_parcela = $parcela['estado']; 
                        ?>
                <div class="col-lg-6">
                   <div class="card w-100">
                    
                        <div class="card-header <?php echo ($estado_parcela == 'Deshabilitado') ? 'bg-danger' : ''; ?>">
                            <div class="card-title">
                                <h2>
                                    <b>
                                        <?php echo $nombre_parcela; ?> - <?php echo $estado_parcela; ?>
                                    </b>
                                </h2>
                            </div>

                        </div>
                       <div class="card-body table-responsive">
                            <table id="miTablaParcelas<?php echo $id_parcela;?>" class="table table-striped table-bordered" cellspacing="0">
                                <thead>
                                    <th><b>Código</b></th>
                                    <th><b>nombre</b></th>
                                    <th><b>alto</b></th>
                                    <th><b>ancho</b></th>
                                    <th><b>fecha registro</b></th>
                                    

                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $id_parcela?></td>
                                        <td><?php echo $nombre_parcela?></td>
                                        <td><?php echo $alto?></td>
                                        <td><?php echo $ancho?></td>
                                        <td><?php echo $fecha_registro?></td>  
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                   </div>
               </div>
               <?php } ?>
           </div>
       </div>
       

   </div>
</div>

    
</body>
</html>