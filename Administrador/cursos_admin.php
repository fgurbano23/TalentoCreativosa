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
    $cursos=obtener_C(4,$conexion);
    //print_r($consulta);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panel de Control / Cursos</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / Cursos
                </h2>
            </div>
            <div class="col-md-6 col-xs-6 c5">  
                <a href=<?php echo ruta.'/Administrador/nuevo_c.php';?> class="btn btn-lg btn-default">Nuevo Curso</a>
            </div>
            <div class="col-md-6 col-xs-6 c3">
                <a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
            </div>
			<div class="col-md-12">
				<?php foreach ($cursos as $curso):   ?>
		 		<div class="col-md-6 col-sm-12 c4">
					<article>
						<h2><?php echo $curso['titulo'];?></h2>
                        <p><?php echo $curso['dirigido'];  ?> </p>
						<p><?php echo $curso['resumen'];  ?> </p>
	 					<a class="Enlaces btn-lg btn btn-primary" href="editarC.php?cid=<?php echo $curso['id'];?>">Editar</a>
	 					<a class="Enlaces btn-lg btn btn-primary" href="curso_single.php?cid=<?php echo $curso['id'];?>">Ver</a>
		 				<a class="Enlaces btn-lg btn btn-primary" href="eliminarC.php?cid=<?php echo $curso['id'];?>">Eliminar</a>
		 			</article>
		 		</div>
		 		<?php endforeach; ?>	
			</div>
        </div>
    </div>	
<?php require 'paginacion_c.php';  ?>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
	$conexion=null;
?>


