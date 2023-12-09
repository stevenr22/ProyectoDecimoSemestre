<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock .:|:. Mango</title>
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
                        <div class="card-title">Historial de nuevos Insumos</div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <button type="button" id="openModalBtn" class="btn btn-info" > + Registrar nuevo insumo</button>

                </div><br>
               
                <div class="card-body table-responsive">
                    <table id="mitabla" class="table table-bordered" style="width:100%">
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
                                <th>12-02-2023</th>
                                <td>
                                    <button class="btn btn-danger"><i class="ti ti-file-description"></i></button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

           
          
             

                <!-- MODAL OPCION -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Modal Encabezado</h2>
                            <button class="close" onclick="cerrarModal();">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="formCate">
                                <label for="selectCate">Seleccione la categoría del insumo: </label>
                                <div id="mensajeError" class="error-message"></div><br>

                              
                                <select name="cate" id="cate" class="form-select">
                                    <option value="" selected disabled></option>
                                    <option value="Insecticidas">Insecticidas</option>
                                    <option value="Mangos">Mangos</option>
                                    <option value="Parcelas">Parcelas</option>
                                    <option value="Herramientas">Herramientas</option>
                                    <option value="Maquinarias">Maquinarias</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="validarYCerrarModal();">Aceptar</button>
                            <button type="button" class="btn btn-danger me-auto" onclick="cerrarModal();">Cerrar</button>
                        </div>
                    </div>
                </div>

                <!--FIN MODAL-->

                <!-- SEGUNDO MODAL INSECTICIDA -->
                <div id="segundoModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Insecticida</h2>
                            <button class="close" onclick="cerrarGeneral()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-group" id="formInsec">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nombrei">Nombre insecticida: </label>
                                        <input type="text" class="form-control" id="nom_insec">
                                    </div>
                                    <div class="col">
                                        <label for="Gramo">Gramo: </label>
                                        <input type="number" name="number_insec" id="num_insec" class="form-control">
                                        
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger me-auto"onclick="cerrarGeneral()">Cerrar</button>
                        </div>
                    </div>
                </div>

                <!--FIN MODAL-->
                <!-- TERCER MODAL MANGOS -->
                <div id="tercerModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Mangos</h2>
                            <button class="close" onclick="cerrarGeneral()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-group" id="formMango">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nombre">Nombre: </label>
                                        <input type="text" class="form-control" id="nom_mango">
                                    </div>
                                    <div class="col">
                                        <label for="Tipo">Tipo: </label>
                                        <input type="text" name="t_mango" id="t_mango" class="form-control">
                                        
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                        </div>
                    </div>
                </div>

                <!--FIN MODAL-->
                <!-- CUARTO MODAL PARCELAS -->
                <div id="cuartoModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Parcelas</h2>
                            <button class="close" onclick="cerrarGeneral()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-group" id="formParce">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nombre">Nombre: </label>
                                        <input type="text" class="form-control" id="nom_parce">
                                    </div>
                                    <div class="col">
                                        <label for="Ancho">Ancho: </label>
                                        <input type="number" name="ancho_parce" id="ancho_parce" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Alto">Alto: </label>
                                        <input type="number" name="ancho_parce" id="ancho_parce" class="form-control">

                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                        </div>
                    </div>
                </div>

                <!--FIN MODAL-->
                <!-- QUINTO MODAL HERRAMIENTAS -->
                <div id="quintoModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Herramientas</h2>
                            <button class="close" onclick="cerrarGeneral()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-group" id="formMango">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nombre">Nombre: </label>
                                        <input type="text" class="form-control" id="nom_mango">
                                    </div>
                                    <div class="col">
                                        <label for="Tipo">Tipo: </label>
                                        <input type="text" name="t_mango" id="t_mango" class="form-control">
                                        
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                        </div>
                    </div>
                </div>

                <!--FIN MODAL-->
                <!-- SEXTO MODAL MAQUINARIA -->
                <div id="sextoModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Maquinarias</h2>
                            <button class="close" onclick="cerrarGeneral()">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-group" id="formMaqui">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nombre">Nombre: </label>
                                        <input type="text" class="form-control" id="nom_maqui">
                                    </div>
                                    <div class="col">
                                        <label for="Tipo">Tipo: </label>
                                        <input type="text" name="t_maqui" id="t_maqui" class="form-control"><br>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    
                                        <select name="t_parcela" id="t_parcela" class="form-select">
                                            <option value="" selected disabled></option>

                                            <option value="Parcela A">Parcela A</option>
                                            <option value="Parcela B">Parcela B</option>
                                            <option value="Parcela C">Parcela C</option>
                                            <option value="Parcela D">Parcela D</option>
                                        </select>

                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                        </div>
                    </div>
                </div>

                <!--FIN MODAL-->
                

               



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
                }else if(selectedValue =="Parcelas"){
                    mostrarcuartoModal();
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
            var modal_parcela = document.getElementById("cuartoModal");
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
                    if (modal_parcela) {
                        modal_parcela.style.display = 'none';
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
        function mostrarcuartoModal() {
            var segundoModal = document.getElementById('cuartoModal');
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

       

       

      
        

        // Evento para cerrar el modal cuando se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }






        
    </script>
    <script src="../recursos/noti/toastr.min.js"></script>
</body>
</html>