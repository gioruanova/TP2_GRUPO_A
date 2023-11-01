<?php
require_once('_conexion.php');
require_once('./consultas/consultas_productos.php');
require_once('./funciones/funciones_input.php');

$nombreProducto = getNombreProducto($conexion);
$errores = [];

$productos = getProductos($conexion);

$prodCatalogo = null;

if (isset($_GET['id'])) {
    $producto = getProductoById($conexion, $_GET['id']);
    $prodCatalogo = $producto['nombre_producto'];

} else {
    $producto['id_producto'] = "NO";

}



$contacto = [
    'id' => test_input($_POST['id'] ?? null),
    'nombre' => test_input($_POST['nombre'] ?? null),
    'telefono' => test_input($_POST['telefono'] ?? null),
    'email' => test_input($_POST['email'] ?? null),
    'nombre_producto' => test_input($_POST['nombre_producto'] ?? null),
    'consulta' => test_input($_POST['consulta'] ?? null),
    'newsletter' => $_POST['newsletter'] ?? [],
];


$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores = validarContacto($contacto);
    if (count($errores) == 0) {
        addContacto($conexion, $contacto);
        header('Location: mensajeEnviado.php');
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
    <title>NextGen - Contacto</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->


    <div class="contentCustomized">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Contactanos</h1>

        </div>

        <div class="container containerCustomized mt-3">
            <ul>

                <?php foreach ($errores as $error): ?>
                    <li class="animate__animated animate__bounceIn" style="text-align: justify;color:pink">
                        <?php echo $error ?>
                    </li>
                <?php endforeach ?>
            </ul>

            <form action="contacto.php" method="post" class="form-contacto mb-0">
                <div class="mb-1 mt-3">
                    <span class="mx-1" style="color:pink">*</span><label for="nombre"
                        class="form-label text-light mb-0">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        placeholder="Ingrese su nombre completo" value="<?php echo $contacto['nombre'] ?>" require>
                </div>
                <div class="mb-1 mt-3">
                    <label for="telefono" class="form-label text-light mb-0">Telefono:</label>
                    <input type="text" class="form-control " name="telefono" id="telefono"
                        placeholder="Ingrese su numero telefonico" value="<?php echo $contacto['telefono'] ?>">
                </div>
                <div class="mb-1 mt-3">
                    <span class="mx-1" style="color:pink">*</span><label for="email"
                        class="form-label text-light mb-0">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Ingrese su correo electronico" value='<?php echo $contacto['email'] ?>' require>
                </div>
                <div class="mb-1 mt-3">
                    <span class="mx-1" style="color:pink">*</span><label for="nombre_producto"
                        class="form-label text-light mb-0">Seleccione producto a
                        consultar:</label>
                    <select type="select" class="form-control" name="nombre_producto" id="nombre_producto" require>
                        <option value="0">Seleccione</option>
                        <?php foreach ($nombreProducto as $nombre): ?>
                            <?php if ($nombre['nombre_producto'] == $prodCatalogo and $prodCatalogo != null): ?>
                                <option selected value='<?php echo $nombre['nombre_producto'] ?>'>
                                    <?php echo $nombre['nombre_producto'] ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $nombre['nombre_producto'] ?>" <?php if ($nombre['nombre_producto'] == $contacto['nombre_producto']): ?> selected <?php endif ?>>
                                    <?php echo $nombre['nombre_producto'] ?>
                                </option>
                            <?php endif ?>
                        <?php endforeach ?>
                        <option value="Otras consultas" <?php if ($contacto['nombre_producto'] == 'Otras consultas'): ?>
                                selected <?php endif ?>>Otras consultas</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <span class="mx-1" style="color:pink">*</span><label for="consulta"
                        class="form-label text-light mb-0">Consulta:</label>
                    <textarea type="textarea" class="form-control" name="consulta" id="consulta"
                        placeholder="Escriba su consulta" value="<?php echo $contacto['consulta'] ?>"
                        style="resize:none" rows="4" cols="50" require>
                        <?php echo $contacto['consulta'] ?>
                    </textarea>
                    <span class="mx-1" style="color:pink;font-size: 14px;">*</span><span
                        style="color:white;font-style: italic;font-weight: 300;font-size: 14px;">Campos
                        mandatorios</span>
                </div>
                <div>

                    <input <?php echo ($contacto['newsletter'] == "1") ? "checked" : "" ?> name="newsletter" value="1"
                        class="form-check-input" type="checkbox" id="newsletter"><label for="newsletter"
                        class="form-label text-light ms-2" style="font-weight:300;">Suscribir al newsletter</label>


                </div>
                <div class="row justify-content-md-center" style="max-width:700px;margin:auto;">
                    <button type="submit" class="btn btn-success"> <i
                            class="bi bi-envelope-arrow-up mx-1"></i>Enviar</button>
                </div>
            </form>
            <a href="contacto.php" class="p-0">
                <button class="btn btn-danger mt-2 w-100" style="max-width:700px;margin: 0 auto;"><i
                        class="bi bi-trash mx-1"></i>Borrar Formulario</button>
            </a>
            <?php if ($producto['id_producto'] == "NO"): ?>
                <a href="index.php" class="p-0">
                    <button class="btn btn-warning mt-2 w-100" style="max-width:700px;margin:auto;"><i
                            class="bi bi-arrow-left-circle mx-1"></i>Volver</button>
                </a>
            <?php else: ?>
                <a href="<?php echo 'productoDetalle.php?id=' . $producto['id_producto'] ?>" class="p-0">
                    <button class="btn btn-warning mt-2 w-100" style="max-width:700px;margin: 0 auto;"><i
                            class="bi bi-arrow-left-circle mx-1"></i>Volver</button>
                </a>
            <?php endif ?>

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

</html>