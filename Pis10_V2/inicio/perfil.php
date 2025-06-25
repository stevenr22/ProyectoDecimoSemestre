<?php
session_start();
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
    <style>
    #correo {
        border: 1px solid; /* Borde por defecto */
    }
    #correo.valid {
        border-color: green; /* Borde verde cuando el email es válido */
    }
    #correo.invalid {
        border-color: red; /* Borde rojo cuando el email no es válido */
    }
</style>
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
                        <div class="card-title">
                            <h2><b>Perfil</b></h2>
                        </div>
                    </div>
                </div>



                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form class="form-group">


                                    <label for="Nombres">Nombre completo: </label>
                                    <input type="text" class="form-control readonly-field" id="nombre_comple_pag"
                                        readonly value="<?php echo $datos["DBnom_completoV2"];?>"><br>



                                    <label for="Correo">Correo electrónico: </label>
                                    <input type="text" class="form-control readonly-field" id="correo_pag" readonly
                                        value="<?php echo $datos["DBcorreoV2"];?>"><br>


                                    <label for="Usuario">Nombre de usuario: </label>
                                    <input type="text" class="form-control readonly-field" id="nusu_pag" readonly
                                        value="<?php echo $datos["DBnom_usuV2"];?>"><br>




                                    <label for="Rol">Rol asignado: </label>
                                    <input type="text" class="form-control readonly-field" id="rol_pag" readonly
                                        value="<?php echo $datos["DBcargoV2"];?>"><br>

                                    <button type="button" id="btn_modal_perfil" class="btn btn-info"><i
                                            class="ti ti-pencil"></i>Editar</button>


                                </form>



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
    var modalPerfil = document.getElementById('modalPerfil');
    var btn_modal_perfil = document.getElementById('btn_modal_perfil');

    // Evento para abrir el modal
    btn_modal_perfil.onclick = function() {
        modalPerfil.style.display = 'block';
    }


    function cerrarGeneral() {
        var modalPerfil = document.getElementById("modalPerfil");


        if (modalPerfil) {
            modalPerfil.style.display = 'none';
        }


    }


    function soloLetras(e) {
        var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales = [8, 37, 39, 46],
            tecla_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }

    //validar correo
    function validateEmail() {
        var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

        // Verificar si el correo electrónico coincide con el patrón
        if (validEmail.test(jQuery('#correo').val())) {
            // Limpiar el mensaje de error y cambiar el color del borde a verde
            jQuery('#errorCorreo').text('');
            jQuery('#correo').removeClass('invalid').addClass('valid');
            return true;
        } else {
            // Mostrar el mensaje de error y cambiar el color del borde a rojo
            jQuery('#errorCorreo').text('Email no válido.');
            jQuery('#correo').removeClass('valid').addClass('invalid');
            return false;
        }
    }

    // Agregar el evento 'input' al input con el ID 'correo'
    jQuery('#correo').on('input', function() {
        validateEmail();  // Llama a la función validateEmail() cuando el usuario escribe en el input
    });
    </script>

    <script src="../js/ajax.js"></script>
</body>

</html>