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
            <h1>Listado Consultas</h1>


        </div>

        <div class="container containerCustomized mt-3">
            <div class="admin-container-table">

                <table class="table table-ver-productos">
                    <thead>
                        <tr>
                            <th class="text-center first" scope="col">Fecha</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Telefono</th>
                            <th class="text-center" scope="col">E-Mail</th>
                            <th class="text-center" scope="col">Producto Consultado</th>
                            <th class="text-center" scope="col">Consulta</th>
                            <th class="text-center" scope="col">Subscripto</th>
                            <th class="text-center" scope="col">Enviar Respuesta</th>
                            <th class="text-center last" scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consultas as $contacto): ?>

                            <tr>
                                <td class="text-center">
                                    <?php echo $contacto['fecha_consulta'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $contacto['nombre'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo ($contacto['telefono'] == NULL ? "-" : $contacto['telefono']) ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $contacto['email'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $contacto['nombre_producto'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $contacto['consulta'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo ($contacto['newsletter'] == 1 ? '<i class="bi bi-check-circle" style="font-size: 22px;color:green;"></i>' : "") ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $email = $contacto['email'];
                                    $subject = "NextGen | Consulta: " . $contacto['nombre_producto'];
                                    $body = "\n\n-----------------------------\n" . $contacto['nombre_producto'] . "\nSu Mensaje: " . $contacto['consulta'];
                                    $encodedSubject = rawurlencode($subject);
                                    $encodedBody = rawurlencode($body);
                                    $mailtoLink = $email . '?subject=' . $encodedSubject . '&body=' . $encodedBody;
                                    ?>

                                    <a href="mailto:<?php echo $mailtoLink ?>" title="Responder"><button
                                            class="btn btn-success"><i class="bi bi-arrow-bar-right"></i></button></a>
                                </td>

                                <td class="text-center">
                                    <?php if ($contacto['respondido'] == 0): ?>
                                        <a href="<?php echo BASE_URL ?>admin_respuesta_confirmada.php?id=<?php echo $contacto['id_contacto'] ?>"
                                            class="btn btn-primary" title="Marcar como respondido"><i
                                                class="bi bi-bookmark-check"></i></a>
                                    <?php else: ?>
                                        <?php echo '<i class="bi bi-send-check" style="font-size: 22px;color:green;"></i>' ?>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                </table>
            </div>

            <a href="<?php echo BASE_URL ?>admin_index.php" class="btn btn-warning mt-5"><i
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