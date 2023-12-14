<?php
session_start();
include('../bd/conexion.php');
if (isset($_SESSION['DBid_usu']) == false) header("location:../index.php");
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de control .:|:. Mango</title>
  <?php include("../partes/enlaces.php");?>
  <link rel="stylesheet" href="../recursos/carrusel/carrusel.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
 
  
</head>

<body>

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
   
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
      <!--  Header Start -->
      <?php include("../partes/encabezado.php");?>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-6 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body" id="naranja">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="iz">
                    <h3>3</h3>
                    <h4>Usuarios Registrados</h4>
                  </div>
                  <div class="icon">
                    <i class="ti ti-user-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-strech">
            <div class="card w-100" >
              <div class="card-body" id="verde" >
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9" >
                  <div class="iz">
                    <h3 style="color: white;">3</h3>
              
                    <h4 style="color: white;">Visitas</h4>

                  </div>
                 
                  <div class="icon">
                    <i class="ti ti-chart-donut"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--CARRUSEL-->
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card w-100">
              <div class="card-body">
                <div class="card-title"><h2><b>Tipos de mangos</b></h2></div>
                <div class="slider-item">
                  <div class="slider-for">
                    <div><img src="../recursos/img/tipos_mangos/mangoataulfo.png" alt="Mango Ataulfo"></div>
                    
                    <div><img src="../recursos/img/tipos_mangos/mangokeitt.png" alt="Mango Keitt"></div>
                    <div><img src="../recursos/img/tipos_mangos/mangokent.png" alt="Mango Kent"></div>
                    <div><img src="../recursos/img/tipos_mangos/mangoTommy.png" alt="Mango Tommy"></div>
                  </div>

                </div>
                 
                <div class="slider-nav">
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangoataulfo.png" alt="Mango Ataulfo">
                  </div>
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangokeitt.png" alt="Mango Keitt">
                  </div>
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangokent.png" alt="Mango Kent">
                  </div>
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangoTommy.png" alt="Mango Tommy">
                  </div>
                  <!-- Repite el mismo patrón para cada imagen adicional en el slider-nav -->
                  <!-- ... -->
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangoataulfo.png" alt="Mango Ataulfo">
                  </div>
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangokeitt.png" alt="Mango Keitt">
                  </div>
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangokent.png" alt="Mango Kent">
                  </div>
                  <div>
                    <img src="../recursos/img/tipos_mangos/mangoTommy.png" alt="Mango Tommy">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>






        <!--TABLA DE PRODUCCION MUNDIAL-->
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card w-100">
              <div class="card-body">
                <div class="card-title"><h2><b>Producción mundial</b></h2></div>
                <div class="table-responsive">
                  <table  id="miTabla2" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <th><b>Pais</b></th>
                        <th><b>Tipo mango</b></th>
                        <th><b>Descripción</b></th>
                        <th><b>Detalles</b></th>
                        <th><b>Precio</b></th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>Ecuador</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>123$</td>

                        </tr>

                        <tr>
                            <td>China</td>
                            <td>Keitt</td>
                            <td>Mango de color verde</td>
                            <td>Venta al por mayor</td>
                            <td>103$</td>

                        </tr>
                        <tr>
                            <td>India</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>120$</td>

                        </tr>
                        <tr>
                            <td>México</td>
                            <td>Atulfo</td>
                            <td>Mango de color amarillo</td>
                            <td>Venta al por mayor</td>
                            <td>150$</td>

                        </tr>
                        <tr>
                            <td>Malawi</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>200$</td>

                        </tr>
                        <tr>
                            <td>Tailandia</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>180$</td>

                        </tr>
                        <tr>
                            <td>Indonesia</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>150$</td>

                        </tr>
                        <tr>
                            <td>Egipto</td>
                            <td>Tommy Atkins</td>
                            <td>Mango de color rojizo</td>
                            <td>Venta al por mayor</td>
                            <td>220$</td>

                        </tr>
                        <tr>
                            <td>Pakistán</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>200$</td>

                        </tr>
                        <tr>
                            <td>Brasil</td>
                            <td>Kanela</td>
                            <td>Mango de color rojo</td>
                            <td>Venta al por mayor</td>
                            <td>160$</td>

                        </tr>
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
 
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="../recursos/carrusel/carrusel.js"></script>

</body>

</html>