<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Inicio</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="../inicio/dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
       <!--VISTASS ADMINISTRADOR------------------------------------------------------------------------------>
        <?php
          if($_SESSION['DBcargo'] == 'Administrador'){?>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Parcelas</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_admin/r_parcelas.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-area-line"></i>
                </span>
                <span class="hide-menu">Registrar parcelas</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_admin/segui_insu_parce.php" aria-expanded="false">
                <span>
                  <i class="ti ti-corner-down-left-double"></i>
                </span>
                <span class="hide-menu">Seguimiento de insumos<br>por parcela</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Gestión insumos</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_admin/recep_insuxprove.php" aria-expanded="false">
                <span>
                    <i class="ti ti-stack"></i>
                </span>
                <span class="hide-menu">Recepción de insumos</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_admin/stock_disponible.php" aria-expanded="false">
                <span>
                    <i class="ti ti-stack"></i>
                </span>
                <span class="hide-menu">Stock disponible</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_admin/control_inven.php" aria-expanded="false">
                <span>
                    <i class="ti ti-stack"></i>
                </span>
                <span class="hide-menu">Control de inventario</span>
                </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Estadísticas</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/tendencia_insumos.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-bar"></i>
                </span>
                <span class="hide-menu">Tendencia de insumos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/tendencia_produccion.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-arrows-vertical"></i>
                </span>
                <span class="hide-menu">Tendencia de producción</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Gestión de Proveedores</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/r_proveedor.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registro proveedor</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/soli_insumos.php" aria-expanded="false">
                <span>
                  <i class="ti ti-notification"></i>
                </span>
                <span class="hide-menu">Solicitud de insumos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/historial_solici.php" aria-expanded="false">
                <span>
                  <i class="ti ti-list-check"></i>
                </span>
                <span class="hide-menu">Historial de solicitudes</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Control de usuarios</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/auten_autori.php" aria-expanded="false">
                <span>
                  <i class="ti ti-edit"></i>
                </span>
                <span class="hide-menu">Autenticación de usuarios</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_admin/regis_usu.php" aria-expanded="false">
                <span>
                  <i class="ti ti-pencil-plus"></i>
                </span>
                <span class="hide-menu">Registrar usuarios</span>
              </a>
            </li>
        <?php
          }
        ?>
        <!--------------------------------------------------------------------------------------------------->


       <!--VISTASS EMPLEADO------------------------------------------------------------------------------>
        <?php
          if($_SESSION['DBcargo'] == 'Empleado'){?>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Uso de insumos</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_trabajador/r_uso_insumos.php" aria-expanded="false">
                <span>
                  <i class="ti ti-corner-down-left-double"></i>
                </span>
                <span class="hide-menu">Registrar uso de insumos</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_trabajador/r_solicitud.php" aria-expanded="false">
                <span>
                  <i class="ti ti-corner-down-left-double"></i>
                </span>
                <span class="hide-menu">Registrar de solicitud</span>
                </a>
            </li>
        <?php
          }
        ?>
        <!--------------------------------------------------------------------------------------------------->
         
        <!--VISTAS GERENTE------------------------------------------------------------------------------------------>
        <?php
          if($_SESSION['DBcargo'] == 'Gerente'){?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Estadísticas</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../modulos_gerente/tendencias.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-bar"></i>
                </span>
                <span class="hide-menu">Tendencias</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Gestión inventario</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_gerente/gestion_inventario.php" aria-expanded="false">
                <span>
                    <i class="ti ti-stack"></i>
                </span>
                <span class="hide-menu">Control de inventario</span>
                </a>
            </li>


            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Gestión proveedores</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_gerente/gestion_proveedores.php" aria-expanded="false">
                <span>
                  <i class="ti ti-truck-delivery"></i>
                </span>
                <span class="hide-menu">Control proveedores</span>
                </a>
            </li>

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Gestión solicitudes</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_gerente/solicitudes_recibidas.php" aria-expanded="false">
                <span>
                  <i class="ti ti-truck-delivery"></i>
                </span>
                <span class="hide-menu">Solicitudes recibidas</span>
                </a>
            </li>
        <?php
          }
        ?>




        <!------------------------------------------------------------------------------------------------------------->

        <li class="sidebar-item">
                <a class="sidebar-link" href="../modulos_proveedores/dashboard_proveedor.php" aria-expanded="false">
                <span>
                  <i class="ti ti-truck-delivery"></i>
                </span>
                <span class="hide-menu">PROVEEDOR DASHBOARD</span>
                </a>
            </li>
         
 

      


           






    </nav>