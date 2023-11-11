<?php

require_once('conf/globalConfig.php');

$_SESSION['usuario'] = null;

header('Location: iniciar_sesion.php');

?>