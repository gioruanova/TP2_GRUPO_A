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

    if( empty($contacto['nombre']) ){
        $errores[] = 'Usted debe ingresar un nombre';
    }

    if( !is_numeric($contacto['telefono']) ){
        $errores[] = 'Usted debe ingresar un telefono';
    }

    if( empty($contacto['email']) ){
        $errores[] = 'Usted debe ingresar un email';
    }
    // Compare a 0 porque por default el Seleccionar tiene value 0 y los demas tienen su nombre
    if( ($contacto['nombre_producto']) == 0 ){
        $errores[] = 'Usted debe seleccionar un producto';
    }

    if( empty($contacto['consulta']) ){
        $errores[] = 'Usted debe ingresar una consulta';
    }

    return $errores;

}