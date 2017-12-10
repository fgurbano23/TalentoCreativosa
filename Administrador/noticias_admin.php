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
    $noticias=obtener_N(4,$conexion);
    //print_r($noticias);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel de Control / Noticias</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 c1">
				<h2>
					<a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / Noticias
				</h2>
			</div>
			<div class="col-md-6 col-xs-6 c5">	
				<a href="nuevo_n.php" class="btn btn-lg btn-default">Nueva noticia</a>
			</div>
			<div class="col-md-6 col-xs-6 c3">
				<a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
			</div>
			<div class="col-md-12">
				<?php foreach ($noticias as $noticia):   ?>
				<div class="col-md-6 col-sm-12 c4">
					<article>
						<h2><?php echo $noticia['titulo'];?></h2>
						<p><?php echo $noticia['autor'];?> </p>
						<p><?php echo $noticia['abstracto'];?> </p>
	 					<div class="btn-group">
	 						<a class="Enlaces btn-lg btn btn-primary" href="editarN.php?nid=<?php echo $noticia['id'];?>">Editar</a>
	 						<a class="Enlaces btn-lg btn btn-primary" href="noticia_single.php?nid=<?php echo $noticia['id'];?>">Ver</a>
		 					<a class="Enlaces btn-lg btn btn-primary" href="eliminarN.php?nid=<?php echo $noticia['id'];?>">Eliminar</a>
		 				</div>
		 			</article>
		 		</div>
		 		<?php endforeach; ?>
			</div>	
		</div>
	</div>
<?php require 'paginacion_n.php';  ?>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
	$conexion=null;
?>