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


// Primero agrego un get a cosultas

function getContacto(PDO $conexion){
    $consulta = $conexion->prepare('
    SELECT id, nombre, telefono, email, nombre_producto
    FROM contactos
    ');

    $consulta->execute();

    $consultas = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $consultas;
}

// Agregar consulta a la base de datos, recopilacion de datos

function addContacto(PDO $conexion, $contacto){
    $consulta = $conexion->prepare('
    INSERT INTO contactos(nombre_contacto, telefono_contacto, email_contacto, nombre_producto_contacto, consulta_contacto) 
    VALUES (:nombre_contacto, :telefono_contacto, :email_contacto, :nombre_producto_contacto, :consulta_contacto)
    ');

    $consulta->bindValue(':nombre_contacto', $contacto['nombre_contacto']);
    $consulta->bindValue(':telefono_contacto', $contacto['telefono_contacto']);
    $consulta->bindValue(':email_contacto', $contacto['email_contacto']);
    $consulta->bindValue(':nombre_producto_contacto', $contacto['nombre_producto_contacto']);
    $consulta->bindValue(':consulta_contacto', $contacto['consulta_contacto']);


    $consulta->execute();
}

// Function para buscar una consulta por su ID

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