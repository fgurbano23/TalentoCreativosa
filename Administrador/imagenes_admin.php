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
    $imagenes=obtener_I(4,$conexion);
   	// print_r($imagenes);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel de Control / Imagenes</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / Imagenes
                </h2>
            </div>
            <div class="col-md-6 col-xs-6 c5">  
                <a href=<?php echo ruta.'/Administrador/nuevo_i.php';?> class="btn btn-lg btn-default">Nueva Imagen</a>
            </div>
            <div class="col-md-6 col-xs-6 c3">
                <a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
            </div>
			<?php foreach ($imagenes as $imagen):?>
				<div class="col-md-6 col-xs-12 c7">
					<article>
						<img src="../img/galeria/<?php echo $imagen['imagen'];?>" class="img-responsive">
		 				<a class="btn btn-lg btn-default btn-block " href="eliminarI.php?Iid=<?php echo $imagen['id'];?>">Eliminar</a>
		 			</article>
		 		</div>
		 	<?php endforeach; ?>
        </div>
    </div>
<?php require 'paginacion_i.php';  ?>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conexion=null;
?>
