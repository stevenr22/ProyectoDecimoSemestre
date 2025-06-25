<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../modulos_proveedores/style.css">

    <link rel="stylesheet" href="../modulos_proveedores/bootstrap.css">
    <link rel="stylesheet" href="../modulos_proveedores/datatables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../recursos/alertas/sweetalert2.css">
    <title>Solicitudes .:|</title>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PROVEEDOR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">



                    <li class="nav-item">
                        <a class="nav-link" href="../modulos_proveedores/solicitudes_empre.php">Solicitudes de
                            empresas</a>
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








        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código solicitud</th>
                        <th>Empresa solicitante</th>
                        <th>Tipo de insumo</th>
                        <th>Nombre insumo</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../bd/conexion.php");
                      $sql = "SELECT id_detalle, id_solicitud, tipo_insu, nombre_insu, cantidad_insu, estado
                      FROM detalle_solicitud WHERE estado='Recibido'";
                      $result = $conn->query($sql);
                    while ($arreglo = $result->fetch_array()) {
                        $estado = $arreglo['estado'];

                        if ($estado == 'Recibido') {
                            $clase_estado = 'Recibido';
                        } else{
                            $clase_estado = 'Facturado';
                        } 

                    ?>
                    <tr>
                        <td><?php echo $arreglo['id_solicitud']; ?></td>
                        <td>Gestión mango S.A.</td>
                        <td><?php echo $arreglo['tipo_insu']; ?></td>

                        <td><?php echo $arreglo['nombre_insu']; ?></td>

                        <td><?php echo $arreglo['cantidad_insu']; ?></td>

                        <td class="<?php echo $clase_estado; ?> text-center"><?php echo $estado; ?></td>
                        <th class="text-center">
                            <button type="button" class="btn btn-success"
                                onclick="generarFactura('<?php echo $arreglo['id_solicitud']; ?>','<?php echo $arreglo['nombre_insu']; ?>','<?php echo $arreglo['cantidad_insu']; ?>');"><i
                                    class="fas fa-file-archive"></i></button>


                        </th>

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h2>SOLICITUDES FACTURADAS</h2>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código solicitud</th>
                            <th>Empresa solicitante</th>
                            <th>Tipo de insumo</th>
                            <th>Nombre insumo</th>
                            <th>Cantidad</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    include("../bd/conexion.php");
                      $sql = "SELECT id_detalle, id_solicitud, tipo_insu, nombre_insu, cantidad_insu, estado
                      FROM detalle_solicitud WHERE estado='Facturado'";
                      $result = $conn->query($sql);
                    while ($arreglo = $result->fetch_array()) {
                        $estado = $arreglo['estado'];

                        if ($estado == 'Recibido') {
                            $clase_estado = 'Recibido';
                        } else{
                            $clase_estado = 'Facturado';
                        } 

                    ?>
                        <tr>
                            <td><?php echo $arreglo['id_solicitud']; ?></td>
                            <td>Gestión mango S.A.</td>
                            <td><?php echo $arreglo['tipo_insu']; ?></td>

                            <td><?php echo $arreglo['nombre_insu']; ?></td>

                            <td><?php echo $arreglo['cantidad_insu']; ?></td>

                            <td class="<?php echo $clase_estado; ?> text-center"><?php echo $estado; ?></td>



                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <!--MODAL FACTURA-->
        <div class="modal fade" tabindex="-1" id="miModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" style="color: white; font-weight: bold;">REGISTRAR DETALLE DE FACTURA
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formRegisFactu" class="form-group">

                            <input type="text" class="form-control readonly-field" readonly name="id_soli" id="id_soli">



                            <label>Fecha de factura: </label>
                            <input type="date" name="fech_emision" id="fech_emision" class="form-control"><br>

                            <div class="text-center">
                                <h4><b>Datos generales:</b></h4>
                                <hr>
                            </div>
                            <div class="row">


                                <div class="col">
                                    <label>Cliente: </label>
                                    <input type="text" id="fact_cli" class="form-control readonly-field" readonly
                                        value="Gestion Mango S.A."><br>

                                </div>
                            </div>




                            <div class="text-center">
                                <h4><b>Detalle de factura:</b></h4>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label>Insumos solicitado: </label>

                                    <input type="text" id="nombre_insu" class="form-control readonly-field" readonly><br>

                                </div>

                                <div class="col-md-2">
                                    <label>Cantidad: </label>

                                    <input type="number" class="form-control readonly-field" readonly id="cantidad_insu"><br>

                                </div>

                                <div class="col">
                                    <label>Valor: </label>
                                    <div class="input-group">
                                        <input type="text"  class="form-control" name="valor_insu" onkeypress="validarNumeros(event);"
                                            id="valor_insu"
                                            aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text bg-success dollar-icon"
                                            style="color: white;"><b>$</b></span>

                                    </div>
                                    <hr>

                                    <label>Total: </label>
                                    <div class="input-group">
                                        <input type="number" class="form-control readonly-field" name="total_fac"
                                            id="total_fac" readonly
                                            aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text bg-success dollar-icon"
                                            style="color: white;"><b>$</b></span>

                                    </div>
                                </div>

                            </div>
                            <br>
                            <button type="submit" style="color: white; font-weight: bold;"
                                class="btn btn-primary">Enviar factura</button>

                            <button type="button" style="color: white; font-weight: bold;" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cerrar</button>
                        </form>




                    </div>



                </div>
            </div>
        </div>




    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../modulos_proveedores/datatables.min.js"></script>

    <script src="../recursos/alertas/sweetalert2.js"></script>



    <script>
    $(document).ready(function() {
        $('.table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
            }
        });
    });












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



    document.addEventListener('DOMContentLoaded', function() {
        // Función para calcular el total
        function calcularTotal() {
            const cantidad = parseFloat(document.getElementById('cantidad_insu').value) || 0;
            const valor = parseFloat(document.getElementById('valor_insu').value) || 0;
            const total = cantidad * valor;

            document.getElementById('total_fac').value = total.toFixed(2); // Actualiza el campo de total
        }

        // Agregamos el evento 'input' a los campos de cantidad y valor
        document.getElementById('cantidad_insu').addEventListener('input', calcularTotal);
        document.getElementById('valor_insu').addEventListener('input', calcularTotal);
    });





   








    function generarFactura(id_solicitud, nombre_insu, cantidad_insu) {
        $('#miModal').modal('show');

        // Llenar el formulario con datos del usuario
        document.getElementById('id_soli').value = id_solicitud;
        document.getElementById('nombre_insu').value = nombre_insu;
        document.getElementById('cantidad_insu').value = cantidad_insu;

    }




    $(document).ready(function() {




        // Escucha el evento submit del formulario
        $("#formRegisFactu").submit(function(e) {
            e.preventDefault();
            var fech_emision = $.trim($("#fech_emision").val());
            var total_fac = $.trim($("#total_fac").val());
            var valor_insu = $.trim($("#valor_insu").val());
            var id_solicitud = $.trim($("#id_soli").val());
          



            
            $.ajax({
                url: "../modulos_proveedores/regis_factura.php",
                type: "POST",
                dataType: "json",
                data: {
                    fech_emision: fech_emision,
                    total_fac: total_fac,
                    valor_insu: valor_insu,
                    id_solicitud: id_solicitud

                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'La solicitud se facturo exitosamente!',
                        }).then((result) => {
                            if (result.value) {
                                location.reload(); // Recargar la página

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
    </script>



</body>

</html>