<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
            
      <!--BURGUER RESPONSIVE-->
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>

      </li>
    
            

    </ul>
    <?php 
      include("../solicitar_datos/soli_datos.php"); 
      $datos = obtenerDatos();
    ?>
    <div id="linkNombre" class="col-md-6 text-center">
      <a href="../inicio/dashboard.php">
        <?php echo $datos["DBnom_completoV2"];?> | <?php echo $datos["DBcargoV2"];?>
      </a>     
    </div>



    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="../recursos/img/user.png" alt="" width="35" height="35" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="../inicio/perfil.php" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">Mi perfil</p>
              </a>
                   
              <a href="../validacion_datos/cerrar_sesion.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar sesión</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>