<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_misc.php');
require_once('./funciones/funciones_input.php');

if ($_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: index.php');

} else {

    if (isset($_GET['id'])) {
        $mensaje = getMensajeBanner($conexion, $_GET['id']);

    } else {
        $mensaje = [
            'id' => test_input($_POST['id'] ?? null),
            'mensajeMostrar' => test_input($_POST['mensajeMostrar'] ?? null),
            'indicador' => test_input($_POST['indicador'] ?? null),
            'finalizacionMensaje' => test_input($_POST['finalizacionMensaje'] ?? null),
        ];
    }

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errores = validarBanner($mensaje);
        if (count($errores) == 0) {
            if ($mensaje['id']) {
                updateMensajeBanner($conexion, $mensaje);
                header('Location: admin_index.php');
            }
        }
    }
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
    <title>NextGen - Listado Consultas </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInDown">
        <div class="container containerCustomized mt-5">
            <h1>Mensajes Cabecera</h1>
        </div>
        <div class="container containerCustomized mt-3 pt-3 pb-3">

            <?php foreach ($errores as $error): ?>
                <li class="text" style="text-align: justify;color:pink">
                    <?php echo $error ?>
                </li>
            <?php endforeach ?>

            <form id="formSubmit" action="admin_mensajes_generales.php" method="post" class="form-contacto">


                <input type="hidden" name="id" id="id" class="form-control mb-2" value="<?php echo $mensaje['id'] ?>">


                <div>
                    <label for="mensajeMostrar" class="form-label text-light mb-0 mt-2">Mensaje a activar: </label>
                    <input type="text" name="mensajeMostrar" id="mensajeMostrar" class="form-control mb-2" required
                        value="<?php echo $mensaje['mensajeMostrar'] ?>">
                </div>


                <div>
                    <input <?php echo ($mensaje['indicador'] == "1") ? "checked" : "" ?> name="indicador" value="1"
                        class="form-check-input" type="checkbox" id="indicador"><label for="indicador"
                        class="form-label text-light ms-1" style="font-weight:300;">Activar mensaje?</label>
                </div>

                <div>
                    <label for="finalizacionMensaje" class="form-label text-light mb-0 mt-2">Fecha finalizacion mensaje:
                    </label>
                    <input type="date" id="finalizacionMensaje" name="finalizacionMensaje" class="form-control mb-2"
                        value="<?php echo $mensaje['finalizacionMensaje'] ?>">

                </div>


                <div style="display: flex;justify-content: center;margin-top:1rem">
                    <button type="submit" class="btn btn-success mx-2">Actualizar</button>

                    <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning"><i
                            class="bi bi-arrow-left-circle me-2"></i>Volver</a>
                </div>


            </form>



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