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