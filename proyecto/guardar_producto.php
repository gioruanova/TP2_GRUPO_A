<?php
require_once('conf/globalConfig.php');
require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
require_once('./funciones/funciones_input.php');


$productos = getProductos($conexion);



if (isset($_GET['id'])) {
    $producto = getProductoById($conexion, $_GET['id']);
    $tituloPagina = 'Editar producto '. $producto['nombre_producto'];

} else {
    $tituloPagina = 'Agregar nuevo producto';
    $producto = [
        'id_producto' => test_input($_POST['id_producto'] ?? null),
        'nombre_producto' => test_input($_POST['nombre_producto'] ?? null),
        'categoria_producto' => test_input($_POST['categoria_producto'] ?? null),
        'precio_producto' => test_input($_POST['precio_producto'] ?? null),
        'descuento_producto' => test_input($_POST['descuento_producto'] ?? null),
        'producto_promo' => $_POST['producto_promo'] ?? [],
        'descripcion_producto' => test_input($_POST['descripcion_producto'] ?? null),
        'nombre_archivo_producto' => $_FILES['nombre_archivo_producto'] ?? null,
        'formato_imagen' => $_FILES['formato_imagen'] ?? null,
    ];
}

$errores = [];
$imagenProducto = $producto['nombre_archivo_producto']; // validacion archivo


if ($_SERVER['REQUEST_METHOD'] == 'POST') { {
        var_dump($imagenProducto['name']);

        $errores = validarProductos($producto);

        if (empty($imagenProducto['name'])) {
            $producto['nombre_archivo_producto'] = NULL;
            $producto['formato_imagen'] = NULL;
            // addProducto($conexion, $producto);
            // header('Location: ver_productos.php');

        } else {
            $pathInfo = pathinfo($imagenProducto['name']); // tomo el path
            $extension = $pathInfo['extension']; // tomo la extension
            $extensiones_validas = ['jpg', 'jpeg']; // genero array con formatos validos

            if (!in_array($extension, $extensiones_validas)) { // Valido el archivo dentro del array
                $errores[] = 'El formato del archivo debe ser JPG o JPEG';

            }

            if (count($errores) == 0) {
                $archivo_desde = $imagenProducto['tmp_name'];
                $archivoNombre = time() . $pathInfo['filename'];
                $archivo_hacia = 'img/' . $archivoNombre . '.' . $extension;
                move_uploaded_file($archivo_desde, $archivo_hacia);
                $producto['nombre_archivo_producto'] = $archivoNombre;
                $producto['formato_imagen'] = $extension;

                if (empty($producto['id_producto'])) {
                    addProducto($conexion, $producto);
                    echo 'Vacio';
                } else {
                    updateProducto($conexion, $producto);
                    header('Location: ver_productos.php');
                    var_dump($producto['id_producto']);
                }
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
    <title>NextGen - Admin | Productos</title>
</head>

<body>
    <!-- ---IMPORT NAV--- -->
    <?php require('layout/_navbar.php') ?>
    <!-- ---IMPORT NAV--- -->

    <!-- -----------------------------BODY----------------------------- -->

    <div class="contentCustomized animate__animated animate__backInRight">
        <div class="container containerCustomized mt-8">
            <h1>
                <?php echo $tituloPagina ?>
            </h1>
        </div>

        <div class="container containerCustomized mt-3">
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li class="text" style="text-align: justify;color:pink">
                        <?php echo $error ?>
                    </li>
                <?php endforeach ?>
            </ul>

            <form action="guardar_producto.php" method="post" class="edit-product-form" enctype="multipart/form-data">

                <div class="left-module">

                    <input type="" name="id_producto" id="id_producto" class="form-control"
                        value="<?php echo $producto['id_producto'] ?>" placeholder="ID HIDDEN">

                    <label for="nombre_producto" class="form-label text-light mb-0">Nombre: </label>
                    <input type="text" name="nombre_producto" id="nombre_producto" class="form-control"
                        value="<?php echo $producto['nombre_producto'] ?>" placeholder="Ingrese el nombre del producto">

                    <label for="categoria_producto" class="form-label text-light mb-0 mt-2">Categoria: </label>
                    <input type="text" name="categoria_producto" id="categoria_producto" class="form-control"
                        value="<?php echo $producto['categoria_producto'] ?>"
                        placeholder="Ingrese el nombre de la categoria">

                    <label for="precio_producto" class="form-label text-light mb-0 mt-2">Precio: </label>
                    <input type="number" name="precio_producto" step="any" id="precio_producto" class="form-control"
                        value="<?php echo $producto['precio_producto'] ?>" placeholder="Ingrese precio del producto">

                    <label for="descuento_producto" class="form-label text-light mb-0 mt-2">Descuento: </label>
                    <input type="number" name="descuento_producto" step="any" id="descuento_producto"
                        class="form-control mb-2" value="<?php echo $producto['descuento_producto'] ?>"
                        placeholder="Ingrese descuento del producto (si tiene)">

                    <div>
                        <input <?php echo ($producto['producto_promo'] == "1") ? "checked" : "" ?> name="producto_promo"
                            value="1" class="form-check-input" type="checkbox" id="producto_promo"><label
                            for="producto_promo" class="form-label text-light ms-1" style="font-weight:300;">Producto
                            con descuento</label>
                    </div>

                    <textarea type="textarea" class="form-control" name="descripcion_producto" id="descripcion_producto"
                        placeholder="Escribir descripcion" value="<?php echo $producto['descripcion_producto'] ?>"
                        style="resize:none" rows="8" cols="50" require>
                        <?php echo $producto['descripcion_producto'] ?>
                    </textarea>
                </div>

                <div class="right-module">
                    <?php if ($producto['nombre_archivo_producto'] != NULL) ?>
                    <img src="img/<?php echo ($producto['nombre_archivo_producto'] == NULL) ? "format-image.jpg" : $producto['nombre_archivo_producto'] . '.' . $producto['formato_imagen']; ?>"
                        alt="<?php echo ($producto['nombre_archivo_producto'] == NULL) ? "Imagen para el producto a publicar" : "Producto sin imagen para " . $producto['nombre_producto'] ?>">
                    <span class="text-light" style="font-size:12px">Solo se adminten archivos formato .JPG o .JPEG
                        (300px x
                        300px) </span>

                    <label for="nombre_archivo_producto" class="form-label mt-3 text-light mb-0">Adjuntar imagen:
                    </label>
                    <input type="file" id="nombre_archivo_producto" name="nombre_archivo_producto" class="form-control">

                    <div>
                        <button type="submit" class="btn btn-success mt-5"><i
                                class="bi bi-floppy mx-2"></i>Guardar</button>

                        <a href="<?php echo BASE_URL ?>ver_productos.php" class="btn btn-warning mt-5"><i
                                class="bi bi-arrow-left-circle me-2"></i>Volver</a>
                    </div>
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
    <?php require('js/_bootstrap.js') ?>
    <!-- ---IMPORT JS--- -->
</body>

</html>