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
                        <div class="card-title"><h2><b>Recepción nuevos insumos - Stock disponible</b></h2></div>
                    </div>  
                </div>

                <div class="botones_container">
                    <div class="celeste">
                        <button type="button" id="openModalBtn" class="btn">Registrar nuevo insumo
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
                                    <table id="miTabla" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            
                                            <th>Fecha de registro</th>
                                            <th>cantidad</th>
                                            <th>Estado</th>
                                           


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
                                                <td><?php echo $arreglo['estado'] ?></td>


                                                
                                              
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
        // Obtener elementos del DOM
        var modal = document.getElementById('modalRegisInsumosComprados');
        var openModalBtn = document.getElementById('openModalBtn');

        // Evento para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }


        function cerrarModal() {
            var modal = document.getElementById('modalRegisInsumosComprados');
            modal.style.display = 'none';
           
            
        }


        //----------------------------------------------------------------
        //Registrar parcela

        $("#formRegisInsuCompra").submit(function(e){
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
                data: {nombre_insu: nombre_insu, 
                    tip_insu: tip_insu, 
                    canti_insu: canti_insu, 
                    f_regis: f_regis},
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registro exitoso!',
                        }).then((result) => {
                            if(result.value){
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
        function exportarPDF(){
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

 
    </script>
    

    

 


   
   

</body>
</html>