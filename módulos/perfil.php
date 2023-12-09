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
                        <button class="btn btn-primary" id="openModalBtn">
                            <i class="ti ti-pencil"></i> Editar
                        </button>
                    </div>
                    <!--MODAL-->
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Modal Encabezado</h2>
                                <button class="close" id="closeModalBtn">&times;</button>
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
                                <button type="button" class="btn btn-primary">Aceptar</button>
                                <button type="button" class="btn btn-danger me-auto">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
  <script>
     //ABRIR MODAL
         
        var modal = document.getElementById('myModal');
        var openModalBtn = document.getElementById('openModalBtn');
        var closeModalBtn = document.getElementById('closeModalBtn');

        // Evento para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }

        // Evento para cerrar el modal
        closeModalBtn.onclick = function() {
            modal.style.display = 'none';
        }

        // Cierra el modal si se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }





    
  </script>
    
</body>
</html>