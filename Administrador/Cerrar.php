<?php
require '../configuraciones.php';
session_start();
session_destroy();
$_SESSION=array();
header('Location:'.ruta.'/Administrador/Login.php');
?>