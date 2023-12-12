<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores .:|:. Mango</title>
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
                        <div class="card-title"><h2><b>Proveedores</b></h2></div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <button type="button" id="btn_prove" class="btn btn-info" > + Registrar nuevo proveedor</button>

                </div><br>


                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="miTablaprovee" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <th>CÓDIGO</th>
                                            <th>NOMBRE</th>
                                            <th>CONTACTO</th>
                                            <th>DIRECCIÓN</th>
                                            <th>N° de teléfono</th>
                                            <th>Fecha de registro</th>
                                            <th>Estado</th>
                                            <th>ACCIONES</th>


                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>Ecua S.A</td>
                                                <td>Ing. Steven Rojas</td>
                                                <td>Guasmo sur</td>
                                                <td>094345957</td>
                                                <td>12-02-2023</td>
                                                <td>Activo</td>
                                                <td>
                                                   
                                                    <button class="btn btn-danger" id="btnPDF" onclick="exportarPDF2();" data-toggle="tooltip" data-placement="top" title="Exportar reporte">
                                                        <i class="ti ti-file-description"></i>
                                                    </button>
                                                    <button class="btn btn-warning" id="btn_borrar" onclick="borrar();" data-toggle="tooltip" data-placement="top" title="Eliminar proveedor">
                                                        <i class="ti ti-trash"></i>
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
        var modal = document.getElementById('modalProveedor');
        var openModalBtn = document.getElementById('btn_prove');

        // Evento para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }

       

      
        function cerrarModal() {
            var modal = document.getElementById('modalProveedor');
            modal.style.display = 'none';
           
           
            
        }

//----------------------------------------------------------------
        function cerrarGeneral() {
            var modal_prove = document.getElementById("modalProveedor");
         

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
                    if (modal_prove) {
                        modal_prove.style.display = 'none';
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


       

      



      
        

        // Evento para cerrar el modal cuando se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }


        function exportarTablaPDF() {
            var rows = [];
            var headers = [];

            // Obtener encabezados de la tabla excluyendo la columna ACCIONES
            document.querySelectorAll('#miTablaprovee thead th:not(:last-child)').forEach(function(header) {
                headers.push({ text: header.innerText, style: 'tableHeader' });
            });

            // Obtener datos de la tabla excluyendo la columna ACCIONES
            document.querySelectorAll('#miTablaprovee tbody tr').forEach(function(row) {
                var rowData = [];
                row.querySelectorAll('td:not(:last-child)').forEach(function(cell) {
                    rowData.push(cell.innerText);
                });
                rows.push(rowData);
            });

            var docDefinition = {
                content: [
                    { text: 'Reporte PDF', style: 'header' },
                    {
                        table: {
                            headerRows: 1,
                            body: [headers].concat(rows),
                            widths: ['auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'] // Ancho de las columnas
                        },
                        style: 'tableStyle'
                    }
                ],
                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        margin: [0, 0, 0, 10]
                    },
                    tableHeader: {
                        bold: true,
                        fontSize: 12,
                        color: 'black'
                    },
                    tableStyle: {
                        margin: [0, 5, 0, 15], // Margen de la tabla
                        fontSize: 10,
                        color: 'black'
                    }
                }
            };

            pdfMake.createPdf(docDefinition).download('Reporte.pdf');
        }

        function exportarPDF2() {
            Swal.fire({
                title: '¿Desea descargar el PDF?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Sí, descargar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
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
                        hideMethod: "fadeOut",
                       
                    });
                    exportarTablaPDF();
                }
            });
        }

 
    </script>
 


   
   

</body>
</html>