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



// OBTENER TODOS LOS MENSAJES RECIBIDOS---------------------
// --------------------------------------------
function getContacto(PDO $conexion)
{
    $consulta = $conexion->prepare('
    SELECT id_contacto, nombre, telefono, email, nombre_producto, consulta, newsletter,fecha_consulta, respondido
    FROM contactos
    ');

    $consulta->execute();

    $consultas = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $consultas;
}

// CREAR NUEVO MENSAJE EN CONTACTO---------------------
// --------------------------------------------
function addContacto(PDO $conexion, $contacto)
{
    $consulta = $conexion->prepare('
    INSERT INTO contactos(nombre, telefono, email, nombre_producto, consulta, newsletter,fecha_consulta) 
    VALUES (:nombre, :telefono, :email, :nombre_producto, :consulta, :newsletter, :fecha_consulta)
    ');

    $consulta->bindValue(':nombre', $contacto['nombre']);
    $consulta->bindValue(':telefono', $contacto['telefono']);
    $consulta->bindValue(':email', $contacto['email']);
    $consulta->bindValue(':nombre_producto', $contacto['nombre_producto']);
    $consulta->bindValue(':consulta', $contacto['consulta']);
    $consulta->bindValue(':newsletter', $contacto['newsletter']);
    $consulta->bindValue(':fecha_consulta', $contacto['fecha_consulta']);

    $consulta->execute();
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



// OBTENER CONSULTA POR ID---------------------
// --------------------------------------------
function getConsultaById(PDO $conexion, $id)
{
    $consulta = $conexion->prepare('
    SELECT id_contacto, nombre, telefono, email, nombre_producto, consulta, newsletter, fecha_consulta, respondido
    FROM consultas
    WHERE id_contacto = :id_contacto
    ');

    $consulta->bindValue(':id_contacto', $id);

    $consulta->execute();

    $contactoId = $consulta->fetch(PDO::FETCH_ASSOC);

    return $contactoId;
}


// OBTENER TODOS LOS USUARIOS---------------------
// --------------------------------------------
function getUsuarios(PDO $conexion)
{
    $consulta = $conexion->prepare('
        SELECT id, nombre, email, password, rol
        FROM usuarios
    '); // preparo la consulta
    $consulta->execute(); // ejecuto consulta
    $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC); // recupero la lista

    return $usuarios;
}


// OBTENER USUARIO POR ID---------------------
// --------------------------------------------
function getUsuarioById(PDO $conexion, $id)
{

    $consulta = $conexion->prepare('
        SELECT id,nombre,email,password,rol
        FROM usuarios
        WHERE id = :id
    ');

    $consulta->bindValue(':id', $id);

    $consulta->execute();
    $usuarios = $consulta->fetch(PDO::FETCH_ASSOC); // fetch simple, no all
    return $usuarios;

}
function addUsuario(PDO $conexion, $usuario){

    $consulta = $conexion->prepare('
    INSERT INTO usuarios(nombre, email, password, rol)
    VALUES (:nombre, :email, :password, :rol)
    ');
    $consulta->bindValue(':nombre', $usuario['nombre']);
    $consulta->bindValue(':email', $usuario['email']);
    $consulta->bindValue(':password', $usuario['password']);
    $consulta->bindValue(':rol', $usuario['rol']);
    

    $consulta->execute();
}

function getUsuarioByEmail(PDO $conexion, $email){
    $consulta = $conexion->prepare('
    SELECT id, nombre, email, password, rol
    FROM usuarios
    WHERE email = :email 
    ');

    $consulta->bindValue(':email', $email);

    $consulta->execute();

    return $consulta ->fetch(PDO::FETCH_ASSOC); 
}

// ELIMINAR USUARIO POR ID---------------------
// --------------------------------------------
function deleteUSuario(PDO $conexion, $id)
{
    $consulta = $conexion->prepare('
        DELETE FROM usuarios
        WHERE id = :id
');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
}



// MARCAR MENSAJE RECIBIDO COMO RESPONDIDO---------------------
// --------------------------------------------
function marcarLeido(PDO $conexion, $id_contacto)
{
    $consulta = $conexion->prepare('
    UPDATE contactos
    SET respondido = 1
    WHERE id_contacto = :id_contacto;
');

    $consulta->bindValue(':id_contacto', $id_contacto);
    $consulta->execute();
}

?>