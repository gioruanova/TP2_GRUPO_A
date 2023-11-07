<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen - Iniciar Sesion </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->
    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Iniciar Sesion</h1>

        </div>

        <div class="container containerCustomized mt-3">
            <div style="max-width:400px;margin:auto;margin-bottom:20px">
                <label for="usuario" class="form-label text-light">Email: </label>
                <input type="email" name="usuario" id="usuario" class="form-control mb-2"
                    placeholder="Ingrese correo electronico">

                <label for="password" class="form-label text-light">Contraseña: </label>
                <input type="password" name="password" id="password" class="form-control mb-2"
                    placeholder="Ingrese su contraseña">

                <div>
                    <a href="#" class="btn btn-success mt-2">Ingresar</a>
                    <a href="<?php echo BASE_URL ?>iniciar_sesion.php" class="btn btn-warning mt-2">Crear usuario</a>
                </div>
            </div>
            <a href="<?php echo BASE_URL ?>index.php" class="btn btn-primary">Volver al Inicio </a>
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