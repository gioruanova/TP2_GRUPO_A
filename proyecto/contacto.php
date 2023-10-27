<?php

require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
$productos = getProductos($conexion);

if (isset($_GET['id'])) {
    $producto = getProductoById($conexion, $_GET['id']);
    $productoAConsultar = "Llego al form de contacto desde algun producto que venia viiendo y mostraria en el titulo del form > " . $producto['nombre_producto'];
    echo $productoAConsultar;

} else {
    
    $productoAConsultar = "aca podemos meter alguna logica para que en vez del nombre del producto, armemos el select que vos decias o algo parecido";
    echo $productoAConsultar;
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
    <title>NextGen - Contacto</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->


    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Contactanos</h1>

        </div>

        <div class="container containerCustomized mt-3">

            <p>Aca va el form</p>
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