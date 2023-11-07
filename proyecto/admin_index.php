<?php
require_once('conf/globalConfig.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen - Portal Admin </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInDown">
        <div class="container containerCustomized mt-8">
            <h1>Bienvenido Admin</h1>
            <p>Seleccione la tarea que desea realizar</p>

        </div>

        <div class="container containerCustomized mt-3">
            <div class="admin-container">
                <a href="<?php echo BASE_URL ?>admin_usuarios.php" class="admin-option">
                    <i class="bi bi-people-fill"></i>
                    <span>Administrar usuarios</span>
                </a>

                <a href="<?php echo BASE_URL ?>ver_productos.php" class="admin-option">
                    <i class="bi bi-cart-check"></i>
                    <span>Admin. Productos</span>
                </a>

                <a href="<?php echo BASE_URL ?>admin_consultas.php" class="admin-option">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Consultas Recibidas</span>
                </a>

                <a href="<?php echo BASE_URL?>admin_newsletter.php" class="admin-option">
                    <i class="bi bi-card-list"></i>
                    <span>Listado Newsletter</span>
                </a>
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