<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_usuarios.php');

if ($_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: index.php');
}

$id = $_GET['id'] ?? null;

$nombreUsuario = getUsuarioById($conexion, $id);

if ($id) {
    deleteUSuario($conexion, $id);
}


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
    <title>NextGen - Mantenimiento Usuarios </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-5 pt-1 pb-1">
            <h1>Usuario eliminado</h1>

        </div>

        <div class="container containerCustomized mt-3 msj-enviado">
            <i class="bi bi-people-fill"></i>
            <div class="text">
                <p>El usuariop
                    <b>
                        <u>
                            <?php echo $nombreUsuario['email'] ?>
                        </u>
                    </b> ha sido eliminado
                </p>

                <a href="<?php echo BASE_URL ?>admin_usuarios.php" class="btn btn-primary">Volver a Usuarios</a>
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