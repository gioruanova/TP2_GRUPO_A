<?php
// OBTENER TODOS LOS USUARIOS---------------------
// --------------------------------------------
function getUsuarios(PDO $conexion)
{
    $consulta = $conexion->prepare('
SELECT id, nombre, email, password, rol, newsletter
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
        SELECT id, nombre, email, password, rol, newsletter
        FROM usuarios
        WHERE id = :id
');

    $consulta->bindValue(':id', $id);

    $consulta->execute();
    $usuarios = $consulta->fetch(PDO::FETCH_ASSOC); // fetch simple, no all
    return $usuarios;

}
function addUsuario(PDO $conexion, $usuario)
{

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

function getUsuarioByEmail(PDO $conexion, $email)
{
    $consulta = $conexion->prepare('
SELECT id, nombre, email, password, rol
FROM usuarios
WHERE email = :email
');

    $consulta->bindValue(':email', $email);

    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
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



function updateUsuario(PDO $conexion, $usuario)
{
    $consulta = $conexion->prepare('
        UPDATE usuarios
        SET
            id = :id,
            nombre = :nombre,
            email = :email,
            password = :password,
            newsletter = :newsletter,
            rol = :rol
        WHERE id = :id
');

    $consulta->bindValue(':id', $usuario['id']);
    $consulta->bindValue(':nombre', $usuario['nombre']);
    $consulta->bindValue(':password', $usuario['password']);
    $consulta->bindValue(':email', $usuario['email']);
    $consulta->bindValue(':newsletter', $usuario['newsletter']);
    $consulta->bindValue(':rol', $usuario['rol']);


    $consulta->execute();

}

?>