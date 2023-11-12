<?php

require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');

if ($_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: index.php');
}

$id = $_GET['id'] ?? null;


if ($id) {
    deleteProducto($conexion, $id);
}

// header('Location: admin_ver_productos.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen - Admin | Producto Eliminado</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Producto eliminado</h1>

        </div>

        <div class="container containerCustomized mt-3 msj-enviado">
            <i class="bi bi-trash"></i>
            <div class="text">
                <p>Producto eliminado</p>
                <a href="<?php echo BASE_URL ?>ver_productos.php" class="btn btn-primary">Volver a productos</a>
            </div>
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