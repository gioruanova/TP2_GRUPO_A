<?php

require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
$productos = getProductos($conexion);

if (isset($_GET['id'])) {
    $producto = getProductoById($conexion, $_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Distribuidora</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->
    <div class="contentCustomized animate__animated animate__fadeInDown">

        <div class="container containerCustomized mt-8">
            <h1>Conoce mas sobre el producto</h1>
            <p>A continuacion podras obtener un detalle extendido del producto y sus caracteristicas.</p>

        </div>

        <div class="container containerCustomized mt-3">

            <div class="container text-center">

                <!-- -------Comienza CARD------- -->

                <div class="cardDetail">
                    <img src="img/<?php echo ($producto['nombre_archivo_producto'] == NULL) ? "error-image.jpg" : $producto['nombre_archivo_producto'] . '.jpg'; ?>"
                        alt="<?php echo ($prod['nombre_archivo_producto'] == NULL) ? "Producto sin imagen para " . $producto['nombre_producto'] : $producto['nombre_producto'] ?>">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">
                                <?php echo $producto['nombre_producto'] ?>
                            </h5>
                            <span class="categoria">(
                                <?php echo $producto['categoria_producto'] ?>)
                            </span>
                        </div>
                        <div class="card-text">
                            <div class="card-descripcion">
                                <?php echo $producto['descripcion_producto'] ?>
                            </div>
                            <div class="precios">
                                <span class="price">
                                    <?php echo ($producto['descuento_producto'] != 0 ? "$" . number_format($producto['precio_producto'], 2, ',', '.') : ''); ?>
                                </span>
                                <span class="final-price">$
                                    <?php echo ($producto['descuento_producto'] != 0 ? number_format(($producto['precio_producto'] - $producto['descuento_producto']), 2, ',', '.') : number_format($producto['precio_producto'], 2, ',', '.')); ?>
                                </span>
                            </div>
                        </div>
                        <div class="button-wrap">
                            <a href="#" class="btn btn-success disabled" title="Proximamente!!">Contactar</a>
                            <a href="index.php" class="btn btn-primary mt-2" title="Proximamente!!">Volver</a>
                        </div>
                    </div>
                    <?php echo ($producto['producto_promo'] == 0 ? "" : "<span class='promoAvailable'>SALE</span>") ?>
                </div>


                <!-- -------Termina CARD------- -->


            </div>
        </div>

        <div class="container containerCustomized mt-2">
            <h3>No dudes en contactarnos</h3>
            <p>Contactanos y recibi nuestro asesoramiento, y suscribite a nuestro newsletter mensual para estar al tanto
                de todos los ingresos y promociones</p>
            <a href="contacto.php" class="btn btn-success">Contactanos</a>
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