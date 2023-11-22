<?php

// CONEXION A PRODUCTOS---------------------
// --------------------------------------------
function getProductos(PDO $conexion)
{
    $consulta = $conexion->prepare('
        SELECT id_producto, nombre_producto, descripcion_producto, categoria_producto, precio_producto, descuento_producto, nombre_archivo_producto,formato_imagen, producto_promo FROM productos
    '); // preparo la consulta
    $consulta->execute(); // ejecuto consulta
    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC); // recupero la lista
    return $productos;
}

// OBTENER NOMBRE PRODUCTOS---------------------
// --------------------------------------------
function getNombreProducto(PDO $conexion)
{
    $consulta = $conexion->prepare('
    SELECT  id_producto, nombre_producto FROM productos
    ');
    $consulta->execute();
    $nombreProducto = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $nombreProducto;
}

// OBTENER PRODUCTO POR ID---------------------
// --------------------------------------------
function getProductoById(PDO $conexion, $id)
{
    $consulta = $conexion->prepare('
        SELECT id_producto, nombre_producto, descripcion_producto, categoria_producto, precio_producto, descuento_producto, nombre_archivo_producto,formato_imagen, producto_promo
        FROM productos
        WHERE id_producto = :id
    ');

    $consulta->bindValue(':id', $id);

    $consulta->execute();
    $productos = $consulta->fetch(PDO::FETCH_ASSOC); // fetch simple, no all
    return $productos;

}


// AGREGAR NUEVO PRODUCTO---------------------
// --------------------------------------------
function addProducto(PDO $conexion, $producto)
{
    $consulta = $conexion->prepare('

        INSERT INTO productos(nombre_producto, descripcion_producto, categoria_producto, precio_producto, descuento_producto, nombre_archivo_producto,formato_imagen, producto_promo)
        VALUES(:nombre_producto, :descripcion_producto, :categoria_producto, :precio_producto, :descuento_producto, :nombre_archivo_producto, :formato_imagen, :producto_promo)
');

    $consulta->bindValue(':nombre_producto', $producto['nombre_producto']);
    $consulta->bindValue(':descripcion_producto', $producto['descripcion_producto']);
    $consulta->bindValue(':categoria_producto', $producto['categoria_producto']);
    $consulta->bindValue(':precio_producto', $producto['precio_producto']);
    $consulta->bindValue(':descuento_producto', $producto['descuento_producto']);
    $consulta->bindValue(':nombre_archivo_producto', $producto['nombre_archivo_producto']);
    $consulta->bindValue(':formato_imagen', $producto['formato_imagen']);
    $consulta->bindValue(':producto_promo', $producto['producto_promo']);

    $consulta->execute();
}


// BORRAR PRODUCTO  POR ID---------------------
// --------------------------------------------
function deleteProducto(PDO $conexion, $id)
{
    $consulta = $conexion->prepare('
        DELETE FROM productos
        WHERE id_producto = :id
');

    $consulta->bindValue(':id', $id);

    $consulta->execute();

}

// ACTUALIZAR PRODUCTO POR ID---------------------
// --------------------------------------------
function updateProducto(PDO $conexion, $producto)
{
    $consulta = $conexion->prepare('
        UPDATE productos
        SET
        nombre_producto = :nombre_producto,
        descripcion_producto = :descripcion_producto,
        categoria_producto = :categoria_producto,
        precio_producto = :precio_producto,
        descuento_producto = :descuento_producto,
        nombre_archivo_producto = :nombre_archivo_producto,
        formato_imagen = :formato_imagen,
        producto_promo = :producto_promo
        WHERE id_producto = :id_producto

');

    $consulta->bindValue(':nombre_producto', $producto['nombre_producto']);
    $consulta->bindValue(':descripcion_producto', $producto['descripcion_producto']);
    $consulta->bindValue(':categoria_producto', $producto['categoria_producto']);
    $consulta->bindValue(':precio_producto', $producto['precio_producto']);
    $consulta->bindValue(':descuento_producto', $producto['descuento_producto']);
    $consulta->bindValue(':nombre_archivo_producto', $producto['nombre_archivo_producto']);
    $consulta->bindValue(':formato_imagen', $producto['formato_imagen']);
    $consulta->bindValue(':producto_promo', $producto['producto_promo']);
    $consulta->bindValue(':id_producto', $producto['id_producto']);

    $consulta->execute();

}


?>