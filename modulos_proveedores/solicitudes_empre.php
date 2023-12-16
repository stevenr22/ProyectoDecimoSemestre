<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../modulos_proveedores/bootstrap.css">
    <link rel="stylesheet" href="../modulos_proveedores/datatables.min.css">

    

    <title>Solicitudes .:|</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../modulos_proveedores/dashboard_proveedor.php">PROVEEDOR</a>
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

        <div class="table-responsive">
            <table id="tablaSolicitudes" class="table table-borderes table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <!-- Agrega más encabezados según sea necesario -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Producto 1</td>
                        <td>10</td>
                        <!-- Agrega más celdas según sea necesario -->
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Producto 2</td>
                        <td>5</td>
                        <!-- Agrega más celdas según sea necesario -->
                    </tr>
                    <!-- Agrega más filas según sea necesario -->
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="../modulos_proveedores/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablaSolicitudes').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });
        });

    </script>


    
</body>
</html>