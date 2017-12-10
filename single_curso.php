<?php 
require 'configuraciones.php';
require 'funciones.php';
$conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
if(!$conexion){
  	die();
} 
$id_noticia=id_casteo($_GET['cid']);//cid curso id
if (empty($id_noticia)) {
	header('Location:'.ruta.'/cursos.php');
}
$curso=obtener_Curso($id_noticia,$conexion);
if (!$curso) {
    header('Location:'.ruta.'/cursos.php');
}
$curso=$curso[0];
$conexion=null;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Talento Creativo</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Italianno" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_single_curso.css">
</head>
<body>
	<?php require_once("header.php"); ?>
	<div class="franja_contenedora center-block">
		<div class="fondo_titulo">
			<h2><?php echo $curso['titulo'];?></h2>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="row fondo_curso">
			<div class="col-md-6 especificacion_curso">
				<h3> <?php echo 'Duración del curso: '.$curso['duracion'].' '.$curso['tduracion'];?> </h3>
				<h3><?php echo 'Dirijido a: '.$curso['dirigido'];?></h3>
				<p><?php echo nl2br($curso['contenido']);?></p>
			</div>
		</div>
	</div>
<?php require_once("footer.php"); ?>
</body>
</html>