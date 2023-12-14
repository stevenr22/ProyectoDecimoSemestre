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
    <title>Solicitud .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   
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
            <?php include("../partes/encabezado.php");?>
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h2><b>Registro de solicitud de insumo</b></h2></div>
                    </div>  
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form id="formRegisSoliInsu" class="form-group">
                                    
                                    <label for="Fecha">Fecha de registro: </label>
                                    <input type="date" id="fechSoli" class="form-control"><br>
                                      
                                    
                                      
                                    <label for="selecttipoIns">Seleccione el tipo de insumo</label>
                                    <select name="selecttipoIns" class="form-select" id="selecttipoIns">
                                        <option value="">A</option>
                                        <option value="">B</option>
                                        <option value="">C</option>
                                        <option value="">D</option>
                                    </select><br>

                                    <label for="Nombre_insu">Nombre del insumo: </label>
                                    <input type="text" id="nom_insu" class="form-control" placeholder="Ingrese el nombre del insumo"><br>
                                       
                                    <label for="Canti">Cantidad: </label>
                                    <input type="number" id="Canti" class="form-control">
                                       
                               
                                       
                              
                                      
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="registrar();" id="btn_regis" class="btn btn-info">Registrar</button>
                            </div>

                        </div>
                    </div>

                </div>
                <!--TABLA DE SOLICITUDES-->
                
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h2><b>Estado de solicitud</b></h2></div>
                    </div>  
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                            <div class="table-responsive">

                                <table id="tabla_estado_soli_empleado" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <th><b>Código</b></th>
                                        <th><b>Fecha solicitud</b></th>
                                        <th><b>Insumos solicitados</b></th>
                                        <th><b>Estado</b></th>
                                        <th><b>Acciones</b></th>


                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>12-12-2023</td>
                                            <td>Maquinaria</td>
                                           
                                            <td>Enviado..</td>
                                            <td>
                                                <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar solicitud" id="editarsoli"><i class="ti ti-pencil"></i></button>
                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar solicitud" id="eliminarsoli"><i class="ti ti-trash-x"></i></button>
                                            </td>
                                        
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

    <script>
        function registrar(){
            var btn_registrar = document.getElementById("btn_regis");
            if (btn_registrar){
                Swal.fire({
                title: "Registro exitoso!",
                text: "La solicitud fue enviada para su verificación!",
                icon: "success"
                });

            }
        }
        
    </script>
    
</body>
</html>