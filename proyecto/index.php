<?php
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
require_once('funciones/paginacion.php');

$productos = getProductos($conexion);

// Cantidad de productos
$cantidad = count($productos);


$pagina_actual = $_GET['pag'] ?? 1;
$cantidad_por_pagina = 3;
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
    <title>NextGen</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->
    <div class="contentCustomized">

        <div class="container containerCustomized mt-8 animate__animated animate__fadeIn">
            <h1><span><i class="bi bi-cpu color-change-effect me-2"></i></span>NextGen</h1>
            <p>NextGen se destaca como un referente en la industria de importación de productos
                informáticos, ofreciendo soluciones innovadoras y servicios de alta calidad.</p>

            <p>Nuestra empresa se ha
                ganado la confianza de clientes en todo el mundo gracias a nuestra dedicación a la excelencia y a la
                satisfacción del cliente. Explore nuestro catálogo y descubra la diferencia NextGen.</p>
        </div>

        <div class="container containerCustomized mt-3 animate__animated animate__fadeInDown">

            <div class="container text-center">
                <div class="row justify-content-md-center">
                    <!-- -------Comienza CARD------- -->


                    <?php foreach ($productos as $prod): ?>
                        <div class="col justify-content-md-center">
                            <div class="card text-bg-dark">
                                <?php echo ($prod['producto_promo'] == 0 ? "" : "<span class='promoAvailable'>SALE</span>") ?>
                                <img src="img/<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "error-image.jpg" : $prod['nombre_archivo_producto'] . '.jpg'; ?>"
                                    alt="<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "Producto sin imagen para " . $prod['nombre_producto'] : $prod['nombre_producto'] ?>">
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title">
                                            <?php echo $prod['nombre_producto'] ?>
                                        </h5>
                                        <span class="categoria">(
                                            <?php echo $prod['categoria_producto'] ?>)
                                        </span>
                                    </div>
                                    <div class="card-text">
                                        <div class="card-descripcion">
                                            <?php echo $prod['descripcion_producto'] ?>
                                        </div>
                                        <div class="precios">

                                            <span class="price">
                                                <?php echo ($prod['descuento_producto'] != 0 ? "$" . number_format($prod['precio_producto'], 2, ',', '.') : ''); ?>
                                            </span>
                                            <span class="final-price">$
                                                <?php echo ($prod['descuento_producto'] != 0 ? number_format(($prod['precio_producto'] - $prod['descuento_producto']), 2, ',', '.') : number_format($prod['precio_producto'], 2, ',', '.')); ?>
                                            </span>

                                        </div>
                                    </div>
                                    <a href="productoDetalle.php?id=<?php echo $prod['id_producto'] ?>"
                                        class="btn btn-primary">Ver Más ></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <!-- -------Termina CARD------- -->

                    <nav aria-label="Page navigation example" data-bs-theme="dark">
                        <ul class="pagination justify-content-center">
                            <?php if ($paginado_enlaces['anterior']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?>"> Primero
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>">
                                        <?php echo $paginado_enlaces['anterior'] ?>
                                    </a>
                                </li>
                            <?php endif ?>
                            <li class="page-item active">
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
                                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>"> Último </a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </nav>





                </div>
            </div>
        </div>

        <div class="container containerCustomized mt-2">
            <h3>Garantía en importación</h3>
            <p>NextGen, una empresa ficticia líder en el mercado de importación de productos informáticos, se
                enorgullece de ofrecer a sus clientes una garantía sin igual en sus importaciones. Nuestra misión es
                proporcionar productos de la más alta calidad, y respaldamos esa promesa con una garantía de
                satisfacción total. Si algún producto importado por NextGen no cumple con sus expectativas, estamos
                comprometidos a reemplazarlo o reembolsar su compra.</p>

            <p>En NextGen, comprendemos la importancia de la confiabilidad en la tecnología. Nuestros productos
                informáticos están respaldados por rigurosas pruebas de calidad y garantizamos su durabilidad y
                rendimiento. Nuestra garantía en importaciones es un testimonio de nuestro compromiso con la
                satisfacción del cliente. Confíe en NextGen para obtener productos informáticos de vanguardia
                respaldados por la mejor garantía en la industria.</p>

            <p>Cualquier semejanza con cualquier otra empresa es pura casualidad, y el fin de este sitio, es reflecar
                practicas relacionadas PHP y MYSQL.</p>
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