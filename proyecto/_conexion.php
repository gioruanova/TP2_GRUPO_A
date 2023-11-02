<?php
$windowsUser = getenv('USERNAME');

// DB NAME

$conexionVariable = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
$puertoParaInvitado=''; // <----Completar puerto en caso de no poder conectarse


if ($windowsUser == "Giorgio") {
     // Conexion test env en base a settings de Giorgio
    $conexionVariable = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';

} elseif ($windowsUser == "Manu43") {
    // Conexion test env en base a settings de Manu
    $conexionVariable = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;port=3308'; 

} elseif ($windowsUser == "DESKTOP-UD2T2NO") {
    // Conexion test env en base a settings de Eric
    $conexionVariable = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;port=3306'; 

} else {
    // Conexion test env en base a settings generica
    $conexionVariable = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8' . ($puertoParaInvitado == '' ? '' : ';port=' . $puertoParaInvitado);
  
}   

try {
    $conexion = new PDO(
        $conexionVariable,
        DB_USER,
        DB_PASSWORD
    );

} catch (PDOException $e) {
    header('Location: error.php');

}
