<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../modulos_proveedores/style.css">

    <link rel="stylesheet" href="../modulos_proveedores/bootstrap.css">
    <link rel="stylesheet" href="../modulos_proveedores/datatables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

   

    <title>Solicitudes .:|</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PROVEEDOR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            

            
            <li class="nav-item">
                <a class="nav-link" href="../modulos_proveedores/solicitudes_empre.php">Solicitudes de empresas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../inicio/dashboard.php">EMPRESA</a>
            </li>
        
            
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        </div>
    </div>
    </nav>
    <br>
    <br>


    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h2>SOLICITUDES DE INSUMOS</h2>
                </div>
            </div>
        </div>
        <br>
        
        <div class="col-md-12">
            <button id="btn_factura_gen" class="btn btn-success"> GENERAR FACTURA </button>
        </div>

       
        <br>

        <div class="table-responsive">
            <table id="tablaSolicitudes" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID del Usuario Gerente</th>
                        <th>DETALLE DE PEDIDO</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../bd/conexion.php");
                      $sql = "SELECT c.id_comprobante, u.nombre_completo, c.contenido_pdf
                      FROM comprobante AS c, usuario AS u, rol AS r
                      WHERE c.id_usu_gerente = u.id_usu and u.id_rol = r.id_rol";
                      $result = $conn->query($sql);
                    while ($arreglo = $result->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $arreglo['id_comprobante']; ?></td>
                        <td><?php echo $arreglo['nombre_completo']; ?></td>
                        <td>
                            <a href='../reportes/<?php echo $arreglo["contenido_pdf"]; ?>' download class='btn btn-primary'>Descargar</a>

                        </td>
                        
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <!--MODAL FACTURA-->
        <div class="modal" tabindex="-1" id="miModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" style="color: white; font-weight: bold;">REGISTRAR DETALLE DE FACTURA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formRegisFactu" class="form-group">
                            <label>Fecha de factura: </label>
                            <input type="date" name="fech_emision" id="fech_emision" class="form-control"><br>
                            <label>Total: </label>
                            <input type="number" placeholder="Ingrese total" name="total_fac" step="0.01" id="total_fac" class="form-control">
                            <br>
                            <button type="submit" style="color: white; font-weight: bold;" class="btn btn-primary">Registrar factura</button>
                            <button type="button" style="color: white; font-weight: bold;" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </form>



                        
                    </div>
                    
                        
                    
                </div>
            </div>
        </div>


       
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="../modulos_proveedores/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tablaSolicitudes').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });
        });

        //-----MODAL REGISTRAR FACTURA
           
        $(document).ready(function() {
            // Agregar un evento clic al botón
            $("#btn_factura_gen").click(function() {
                // Mostrar el modal
                $('#miModal').modal('show');
            });
        });


        //--VALIRDAR INPUT
    


  

    </script>


    
</body>
</html>