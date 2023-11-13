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

    if (($contacto['nombre_producto']) == 0) {
        $errores[] = 'Usted debe seleccionar un producto';
    }

    if (empty($contacto['consulta'])) {
        $errores[] = 'Usted debe ingresar una consulta';
    }

    return $errores;

}


function validarProductos($producto)
{
    $errores = [];

    if (empty($producto['nombre_producto'])) {
        $errores[] = 'El nombre es mandatorio';
    }

    if (empty($producto['categoria_producto'])) {
        $errores[] = 'La categoria es mandatoria';
    }

    if (empty($producto['precio_producto'])) {
        $errores[] = 'El precio es mandatorio';
    }

    if ($producto['descuento_producto'] == 0) {
        $producto['descuento_producto'] = 0;
        
    } elseif (empty($producto['descuento_producto'])) {
        $errores[] = 'Si no hay descuento, ingrese 0';
    }
    return $errores;
}


function validarUsuario($usuario)
{
    $errores = [];

    if (empty($usuario['nombre'])) {
        $errores[] = 'Debe ingresar un nombre';
    }

    if (!filter_var($usuario['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Debe ingresar un email valido';
    }

    if (empty($usuario['password'])) {
        $errores[] = 'Es necesario una contraseña';
    }

    return $errores;
}

function validarBanner($mensaje)
{
    $errores = [];

    if (empty($mensaje['mensajeMostrar'])) {
        $mensaje[] = 'Debe ingresar un nombre';
    }


    return $errores;
}