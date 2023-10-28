<?php

// CONEXION
function getProductos(PDO $conexion)
{
    $consulta = $conexion->prepare('
        SELECT id_producto, nombre_producto, descripcion_producto, categoria_producto, precio_producto, descuento_producto, nombre_archivo_producto,producto_promo FROM productos
    '); // preparo la consulta
    $consulta->execute(); // ejecuto consulta
    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC); // recupero la lista
    return $productos;
}

function getNombreProducto(PDO $conexion)
{
    $consulta = $conexion->prepare('
    SELECT  nombre_producto FROM productos
    ');
    $consulta->execute();
    $nombreProducto = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $nombreProducto;
}

// MOSTRAR PRODUCTO POR ID
function getProductoById(PDO $conexion, $id)
{

    $consulta = $conexion->prepare('
        SELECT id_producto, nombre_producto, descripcion_producto, categoria_producto, precio_producto, descuento_producto, nombre_archivo_producto,producto_promo
        FROM productos
        WHERE id_producto = :id
    ');

    $consulta->bindValue(':id', $id);

    $consulta->execute();
    $productos = $consulta->fetch(PDO::FETCH_ASSOC); // fetch simple, no all
    return $productos;

}


?>