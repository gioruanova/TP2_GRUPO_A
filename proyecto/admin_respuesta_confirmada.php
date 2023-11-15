<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_mensajes.php');

if (isset($_SESSION['usuario'])){
    if ($_SESSION['usuario']['rol'] == 'Usuario') {
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}


$id = $_GET['id'] ?? null;

if ($id) {
    marcarLeido($conexion, $id);
    header('Location: admin_consultas.php');
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
    <title>NextGen - Consulta actualizada </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-5 pt-1 pb-1">
            <h1>Respuesta enviada</h1>
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
    <?php require('js/_customScripts.js') ?>
    <!-- ---IMPORT JS--- -->
</body>

</html>