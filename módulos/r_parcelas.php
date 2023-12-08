<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcelas .:|:. Mango</title>
    <?php include("../partes/enlaces.php");?>
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
                        <div class="card-title">Parcelas</div>
                    </div>
                    <div class="card-body">
                   
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
                    <div class="card-footer">
                        <button class="btn btn-primary" onclick="info();">Registrar</button>
                    </div>
                </div>
                <div class="card-footer">
                    <?php include("../partes/footer.php");?>
                </div>
            </div>

        </div>

    </div>
    <script>
        function info(){
        Swal.fire({
            title: 'Insumo registrado exitosamente!',
            text: 'La parcela se encuentra registrado y en uso',
            icon: 'success', // Puedes cambiar el icono según tus necesidades (success, error, warning, info)
            confirmButtonText: 'OK!'
        });
    }
    </script>

    
</body>
</html>