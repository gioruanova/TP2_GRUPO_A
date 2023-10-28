<?php
<<<<<<< HEAD
require_once('_conexion.php');
require_once('./consultas/consultas_productos.php');
require_once('./funciones/funciones_input.php');
$nombreProducto = getNombreProducto($conexion);


// Realmente no esta validando nada, saludos !! =)
$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $errores = validarContacto($nombreProducto);

    if( count($errores) == 0 ){
        
        header('Location: mensajeEnviado.php');

    }

}


=======

require_once('_conexion.php');
require_once('consultas/consultas_productos.php');
$productos = getProductos($conexion);

if (isset($_GET['id'])) {
    $producto = getProductoById($conexion, $_GET['id']);
    $productoAConsultar = "Llego al form de contacto desde algun producto que venia viiendo y mostraria en el titulo del form > " . $producto['nombre_producto'];
    echo $productoAConsultar;

} else {
    
    $productoAConsultar = "aca podemos meter alguna logica para que en vez del nombre del producto, armemos el select que vos decias o algo parecido";
    echo $productoAConsultar;
}

>>>>>>> 20d526faac5472309bad009b6e8c41974502f0cd
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
            
                                <?php foreach($errores as $error): ?>
                                    <li class="text text-danger"> <?php echo $error ?> </li>
                                <?php endforeach ?>
                            </ul>

        <form action="mensajeEnviado.php" method="post">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del producto" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el precio del producto" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el descuento del producto" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="producto" class="form-label">Seleccione producto a consultar</label>
                                    <select type="select" class="form-control" name="producto" id="producto">
                                        <option value="0">Seleccione</option>
                                        <?php 
                                        foreach($nombreProducto as $nombre){
                                            // AGREGAR EL VALUE CON EL NOMBRE DEL PRODUCTO
                                            echo "<option>".$nombre['nombre_producto']."</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="comentarios" class="form-label">Consulta</label>
                                    <textarea type="textarea" class="form-control" name="comentarios" id="comentarios" placeholder="Escriba su consulta" value="" ></textarea>
                                </div>
                                <button type="submit" class="btn btn-success"> Enviar </button>
                    
                                <a href="index.php" class="btn btn-danger"> Cancelar </a>
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