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

$providerEdit = $_SESSION['provider_edit'];

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
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/providers">Proveedores
                        <span class="sr-only">(current)</span>
                    </a>
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
            <h1 class="mt-5">Proveedores</h1>
            <p class="lead">Registro de proveedores de compra..</p>

            <?php if ($providerEdit != null){ ?>
            <form action="<?php echo URL_ROUTE ?>/providers/update_provider" method="POST">
                <?php }else{ ?>
                <form action="<?php echo URL_ROUTE ?>/providers/insert_provider" method="POST">
                    <?php } ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="c_proveedor">Codigo proveedor</label>
                            <?php if ($providerEdit != null) { ?>
                                <input type="text" class="form-control" id="c_proveedor" name="c_proveedor"
                                       value="<?php echo $providerEdit->idproveedor ?>" readonly>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="c_proveedor" name="c_proveedor"
                                       placeholder="Proveedor" required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="n_proveedor">Nombre</label>
                            <?php if ($providerEdit != null) { ?>
                                <input type="text" class="form-control" id="n_proveedor" name="n_proveedor"
                                       value="<?php echo $providerEdit->nombre ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" id="n_proveedor" name="n_proveedor" required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ci_proveedor">Ciudad</label>
                            <?php if ($providerEdit != null) { ?>
                                <input type="text" class="form-control" id="ci_proveedor" name="ci_proveedor"
                                       value="<?php echo $providerEdit->ciudad ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" id="ci_proveedor" name="ci_proveedor" required>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="t_proveedor">Telefono</label>
                            <?php if ($providerEdit != null) { ?>
                                <input type="number" maxlength="10" minlength="10" class="form-control" id="t_proveedor"
                                       name="t_proveedor" value="<?php echo $providerEdit->telefono ?>">
                            <?php } else { ?>
                                <input type="number" maxlength="10" minlength="10" class="form-control" id="t_proveedor"
                                       name="t_proveedor" required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nc_proveedor">Nombre de Contacto</label>
                            <?php if ($providerEdit != null) { ?>
                                <input type="text" class="form-control" id="nc_proveedor" name="nc_proveedor"
                                       value="<?php echo $providerEdit->nombre_contacto ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" id="nc_proveedor" name="nc_proveedor" required>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($providerEdit != null) { ?>
                        <button type="submit" id="btn" class="btn btn-warning text-white">Editar</button>
                    <?php } else { ?>
                        <button type="submit" id="btn" class="btn btn-primary">Registrar</button>
                    <?php } ?>
                </form>

                <div class="my-2"></div>
                <div class="my-2"></div>
                <table class="table table-hover">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['providers'] as $prov) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $prov->idproveedor; ?></th>
                            <td><?php echo $prov->nombre; ?></td>
                            <td><?php echo $prov->ciudad; ?></td>
                            <td><?php echo $prov->telefono; ?></td>
                            <td><?php echo $prov->nombre_contacto; ?></td>
                            <td>
                                <a href="<?php echo URL_ROUTE ?>/providers/edit_provider?id_provider=<?php echo $prov->idproveedor ?>"
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
