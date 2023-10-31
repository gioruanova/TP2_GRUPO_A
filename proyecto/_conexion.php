<?php
$windowsUser = getenv('USERNAME');
var_dump($windowsUser);

// DB NAME
$dbName = 'nexgendb';
$conexionVariable = 'mysql:host=localhost;dbname=' . $dbName . ';charset=utf8';



if ($windowsUser == "Giorgio") {
    $conexionVariable = 'mysql:host=localhost;dbname=' . $dbName . ';charset=utf8'; // Conexion test env en base a settings de Giorgio

} elseif ($windowsUser !== "Manu") {
    $conexionVariable = 'mysql:host=localhost;dbname=' . $dbName . ';charset=utf8;port=3308'; // Conexion test env en base a settings de Manu

} elseif ($windowsUser !== "DESKTOP-UD2T2NO") {
    $conexionVariable = 'mysql:host=localhost;dbname=' . $dbName . ';charset=utf8;port=3306'; // Conexion test env en base a settings de Eric

} else {
    $conexionVariable = 'mysql:host=localhost;dbname=' . $dbName . ';charset=utf8'; // Conexion test env en base a settings generica

}

try {
    $conexion = new PDO(
        $conexionVariable,
        'root',
        ''
    );

} catch (PDOException $e) {
    header('Location: error.php');

}
?>