<!-- MODAL OPCION -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Categoría</h2>
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

                <label for="Nombrei">Nombre insecticida: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre" id="nom_insec">

                <label for="Gramo">Gramo: </label>
                <input type="number" name="number_insec" id="num_insec" class="form-control">



            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
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

                <label for="Nombre">Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese nombre del mango" id="nom_mango">

                <label for="Tipo">Tipo: </label>
                <input type="text" name="t_mango" id="t_mango" placeholder="Ingrese el tipo de mang"
                    class="form-control">



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
<div id="modalParcela" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Parcelas</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" class="form-group" id="formParce">

                <label for="Nombre">Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre" id="nom_parce">

                <label for="Ancho">Ancho: </label>
                <input type="number" name="ancho_parce" id="ancho_parce" placeholder="Ingrese el ancho"
                    class="form-control">


                <label for="Alto">Alto: </label>
                <input type="number" name="ancho_parce" id="ancho_parce" placeholder="Ingrese el alto"
                    class="form-control">
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

                <label for="Nombre">Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre de la herramienta"
                    id="nom_mango">

                <label for="Tipo">Tipo: </label>
                <input type="text" name="t_mango" id="t_mango" placeholder="Ingrese el tipo" class="form-control">



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

                <label for="Nombre">Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre de la maquinaria" id="nom_maqui">

                <label for="Tipo">Tipo: </label>
                <input type="text" name="t_maqui" id="t_maqui" placeholder="Ingrese el tipo" class="form-control"><br>



                <select name="t_parcela" id="t_parcela" class="form-select">
                    <option value="" selected disabled></option>

                    <option value="Parcela A">Parcela A</option>
                    <option value="Parcela B">Parcela B</option>
                    <option value="Parcela C">Parcela C</option>
                    <option value="Parcela D">Parcela D</option>
                </select>



            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
        </div>
    </div>
</div>

<!--FIN MODAL-->



<!-- MODAL REGISTRO PROVEEDOR -->
<div id="modalProveedor" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Registrar nuevo proveedor</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" class="form-group" id="formProveedor">
                <div class="row">
                    <div class="col">
                        <label for="Nombreprov">Nombre empresa: </label>
                        <input type="text" class="form-control" id="nom_prove"
                            placeholder="Ingrese el nombre de la empresa">
                    </div>
                    <div class="col">
                        <label for="Contacto">Nombre del trabajador: </label>
                        <input type="text" name="nomb_trab_prov" id="nomb_trab_prov" class="form-control"
                            placeholder="Ingrese nombre del trabajador"><br>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="direc">Dirección: </label>
                        <input type="text" class="form-control" id="direc" placeholder="Ingrese la dirección">
                    </div>
                    <div class="col">
                        <label for="tele">N° de teléfono: </label>
                        <input type="tel" name="telefo" id="telefo" class="form-control"
                            placeholder="Ingrese el número de teléfono"><br>

                    </div>
                </div>



                <label for="fechregis">Fecha de registro: </label>
                <input type="date" class="form-control" id="fech_regis_prov">




            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
        </div>
    </div>
</div>



<!-- MODAL REGISTRO DE ROL -->
<div id="modalRol" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Registrar nuevo rol</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" class="form-group" id="formRol">

                <label for="Nombrerol">Nombre rol: </label>
                <input type="text" class="form-control" id="nom_rol" placeholder="Ingrese el nombre del rol"><br>


                <label for="Descripcion">Funciones: </label>
                <input type="text" name="decrip_rol" id="decrip_rol" class="form-control"
                    placeholder="Ingrese las funciones"><br>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
        </div>
    </div>
</div>


<!-- MODAL REGISTRO DE SOLICITUD -->
<div id="modalSolici" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Registrar nueva solicitud</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" class="form-group" id="formSoli">

                <label for="Fecha">Fecha: </label>
                <input type="date" class="form-control" id="fecha_soli"><br>


                <label for="Insu">Insumos: </label>
                <input type="text" name="insu_soli" id="insu_soli" class="form-control"
                    placeholder="Ingrese insumo"><br>

                <label for="Provee">Seleccione el proveedor: </label>
                <select name="select_prove_soli" id="select_prove_soli" class="form-select">
                    <option value="">A</option>
                    <option value="">B</option>
                    <option value="">C</option>
                </select>



            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_regis_soli">Registrar</button>
            <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
        </div>
    </div>
</div>


<!-- MODAL EDITAR PERFIL -->
<div id="modalPerfil" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Editar perfil</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form  id="formPerfil">
                <input type="hidden" id="DBid" value="<?php echo $_SESSION['DBid_usu'];?>">



                <label >Nombre completo: </label>
                <input type="text" class="form-control" name="NomCompleto" id="NomCompleto" 
                    value="<?php echo $datos["DBnom_completoV2"];?>"><br>





                <label >Correo electrónico: </label>
                <input type="email" class="form-control" id="correo" name="correo"
                    value="<?php echo $datos["DBcorreoV2"];?>"><br>


                <label for="Usuario">Nombre de usuario: </label>
                <input type="text" class="form-control" id="NomUsuario" name="NomUsuario"
                    value="<?php echo $datos["DBnom_usuV2"];?>"><br>




                <label >Rol asignado: </label>
                <input type="text" class="form-control readonly-field" name="rol_pag" id="rol_pag" readonly
                    value="<?php echo $datos["DBcargoV2"];?>"><br>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>

             
            </form>
         
           
         
        </div>

        
       
    </div>
</div>


<!--MODAL ASIGNAR ROL-->
<div id="modalAsignarROl" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Editar rol</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form  id="formAsignarRol">



                <label >Código: </label>
                <input type="text" class="form-control readonly-field" name="id_usuario" id="id_usuario"><br>





                <label >Nombre completo: </label>
                <input type="text" class="form-control readonly-field" id="NomCompleto_rol" name="NomCompleto_rol"><br>

                <label >Correo: </label>
                <input type="email" class="form-control readonly-field" id="correo_rol" name="correo_rol"><br>

                <label >Nombre de usuario: </label>
                <input type="text" class="form-control readonly-field" id="NomUsuario_rol" name="NomUsuario_rol"><br>

                <label >Cargo: </label>
                <input type="text" class="form-control readonly-field" id="cargo_rol" name="cargo_rol"><br>



                <label >Rol asignado: </label>
                <select name="selectRol" class="form-select" id="selectRol">
                    <?php include '../solicitar_datos/cargar_roles.php'; ?>
                </select>

                <br>

                <button type="button" class="btn btn-primary" onclick="actualizarRol()">Actualizar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>

             
            </form>
         
           
         
        </div>

        
       
    </div>
</div>
