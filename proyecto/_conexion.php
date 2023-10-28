<?php
// mysqli(); // Solo sirve para MYSQL
try {
    $conexion = new PDO(
        'mysql:host=localhost;dbname=nexgendb;charset=utf8',
        'root',
        ''
    );

} catch (PDOException $e) {
    header('Location: error.php');
}
?>