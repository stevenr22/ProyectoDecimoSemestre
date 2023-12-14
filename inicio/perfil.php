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
    <title> Perfil .:|:. Mango</title>
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
                        <div class="card-title"><h2><b>Perfil</b></h2></div>
                    </div>  
                </div>
             


                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form action="" class="form-group">
                                  
                                    <label for="Nombres">Nombres: </label>
                                    <input type="text" class="form-control" id="nombre_pag"><br>
                                       
                                    <label for="Apellidos">Apellidos: </label>
                                    <input type="text" class="form-control" id="apellido_pag"><br>

                                       
                                    <label for="Correo">Correo electrónico: </label>
                                    <input type="text" class="form-control" id="correo_pag"><br>

                                     
                                    <label for="Usuario">Nombre de usuario: </label>
                                    <input type="text" class="form-control" id="nusu_pag"><br>

                                       
                                    <label for="Cedula">N° de cédula: </label>
                                    <input type="text" class="form-control" id="cedula_pag"><br>
                                      
                                    <label for="Rol">Rol asignado: </label>
                                    <input type="text" class="form-control" id="rol_pag"><br>
                                       
                                            
                                   
                                </form>
                               
                                <button type="button"  id="btn_modal_perfil" class="btn btn-info"><i class="ti ti-pencil"></i>Editar</button>
                               
                                
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
        var modal_peril = document.getElementById('modalPerfil');
        var openModalBtnPerfil = document.getElementById('btn_modal_perfil');

        // Evento para abrir el modal
        openModalBtnPerfil.onclick = function() {
            modal_peril.style.display = 'block';
        }

       

  

//----------------------------------------------------------------
        function cerrarGeneral() {
            var modal_peril = document.getElementById("modalPerfil");
           

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
                    if (modal_peril) {
                        modal_peril.style.display = 'none';
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















