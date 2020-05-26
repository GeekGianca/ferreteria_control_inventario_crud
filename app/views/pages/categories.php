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
<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

$categoryEdit = $_SESSION['category_edit'];

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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/invoice">Facturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/providers">Proveedores</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/categories">Categorias
                        <span class="sr-only">(current)</span>
                    </a>
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
            <h1 class="mt-5">Registro de categorias</h1>
            <?php if ($categoryEdit != null){ ?>
            <form action="<?php echo URL_ROUTE ?>/categories/update_category" method="POST">
                <?php }else{ ?>
                <form action="<?php echo URL_ROUTE ?>/categories/insert_category" method="POST">
                    <?php } ?>
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="c_categoria">Codigo Categoria</label>
                            <?php if ($categoryEdit != null) { ?>
                                <input type="text" class="form-control mb-2" id="c_categoria" name="c_categoria"
                                       value="<?php echo $categoryEdit->idcategoria; ?>" readonly>
                            <?php } else { ?>
                                <input type="text" class="form-control mb-2" id="c_categoria" name="c_categoria"
                                       placeholder="Codigo categoria">
                            <?php } ?>
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="n_categoria">Nombre categoria</label>
                            <?php if ($categoryEdit != null) { ?>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="n_categoria" name="n_categoria"
                                           value="<?php echo $categoryEdit->nombre; ?>">
                                </div>
                            <?php } else { ?>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="n_categoria" name="n_categoria"
                                           placeholder="Nombre categoria">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-auto">
                            <?php if ($categoryEdit != null) { ?>
                                <button type="submit" class="btn btn-warning mb-2 text-white">Actualizar</button>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary mb-2">Registrar</button>
                            <?php } ?>
                        </div>
                    </div>
                </form>
                <div class="my-2"></div>
                <?php if (isset($_SESSION['error_category'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error_category'] ?>
                        <?php unset($_SESSION['error_category']) ?>
                    </div>
                <?php } ?>
                <div class="my-2"></div>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">Id Categoria</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Cantidad disp.</th>
                        <th scope="col" class="text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['categories'] as $cat) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $cat->idcategoria ?></th>
                            <td><?php echo $cat->nombre ?></td>
                            <td><?php echo $cat->cantidad_disponible ?></td>
                            <td>
                                <a href="<?php echo URL_ROUTE ?>/categories/edit_category?id_category=<?php echo $cat->idcategoria ?>"
                                   type="button"
                                   class="btn btn-sm btn-warning btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text text-white">Editar</span>
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
