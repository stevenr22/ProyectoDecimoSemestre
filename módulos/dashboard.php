<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de control .:|:. Mango</title>
  <?php include("../partes/enlaces.php");?>
  <link rel="stylesheet" href="../recursos/carrusel/carrusel.css">

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
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body bg-danger">
                <div class="card-title"><h2><b>CARRUSEL DE IMAGENES</b></h2></div>
                

               
                  
                  
                 
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