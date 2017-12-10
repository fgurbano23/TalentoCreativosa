<?php 
require_once("funciones.php");
require_once("configuraciones.php");
$conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
if(!$conexion){
    die();
} 
    $noticias=obtener_N(3,$conexion);
    //print_r($noticias);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Talento Creativo Consultores</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_noticias.css">
</head>
<body>
	<?php require_once("header.php"); ?>
	<div class="franja_contenedora center-block">
		<div class="fondo_titulo">
			<h2>Noticias de interés</h2>
		</div>
	</div>
	<br>
	<br>
	<div class="container cursos">
		<?php foreach ($noticias as $noticia):   ?>
		<div class="col-md-3 curso">
			<div>
				<h2><?php  echo $noticia['titulo']; ?></h2>
				<p class="curso1">	
					<?php echo $noticia['abstracto']; ?>
				</p>
			</div>
			<a href="single_noticia.php?nid=<?php echo $noticia['id'];?>" class="btn btn-success center-block">Ver Noticia <span class="glyphicon glyphicon-education"></span></a>
			<br>
		</div>
		<?php endforeach; ?>
		<?php require("paginacion_n.php");?>
	</div>	
<?php require_once("footer.php"); ?>
</body>
</html>
<?php $conexion=null; ?>