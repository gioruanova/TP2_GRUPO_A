<?php

session_start();

$puerto='8080'; // En caso de error, probar puerto 80

define('BASE_URL', 'http://localhost:'.$puerto.'/TP2_GRUPO_A/proyecto/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'nexgendb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
