<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_usuarios.php');
require_once('funciones/funciones_input.php');

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    $titulo = $_SESSION['usuario']['nombre'];
    $idUser = $_SESSION['usuario']['id'];
    $rolUser = $_SESSION['usuario']['rol'];

    $usuario = getUsuarioById($conexion, $idUser);

    if (isset($_GET['id'])) {
        $usuario = getUsuarioById($conexion, $_GET['id']);

    } else {
        $usuario = [
            'id' => $idUser,
            'nombre' => test_input($_POST['nombre'] ?? null),
            'email' => test_input($_POST['email'] ?? null),
            'password' => test_input($_POST['password'] ?? null),
            'newsletter' => test_input($_POST['newsletter'] ?? null),
            'rol' => $rolUser,

        ];
    }

    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errores = validarUsuario($usuario);
        if (count($errores) == 0) {
            if ($usuario['id']) {
                updateUsuario($conexion, $usuario);

                $_SESSION['usuario'] = null;
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'rol' => $usuario['rol'],
                ];
                $titulo = $_SESSION['usuario']['nombre'];

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
    <title>NextGen - Mantenimiento Usuarios </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInDown">
        <div class="container containerCustomized mt-5">
            <h1>Bienvenido a su cuenta
                <?php echo $titulo ?>
            </h1>
            <h3>Aca podra editar sus datos</h3>


        </div>



        <div class="container containerCustomized mt-3">
            <?php foreach ($errores as $error): ?>
                <li class="text" style="text-align: justify;color:pink">
                    <?php echo $error ?>
                </li>
            <?php endforeach ?>
            <div class="admin-container-table">


                <form id="formSubmit" action="genericUser_viewAccount.php" method="post">


                    <label for="nombre" class="form-label text-light"
                        style="width: 100%;text-align: left;">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control mb-2"
                        value="<?php echo $usuario['nombre'] ?>">

                    <label for="email" class="form-label text-light"
                        style="width: 100%;text-align: left;">Email:</label>

                    <input type="email" name="email" id="email" class="form-control mb-2"
                        value="<?php echo $usuario['email'] ?>">

                    <label for="password" class="form-label text-light" style="width: 100%;text-align: left;">Nueva
                        Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control mb-2"
                        value="<?php echo $usuario['password'] ?>">


                    <div style="display: flex;">
                        <input <?php echo ($usuario['newsletter'] == "1") ? "checked" : "" ?> name="newsletter" value="1"
                            class="form-check-input" type="checkbox" id="newsletter"><label for="newsletter"
                            class="form-label text-light ms-1" style="font-weight:300;">Suscribir al newsletter</label>
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Actualizar</button>
                    <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning mt-2"><i
                            class="bi bi-arrow-left-circle me-2"></i>Cancelar</a>
                </form>
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
    <?php require('js/_customScripts.js') ?>
    <!-- ---IMPORT JS--- -->
</body>

</html>