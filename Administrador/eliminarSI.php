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
$id=$_GET['SIid'];
if (!$id) {
	header('Location:http:'.ruta.'/Administrador/switchimagenes_admin.php');
}
$resultado=$conexion->query("SELECT * FROM switch_bd WHERE id=$id LIMIT 1");
$resultados=$resultado->fetchALL();
$resultados=$resultados[0];
$resultado=null;
$consulta=$conexion->prepare('DELETE FROM switch_bd WHERE id= :id');
$consulta->execute(array('id'=>$id));
	unlink("../img/switch/".$resultados[1]);
	header('Location:'.ruta.'/Administrador/switchimagenes_admin.php');
?>