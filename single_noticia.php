<?php 
require 'configuraciones.php';
require 'funciones.php';
$conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
if(!$conexion){
  	die();
} 
$id_noticia=id_casteo($_GET['nid']);//cid curso id
if (empty($id_noticia)) {
	header('Location:'.ruta.'/noticias.php');
}
$noticia=obtener_Noticia($id_noticia,$conexion);
if (!$noticia) {
    header('Location:'.ruta.'/noticias.php');
}
$noticia=$noticia[0];
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
	<link rel="stylesheet" type="text/css" href="css/style_single_noticia.css">
</head>
<body>
	<?php require_once("header.php"); ?>
	<div class="franja_contenedora center-block">
		<div class="fondo_titulo">
			<h2><?php echo $noticia['titulo'];?></h2>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="row fondo_curso">
			<div class="col-md-6 especificacion_curso">
				<h3><?php echo fecha($noticia['fecha']);?></h3>
				<h3><?php echo $noticia['autor'];?></h3>
				<p><?php echo nl2br($noticia['contenido']);?></p>
			</div>
		</div>
	</div>
<?php require_once("footer.php"); ?>
</body>
</html>