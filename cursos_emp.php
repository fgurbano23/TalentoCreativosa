<?php 
require_once("funciones.php");
require_once("configuraciones.php");
$conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
if(!$conexion){
    die();
} 
    $cursos=obtener_CE(3,$conexion);
    //print_r($cursos);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Talento Creativo Consultores</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_cursos_emp.css">
</head>
<body>
	<?php require_once("header.php"); ?>
	<div class="franja_contenedora center-block">
		<div class="fondo_titulo">
			<h2>Nuestros cursos</h2>
		</div>
	</div>
	<br>
	<div class="container a_cursos">
		<h2 align="left">
			<a href="cursos.php"><span class="glyphicon glyphicon-hand-left"></span> Cursos / Particulares </a>
		</h2>
	</div>
	<div class="container cursos">
		<?php foreach ($cursos as $curso):   ?>
		<div class="col-md-3 curso">
			<div>
				<h2><?php  echo $curso['titulo']; ?></h2>
				<p class=" curso1"><?php echo $curso['resumen']; ?></p>
			</div>
			<a href="single_curso.php?cid=<?php echo $curso['id'];?>" class="btn btn-success center-block">Ver Curso <span class="glyphicon glyphicon-education"></span></a>
			<br>
		</div>
		<?php endforeach; ?>
		<?php require("paginacion_ce.php");?>
	</div>	
<?php require_once("footer.php"); ?>
</body>
</html>