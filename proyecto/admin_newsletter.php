<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_mensajes.php');
require_once('consultas/consultas_usuarios.php');


if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['rol'] == 'Usuario') {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}


$consultas = getContacto($conexion);

$usuarios = getUsuarios($conexion);
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
        <div class="container containerCustomized mt-5">
            <h1>Suscripciones Newsletter</h1>
        </div>
        <div class="container containerCustomized mt-3 pt-3 pb-3">
            <div>
                <div class="admin-container-table">
                    <?php $listadoNewsletter = ""; ?>
                    <?php foreach ($consultas as $contacto): ?>
                        <?php if ($contacto['newsletter'] == 1): ?>
                            <?php $listadoNewsletter .= $contacto['email'] . "; " ?>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <label for="listado" class="form-label mt-3 text-light mb-0">Newsletter (No Usuarios):
                </label>
                <input type="listado" id="listado" name="listado" class="form-control mb-2 mt-2"
                    value="<?php echo $listadoNewsletter ?>">
                
                <div>
                    <a class="btn btn-primary mt-2" onclick="copyToClipboard('listado')"><i
                            class="bi bi-clipboard-check mx-2"></i>Copiar Direcciones</a>
                    <a href="mailto:<?php echo $listadoNewsletter ?>?subject=NextGen > Nuestras novedades"
                        class="btn btn-success mt-2"><i class="bi bi-send-check mx-2"></i></i>Envio masivo</a>
                </div>
            </div>
        </div>


        <div class="container containerCustomized mt-2 pt-3 pb-3">
            <div>
                <div class="admin-container-table ">
                    <?php $listadoNewsletterUsuarios = ""; ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <?php if ($usuario['newsletter'] == 1): ?>
                            <?php $listadoNewsletterUsuarios .= $usuario['email'] . "; " ?>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <label for="listadoUsuarios" class="form-label mt-3 text-light mb-0">Newsletter Usuarios:</label>
                <input type="listadoUsuarios" id="listadoUsuarios" name="listadoUsuarios" class="form-control mb-2 mt-2"
                    value="<?php echo $listadoNewsletterUsuarios ?>">
                
                <div>
                    
                    <a class="btn btn-primary mt-2"
                        onclick="copyToClipboard('listadoUsuarios')"><i
                            class="bi bi-clipboard-check mx-2"></i>Copiar Direcciones</a>

                    <a href="mailto:<?php echo $listadoNewsletterUsuarios ?>?subject=NextGen  > Nuestras novedades exclusivas para usuarios"
                        class="btn btn-success mt-2"><i class="bi bi-send-check mx-2"></i></i>Envio masivo</a>
                </div>
            </div>
        </div>


        <div class="container containerCustomized mt-2 pt-3 pb-3">
            <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning"><i
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
    <?php require('js/_customScripts.php') ?>
    <script>
        <?php require 'js/_clipboard.js' ?>
    </script>
    <!-- ---IMPORT JS--- -->
</body>

</html>