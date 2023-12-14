<?php
session_start();
include('../bd/conexion.php');
if (isset($_SESSION['DBid_usu']) == false) header("location:../index.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear rol .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/noti/toastr.css">

</head>
<body>
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h2><b>Roles registrados</b></h2></div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <button type="button" id="openModalRol" class="btn btn-info" > + Registrar nuevo rol</button>

                </div><br>


                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="tabla_roles" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th><b>Código</b></th>
                                            <th><b>Cargo</b></th>
                                            <th><b>Descripción</b></th>
                                            <th><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Administrador</td>
                                                <td>Control del sistema</td>
                                                <td>
                                                    <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar rol" id="editarRol"><i class="ti ti-pencil"></i></button>
                                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar rol" id="eliminarRol"><i class="ti ti-trash-x"></i></button>
                                                </td>
                                            
                                            </tr>

                                        </tbody>
                                    </table>



                                </div>
                                
                            </div>

                        
                        </div>
                    </div>
                </div>
                <?php include("../recursos/modals/modales.php");?>
            </div>
        </div>
    </div>
    <script>
        // Obtener elementos del DOM
        var modal_rol = document.getElementById('modalRol');
        var openModalBtnRol = document.getElementById('openModalRol');

        // Evento para abrir el modal
        openModalBtnRol.onclick = function() {
            modal_rol.style.display = 'block';
        }

       

   

        function cerrarModal() {
            var modal_rol = document.getElementById('modalRol');
            modal_rol.style.display = 'none';
           
            
        }

//----------------------------------------------------------------
        function cerrarGeneral() {
            var modal_rol = document.getElementById("modalRol");
           

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Quieres finalizar el proceso de registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Usuario hizo clic en "Sí, estoy seguro"
                    if (modal_rol) {
                        modal_rol.style.display = 'none';
                    }
                  
                } else {
                    // Usuario hizo clic en "Cancelar"
                    toastr.info("Continuando...", "", {
                        progressBar: true,
                        positionClass: "toast-top-right",
                        timeOut: 3000,
                        extendedTimeOut: 1000,
                        showDuration: 300,
                        hideDuration: 1000,
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        backgroundColor: "#e74c3c",  // Corregido de "background-color" a "backgroundColor"
                        border: "1px solid #c0392b",
                        color: "#ffffff"
                    });

                    
                }
            });
        }
       
    </script>

 


   
   

</body>
</html>















