<?php 
include("../autorizacion/admin.php");
$query = "SELECT p.id_parcela, p.nombre, p.alto, p.ancho, t.nombre AS nombre_insu, t.tipo, t.fecha_agregada, us.cantidad_utilizada, p.estado
FROM uso_insumos AS us
JOIN parcela as p ON us.id_parcela = p.id_parcela
JOIN total_insumos as t ON t.id_total_insumo = us.id_total_insumo
WHERE p.estado = 'Operando' OR p.estado = 'Deshabilitado'";

$result = mysqli_query($conn, $query);

// Agrupar insumos por parcela
$parcelas = [];
while ($row = mysqli_fetch_assoc($result)) {
    $id_parcela = $row['id_parcela'];
    if (!isset($parcelas[$id_parcela])) {
        $parcelas[$id_parcela] = [
            'nombre' => $row['nombre'],
            'alto' => $row['alto'],
            'ancho' => $row['ancho'],
            'estado' => $row['estado'],
            'insumos' => []
        ];
    }
    $parcelas[$id_parcela]['insumos'][] = [
        'nombre_insu' => $row['nombre_insu'],
        'tipo' => $row['tipo'],
        'fecha_agregada' => $row['fecha_agregada'],
        'cantidad_utilizada' => $row['cantidad_utilizada']
    ];
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
                            <h2><b>Seguimiento de insumos</b></h2>
                        </div>
                    </div>
                </div>



                <div class="row justify-content-center">
                    <?php
       foreach ($parcelas as $id_parcela => $info_parcela) {
           $nombre_parcela = $info_parcela['nombre'];
           $alto = $info_parcela['alto'];
           $ancho = $info_parcela['ancho'];
           $estado_parcela = $info_parcela['estado'];
           $insumos = $info_parcela['insumos'];

           echo '<div class="col-lg-6">';
           echo '<div class="card w-100">';
           echo '<div class="card-header ' . (($estado_parcela == 'Deshabilitado') ? 'bg-danger' : '') . '">';
           echo '<h2><b>' . $nombre_parcela . ' - ' . $estado_parcela . '</b></h2>';
           echo '</div>';
           echo '<div class="card-body table-responsive">';
           echo '<table class="table table-striped table-bordered" cellspacing="0">';
           echo '<thead><tr><th>Código</th><th>Nombre</th><th>Ancho</th><th>Alto</th><th>Insumo utilizado</th><th>Tipo de Insumo</th><th>Cantidad suministrada</th><th>Fecha suministrada</th></tr></thead>';
           echo '<tbody>';

           foreach ($insumos as $insumo) {
               echo '<tr>';
               echo '<td>' . $id_parcela . '</td>';
               echo '<td>' . $nombre_parcela . '</td>';
               echo '<td>' . $alto . '</td>';
               echo '<td>' . $ancho . '</td>';
               echo '<td>' . $insumo['nombre_insu'] . '</td>';
               echo '<td>' . $insumo['tipo'] . '</td>';
               echo '<td>' . $insumo['cantidad_utilizada'] . '</td>';
               echo '<td>' . $insumo['fecha_agregada'] . '</td>';
               echo '</tr>';
           }

           echo '</tbody></table>';
           echo '</div></div></div>';
       }
       ?>
                </div>
            </div>


        </div>
    </div>


</body>

</html>