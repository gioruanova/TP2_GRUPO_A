<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
require_once('funciones/paginacion.php');

if ($_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: index.php');
}

$productos = getProductos($conexion);

$substrNombreProducto = 30;
// Cantidad de productos
$cantidad = count($productos);

$pagina_actual = $_GET['pag'] ?? 1;
$cantidad_por_pagina = 8;
$paginado_enlaces = paginador_enlaces($cantidad, $pagina_actual, $cantidad_por_pagina);
$productos = paginacion($productos, $pagina_actual, $cantidad_por_pagina);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen - | Admin Listado Productos</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInRight">
        <div class="container containerCustomized mt-5">
            <h1>Mantenimiento producots</h1>
        </div>

        <div class="container containerCustomized mt-3">

            <div class="menu-producto-admin" id="listado-productos">
                <a href="<?php echo BASE_URL ?>admin_guardar_producto.php" class="btn btn-success mt-2"><i
                        class="bi bi-plus-circle mx-2"></i>Nuevo Producto</a>

                <a href="#listado-productos" class="btn btn-secondary mt-2"><i
                        class="bi bi-pencil-square mx-2"></i>Modificar producto</a>
            </div>

            <div class="admin-container-table mb-3">
                <table class="table table-ver-productos">
                    <thead>
                        <tr>
                            <th class="text-center first" scope="col">Imagen</th>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Categoria</th>
                            <th class="text-center" scope="col">Precio</th>
                            <th class="text-center" scope="col">Descuento</th>
                            <th class="text-center" scope="col">Acciones</th>
                            <th class="text-center last" scope="col">Publicacion</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($productos as $prod): ?>
                            <tr>
                                <td class="text-center">
                                    <img class="img-view"
                                        src="img/<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "error-image.jpg" : $prod['nombre_archivo_producto'] . '.' . $prod['formato_imagen']; ?>"
                                        alt="<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "Producto sin imagen para " . $prod['nombre_producto'] : $prod['nombre_producto'] ?>">
                                </td>
                                <td class="text-center">
                                    <?php echo $prod['id_producto'] ?>
                                </td>
                                <td class="text-center producto-nombre">
                                    <?php echo substr($prod['nombre_producto'], 0, $substrNombreProducto) . "..." ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $prod['categoria_producto'] ?>
                                </td>
                                <td class="text-center">
                                    $
                                    <?php echo number_format($prod['precio_producto'], 2, ',', '.') ?>
                                </td>
                                <td class="text-center">
                                    <?php echo ($prod['descuento_producto'] != 0 ? "$" . number_format($prod['descuento_producto'], 2, ',', '.') : '-'); ?>
                                </td>
                                <td class="text-center">
                                    <a target="_blank"
                                        href="<?php echo BASE_URL ?>productoDetalle.php?id=<?php echo $prod['id_producto'] ?>"><button
                                            class="btn btn-success"><i class="bi bi-box-arrow-up-right"></i></button></a>
                                </td>
                                <td class="text-center">
                                    <div style="display:flex;justify-content: center;">
                                        <a href="<?php echo BASE_URL ?>admin_guardar_producto.php?id=<?php echo $prod['id_producto'] ?>"
                                            title="Editar Producto"> <button class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"> </i> </button></a>
                                        <a class="ms-1" href="admin_eliminar_producto.php?id=<?php echo $prod['id_producto'] ?>"
                                            title="Eliminar producto"><button class="btn btn-danger"><i
                                                    class="bi bi-trash"></i></button></a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach ?>




                    </tbody>
                </table>
            </div>


            <nav class="pagination-productos" aria-label="Page navigation example" data-bs-theme="light">
                <ul class="pagination justify-content-center">
                    <?php if ($paginado_enlaces['anterior']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?> ">
                                Primero
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>"">
                                        <?php echo $paginado_enlaces['anterior'] ?>
                                    </a>
                                </li>
                            <?php endif ?>
                            <li class=" page-item active">
                            <span class="page-link">
                                <?php echo $paginado_enlaces['actual'] ?>
                            </span>
                    </li>
                    <?php if ($paginado_enlaces['siguiente']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['siguiente'] ?>">
                                <?php echo $paginado_enlaces['siguiente'] ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>">
                                Último </a>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>

            <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning mt-2"><i
                    class="bi bi-arrow-left-circle me-2"></i>Volver</a>

        </div>
    </div>


    <!-- -----------------------------BODY----------------------------- -->

    <!-- ---IMPORT FOOTER--- -->
    <?php require('layout/_footer.php') ?>
    <!-- ---IMPORT FOOTER--- -->

    <!-- ---IMPORT WHATSAPP--- -->
    <?php require('layout/_whatsappIcon.php') ?>
    <!-- ---IMPORT WHATSAPP--- -->

    <!-- ---IMPORT JS--- -->
    <?php require('js/_bootstrap.js') ?>
    <!-- ---IMPORT JS--- -->
</body>

</html>