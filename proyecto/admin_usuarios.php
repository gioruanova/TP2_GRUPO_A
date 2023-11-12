<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_usuarios.php');


if ($_SESSION['usuario']['rol'] !== 'Admin') {
    header('Location: index.php');
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

    <div class="contentCustomized animate__animated animate__backInDown">
        <div class="container containerCustomized mt-8">
            <h1>Administrar Usuarios</h1>


        </div>

        <div class="container containerCustomized mt-3">
            <div class="admin-container-table">

                <table class="table table-ver-productos">
                    <thead>
                        <tr>
                            <th class="text-center first" scope="col">User_ID</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">E-Mail</th>
                            <th class="text-center" scope="col">Password</th>
                            <th class="text-center" scope="col">Rol</th>
                            <th class="text-center last" scope="col">Accion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>

                            <tr>
                                <td class="text-center">
                                    <?php echo $user['id'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $user['nombre'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $user['email'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $user['password'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $user['rol'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL ?>admin_editar_usuario.php?id=<?php echo $user['id'] ?>"
                                        class="btn btn-primary" title="Editar Usuario"><i
                                            class="bi bi-pencil-square"></i></a>

                                    <a href="<?php echo BASE_URL ?>admin_eliminar_usuario.php?id=<?php echo $user['id'] ?>"
                                        class="btn btn-danger ms-1" title="Eliminar Usuario"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                </table>
            </div>

            <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning mt-2"><i
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
    <!-- ---IMPORT JS--- -->
</body>

</html>