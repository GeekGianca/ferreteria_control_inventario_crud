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
    <link href="<?php echo URL_ROUTE ?>/assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL_ROUTE ?>/index">Ferreteria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/invoice">Facturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/providers">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/categories">Categorias</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/products">Productos
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-5">Productos disponibles</h1>
            <p class="lead">Los productos son registrados desde una factura de compra.</p>
            <div class="my-2"></div>
            <div class="my-2"></div>
            <table class="table table-hover">
                <thead>
                <tr class="text-center">
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Disponibles</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['products'] as $prod){ ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $prod->idproducto; ?></th>
                            <td><?php echo $prod->nombre ?></td>
                            <td><?php echo $prod->precio_venta ?></td>
                            <td><?php echo $prod->disponibilidad ?></td>
                            <td><?php echo $prod->categoria_idcategoria ?></td>
                            <td>
                                <a href="<?php echo URL_ROUTE ?>/products/delete_product?id_product=<?php echo $prod->idproducto ?>"
                                   type="button"
                                   class="btn btn-sm btn-danger btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text text-white">Eliminar</span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo URL_ROUTE ?>/assets/jquery/jquery.slim.min.js"></script>
<script src="<?php echo URL_ROUTE ?>/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
