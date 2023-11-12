<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_mensajes.php');
require_once('funciones/redireccion.php');

redireccionarUsuario();


$consultas = getContacto($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ---IMPORT HEADERS--- -->
    <?php require('layout/_headers.php') ?>
    <!-- ---IMPORT HEADERS--- -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen - Listado Consultas </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInDown">
        <div class="container containerCustomized mt-8">
            <h1>Usuarios activos en newsletter</h1>
        </div>
        <div class="container containerCustomized mt-3">
            <div class="admin-container-table">
                <?php $listadoNewsletter = ""; ?>
                <?php foreach ($consultas as $contacto): ?>
                    <?php if ($contacto['newsletter'] == 1): ?>
                        <?php $listadoNewsletter .= $contacto['email'] . ";" ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <label for="listado" class="form-label mt-3 text-light mb-0">Correos para Newsletter:
            </label>
            <input type="listado" id="listado" name="listado" class="form-control mb-2 mt-2"
                value="<?php echo $listadoNewsletter ?>">
            <span id="success-copy" lass="text-light">Direcciones copiadas</span>
            <div>
                <a class="btn btn-primary mt-2" onclick="copyToClipboard()"><i
                        class="bi bi-clipboard-check mx-2"></i>Copiar Direcciones</a>
                <a href="mailto:<?php echo $listadoNewsletter ?>?subject=NextGen > Nuestras novedades"
                    class="btn btn-success mt-2"><i class="bi bi-send-check mx-2"></i></i>Envio masivo</a>
            </div>

            <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning mt-3"><i
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
    <script>
        <?php require 'js/clipboard.js'; ?>
    </script>
    <!-- ---IMPORT JS--- -->
</body>

</html>