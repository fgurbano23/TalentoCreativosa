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
   	if($_SERVER['REQUEST_METHOD']=='POST'){
   	$titulo=$_POST['titulo'];
    $autor=$_POST['autor'];
   	$abstracto=$_POST['abstracto'];
   	$contenido=$_POST['contenido'];
   	$consulta=$conexion->prepare('INSERT INTO noticias_bd(id,titulo,autor,abstracto,contenido,fecha) VALUES(null,:titulo,:autor,:abstracto,:contenido,null)');
   	$consulta->execute(array(':titulo'=>$titulo,':autor'=>$autor,':abstracto'=>$abstracto,':contenido'=>$contenido));
  	$consulta=null;
   	$conexion=null;
   	header('Location:'.ruta.'/Administrador/noticias_admin.php');
   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nueva Noticia</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	 <div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / <a href=<?php echo ruta.'/Administrador/noticias_admin.php';?>>Noticias</a> / Crear Noticia
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
				   <h2 class="h2">Nueva Noticia</h2>
				   <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				       <div class="form-group"><input class="form-control" required="required" type="text" name="titulo" placeholder="Titulo de la noticia"></div>
                       <div class="form-group"><input class="form-control" required="required" type="text" name="autor" placeholder="Autor"></div>
				       <div class="form-group"><input class="form-control" required="required" type="text" name="abstracto" placeholder="Abstracto"></div>
				       <div class="form-group"><textarea class="form-control" required="required" name="contenido" placeholder="Contenido"></textarea></div>
				       <input class="btn btn-lg btn-default" type="submit" value="Crear Noticia">
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