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
    <title>NextGen - Contacto</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Consulta enviada</h1>

        </div>

        <div class="container containerCustomized mt-3 msj-enviado">
            <i class="bi bi-envelope-check"></i>
            <div class="text">
                <p>Gracias por su mensaje.</p>
                <p>Nos estaremos comunicando a la brevedad</p>
                <a href="index.php" class="btn btn-primary">Volver al Inicio</a>
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