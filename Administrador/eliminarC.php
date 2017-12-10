<?php session_start();
require '../configuraciones.php';
require '../funciones.php';
if (!isset($_SESSION['Administrador'])) {
    header('Location:'.ruta.'/Administrador/login.php');
}else{
    $conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
	if(!$conexion){
    	die();
	}
}
$id=$_GET['cid'];
if (!$id) {
	header('Location:'.ruta.'/Administrador/cursos_admin.php');
}
$consulta=$conexion->prepare('DELETE FROM cursos_bd WHERE id= :id');
$consulta->execute(array('id'=>$id));
	   	header('Location:'.ruta.'/Administrador/cursos_admin.php');

?>
