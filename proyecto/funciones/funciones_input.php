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

    if( empty($$contacto['nombre']) ){
        $errores[] = 'Usted debe ingresar un nombre';
    }

    if( !is_numeric($contacto['telefono']) ){
        $errores[] = 'Usted debe ingresar un telefono';
    }

    if( !is_numeric($contacto['email']) ){
        $errores[] = 'Usted debe ingresar un email';
    }

    if( empty($contacto['nombre_producto']) ){
        $errores[] = 'Usted debe seleccionar un producto';
    }

    if( empty($contacto['consulta']) ){
        $errores[] = 'Usted debe ingresar una consulta';
    }

    return $errores;

}