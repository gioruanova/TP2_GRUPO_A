<?php

function redireccionarUsuario(){
    if (isset($_SESSION['usuario'])){
        if ($_SESSION['usuario']['rol'] == 'Usuario') {
            header('Location: index.php');
        }
    }else{
        header('Location: index.php');
    }
}

function isNotAdmin(){
    if ($_SESSION['usuario']['rol'] !== 'Admin') {
        header('Location: index.php');
    }
}

?>