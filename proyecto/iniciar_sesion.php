<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('funciones/funciones_input.php');
require_once('consultas/consultas_usuarios.php');

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {


    $usuario = $_SESSION['usuario'] ?? null;


    if (isset($_GET['msj'])) {
        $titulo = "<h1>Cuenta creada exitosamente</h1><h3>Ingrese sus datos para comenzar</h3>";

    } else {
        $titulo = "<h1>Ingrese sus datos para comenzar</h1>";
    }

    $error = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $email = test_input($_POST['email'] ?? null);
        $password = test_input($_POST['password'] ?? null);

        $usuario = getUsuarioByEmail($conexion, $email);


        if ($usuario and $usuario['password'] == $password) {


            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'rol' => $usuario['rol'],
            ];

            header('Location: admin_index.php');

        } else {
            $error = 'Los datos ingresados son incorrectos.';
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
    <title>NextGen - Iniciar Sesion </title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->
    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-5 pt-1 pb-1">
            <?php echo $titulo ?>



        </div>

        <div class="container containerCustomized mt-3">
            <div>
                <?php if ($error): ?>
                    <div class="text" style="text-align: center;color:pink;margin-bottom:2rem;">
                        <?php echo $error ?>
                    </div>
                <?php endif ?>
            </div>
            <div style="max-width:400px;margin:auto;margin-bottom:20px">
                <form action="<?php echo BASE_URL ?>iniciar_sesion.php" method="post">

                    <label for="email" class="form-label text-light">Email: </label>
                    <input type="email" name="email" id="email" class="form-control mb-2"
                        placeholder="Ejemplo: pepeluis@gmail.com" required>

                    <label for="password" class="form-label text-light">Contraseña: </label>
                    <input type="password" name="password" id="password" class="form-control mb-2"
                        placeholder="Ingrese su contraseña" required>

                    <div>
                        <button type="submit" class="btn btn-success mt-2">Ingresar</button>
                        <a href="<?php echo BASE_URL ?>registrarse.php" class="btn btn-warning mt-2">Crear
                            usuario</a>
                    </div>
                </form>
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
    <?php require('js/_customScripts.php') ?>
    <!-- ---IMPORT JS--- -->
</body>

</html>