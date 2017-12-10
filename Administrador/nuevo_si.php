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
	if ($_SERVER['REQUEST_METHOD']=='POST' && !empty($_FILES)) {
		$check=@getimagesize($_FILES['foto']['tmp_name']);//getimagesize es para verificar que suban imagenes	
		if ($check!==false) {
			$carpeta_destino='../img/switch/';
			$archivo_subido=$carpeta_destino . $_FILES['foto']['name'];
			move_uploaded_file($_FILES['foto']['tmp_name'],$archivo_subido);//con esto podemos subir las fotos a lam carpeta
			$statement=$conexion->prepare('INSERT INTO switch_bd(imagen) VALUES(:imagen)');
			$statement->execute(array(':imagen'=>$_FILES['foto']['name'],));
			$statement=null;
			header('Location:'.ruta.'/Administrador/switchimagenes_admin.php');
		}else{
			$error="El archivo no es una imagen o el archivo es muy pesado";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nueva Imagen</title>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / <a href=<?php echo ruta.'/Administrador/switchimagenes_admin.php';?>>Switch Imagenes</a> / Nueva Switch Imagen
                </h2>
            </div>
            <div class="col-md-6 col-xs-6 c5">  
                <a href=<?php echo ruta.'/Administrador/switchimagenes_admin.php';?> class="btn btn-lg btn-default">Volver</a>
            </div>
            <div class="col-md-6 col-xs-6 c3">
                <a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 col-xs-12 c6">
            	<article>
					<h2 class="h2">Nueva Switch Imagen</h2>
					<form class="form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
						<div class="form-group">
							<label for="foto"> Selecciona tu foto</label>
	 						<input type="file" id="foto" name="foto">
						</div>
						<?php if(isset($error)):?><!---MODAL......................................-->
	 						<p class="error"><?php echo $error;  ?></p>
	 					<?php endif?>
						<input class="btn btn-lg btn-default" type="submit" value="Subir imagen">
					</form>
				</article>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>