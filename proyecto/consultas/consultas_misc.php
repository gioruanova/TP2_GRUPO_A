<?php
// OBTENER MENSAJE GENERICO---------------------
// --------------------------------------------

function getMensajeBanner(PDO $conexion, $id)
{

    $consulta = $conexion->prepare('
    SELECT id, mensajeMostrar, indicador, finalizacionMensaje
    FROM bannermensaje
    WHERE id = :id
');

    $consulta->bindValue(':id', $id);

    $consulta->execute();
    $bannerMensaje = $consulta->fetch(PDO::FETCH_ASSOC); // fetch simple, no all
    return $bannerMensaje;

}

// UPDATE MENSAJE GENERICO
// ---------------------------

function updateMensajeBanner(PDO $conexion, $mensaje)
{
    $consulta = $conexion->prepare('
        UPDATE bannermensaje
        SET
        id = :id,
        mensajeMostrar = :mensajeMostrar,
        indicador = :indicador,
        finalizacionMensaje = :finalizacionMensaje
        WHERE id = :id
');

    $consulta->bindValue(':id', $mensaje['id']);
    $consulta->bindValue(':mensajeMostrar', $mensaje['mensajeMostrar']);
    $consulta->bindValue(':indicador', $mensaje['indicador']);
    $consulta->bindValue(':finalizacionMensaje', $mensaje['finalizacionMensaje']);


    $consulta->execute();

}

?>