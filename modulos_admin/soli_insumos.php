<?php include("../autorizacion/admin.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Solicitud .:|:. Mango</title>
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
                        <div class="card-title"><h2><b>Solicitudes recibidas</b></h2></div>
                    </div>  
                </div>


                <div class="botones_container">
                  
             
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

                                    <table id="tabla_solici_regis_estado" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th><b>Código</b></th>
                                            <th><b>Fecha solicitud</b></th>
                                            <th><b>Tipo insumo solicitado</b></th>
                                            <th><b>Nombre insumo solicitado</b></th>
                                            <th><b>Cantidad</b></th>
                                            <th><b>Estado</b></th>
                                            <th style="width: 20%;"><b>Acciones</b></th>


                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../bd/conexion.php");
                                            $senten = $conn->query("SELECT * FROM solicitudes WHERE estado = 'Enviado' or estado = 'Denegado' or estado = 'Verificado' ORDER BY id_solicitud");
                                            while ($arreglo = $senten->fetch_array()) {
                                                $estado = $arreglo['estado'];

                                                if ($estado == 'Enviado') {
                                                    $clase_estado = 'Enviado';
                                                } if($estado == 'Verificado'){
                                                    $clase_estado = 'Verificado';
                                                }
                                                else {
                                                    $clase_estado = 'Denegado';
                                                }
                                                        
                                                ?>
                                            <tr>
                                                <td><?php echo $arreglo['id_solicitud'] ?></td>
                                                <td><?php echo $arreglo['fecha_solicitud'] ?></td>
                                                <td><?php echo $arreglo['tipo_insumo'] ?></td>
                                                <td><?php echo $arreglo['nombre_insu'] ?></td>
                                                <td><?php echo $arreglo['cantidad'] ?></td>
                                                <td><?php echo $arreglo['estado'] ?></td>
                                                <td>
                                                    <button type="button" onclick="modalActuSoliTraba('<?php echo $arreglo['id_solicitud'] ?>',
                                                    '<?php echo $arreglo['fecha_solicitud'] ?>',
                                                    '<?php echo $arreglo['tipo_insumo'] ?>',
                                                    '<?php echo $arreglo['nombre_insu'] ?>',
                                                    '<?php echo $arreglo['cantidad'] ?>');" id="celeste"><i class="fa-solid fa-pencil"></i></button>                                                    
                                                    
                                                    <button type="button"  class="delete-button" id="rojo"><i class="fa-solid fa-trash-can"></i></button>
                                                    
                                                    <button type="button" class="btn_enviar" id="nuevoBoton_<?php echo $arreglo['id_solicitud'] ?>">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                    </button>

                                                   
                                                </td>
                                            
                                            </tr>

                                        </tbody>
                                        <?php } ?>
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
   

        

        function cerrarGeneral() {
            var modalEditEnviSoli = document.getElementById("modalEditEnviSoli");
            if (modalEditEnviSoli) {
                modalEditEnviSoli.style.display = 'none';
            }  
        }


        //VERIFICAR PARA ENVIAR -------------------------------------
          //Editar actualizar
          function modalActuSoliTraba(id_soli, fecha, tipo_insu, nombre_insu, cantidad) {
            var modalEditEnviSoli = document.getElementById('modalEditEnviSoli');

            modalEditEnviSoli.style.display = 'block';

            // Llenar el formulario con datos del usuario
            document.getElementById('id_soli_reci').value = id_soli;
            document.getElementById('fecha_soli').value = fecha;
            document.getElementById('t_insu_soli').value = tipo_insu;
            document.getElementById('insu_soli').value = nombre_insu;
            document.getElementById('canti_soli').value = cantidad;
        }
             $(document).ready(function() {
               
               
                
                
                $("#formEditSoli").submit(function(e){
                    e.preventDefault();
                    var id_soli_reci = $.trim($("#id_soli_reci").val());
                    var fecha_soli = $.trim($("#fecha_soli").val());
                    var t_insu_soli = $.trim($("#t_insu_soli").val()); 
                    var insu_soli = $.trim($("#insu_soli").val());
                    var canti_soli = $.trim($("#canti_soli").val()); 
                    var proveedor = $.trim($("#select_prove_soli").val());

                   
                

                    $.ajax({
                        url: "../actualizar/actualizar_datos_soli_enviar.php",
                        type: "POST",
                        dataType: "json",
                        data: {id_soli_reci: id_soli_reci, 
                            fecha_soli: fecha_soli, 
                            t_insu_soli: t_insu_soli,
                            insu_soli: insu_soli,
                            canti_soli: canti_soli,
                            proveedor: proveedor},
                        success: function(response) {
                            if (response.status === 'success') {
                                $("#verde").show();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Actualización exitosa!',
                                }).then((result) => {
                                    if(result.value){
                                        location.reload();
                                       
                                        // Mostrar el nuevo botón después de una actualización exitosa
                                        localStorage.setItem("nuevoBotonVisible_" + id_soli_reci, true);
                                      
                                     
                                      
                                      
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
            $(window).on('load', function() {
                // Iterar sobre todas las claves del almacenamiento local
                for (var i = 0; i < localStorage.length; i++) {
                    var key = localStorage.key(i);

                    // Verificar si la clave pertenece a un botón y si es visible
                    if (key.startsWith("nuevoBotonVisible_") && localStorage.getItem(key) === "true") {
                        var id_soli_reci = key.replace("nuevoBotonVisible_", "");
                        $("#nuevoBoton_" + id_soli_reci).show();
                    }
                }
            });




       
     
 
    </script>
   

 


   
   

</body>
</html>















