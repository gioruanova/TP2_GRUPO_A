<?php
$windowsUser = getenv('USERNAME');

$conexionPuerto = 'mysql:host=localhost;dbname=nexgendb;charset=utf8';

if ($windowsUser == "Giorgio") {
    $conexionPuerto = 'mysql:host=localhost;dbname=nexgendb;charset=utf8';

} elseif ($windowsUser !== "Manu") {
    $conexionPuerto = 'mysql:host=localhost;dbname=nexgendb;charset=utf8;port=3308';
    
} else {
    $conexionPuerto = 'mysql:host=localhost;dbname=nexgendb;charset=utf8';

}

try {
    $conexion = new PDO(
        $conexionPuerto,
        'root',
        ''
    );

} catch (PDOException $e) {
    header('Location: error.php');
}
?>