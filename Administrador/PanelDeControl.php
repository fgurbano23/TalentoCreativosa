<?php session_start();
require '../configuraciones.php';
if (!isset($_SESSION['Administrador'])) {
  	header('Location:'.ruta.'/Administrador/Login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel de control</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/PanelDeControl.css" rel="stylesheet">
  	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 c1">
				<h2>Panel de Control</h2>
			</div>
			<div class="col-md-9 col-sm-3">	
			</div>
			<div class="col-md-3 col-sm-9 c3">
				<a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
			</div>
			<div class="col-md-6 col-sm-12 c2">
				<a href=<?php echo ruta.'/Administrador/cursos_admin.php';?> class="btn btn-lg btn-default btn-block">Cursos</a>
				<a href=<?php echo ruta.'/Administrador/noticias_admin.php';?> class="btn btn-lg btn-default btn-block">Noticias</a>
				<a href=<?php echo ruta.'/Administrador/imagenes_admin.php';?> class="btn btn-lg btn-default btn-block">Imagenes</a>
				<a href=<?php echo ruta.'/Administrador/switchimagenes_admin.php';?> class="btn btn-lg btn-default btn-block">switch imagenes</a>
			</div>		
			<div class="col-md-6 col-sm-12 c4">
				<img src="../img/general/logo.jpg" class="img-responsive">
			</div>
		</div>
	</div>	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>