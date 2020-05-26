<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ferreteria</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL_ROUTE ?>/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
var_dump($data['sales']);
var_dump($data['purchases']);
?>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL_ROUTE ?>/index">Ferreteria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/index">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/sales">Ventas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/invoice">Facturas
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/providers">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/categories">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/products">Productos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-5">Registro de compras y ventas</h1>
            <h3 class="mt-2">Registro de compras</h3>
            <form action="" method="POST">
                <div class="form-row align-items-center d-flex justify-content-between">
                    <div class="col-auto">
                        <label class="sr-only" for="b_compras">Buscar factura de compra</label>
                        <input type="text" class="form-control mb-2" id="b_compras" placeholder="Fecha factura o codigo"
                               name="b_compras">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-info btn-lg btn-sm mb-2">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="my-2"></div>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">C.Factura</th>
                    <th scope="col" class="text-center">C.Proveedor</th>
                    <th scope="col" class="text-center">Cantidad Productos</th>
                    <th scope="col" class="text-center">Total compra</th>
                    <th scope="col" class="text-center">Fecha</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="my-2"></div>
            <p class="lead">Total compra: $0</p>
            <div class="my-2"></div>
            <h3 class="mt-2">Registro de ventas</h3>
            <form action="" method="POST">
                <div class="form-row align-items-center d-flex justify-content-between">
                    <div class="col-auto">
                        <label class="sr-only" for="b_ventas">Buscar factura de compra</label>
                        <input type="text" class="form-control mb-2" id="b_ventas" placeholder="Codigo factura o fecha"
                               name="b_ventas">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-info btn-lg btn-sm mb-2">Buscar</button>
                    </div>
                </div>
            </form>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">C.Factura</th>
                    <th scope="col" class="text-center">C.Cliente</th>
                    <th scope="col" class="text-center">Cantidad Productos</th>
                    <th scope="col" class="text-center">Total venta</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="my-2"></div>
            <p class="lead">Total venta: $0</p>
            <div class="my-2"></div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo URL_ROUTE ?>/assets/jquery/jquery.slim.min.js"></script>
<script src="<?php echo URL_ROUTE ?>/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>

