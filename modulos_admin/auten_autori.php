<?php include("../autorizacion/admin.php");?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Roles .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css">
   
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
                        <div class="card-title"><h2><b>Asignar rol</b></h2></div>
                    </div>  
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla_asig_rol" class="table table-bordered">
                                        <thead>
                                            <th><b>Código</b></th>
                                            <th><b>Nombres y Apellidos</b></th>
                                            <th><b>Nombre de usuario</b></th>
                                            <th><b>rol</b></th>
                                            <th><b>Correo electronico</b></th>
                                            <th><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                        <?php
                                            include("../bd/conexion.php");

                                            $senten = "SELECT u.id_usu, u.nombre_usu, u.nombre_completo, r.cargo, r.id_rol,
                                            u.correo
                                            FROM usuario as u , rol as r WHERE u.id_rol=r.id_rol and r.estado = 1 AND u.estado = 1";
                                            $respuesta = $conn->query($senten);
                                            while ($arreglo = $respuesta->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_usu'] ?></td>
                                                <td><?php echo $arreglo['nombre_completo'] ?></td>
                                                <td><?php echo $arreglo['nombre_usu'] ?></td>
                                                <td><?php echo $arreglo['cargo'] ?></td>
                                                <td><?php echo $arreglo['correo'] ?></td>
                                                    
                                                <td>
                                                    <button type="button" onclick="abrirModal('<?php echo $arreglo['id_usu'];?>','<?php echo $arreglo['nombre_completo'];?>','<?php echo $arreglo['nombre_usu'];?>','<?php echo $arreglo['cargo'];?>','<?php echo $arreglo['correo'];?>');" class="edit-button"  id="celeste"><i class="fa-solid fa-pencil"></i></button>

                                                    <button type="button" class="delete-button"  id="rojo"><i class="fa-solid fa-trash-can"></i></button>
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
        //ASIGNAR ROL
        function abrirModal(id_usuario, nombre_completo, nombre_usu, cargo, correo) {
            var modalAsignarRol = document.getElementById('modalAsignarROl');
            modalAsignarRol.style.display = 'block';

            // Llenar el formulario con datos del usuario
            document.getElementById('id_usuario').value = id_usuario;
            document.getElementById('NomCompleto_rol').value = nombre_completo;
            document.getElementById('correo_rol').value = correo;
            document.getElementById('NomUsuario_rol').value = nombre_usu;
            document.getElementById('cargo_rol').value = cargo;

        }
        function cerrarGeneral() {
            var modalAsignarRol = document.getElementById("modalAsignarROl");

            if (modalAsignarRol) {
                modalAsignarRol.style.display = 'none';
            }
        }

        function actualizarRol() {
            // Obtener los valores del formulario
            var idUsuario = document.getElementById('id_usuario').value;
            var nuevoRol = document.getElementById('selectRol').value;

            // Realizar una solicitud AJAX para actualizar el rol del usuario
            fetch('../actualizar/actualizar_rol.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id_usuario=' + idUsuario + '&nuevo_rol=' + nuevoRol,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // La actualización fue exitosa
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'El rol ha sido actualizado correctamente.',
                        willClose: () => {
                            // Redirigir después de cerrar el modal
                            window.location.href = '../modulos_admin/auten_autori.php'; // Cambia esto según tu necesidad
                        }
                    });

                } else {
                    // La actualización falló, muestra un mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al actualizar el rol.',
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>



 
    
</body>
</html>