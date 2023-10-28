<?php
require_once('_conexion.php');
require_once('./consultas/consultas_productos.php');
require_once('./funciones/funciones_input.php');

// Realmente no esta validando nada, saludos !! =)
$nombreProducto = getNombreProducto($conexion);
$errores = [];

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $errores = validarContacto($nombreProducto);
//     if (count($errores) == 0) {
//         header('Location: mensajeEnviado.php');
//     }
// }

$productos = getProductos($conexion);
if (isset($_GET['id'])) {
    $producto = getProductoById($conexion, $_GET['id']);
    $prodCatalogo = $producto['nombre_producto'];
}

//- Añadir datos de la consulta a la base de datos validando form

if( isset($_GET['id']) ){
    //El usuario está intentando editar un producto.
    $contacto = getConsultaById($conexion, $_GET['id']);
}else{
    $contacto = [
        'id' => test_input( $_POST['id'] ?? null ),
        'nombre' => test_input($_POST['nombre'] ?? null),
        'telefono' => test_input($_POST['telefono'] ?? null),
        'email' => test_input($_POST['email'] ?? null),
        'nombre_producto' => test_input($_POST['nombre_producto'] ?? null),
        'consulta' => test_input($_POST['consulta'] ?? null)
    ];
}



$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $errores = validarContacto($contacto);

    if( count($errores) == 0 ){

        if( empty($contacto['id']) ){
            addConsulta($conexion, $contacto);
        }else{
            echo "Error";
        }
        
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


    <div class="contentCustomized animate__animated animate__fadeInDown">
        <div class="container containerCustomized mt-8 pt-1 pb-1">
            <h1>Contactanos</h1>

        </div>

        <div class="container containerCustomized mt-3">
            <ul>

                <?php foreach ($errores as $error): ?>
                    <li class="text text-danger">
                        <?php echo $error ?>
                    </li>
                <?php endforeach ?>
            </ul>

            <form action="mensajeEnviado.php" method="post" class="form-contacto">
                <div class="mb-1 mt-3">
                    <label for="nombre" class="form-label text-light mb-0">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        placeholder="Ingrese su nombre completo" value="" require>
                </div>
                <div class="mb-1 mt-3">
                    <label for="telefono" class="form-label text-light mb-0">Telefono:</label>
                    <input type="text" class="form-control " name="telefono" id="telefono"
                        placeholder="Ingrese su numero telefonico" value="">
                </div>
                <div class="mb-1 mt-3">
                    <label for="email" class="form-label text-light mb-0">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Ingrese su correo electronico" value="" require>
                </div>
                <div class="mb-1 mt-3">
                    <label for="nombre_producto" class="form-label text-light mb-0">Seleccione producto a consultar:</label>
                    <select type="select" class="form-control" name="nombre_producto" id="nombre_producto" require>
                        <option value="0" selected>Seleccione</option>
                        <?php foreach ($nombreProducto as $nombre): ?>
                            <?php if ($nombre['nombre_producto'] == $prodCatalogo): ?>
                                <option selected value="<?php echo $nombre['nombre_producto'] ?>">
                                    <?php echo $nombre['nombre_producto'] ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $nombre['nombre_producto'] ?>">
                                    <?php echo $nombre['nombre_producto'] ?>
                                </option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="consulta" class="form-label text-light mb-0">Consulta:</label>
                    <textarea type="textarea" class="form-control" name="consulta" id="consulta"
                        placeholder="Escriba su consulta" value="" style="resize:none" rows="4" cols="50"
                        require></textarea>
                </div>
                <div class="row justify-content-md-center" style="max-width:700px;margin:auto;">
                    <button type="submit" class="btn btn-success"> <i
                            class="bi bi-envelope-arrow-up mx-1"></i>Enviar</button>
                    <button type="reset" class="btn btn-danger mt-2"> <i class="bi bi-trash mx-1"></i>Limpiar
                        formulario</button>

                </div>

            </form>
            <a href="index.php" class="p-0">
                <button class="btn btn-warning mt-2 w-100" style="max-width:700px;margin:auto;"><i
                        class="bi bi-arrow-left-circle mx-1"></i>Volver</button>
            </a>
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