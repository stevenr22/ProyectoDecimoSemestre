<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de insumos.:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
   
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
            <?php include("../partes/encabezado.php");?>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h2><b>Registro uso de insumos</b></h2></div>
                    </div>  
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card w-100">
                            <div class="card-body">
                                <form id="formRegisUsoInsu" class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="Fecha">Fecha de uso: </label>
                                            <input type="date" id="fechUso" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="selectParcela">Seleccione la parcela a aplicar</label>
                                            <select name="selectParcela" class="form-select" id="selectParcela">
                                                <option value="">A</option>
                                                <option value="">B</option>
                                                <option value="">C</option>
                                                <option value="">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="selecttipoIns">Seleccione el tipo de insumo</label>
                                            <select name="selecttipoIns" class="form-select" id="selecttipoIns">
                                                <option value="">A</option>
                                                <option value="">B</option>
                                                <option value="">C</option>
                                                <option value="">D</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="Canti">Cantidad: </label>
                                            <input type="number" id="Canti" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="selecRespon">Seleccione el responsable</label>
                                            <select name="selecRespon" class="form-select" id="selecRespon">
                                                <option value="">A</option>
                                                <option value="">B</option>
                                                <option value="">C</option>
                                                <option value="">D</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="Nombre_insu">Nombre del insumo: </label>
                                            <input type="text" id="nom_insu" class="form-control" placeholder="Ingrese el nombre del insumo">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="registrar();" id="btn_regis" class="btn btn-info">Registrar</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            

        </div>
    </div>

    <script>
        function registrar(){
            var btn_registrar = document.getElementById("btn_regis");
            if (btn_registrar){
                Swal.fire({
                title: "Registro exitoso!",
                text: "Los insumos fueron aplicados con exito!",
                icon: "success"
                });

            }
        }
        
    </script>
    
</body>
</html>