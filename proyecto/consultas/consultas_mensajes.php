<?php 
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

// ----------------------------------------------------------------------------------
// ADMIN---------------
// ----------------------------------------------------------------------------------
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