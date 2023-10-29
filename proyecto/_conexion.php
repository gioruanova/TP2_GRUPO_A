<?php
$windowsUser = getenv('USERNAME');

$conexionPuerto = 'mysql:host=localhost;dbname=nexgendb;charset=utf8';

if ($windowsUser !== "Giorgio") {
    $conexionPuerto = 'mysql:host=localhost;dbname=nexgendb;charset=utf8;port=3308';
}

try {
    $conexion = new PDO(
<<<<<<< HEAD
        $conexionPuerto,
=======
        'mysql:host=localhost;dbname=nexgendb;charset=utf8;port=3308',
>>>>>>> 07a39151bd399c326f78cad330bf66c461160ed3
        'root',
        ''
    );

} catch (PDOException $e) {
    header('Location: error.php');
}
?>