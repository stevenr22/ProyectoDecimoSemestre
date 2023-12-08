<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil .:|:. Mango</title>
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
                        <div class="card-title">Perfil</div>
                    </div>
                    
                    <div class="card-body">
                        <form action="" class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="Nombres">Nombres: </label>
                                    <input type="text" class="form-control" id="nombre"><br>
                                </div>
                                <div class="col">
                                    <label for="Apellidos">Apellidos: </label>
                                    <input type="text" class="form-control" id="apellido">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="Correo">Correo electrónico: </label>
                                    <input type="text" class="form-control" id="correo"><br>

                                </div>
                                <div class="col">
                                    <label for="Usuario">Nombre de usuario: </label>
                                    <input type="text" class="form-control" id="nusu">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="Cedula">N° de cédula: </label>
                                    <input type="text" class="form-control" id="cedula"><br>
                                </div>
                                <div class="col">
                                    <label for="Rol">Rol asignado: </label>
                                    <input type="text" class="form-control" id="rol">
                                </div>
                            
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" onclick="abrirModal()">
                            <i class="ti ti-pencil"></i> Editar
                        </button>
                    </div>
                    <!--MODAL-->
                    <div class="modal fade" tabindex="-1" id="miModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar perfil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="Nombres">Nombres: </label>
                                                <input type="text" class="form-control" id="nombre"><br>
                                            </div>
                                            <div class="col">
                                                <label for="Apellidos">Apellidos: </label>
                                                <input type="text" class="form-control" id="apellido">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="Correo">Correo electrónico: </label>
                                                <input type="text" class="form-control" id="correo"><br>

                                            </div>
                                            <div class="col">
                                                <label for="Usuario">Nombre de usuario: </label>
                                                <input type="text" class="form-control" id="nusu">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="Cedula">N° de cédula: </label>
                                                <input type="text" class="form-control" id="cedula"><br>
                                            </div>
                                            <div class="col">
                                                <label for="Rol">Rol asignado: </label>
                                                <input type="text" class="form-control" id="rol">
                                            </div>
                                        
                                        </div>
                                    </form>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                                    <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="card-footer">
                    <?php include("../partes/footer.php");?>
                </div>
            </div>
        </div>
    </div>
  <script>
     function abrirModal() {
        // Abre el modal utilizando jQuery
        $('#miModal').modal('show');
    }
    
  </script>
    
</body>
</html>