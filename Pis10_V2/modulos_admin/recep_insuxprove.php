<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepción insumos .:|:. Mango</title>
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
                        <div class="card-title">
                            <h2><b>Registro de nuevos insumos</b></h2>
                        </div>
                    </div>
                </div>

                <div class="botones_container">
                    <div class="celeste">
                        <button type="button" id="openModalBtn" class="btn">Registrar nuevo insumo
                            <i class="fa-solid fa-circle-plus" style="vertical-align: middle;"></i>
                        </button>

                    </div>


               

                </div><br>



                <!--INSUMOS REGISTRADOS-->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  table-striped table-bordered" cellspacing="0">
                                        <thead>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Fecha de registro</th>
                                            <th>Cantidad total por fecha</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT * FROM insumos WHERE estado = 'Disponible' ORDER BY nombre");
                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];

                                                if ($estado == 'Disponible') {
                                                    $clase_estado = 'operando';
                                                } 
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre'] ?></td>
                                                <td><?php echo $arreglo['tipo'] ?></td>
                                                <td><?php echo $arreglo['fecha_regis'] ?></td>
                                                <td><?php echo $arreglo['cantidad'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                       


                                    </table>



                                </div>

                            </div>


                        </div>
                    </div>
                </div>


                <!--STOCK DISPONIBLE-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Stock disponible</b></h2>
                        </div>
                    </div>
                </div>



                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" cellspacing="0">
                                        <thead>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Cantiadad Restada por aplicación</th>

                                        
                                            <th>Cantidad Actual</th>
                                          

                                            <th>Estado</th>
                                         



                                        </thead>
                                        <tbody>
                                            <?php
                                                include("../bd/conexion.php");
                                                $senten = $conn->query("SELECT * FROM total_insumos");
                                                while ($arreglo = $senten->fetch_array()) {
                                                    $estado = $arreglo['estado'];

                                                    // Cambiar el estado a "Agotado" si cantidad_total_usada es 0
                                                    if ($arreglo['cantidad_total_usada'] == 0) {
                                                        $estado = 'Agotado';
                                                    }

                                                    if ($estado == 'Disponible') {
                                                        $clase_estado = 'Disponible';
                                                    } else if($estado == 'Agotado') {
                                                        $clase_estado = 'Agotado';  // Puedes definir una clase CSS específica para "Agotado" si lo deseas
                                                    }
                                            ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_total_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre'] ?></td>
                                                <td><?php echo $arreglo['tipo'] ?></td>
                                                <td>
                                                    <p id="crojo">
                                                        <?php echo $arreglo['cantidad_restada'] ?>


                                                    </p>
                                                </td>
                                            
                                                <td>
                                                    <h3 id="stock">
                                                        <?php echo $arreglo['cantidad_total_usada'] ?>
                                                    </h3>
                                                </td>
                                                <td class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2><b>Factuas de insumos recibidas</b></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="table table-bordered"  cellspacing="0">
                                        <thead>
                                            <th>Código de factura</th>
                                            <th>Factura</th>
                                            <th>Acciones</th>


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT * FROM pdf_files");

                                            while ($arreglo = $senten->fetch_array()) {
                                              
                                               
                                                ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_pdf'] ?></td>
                                                <td><?php echo $arreglo['file_name'] ?></td>


                                                <td>


                                                    <button type="button" class="btn btn-info"
                                                        onclick="descargarPDF('<?php echo $arreglo['file_name']; ?>')">
                                                        <i class="fas fa-download"></i>
                                                    </button>

                                                  

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
    var modal = document.getElementById('modalRegisInsumosComprados');
    var openModalBtn = document.getElementById('openModalBtn');

    // Evento para abrir el modal
    openModalBtn.onclick = function() {
        modal.style.display = 'block';
    }


    


    function descargarPDF(fileName) {
            // Mostrar el toast antes de iniciar la descarga.
            toastr.info("<span style='color:white; font-weight:bold;'>Descargando</span>", {
            "toastClass": "blue-toast",
            "timeOut": 3000,
            "positionClass": "toast-bottom-right",
            "progressBar": true,
            "extendedTimeOut": 1000,
            "showDuration": 300,
            "hideDuration": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });



          


            // Crear un enlace temporal y simular un clic en él.
            var link = document.createElement('a');
            link.href = '../reportes/' + fileName;
            link.download = fileName;  // Esto hará que se descargue el archivo con el nombre original.
            document.body.appendChild(link);  // Agregar el enlace al cuerpo del documento.
            link.click();  // Simular el clic en el enlace.

            // Eliminar el enlace del cuerpo del documento después de iniciar la descarga.
            document.body.removeChild(link);
        }



    //----------------------------------------------------------------
    //Registrar parcela

    $("#formRegisInsuCompra").submit(function(e) {
        e.preventDefault();

        // Obtener los valores del formulario
        var nombre_insu = $.trim($("#nombre_insu").val());
        var tip_insu = $.trim($("#tip_insu").val());
        var canti_insu = $.trim($("#canti_insu").val());
        var f_regis = $.trim($("#f_regis").val());




        // Enviar los datos mediante AJAX
        $.ajax({
            url: "../validacion_datos/validar_regis_nue_insu.php", // Reemplaza esto con la ruta de tu script de servidor que procesa el registro
            type: "POST",
            dataType: "json",
            data: {
                nombre_insu: nombre_insu,
                tip_insu: tip_insu,
                canti_insu: canti_insu,
                f_regis: f_regis
            },
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso!',
                    }).then((result) => {
                        if (result.value) {
                            // Puedes redirigir a otra página o hacer algo más después del registro exitoso
                            window.location.href = "../modulos_admin/recep_insuxprove.php";
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






    //--------------------------------------------------------------------------
    function exportarPDF() {
        var btn_pdf = document.getElementById("btnPDF");

        toastr.success("Descargando...", "", {
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 3000,
            extendedTimeOut: 1000,
            showDuration: 300,
            hideDuration: 1000,
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
        window.location.href = '../reportes/reporte_histo_nue_insu.php';




    }


    /*ACTUALIZAR REGISTROS*/

    function actualizarRegistro(id_insu, cantidad, nombre) {
        var modalActuRecepInsu = document.getElementById('modalActuRecepInsu');
        modalActuRecepInsu.style.display = 'block';
        document.getElementById('id_insu_recep').value = id_insu;

        document.getElementById('nombre_insu_recep').value = nombre;
        document.getElementById('canti_actual').value = cantidad;

        $(document).ready(function() {
                $("#modalActuRecepInsu").submit(function(e){
                    e.preventDefault();
                    var id_insu_recep = $.trim($("#id_insu_recep").val());

                  
                    var canti_suma = $.trim($("#canti_suma").val()); 

                    console.log(id_insu_recep);
                    console.log(canti_suma);

                   
                

                   $.ajax({
                        url: "../actualizar/actualizar_inventario.php",
                        type: "POST",
                        dataType: "json",
                        data: {id_insu_recep: id_insu_recep,
                            canti_suma: canti_suma},
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
    }



    function cerrarModal() {
        var modal = document.getElementById('modalRegisInsumosComprados');
        var modalActuRecepInsu = document.getElementById('modalActuRecepInsu');
        
        if (modal) {
            modal.style.display = 'none';
        } 
        if (modalActuRecepInsu) {
            modalActuRecepInsu.style.display = 'none';
        }
    }


            //VALIDAR LETRAS
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

        //VALIDAR LETRAS Y NUMEROS
        function soloLetrasYNumeros(e) {
            var key = e.keyCode || e.which,
                tecla = String.fromCharCode(key).toLowerCase(),
                caracteresPermitidos = "0123456789 áéíóúabcdefghijklmnñopqrstuvwxyz",
                especiales = [8, 37, 39, 46],
                tecla_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (caracteresPermitidos.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
            }
        }

        //VALIDAR NUMEOS
        function validarNumeros(evt) {
        let key = evt.key || String.fromCharCode(evt.which || evt.keyCode);
        let input = evt.target.value;

        // Permitir números, tecla de retroceso, tecla de entrada, y punto decimal
        if (/[\d\b\r.]/.test(key)) {
            // Si ya hay un punto decimal, y después de él hay dos dígitos, no permitir más
            if (input.includes('.') && input.split('.')[1] && input.split('.')[1].length >= 2) {
                evt.preventDefault();
                return false;
            }
            return true;
        } else {
            evt.preventDefault();
            return false;
        }
    }


    </script>










</body>

</html>