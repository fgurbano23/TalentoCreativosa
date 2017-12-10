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
    $imagenes=obtener_SI(6,$conexion);
   // print_r($imagenes);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel de Control /Switch Imagenes</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / Switch Imagenes
                </h2>
            </div>
            <div class="col-md-6 col-xs-6 c5">  
            	<?php if (numero_SI($conexion)<6): ?>
                	<a href=<?php echo ruta.'/Administrador/nuevo_si.php';?> class="btn btn-lg btn-default">Nueva Switch Imagen</a>
                <?php else: ?>
					<p>Ya hay 6 imagenes</p>
				<?php endif;?>
            </div>
            <div class="col-md-6 col-xs-6 c3">
                <a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
            </div>
            <?php foreach ($imagenes as $imagen):   ?>
				<div class="col-md-6 col-xs-12 c7">	
					<article>
						<img src="../img/switch/<?php echo $imagen['imagen']?>" class="img-responsive">
		 				<a class="btn btn-lg btn-default btn-block" href="eliminarSI.php?SIid=<?php echo $imagen['id'];?>">Eliminar</a>
		 			</article>
		 		</div>
		 	<?php endforeach; ?>
        </div>
    </div>
  		<div class="col-md-12">
		 	<div class="">
				
			</div>	
		</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conexion=null;
?>
