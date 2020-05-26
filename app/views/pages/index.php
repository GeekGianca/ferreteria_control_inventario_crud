<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ferreteria</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL_ROUTE ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL_ROUTE ?>/assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<?php
if (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED)
    session_start();
$invoice = $_SESSION['invoice'];
$products = $_SESSION['products'];
$total = $_SESSION['total'];
$edition = $_SESSION['edit_product'];
?>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL_ROUTE ?>/index">Ferreteria Inventario</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URL_ROUTE ?>/index">Compras
                        <span class="sr-only">(current)</span>
                    </a>
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
            <h3 class="mt-5">Registro de facturación</h3>
            <p class="lead">Compras a proveedores</p>
            <?php if ($invoice != null) { ?>
            <form action="<?php echo URL_ROUTE ?>/pages/change_product" method="POST">
                <?php } else { ?>
                <form action="<?php echo URL_ROUTE ?>/pages/add_to_invoice" method="POST">
                    <?php } ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="no_fact">N° Factura</label>
                            <?php if ($invoice != null) { ?>
                                <input type="number" class="form-control" id="no_fact" name="no_fact"
                                       value="<?php echo $invoice['idfactura'] ?>" required readonly>
                            <?php } else { ?>
                                <input type="number" class="form-control" id="no_fact" name="no_fact" required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cantidad">Cantidad de productos</label>
                            <?php if ($invoice != null) { ?>
                                <input type="number" class="form-control" id="cantidad" name="cantidad"
                                       value="<?php echo count($products) ?>" disabled readonly>
                            <?php } else { ?>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="c_total">Total compra</label>
                            <?php if ($invoice != null) { ?>
                                <input type="number" class="form-control" id="c_total" name="c_total"
                                       value="<?php echo $total ?>" disabled readonly>
                            <?php } else { ?>
                                <input type="number" class="form-control" id="c_total" name="c_total" disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="d_proveedor">Proveedor</label>
                            <select class="form-control" id="d_proveedor" name="d_proveedor" required>
                                <?php foreach ($data['providers'] as $prov) { ?>
                                    <option value="<?php echo $prov->idproveedor ?>"><?php echo $prov->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="p_codigo">Codigo producto</label>
                            <?php if ($edition != null) { ?>
                                <input type="text" class="form-control" id="p_codigo"
                                       value="<?php echo $edition['idproducto'] ?>" name="p_codigo"
                                       required>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="p_codigo" placeholder="0000000"
                                       name="p_codigo"
                                       required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="p_nombre">Nombre</label>
                            <?php if ($edition != null) { ?>
                                <input type="text" class="form-control" id="p_nombre"
                                       value="<?php echo $edition['nombre'] ?>" name="p_nombre"
                                       required>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="p_nombre" placeholder="Producto"
                                       name="p_nombre"
                                       required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="p_venta">Precio venta</label>
                            <?php if ($edition != null) { ?>
                                <input type="number" class="form-control" id="p_venta"
                                       value="<?php echo $edition['precio_venta'] ?>" name="p_venta"
                                       required>
                            <?php } else { ?>
                                <input type="number" class="form-control" id="p_venta" placeholder="$0.0" name="p_venta"
                                       required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="p_compra">Precio compra</label>
                            <?php if ($edition != null) { ?>
                                <input type="number" class="form-control" id="p_compra"
                                       value="<?php echo $edition['precio_compra'] ?>" name="p_compra"
                                       required>
                            <?php } else { ?>
                                <input type="number" class="form-control" id="p_compra" placeholder="$0.0"
                                       name="p_compra"
                                       required>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="c_comprada">Cantidad</label>
                            <?php if ($edition != null) { ?>
                                <input type="number" class="form-control" id="c_comprada"
                                       value="<?php echo $edition['disponibilidad'] ?>" name="c_comprada"
                                       required>
                            <?php } else { ?>
                                <input type="number" class="form-control" id="c_comprada" placeholder="0"
                                       name="c_comprada"
                                       required>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="p_categoria">Categoria</label>
                            <select class="form-control" id="p_categoria" name="p_categoria" required>
                                <?php foreach ($data['categories'] as $cat) { ?>
                                    <option value="<?php echo $cat->idcategoria ?>"><?php echo $cat->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php if ($edition != null) { ?>
                        <button type="submit" class="text-white btn btn-warning">Actualizar</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    <?php } ?>
                </form>
                <div class="my-2"></div>
        </div>
        <div class="form-row col-12">
            <div class="my-2"></div>
            <?php if (isset($_SESSION['alert'])) { ?>
                <?php if ($_SESSION['alert']) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['alert']; ?>
                    </div>
                    <?php unset($_SESSION['alert']) ?>
                <?php }
            } elseif (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php } ?>
            <div class="my-2"></div>

        </div>
        <div class="color-lg-12">
            <div class="my-2"></div>
            <?php if (isset($_SESSION['products'])) { ?>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Disponibles</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Opcion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $prod) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $prod['idproducto']; ?></th>
                            <td><?php echo $prod['nombre']; ?></td>
                            <td><?php echo $prod['precio_venta']; ?></td>
                            <td><?php echo $prod['disponibilidad']; ?></td>
                            <td><?php echo $prod['categoria_idcategoria']; ?></td>
                            <td>
                                <a href="<?php echo URL_ROUTE ?>/pages/edit_product?id_product=<?php echo $prod['idproducto'] ?>"
                                   type="button"
                                   class="btn btn-sm btn-warning btn-icon-split">
                                    <span class="icon text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text text-white">Editar</span>
                                </a>
                                <a href="<?php echo URL_ROUTE ?>/pages/remove_product?id_product=<?php echo $prod['idproducto'] ?>"
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
                <div class="d-flex align-content-around">
                    <form action="<?php echo URL_ROUTE ?>/pages/insert_invoice" method="POST">
                        <button type="submit" class="btn btn-success">Finalizar</button>
                    </form>
                    <div class="my-2"></div>
                    <form action="<?php echo URL_ROUTE ?>/pages/cancel_invoice" method="POST">
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                </div>
            <?php } ?>
            <div class="my-2"></div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo URL_ROUTE ?>/assets/jquery/jquery.slim.min.js"></script>
<script src="<?php echo URL_ROUTE ?>/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
