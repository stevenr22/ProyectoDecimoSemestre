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


<!--FIN MODAL-->
<!-- MODAL Registrar PARCELAS -->
<div id="modalParcela" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Parcelas</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formRegisParce">


                <label >Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre" id="nom_parce"><br>

                <label >Ancho: </label>
                <input type="number" name="ancho_parce" id="ancho_parce" placeholder="Ingrese el ancho"
                    class="form-control"><br>


                <label >Alto: </label>
                <input type="number" name="ancho_parce" id="alto_parce" placeholder="Ingrese el alto"
                    class="form-control"><br>

                <label >Fecha de registro: </label>
                <input type="date" name="fecha_regis_parce" id="fecha_regis_parce" 
                    class="form-control">

                <br>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
            </form>
        </div>
        
            
      
    </div>
</div>
<!--FIN MODAL-->
<!-- MODAL ACTUALIZAR PARCELAS -->
<div id="modalActuParce" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Parcelas</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formActuaParce">

                <label>Código: </label>
                <input type="text" readonly class="form-control readonly-field" id="id_parce_actu"><br>


                <label >Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre" id="nom_parce_actu">

                <label >Ancho: </label>
                <input type="number" name="ancho_parce_actu" id="ancho_parce_actu" placeholder="Ingrese el ancho"
                    class="form-control"><br>


                <label >Alto: </label>
                <input type="number" name="alto_parce_actu" id="alto_parce_actu" placeholder="Ingrese el alto"
                    class="form-control"><br>

                <label >Fecha de registro: </label>
                <input type="date" name="fecha_regis_parce_actu" id="fecha_regis_parce_actu" 
                    class="form-control">

                <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" onclick="eliminarParcela();" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
            </form>
        </div>
        
            
      
    </div>
</div>
<!--FIN MODAL-->


<!-- REGISTRO DE INSUMOS -->
<div id="modalRegisInsumosComprados" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Registre los insumos comprados</h2>
            <button class="close" onclick="cerrarModal()">&times;</button>
        </div>
        <div class="modal-body">
            <form  class="form-group" id="formRegisInsuCompra">

                <label for="Nombre">Nombre: </label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre del insumo" id="nombre_insu">
                <br>
                <label for="Tipo">Tipo: </label>
                <input type="text" name="tip_insu" id="tip_insu" placeholder="Ingrese el tipo de insumo" class="form-control"><br>
                <br>
                <label for="Cantida">Cantidad: </label>
                <input type="int" name="canti_insu" id="canti_insu" placeholder="Ingrese la cantidad" class="form-control"><br>
                <br>
                <label for="fecha">Fecha registro: </label>
                <input type="date" name="f_regis" id="f_regis" class="form-control"><br>
                <br>
              


             

                <br>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarModal()">Cerrar</button>
                <br>



            </form>
        </div>
        
           
        
    </div>
</div>

<!--FIN MODAL-->



<!-- MODAL REGISTRO PROVEEDOR -->
<div id="modalRegisProveedores" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Registrar nuevo proveedor</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formRegisProveedor">
               
                <label for="Nombreprov">Nombre empresa: </label>
                <input type="text" class="form-control" id="nom_prove" placeholder="Ingrese el nombre de la empresa">
                 
                <label for="Contacto">Nombre del contacto: </label>
                <input type="text" name="nomb_trab_prov" id="nomb_trab_prov" class="form-control" placeholder="Ingrese nombre del trabajador"><br>

                  
                <label for="direc">Dirección: </label>
                <input type="text" class="form-control" id="direc" placeholder="Ingrese la dirección">
                 
                <label for="tele">N° de teléfono: </label>
                <input type="tel" name="telefo" id="telefo" class="form-control" placeholder="Ingrese el número de teléfono"><br>

                <label for="fechregis">Fecha de registro: </label>
                <input type="date" class="form-control" id="fech_regis_prov"><br>


                <button type="Submit" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>




            </form>
        </div>
       
    </div>
</div>
<!-- MODAL ACTUALIZAR PROVEEDOR -->
<div id="modalActuaProveedores" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Actualizar datos del proveedor</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formRegisProveedor">


                <label >Código: </label>
                <input type="text" class="form-control" id="id_prove_actua" placeholder="Ingrese el nombre de la empresa">

                <label >Nombre empresa: </label>
                <input type="text" class="form-control" id="nom_prove_actua" placeholder="Ingrese el nombre de la empresa">
                 
                <label >Nombre del contacto: </label>
                <input type="text" name="nomb_trab_prov" id="nomb_trab_prov_actua" class="form-control" placeholder="Ingrese nombre del trabajador"><br>

                  
                <label >Dirección: </label>
                <input type="text" class="form-control" id="direc_actua" placeholder="Ingrese la dirección">
                 
                <label >N° de teléfono: </label>
                <input type="tel" name="telefo" id="telefo_actua" class="form-control" placeholder="Ingrese el número de teléfono"><br>

                <label >Fecha de registro: </label>
                <input type="date" class="form-control" id="fech_regis_prov_actua"><br>


                <button type="Submit" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>




            </form>
        </div>
       
    </div>
</div>


































<!-- MODAL REGISTRO DE ROL -->
<div id="modalNueRol" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Registrar nuevo rol</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formRegisRol">

                <label for="Nombrerol">Nombre rol: </label>
                <input type="text" class="form-control" id="nom_rol" placeholder="Ingrese el nombre del rol"><br>


                <label for="Descripcion">Funciones: </label>
                <input type="text" name="decrip_rol" id="decrip_rol" class="form-control"
                    placeholder="Ingrese las funciones"><br>
                
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>

            </form>
        </div>
        
            
        
    </div>
</div>

<!-- MODAL ACTUALIZAR DE ROL -->
<div id="modalActuaRol" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Editar rol</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formRegisRol">

                <label>Código: </label>
                <input type="text"  class="form-control" id="id_rol_act"><br>

                <label >Nombre rol: </label>
                <input type="text" class="form-control" id="nom_rol_actu" placeholder="Ingrese el nombre del rol"><br>


                <label >Funciones: </label>
                <input type="text" name="decrip_rol" id="decrip_rol_actu" class="form-control"
                    placeholder="Ingrese las funciones"><br>
                
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>

            </form>
        </div>
        
            
        
    </div>
</div>


<!-- MODAL EDITAR PARA ENVIAR LA SOLICITUD -->
<div id="modalEditEnviSoli" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Edite la respectiva solicitud recibida para su verificación</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="" class="form-group" id="formEditSoli">

                <input type="hidden" id="id_soli_reci">

                <label for="Fecha">Fecha: </label>
                <input type="date" class="form-control" id="fecha_soli"><br>


                <label for="Insu">Nombre insumo: </label>
                <input type="text" name="insu_soli" id="insu_soli" class="form-control"
                    placeholder="Ingrese nombre insumo"><br>
                
                <label for="TInsu">Tipo insumo: </label>
                <input type="text" name="t_insu_soli" id="t_insu_soli" class="form-control"
                    placeholder="Ingrese insumo"><br>

                <label for="canti">Cantidad: </label>
                <input type="text" name="canti_soli" id="canti_soli" class="form-control"
                    placeholder="Ingrese insumo"><br>

                <label for="Provee">Seleccione el proveedor: </label>
                <?php 
                    include("../bd/conexion.php");
                    // Consulta para obtener los proveedores
                    $sql = "SELECT id_prove, nombre_empre FROM proveedor";
                    $result = $conn->query($sql);

                    // Cerrar la conexión a la base de datos
                    $conn->close();

                ?>
                
                <select name="select_prove_soli" id="select_prove_soli" class="form-select">
                <?php
                    // Mostrar opciones basadas en los resultados de la consulta
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["nombre_empre"] . "'>" . $row["nombre_empre"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay proveedores disponibles</option>";
                    }
                ?>
                </select><br>


                <button type="submit" class="btn btn-primary" id="btn_regis_soli">Actualizar</button>
                <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                <br>
            </form>
        </div>
       
          
       
    </div>
</div>






<!-- MODAL REGISTRO DE SOLICITUD TRABAJA-->
<div id="modalSoliciTrabajadorActua" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Editar solicitud</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formActuaSoliTra">

                <input type="hidden" name="id_soli_actua" id="id_soli_actua">

                <label for="Fecha">Fecha: </label>
                <input type="date" class="form-control" id="fecha_soli_actua"><br>


                <label for="tipi">Tipo insumo: </label>
                <input type="text" name="ti_insu_actua" id="ti_insu_actua" class="form-control"
                    placeholder="Ingrese el tipo de insumo"><br>

                <label for="NombreInsu">Nombre insumo: </label>
                <input type="text" name="nom_insu_actua" id="nom_insu_actua" class="form-control"
                    placeholder="Ingrese el nombre del insumo"><br>
                
                    <label for="Cantidad">Cantidad: </label>
                <input type="text" name="canti_insu_actua" id="canti_insu_actua" class="form-control"
                    placeholder="Ingrese la cantidad"><br>

                <br>
                    <button type="submit" class="btn btn-primary" id="btn_regis_soli">Registrar</button>
                    <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                <br>

                


            </form>
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


<!--MODAL VERIFICAR SOLICITUD-->
<div id="modalVerificarSoli" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Verificar solicitud</h2>
            <button class="close" onclick="cerrarGeneral()">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-group" id="formVeriSoli">
                <input type="hidden" name="id_soli_remi" id="id_soli_remi">


                <input type="hidden" name="id_soli_veri" id="id_soli_veri">

                <label for="Fecha">Fecha: </label>
                <input type="date" class="form-control readonly-field" readonly id="fecha_soli_reci"><br>


                <label for="tipi">Tipo insumo: </label>
                <input type="text" name="ti_insu_reci" readonly id="ti_insu_reci" class="form-control readonly-field"><br>

                <label for="NombreInsu">Nombre insumo: </label>
                <input type="text" name="nom_insu_reci" readonly id="nom_insu_reci" class="form-control readonly-field"><br>

                <label for="Cantidad">Cantidad: </label>
                <input type="text" name="canti_insu_reci" readonly id="canti_insu_reci" class="form-control readonly-field"><br>


                <label for="Prov">Proveedor: </label>
                <input type="text" name="prov_reci" readonly id="prov_reci" class="form-control readonly-field"><br>

                <label for="remitente">Nombre remitente: </label>
                <input type="text" name="nom_remi_reci" readonly id="nom_remi_reci" class="form-control readonly-field"><br>
                
                <label for="rol">Cargo: </label>
                <input type="text" name="carg_remi" readonly id="carg_remi" class="form-control readonly-field"><br>
                
                <label for="esta">Estado actual de la solicitud: </label>
                <input type="text" readonly name="estado_soli_remi" id="estado_soli_remi" class="form-control readonly-field"><br>

                <label for="Actu_estta">Verificación de solicitud</label>



                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="aprobado_soli_reci">
                    <label class="form-check-label" for="aprobado_soli_reci">
                        Aprobado
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="denegado_soli_reci">
                    <label class="form-check-label" for="denegado_soli_reci">
                        Denegado
                    </label>
                </div><br>

              
              


                <br>
                    <button type="submit" class="btn btn-primary" id="btn_regis_soli">Actualizar</button>
                    <button type="button" class="btn btn-danger me-auto" onclick="cerrarGeneral()">Cerrar</button>
                <br>




            </form>
         
           
         
        </div>

        
       
    </div>
</div>
