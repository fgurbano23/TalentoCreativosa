<?php 
require '../configuraciones.php';
require '../funciones.php';
$conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
if(!$conexion){
  	die();
} 
$id_noticia=id_casteo($_GET['nid']);//cid curso id
if (empty($id_noticia)) {
	header('Location:'.ruta.'/Administrador/noticias_admin.php');
}
$noticia=obtener_Noticia($id_noticia,$conexion);
if (!$noticia) {
    header('Location:'.ruta.'/Administrador/noticias_admin.php');
}
$noticia=$noticia[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Noticia</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / <a href=<?php echo ruta.'/Administrador/noticias_admin.php';?>>Noticias</a> / Ver Noticia
                </h2>
            </div>
            <div class="col-md-6 col-xs-6 c5">  
                <a href=<?php echo ruta.'/Administrador/noticias_admin.php';?> class="btn btn-lg btn-default">Volver</a>
            </div>
            <div class="col-md-6 col-xs-6 c3">
                <a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
            </div>
			<div class="col-md-2"></div>
			<div class="col-md-8 col-xs-12 c6">
				<article>
					<h2><?php echo $noticia['titulo'];?></h2>
					<p><?php echo $noticia['autor']; ?> </p>
					<p><?php echo fecha($noticia['fecha']); ?> </p>
					<p><?php echo $noticia['abstracto']; ?> </p>
					<p><?php echo nl2br($noticia['contenido']);?></p><!--respeta los saltos de linea-->
				</article>
			</div>
			<div class="col-md-2"></div>
		</div>	
	</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>	
</body>
</html>
<?php
$conexion=null;
?>