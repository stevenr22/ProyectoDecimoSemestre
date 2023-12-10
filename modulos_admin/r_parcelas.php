<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Parcelas .:|:. Mango</title>
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
                    <a href="#" class="text-nowrap logo-img">
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
                        <div class="card-title"><h2><b>Registro de parcelas</b></h2></div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <button type="button" id="btn_modal_parce" class="btn btn-info" > + Registrar nueva parcela</button>

                </div><br>


                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="miParcela" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th>CÓDIGO</th>
                                            <th>NOMBRE</th>
                                            <th>ANCHO</th>
                                            <th>ALTO</th>
                                            <th>Fecha de registro</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>


                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Parcela A</td>
                                                <td>34</td>
                                                <td>43</td>
                                                <td>12-02-2023</td>
                                                <td>Operando</td>
                                                <td>
                                                   
                                                    <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar solicitud" id="editarparce"><i class="ti ti-pencil"></i></button>
                                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar solicitud" id="eliminarparce"><i class="ti ti-trash-x"></i></button>
                                                  
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
        var modal_parce = document.getElementById('modalParcela');
        var openModalBtnParce = document.getElementById('btn_modal_parce');

        // Evento para abrir el modal
        openModalBtnParce.onclick = function() {
            modal_parce.style.display = 'block';
        }

       

   


//----------------------------------------------------------------
        function cerrarGeneral() {
            var modal_parce = document.getElementById("modalParcela");
           

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
                    if (modal_parce) {
                        modal_parce.style.display = 'none';
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
