<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validarContacto($contacto)
{

    $errores = [];

    if (empty($contacto['nombre'])) {
        $errores[] = 'Usted debe ingresar un nombre';
    }

    if (!filter_var($contacto['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El formato del E-Mail no es valido';
    }

    // Compare a 0 porque por default el Seleccionar tiene value 0 y los demas tienen su nombre
    if (($contacto['nombre_producto']) == 0) {
        $errores[] = 'Usted debe seleccionar un producto';
    }

    if (empty($contacto['consulta'])) {
        $errores[] = 'Usted debe ingresar una consulta';
    }

    return $errores;

}