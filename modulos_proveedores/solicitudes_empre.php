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
        
        

       
        <br>

        <div class="table-responsive">
            <table id="tablaSolicitudes" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Código comprobante</th>
                        <th>Representante de la empresa</th>
                        <th>Empresa</th>
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
                        <td>Gestión mango S.A.</td>
                        <td>
                            <a href='../reportes/<?php echo $arreglo["contenido_pdf"]; ?>' download class='btn btn-primary'>Descargar</a>
                            <button type="button" class="btn btn-success" onclick="generarFactura('<?php echo $arreglo['id_comprobante']?>');">Generar factura</button>
                            

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
        <div class="modal fade" tabindex="-1" id="miModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" style="color: white; font-weight: bold;">REGISTRAR DETALLE DE FACTURA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formRegisFactu" class="form-group">
                            <input type="hidden" name="id_compro" id="id_compro" value="<?php echo $arreglo['id_comprobante']; ?>">
                            
                            <label>Fecha de factura: </label>
                            <input type="date" name="fech_emision" id="fech_emision" class="form-control"><br>

                            <div class="text-center">
                                <h4><b>Datos generales:</b></h4>
                                <hr>
                            </div>
                            <div class="row">
                                <?php
                                    include("../bd/conexion.php");
                                    $sql = "SELECT nombre_empre FROM proveedor WHERE nombre_empre = 'Ecua S.A.'";
                                    $result = $conn->query($sql);
                                    // Verifica si se encontró el proveedor
                                    if ($result->num_rows > 0) {
                                        // Obtiene la fila del resultado
                                        $row = $result->fetch_assoc();
                                        $nombreProveedor = $row['nombre_empre']; // Obtén el nombre del proveedor de la fila

                                    } else {
                                        $nombreProveedor = "Proveedor no encontrado"; // O un valor predeterminado si no se encuentra el proveedor
                                    }
                                    ?>


                                
                                <div class="col">
                                    <label>Proveedor: </label>
                                    <input type="text" id="fact_prove" class="form-control readonly-field" readonly value="<?php echo $nombreProveedor; ?>"><br>

                                </div>
                                <div class="col">
                                    <label>Cliente: </label>
                                    <input type="text" id="fact_cli" class="form-control readonly-field" readonly value="Gestion Mango S.A."><br>

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
                                    $sql = "SELECT s.nombre_insu, s.cantidad FROM solicitudes as s";
                                    $result = $conn->query($sql);
                                    while ($arreglo = $result->fetch_array()) {
                                    ?>
                                        <input type="text" class="form-control readonly-field" readonly value="<?php echo $arreglo['nombre_insu']; ?>"><br>
                                    <?php } ?>
                                </div>
                                
                                <div class="col-md-2">
                                    <label>Cantidad: </label>
                                    <?php
                                    // Utiliza la variable $result que ya tiene los resultados de la consulta
                                    mysqli_data_seek($result, 0);  // Esto reinicia el puntero del resultado para volver a leerlo desde el principio
                                    while ($arreglo = $result->fetch_array()) {
                                    ?>
                                        <input type="text" class="form-control readonly-field" readonly value="<?php echo $arreglo['cantidad']; ?>"><br>
                                    <?php } ?>
                                </div>
                                
                                <div class="col">
                                    <label>Valor: </label>
                                    <div id="camposValor"></div>
                                    <hr>

                                    <label>Total: </label>
                                    <div class="input-group">
                                        <input type="number" class="form-control readonly-field" name="total_fac" id="total_fac" readonly aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text bg-success dollar-icon" style="color: white;"><b>$</b></span>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" style="color: white; font-weight: bold;" class="btn btn-primary">Enviar factura</button>
                            <button type="button" style="color: white; font-weight: bold;" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                const inputGroup = $('<div>', { class: 'input-group' });

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
                        parts[1] = parts[1].substring(0, 2);  // Limita a dos decimales
                        valorActual = parts[0] + '.' + parts[1];
                    }

                    // Actualiza el valor del input con la validación realizada
                    $(this).val(valorActual);

                    actualizarTotal();
                });
            }

            // Función para actualizar el total
            function actualizarTotal() {
                let total = 0;

                // Recorre cada input y suma su valor al total
                for (let i = 0; i < numeroDeResultados; i++) {
                    const valor = parseFloat($('#valor_insumo_' + i).val() || 0);
                    total += valor;
                }

                // Actualiza el valor del input de Total con el total calculado
                $('#total_fac').val(total.toFixed(2));  // Asegura que el total tenga dos decimales
            }
        });



        //-----------------MODAL GLOBAL
        function generarFactura(idComprobante) {
            // Establecer el ID del comprobante en el campo input oculto
            $('#id_compro').val(idComprobante);
            
            // Mostrar el modal
            $('#miModal').modal('show');
        }




        $(document).ready(function() {
    
          

            // Escucha el evento submit del formulario
            $("#formRegisFactu").submit(function(e) {
                e.preventDefault();
                var id_compro = $.trim($("#id_compro").val());
                var fech_emision = $.trim($("#fech_emision").val());
                var total_fac = $.trim($("#total_fac").val());

            

                $.ajax({
                    url: "../modulos_proveedores/regis_factura.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id_compro: id_compro, 
                        fech_emision: fech_emision, 
                        total_fac: total_fac
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Envio exitoso!',
                            }).then((result) => {
                                if(result.value){
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