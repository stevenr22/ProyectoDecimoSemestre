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
        <button type="button" class="btn btn-success" onclick="generarFactura();">Generar factura</button>








        <div class="table-responsive">
            <table id="tablaSolicitudes" class="table table-bordered">
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
            <table id="tablaSolicitudes" class="table table-bordered">
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
                                    <?php
                                    include("../bd/conexion.php");
                                    $sql = "SELECT nombre_insu, cantidad_insu FROM detalle_solicitud WHERE estado = 'Recibido'";
                                    $result = $conn->query($sql);
                                    while ($arreglo = $result->fetch_array()) {
                                    ?>
                                    <input type="text" class="form-control readonly-field" readonly
                                        value="<?php echo $arreglo['nombre_insu']; ?>"><br>
                                    <?php } ?>
                                </div>

                                <div class="col-md-2">
                                    <label>Cantidad: </label>
                                    <?php
                                        mysqli_data_seek($result, 0);
                                        $contador = 1;  // Inicializa el contador para IDs únicos
                                        while ($arreglo = $result->fetch_array()) {
                                        ?>
                                    <input type="text" id="cantidad_insumo_<?php echo $contador; ?>"
                                        class="form-control readonly-field" readonly
                                        value="<?php echo $arreglo['cantidad_insu']; ?>"><br>
                                    <?php 
                                            $contador++;  // Incrementa el contador
                                        } 
                                        ?>
                                </div>

                                <div class="col">
                                    <label>Valor: </label>
                                    <div id="camposValor"></div>
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
                            <button type="submit" id="btn_fac_pdf" style="color: white; font-weight: bold;"
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
        $('#tablaSolicitudes').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
            }
        });
    });






    //-----------------FUNCION PARA AGG INPUT Y CALCULAR EL VALOR--------------------------------------------
    $(document).ready(function() {
        // Suponiendo que la consulta devuelve un número X de resultados,
        // puedes replicar esos inputs dinámicamente.
        const numeroDeResultados = <?php echo $result->num_rows; ?>;


        for (let i = 0; i < numeroDeResultados; i++) {
            // Crear el contenedor principal del diseño input-group
            const inputGroup = $('<div>', {
                class: 'input-group'
            });

            // Crear el input con la clase form-control y el atributo aria-label
            const inputValor = $('<input>', {
                type: 'text',
                class: 'form-control',
                'aria-label': 'Dollar amount (with dot and two decimal places)',
                id: 'valor_insumo_' + i,
                placeholder: 'Ingrese el valor en dólares'


            });
            // Agregar el input al contenedor input-group
            inputGroup.append(inputValor);

            // Agregar el símbolo de dólar con estilo
            const dollarSymbol = $('<span>', {
                class: 'input-group-text bg-success dollar-icon',
                style: 'color: white; font-weight: bold;'
            }).text('$');

            inputGroup.append(dollarSymbol);




            // Agregar el contenedor con el diseño al div principal
            const divContenedor = $('<div>').append(inputGroup, '<br>');

            $('#camposValor').append(divContenedor);







            $('#camposValor').append(divContenedor);

            // Escucha el evento de cambio en cada input
            inputValor.on('input', function() {
                // Validar la entrada para permitir solo números y un máximo de dos decimales
                let valorActual = $(this).val();

                // Eliminar caracteres no numéricos y dejar solo dos decimales después del punto
                valorActual = valorActual.replace(/[^0-9.]/g, '');
                const parts = valorActual.split('.');

                if (parts.length > 1) {
                    parts[1] = parts[1].substring(0, 2); // Limita a dos decimales
                    valorActual = parts[0] + '.' + parts[1];
                }

                // Actualiza el valor del input con la validación realizada
                $(this).val(valorActual);

                calcularSubtotalYTotal();
            });
        }

        // Función para actualizar el total
        function calcularSubtotalYTotal() {
            let total = 0;

            // Recorre cada insumo para calcular su subtotal y luego sumarlo al total
            for (let i = 1; i <= <?php echo $result->num_rows; ?>; i++) {
                const cantidad = parseFloat($("#cantidad_insumo_" + i).val() || 0);
                const valor = parseFloat($("#valor_insumo_" + (i - 1)).val() ||
                    0); // Asegúrate de que los IDs de los valores coincidan

                const subtotalInsumo = cantidad * valor;
                total += subtotalInsumo;
            }

            // Ahora, total contiene la suma de todos los subtotales de insumos
            $("#total_fac").val(total.toFixed(2)); // Esto mostrará el total con dos decimales
        }

        // Escucha cambios en los inputs de cantidad y valor de insumo para calcular el total
        $("[id^='cantidad_insumo_'], [id^='valor_insumo_']").on('input', calcularSubtotalYTotal);

        // Además, puedes llamar a la función al cargar la página si es necesario
        $(document).ready(function() {
            calcularSubtotalYTotal();
        });


    });



    //-----------------MODAL GLOBAL
    function generarFactura(idComprobante) {


        // Mostrar el modal
        $('#miModal').modal('show');
    }




    $(document).ready(function() {
        const numeroDeResultados = <?php echo $result->num_rows; ?>;




        // Escucha el evento submit del formulario
        $("#formRegisFactu").submit(function(e) {
            e.preventDefault();
            var fech_emision = $.trim($("#fech_emision").val());
            var total_fac = $.trim($("#total_fac").val());





            $.ajax({
                url: "../modulos_proveedores/regis_factura.php",
                type: "POST",
                dataType: "json",
                data: {
                    fech_emision: fech_emision,
                    total_fac: total_fac

                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Envio exitoso!',
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