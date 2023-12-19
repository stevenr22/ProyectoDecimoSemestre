<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear rol .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/noti/toastr.css">
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css">


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
            <!--  Header Start -->
            <?php include("../partes/encabezado.php");?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h2><b>Roles registrados</b></h2></div>
                    </div>  
                </div>



                <div class="botones_container">
                    <div class="celeste">
                        <button type="button" id="btn_modal_regis_rol" class="btn">Registrar nuevo rol
                            <i class="fa-solid fa-circle-plus" style="vertical-align: middle;"></i>
                        </button>

                    </div>
                   
             
                    <div class="rojo">
                        <button type="button" id="btn_pdf_arriba" class="btn" >Exportar reporte   
                            <i class="fa-solid fa-download" style="vertical-align: middle;"></i>
                        </button>

                    </div>
                    
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
                                            <?php
                                                include("../bd/conexion.php");

                                                $senten = $conn->query("SELECT * FROM rol WHERE estado = 1");
                                                while ($arreglo = $senten->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_rol'] ?></td>

                                                <td><?php echo $arreglo['cargo'] ?></td>
                                                <td><?php echo $arreglo['descripcion'] ?></td>
                                                <td>
                                                    <button type="button" class="edit-button" onclick="modalActuRol('<?php echo $arreglo['id_rol'] ?>','<?php echo $arreglo['cargo'] ?>','<?php echo $arreglo['descripcion'] ?>');"  id="celeste"><i class="fa-solid fa-pencil"></i></button>

                                                    <button type="button" class="delete-button" onclick="eliminar_rol('<?php echo $arreglo['id_rol'] ?>','<?php echo $arreglo['cargo'] ?>');" id="rojo"><i class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            
                                            </tr>
                                            <?php } ?>

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
        var modalNueRol = document.getElementById('modalNueRol');
        var btn_modal_regis_rol = document.getElementById('btn_modal_regis_rol');

        // Evento para abrir el modal
        btn_modal_regis_rol.onclick = function() {
            modalNueRol.style.display = 'block';
        }


        function cerrarGeneral() {
            var modalNueRol = document.getElementById("modalNueRol");
            var modalActuaRol = document.getElementById("modalActuaRol");
            
            if (modalNueRol || modalActuaRol) {
                if (modalNueRol) {
                    modalNueRol.style.display = 'none';
                }
                
                if (modalActuaRol) {
                    modalActuaRol.style.display = 'none';
                }
            }  
        }



        // REGISTRAR DATOS
     

            $("#formRegisRol").submit(function(e){
                e.preventDefault();
                var nom_rol = $.trim($("#nom_rol").val());
                var decrip_rol = $.trim($("#decrip_rol").val());
            
               

                // Enviar los datos mediante AJAX
                $.ajax({
                    url: "../validacion_datos/validar_regis_rol.php",
                    type: "POST",
                    dataType: "json",
                    data: {nom_rol: nom_rol, decrip_rol: decrip_rol}, // Asegúrate de que los nombres coincidan con los de tu PHP
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registro exitoso!',
                            }).then((result) => {
                                if(result.value){
                                    window.location.href = "../modulos_admin/regis_usu.php";
                                }
                            });
                        } else {
                            Swal.fire({
                                title: response.message,
                                icon: 'warning'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error en la solicitud',
                            icon: 'error'
                        });
                    }
                });
            });

//----------------------------------------------------------------------------------------
             //ACTUALIZAR DATOS DEL ROL

             function modalActuRol(id_rol, cargo, descri) {
                var modalActuaRol = document.getElementById('modalActuaRol');
                modalActuaRol.style.display = 'block';

                // Llenar el formulario con datos del usuario
                document.getElementById('id_rol_act').value = id_rol;
                document.getElementById('nom_rol_actu').value = cargo;
                document.getElementById('decrip_rol_actu').value = descri;
               

            }
           
             $(document).ready(function() {
                $("#modalActuaRol").submit(function(e){
                    e.preventDefault();
                    var id_rol_act = $.trim($("#id_rol_act").val());
                    var nom_rol_actu = $.trim($("#nom_rol_actu").val());
                    var decrip_rol_actu = $.trim($("#decrip_rol_actu").val()); // Obtener el ID
                   
                

                    $.ajax({
                        url: "../actualizar/actualizar_datos_rol.php",
                        type: "POST",
                        dataType: "json",
                        data: {id_rol_act: id_rol_act, nom_rol_actu: nom_rol_actu, decrip_rol_actu: decrip_rol_actu}, // Enviar el ID
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Actualización exitosa!',
                                }).then((result) => {
                                    if(result.value){
                                        window.location.reload(); // Recargar la página
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: response.message,
                                    icon: 'warning'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error en la solicitud',
                                icon: 'error'
                            });
                        }
                    });
                });
            });
//----------------------------------------------------------------------------------------

             /*ELIMINAR ROL*/
             function eliminar_rol(id_rol, cargo){
                swal.fire({
                    title:'Está seguro?',
                    icon:'warning',
                    text:'Desea eliminar el rol:' +cargo,
                    confirmButtonText:'Sí, Eliminar',
                    showDenyButton: true,
                    denyButtonText: `Cancelar`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url:'../eliminar/eliminar_rol.php',
                            type: 'POST',
                            data:{id_rol: id_rol},
                            success: function(response){
                                Swal.fire({
                                    title:'Eiminado',
                                    icon:'success',
                                    text:'El cargo' +cargo+ 'se ha eliminado con exito!',
                                    confirmButtonText:'ok',
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                    
                                    location.reload(); // Recarga la página actual
                                    
                                })
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('No se ha eliminado el rol', '', 'info')
                    }
                })
            }







       
    </script>

 


   
   

</body>
</html>















