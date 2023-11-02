<?php

// CONEXION
function getProductos(PDO $conexion)
{
    $consulta = $conexion->prepare('
        SELECT id_producto, nombre_producto, descripcion_producto, categoria_producto, precio_producto, descuento_producto, nombre_archivo_producto,formato_imagen, producto_promo FROM productos
    '); // preparo la consulta
    $consulta->execute(); // ejecuto consulta
    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC); // recupero la lista
    return $productos;
}

function getNombreProducto(PDO $conexion)
{
    $consulta = $conexion->prepare('
    SELECT  id_producto, nombre_producto FROM productos
    ');
    $consulta->execute();
    $nombreProducto = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $nombreProducto;
}

// MOSTRAR PRODUCTO POR ID
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


// Primero agrego un get a cosultas

function getContacto(PDO $conexion){
    $consulta = $conexion->prepare('
    SELECT id, nombre, telefono, email, nombre_producto, consulta, newsletter
    FROM contactos
    ');

    $consulta->execute();

    $consultas = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $consultas;
}

// Agregar consulta a la base de datos, recopilacion de datos

function addContacto(PDO $conexion, $contacto){
    $consulta = $conexion->prepare('
    INSERT INTO contactos(nombre, telefono, email, nombre_producto, consulta, newsletter) 
    VALUES (:nombre, :telefono, :email, :nombre_producto, :consulta, :newsletter)
    ');

    $consulta->bindValue(':nombre', $contacto['nombre']);
    $consulta->bindValue(':telefono', $contacto['telefono']);
    $consulta->bindValue(':email', $contacto['email']);
    $consulta->bindValue(':nombre_producto', $contacto['nombre_producto']);
    $consulta->bindValue(':consulta', $contacto['consulta']);
    $consulta->bindValue(':newsletter', $contacto['newsletter']);


    $consulta->execute();
}



// Function para buscar una consulta por su ID : Listo para entrega final

// function getConsultaById(PDO $conexion, $id){
//     $consulta = $conexion->prepare('
//     SELECT id, nombre, telefono, email, nombre_producto, consulta
//     FROM consultas
//     WHERE id = :id
//     ');

//     $consulta->bindValue(':id', $id);

//     $consulta->execute();

//     $contacto = $consulta->fetch(PDO::FETCH_ASSOC);

//     return $contacto;
// }


?>