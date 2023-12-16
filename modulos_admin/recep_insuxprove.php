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
                        <div class="card-title"><h2><b>Historial de nuevos insumos</b></h2></div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <button type="button" id="openModalBtn" class="btn btn-info" > + Registrar nuevo insumo</button>

                </div><br>


                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="miTabla" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th>CÓDIGO</th>
                                            <th>CATEGORÍA</th>
                                            <th>NOMBRE</th>
                                            <th>PROVEEDOR</th>
                                            <th>Fecha de registro</th>
                                            <th>ACCIONES</th>


                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Insecticida</td>
                                                <td>Sulfato de amonio</td>
                                                <td>Ecua S.A.</td>
                                                <td>12-02-2023</td>
                                                <td>
                                                    
                                                   
                                                    <button id="rojo" onclick="exportarPDF();" id="btnPDF" type="button" data-toggle="tooltip" data-placement="top" title="Exportar reporte">
                                                        <i class="ti ti-file-description"></i>
                                                    </button>
                                                  
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
        var modal = document.getElementById('myModal');
        var openModalBtn = document.getElementById('openModalBtn');

        // Evento para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }

       

        function validarYCerrarModal() {
            var selectedValue = document.getElementById('cate').value;
            if (selectedValue === "") {
                // Si no se ha seleccionado ninguna opción, mostrar una notificación
                mostrarError("Por favor, selecciona una categoría antes de continuar.");
            } 
           
            else {
                // Si se ha seleccionado una opción, realizar la limpieza y cerrar el modal
              
               
                cerrarModal();
                if(selectedValue =="Insecticidas"){
                    mostrarSegundoModal();
                }else if(selectedValue=="Mangos"){
                    mostrartercerModal();
                
                }else if(selectedValue =="Herramientas"){
                    mostrarquintooModal();
                }else if(selectedValue =="Maquinarias"){
                    mostrarsextoModal();
                }
            }
        }

        function cerrarModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
            limpiarSeleccion();
            ocultarError();
            
        }

//----------------------------------------------------------------
        function cerrarGeneral() {
            var modal_insec = document.getElementById("segundoModal");
            var modal_mango = document.getElementById("tercerModal");
            var modal_maqui = document.getElementById("quintoModal");
            var modal_herra = document.getElementById("sextoModal");

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
                    if (modal_insec) {
                        modal_insec.style.display = 'none';
                    }
                    if (modal_mango) {
                        modal_mango.style.display = 'none';
                    }
                    
                    if (modal_maqui) {
                        modal_maqui.style.display = 'none';
                    }
                    if (modal_herra) {
                        modal_herra.style.display = 'none';
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


       

      

        

//----------------------------------------------------------------
        function limpiarSeleccion() {
            // Limpiar o restablecer los valores de los elementos seleccionados
            document.getElementById('cate').value = "";
        }
        
        function mostrarError(mensaje) {
            var mensajeError = document.getElementById('mensajeError');
            mensajeError.textContent = mensaje;
            mensajeError.style.display = 'block';
        }
        function ocultarError() {
            var mensajeError = document.getElementById('mensajeError');
            mensajeError.textContent = "";
            mensajeError.style.display = 'none';
        }


 //MODALES---------------------------------------------------------------------------------------------
        function mostrarSegundoModal() {
            var segundoModal = document.getElementById('segundoModal');
            segundoModal.style.display = 'block';
        }
        function mostrartercerModal() {
            var segundoModal = document.getElementById('tercerModal');
            segundoModal.style.display = 'block';
        }
      
        function mostrarquintooModal() {
            var segundoModal = document.getElementById('quintoModal');
            segundoModal.style.display = 'block';
        }
        function mostrarsextoModal() {
            var segundoModal = document.getElementById('sextoModal');
            segundoModal.style.display = 'block';
        }

       
    

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