<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('funciones/funciones_input.php');
require_once('consultas/consultas_productos.php');

$nombre = test_input($_POST['nombre'] ?? null);
$email = test_input($_POST['email'] ?? null);
$password = test_input($_POST['password'] ?? null);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $errores = validarUsuario([
        'nombre' => $nombre,
        'email' => $email,
        'password' => $password
    ]);

    if( getUsuarioByEmail($conexion, $email) ){
        $errores[] = "Ya existe un usuario con el email {$email}";
    }

    //Verifica que el formulario esté validado
    if( count($errores) == 0 )
    {
        $usuario_nuevo = [
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password,
            'rol' => 'Usuario'
        ];

        addUsuario($conexion, $usuario_nuevo);

        header('Location: registroExitoso.php');

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
    <title>NextGen - Registrarse</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->
    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Registrarse</h1>

        </div>

        <form action="<?php echo BASE_URL ?>registrarse.php" method="post">
        <div class="container containerCustomized mt-3">
            <div style="max-width:300px;margin:auto;margin-bottom:20px">
                <label for="nombre" class="form-label text-light">Nombre Completo: </label>
                <input type="text" name="nombre" id="nombre" class="form-control mb-2"
                    placeholder="Ingrese su nombre completo">

                <label for="usuario" class="form-label text-light">Email:</label>
                <input type="email" name="usuario" id="usuario" class="form-control mb-2"
                    placeholder="Ingrese su correo electronico">

                <label for="password" class="form-label text-light">Contraseña: </label>
                <input type="password" name="password" id="password" class="form-control mb-2"
                    placeholder="Ingrese su contraseña">
                    
                    <div>
                        <button type="submit" class="btn btn-success"> <i
                        class="bi bi-envelope-arrow-up mx-1"></i>Registrarse</button>
                        <a href="<?php echo BASE_URL ?>iniciar_sesion.php" class="btn btn-warning mt-2">Ya tengo usuario</a>
                    </div>
                </div>
                <a href="<?php echo BASE_URL ?>index.php" class="btn btn-primary">Volver al Inicio </a>
            </div>
        </div>
    </form>
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