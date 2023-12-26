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
    <title>Solicitudes .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
    <link rel="stylesheet" href="../recursos/noti/toastr.css">

    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css">
  


</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   
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
            <?php include("../partes/encabezado.php");?>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h2><b>Solicitudes por verificar</b></h2></div>
                    </div>  
                </div>
                <div class="botones_container">
                  
             
                  <div class="rojo">
                      <button type="button" onclick="exportarPDF();" id="btn_pdf_comprobante" class="btn" >Generar comprobante de compra   
                          <i class="fa-solid fa-download" style="vertical-align: middle;"></i>
                      </button>

                  </div>
                  
              </div><br>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table  class="table table-bordered">
                                        <thead>
                                            <th><b>Código de solicitud recibida</b></th>
                                            <th><b>Código de solicitud remitente</b></th>

                                            <th><b>Fecha solicitud</b></th>
                                            <th><b>Tipo insumo solicitado</b></th>
                                            <th><b>Nombre insumo solicitado</b></th>
                                            <th><b>Cantidad</b></th>
                                            <th><b>Proveedor</b></th>
                                            <th><b>Nombre remitente</b></th>
                                            <th><b>Cargo</b></th>

                                            <th><b>Estado</b></th>
                                            <th><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT 
                                                sr.id_soli_reci,
                                                s.id_solicitud,
                                                s.fecha_solicitud,
                                                s.tipo_insumo,
                                                s.nombre_insu,
                                                s.cantidad,
                                                s.proveedor,
                                                u.nombre_completo,
                                                r.cargo,
                                                sr.estado
                                            FROM soli_recibidas sr
                                            JOIN solicitudes s ON sr.id_solicitudes = s.id_solicitud
                                            JOIN usuario u ON s.id_usu = u.id_usu
                                            JOIN rol r ON u.id_rol = r.id_rol");

                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];
                                               

                                                $clase_fila = ($estado == 'Aprobado') ? 'aprobado-row' : '';



                                                if ($estado == 'Recibido') {
                                                    $clase_estado = 'Recibido';
                                                }else if($estado == 'Aprobado'){
                                                    $clase_estado = 'Aprobado';
                                                }else if($estado== 'Entregado'){
                                                    $clase_estado = 'Entregado';
                                                }else{
                                                    $clase_estado = 'Denegado';
                                                }
                                               
                                                        
                                                ?>
                                            <tr class="<?php echo $clase_fila; ?>">
                                                <td><?php echo $arreglo['id_soli_reci'] ?></td>
                                                <td><?php echo $arreglo['id_solicitud'] ?></td>
                                                <td><?php echo $arreglo['fecha_solicitud'] ?></td>
                                                <td><?php echo $arreglo['tipo_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre_insu'] ?></td>
                                                <td><?php echo $arreglo['cantidad'] ?></td>
                                                <td><?php echo $arreglo['proveedor'] ?></td>
                                                <td><?php echo $arreglo['nombre_completo'] ?></td>
                                                <td><?php echo $arreglo['cargo'] ?></td>

                                                <td  class="<?php echo $clase_estado; ?>"><?php echo $estado ?></td>
                                                <td>
                                                    
                                                    <button type="button" onclick="modalVerificarSoli('<?php echo $arreglo['id_soli_reci'] ?>',
                                                    '<?php echo $arreglo['id_solicitud'] ?>',
                                                    '<?php echo $arreglo['fecha_solicitud'] ?>',
                                                    '<?php echo $arreglo['tipo_insumo'] ?>',
                                                    '<?php echo $arreglo['nombre_insu'] ?>',
                                                    '<?php echo $arreglo['cantidad'] ?>',
                                                    '<?php echo $arreglo['proveedor'] ?>',
                                                    '<?php echo $arreglo['nombre_completo'] ?>',
                                                    '<?php echo $arreglo['cargo'] ?>',
                                                    '<?php echo $estado ?>');" 
                                                    id="celeste"><i class="fa-solid fa-pencil"></i></button>
                                                    <button type="button"  class="delete-button" id="rojo"><i class="fa-solid fa-trash-can"></i></button>
                                                

                                                    <!--BTN SE GENERA AUTOMATICAMENTE-->
                                                    <button type="button" onclick="enviarReporte('<?php echo $arreglo['id_solicitud'] ?>','<?php echo $arreglo['id_soli_reci'] ?>');" class="btn_enviar_comprobante">
                                                        <i class="fa-solid fa-paper-plane"></i>
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


                <!--MODAL ENVIAR COMPROBANTE-->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Enviar comprobante al proveedor</h2>
                            <button class="close" onclick="cerrarGeneral();">&times;</button>
                        </div>
                        <div class="modal-body">
                                <form id="formEnviarComprobante" class="form-group" enctype="multipart/form-data">
                                    <label>ID GERENTE</label>
                                    <input type="text" class="form-control readonly-field" readonly name="id_usu_gerente" id="id_usu_gerente" value="<?php echo $_SESSION['DBid_usu'];?>"><br>
                                    <label>ID SOLICITUD</label>
                                    <input type="text" class="form-control readonly-field" readonly name="id_solicitud" id="id_solicitud"><br>
                                    <label>ID SOLICITUD RECI</label>
                                    <input type="text" class="form-control readonly-field" readonly name="id_solicitud_reci" id="id_solicitud_reci"><br>
                                  



                                    <label>Cargue el comprobante de compra</label><br><br>
                                    <input class="form-control" type="file" name="comprobante" id="comprobante">
                                    <br>
                                    <button id="btn_enviar_comprobante" class="btn btn-success" type="button">Enviar</button>
                                    <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral();">Cerrar</button>
                                </form>

                              
                        </div>
                      
                           
                       
                    </div>
                </div>


               


                <!--MODAL-->
                <?php include("../recursos/modals/modales.php");?>

            </div>
            

        </div>
    </div>
    <script>
      

       
          //Editar actualizar
          function modalVerificarSoli(id_soli, id_solicitud_remitente, fecha, tipo_insu, nombre_insu, cantidad, proveedor, nombre_empleado, cargo, estado) {
            var modalVerificarSoli = document.getElementById('modalVerificarSoli');
                                                   

            modalVerificarSoli.style.display = 'block';

            // Llenar el formulario con datos de la soli
            document.getElementById('id_soli_veri').value = id_soli;
            document.getElementById('id_soli_remi').value = id_solicitud_remitente;
            document.getElementById('fecha_soli_reci').value = fecha;
            document.getElementById('ti_insu_reci').value = tipo_insu;
            document.getElementById('nom_insu_reci').value = nombre_insu;
            document.getElementById('canti_insu_reci').value = cantidad;
            document.getElementById('prov_reci').value = proveedor;
            document.getElementById('nom_remi_reci').value = nombre_empleado;
            document.getElementById('carg_remi').value = cargo;
            document.getElementById('estado_soli_remi').value = estado;
           


        }
             $(document).ready(function() {
                $("#formVeriSoli").submit(function(e){
                    e.preventDefault();
                    

                    var id_soli_veri = $.trim($("#id_soli_veri").val());
                    var id_soli_remi = $.trim($("#id_soli_remi").val());
                 

                    var aprobado_soli_reci = $("#aprobado_soli_reci").is(":checked") ? "Aprobado" : "";
                    var denegado_soli_reci = $("#denegado_soli_reci").is(":checked") ? "Denegado" : "";

                    // Verificar cuál tiene valor y almacenar en una variable
                    var estadoSeleccionado = "";
                    if (aprobado_soli_reci !== "") {
                        estadoSeleccionado = aprobado_soli_reci;
                    } else if (denegado_soli_reci !== "") {
                        estadoSeleccionado = denegado_soli_reci;
                    }
                    $.ajax({
                        url: "../actualizar/aprobar_soli_recibi.php",
                        type: "POST",
                        dataType: "json",
                        data: {id_soli_veri: id_soli_veri, 
                            id_soli_remi: id_soli_remi,
                            estadoSeleccionado: estadoSeleccionado},
                        success: function(response) {
                            if (response.status === 'success') {
                               
                               
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Verificación exitosa!',
                                }).then((result) => {
                
                                    if(result.value){
                                        location.reload();
                                        
                                       
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


          


            //------GENERAR PDF--------------------
            function exportarPDF(){
                var btn_pdf_comprobante = document.getElementById("btn_pdf_comprobante");
            
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
                    window.location.href = '../reportes/report_soli_recibi.php';
            }

 

        // Función para abrir el modal
        function enviarReporte(idSoli, idSoliRecibi) {
            // Mostrar el modal
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';

            // Configurar los valores para los campos
            document.getElementById('id_solicitud').value = idSoli;
            document.getElementById('id_solicitud_reci').value = idSoliRecibi;

            document.getElementById('id_usu_gerente').value = "<?php echo $_SESSION['DBid_usu'];?>";

            // Enviar el formulario cuando se haga clic en el botón
            $('#btn_enviar_comprobante').click(function(event) {
                event.preventDefault(); // Evitar comportamiento por defecto del botón

                var formData = new FormData($('#formEnviarComprobante')[0]);

                $.ajax({
                    url: '../validacion_datos/validar_regis_comprobante.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Comprobante enviado con éxito!',
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    location.reload();

                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Error al guardar el archivo y datos. Detalles: ' + response.error,
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Status: " + textStatus);
                        console.log("Error: " + errorThrown);
                        console.log("Response Text: " + jqXHR.responseText);  // Esto mostrará el mensaje de error del servidor.
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en la solicitud AJAX.',
                        });
                    }
                });
            });
        }

          
        function cerrarGeneral() {
            var myModal = document.getElementById("myModal");
            var modalVerificarSoli = document.getElementById("modalVerificarSoli");
            
            if (myModal && myModal.style.display !== 'none') {
                myModal.style.display = 'none';
            } 
            if (modalVerificarSoli && modalVerificarSoli.style.display !== 'none') {
                modalVerificarSoli.style.display = 'none';
            }
        }





       


           
    </script>

 
    
</body>
</html>