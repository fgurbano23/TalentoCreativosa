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
   	$dirigido=$_POST['dirigido'];
   	$duracion=$_POST['duracion'];
   	$tduracion=$_POST['tduracion'];
   	$resumen=$_POST['resumen'];
   	$contenido=$_POST['contenido'];
   	$consulta=$conexion->prepare('INSERT INTO cursos_bd(id,titulo,contenido,resumen,duracion,tduracion,dirigido) VALUES(null,:titulo,:contenido,:resumen,:duracion,:tduracion,:dirigido)');
   	$consulta->execute(array(':titulo'=>$titulo,':contenido'=>$contenido,':resumen'=>$resumen,':duracion'=>$duracion,':tduracion'=>$tduracion,':dirigido'=>$dirigido));
  	$consulta=null;
   	$conexion=null;
   	header('Location:'.ruta.'/Administrador/cursos_admin.php');
   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Curso</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
	<div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / <a href=<?php echo ruta.'/Administrador/cursos_admin.php';?>>Cursos</a> / Crear Curso
                </h2>
            </div>
            <div class="col-md-6 col-xs-6 c5">  
                <a href=<?php echo ruta.'/Administrador/cursos_admin.php';?> class="btn btn-lg btn-default">Volver</a>
            </div>
            <div class="col-md-6 col-xs-6 c3">
                <a href=<?php echo ruta.'/Administrador/Cerrar.php';?> class="btn btn-lg btn-default">Cerrar Sesion</a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 col-xs-12 c6">
            	<article>
				<h2 class="h2">Nuevo Curso</h2>
				<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<div class="form-group"><input class="form-control" required="required" type="text" name="titulo" placeholder="Titulo del curso"></div>
					<div class="form-group">
						<label for="particulares">Particulares</label>
						<input class="" required="required" id="particulares" type="radio" name="dirigido" value="Particulares">
						<label for="empresas">Empresas</label>
						<input class="" required="required" id="empresas" type="radio" name="dirigido" value="Empresas">
					</div>
					<div class="form-group"><input class="form-control" required="required" type="text" name="duracion" placeholder="Duracion"></div>
					<div class="form-group">
						<label for="minutos">Minutos</label>
						<input class="" required="required" id="minutos" type="radio" name="tduracion" value="Minutos">
						<label for="horas">Horas</label>
						<input class="" required="required" id="horas" type="radio" name="tduracion" value="Horas">
						<label for="dias">Dias</label>
						<input class="" required="required" id="dias" type="radio" name="tduracion" value="Dias">
					</div>
					<div class="form-group"><textarea class="form-control" required="required" name="resumen" placeholder="Resumen"></textarea></div>
					<div class="form-group"><textarea class="form-control" required="required" name="contenido" placeholder="Contenido"></textarea></div>
					<input class="btn-lg btn btn-default" type="submit" value="Crear Curso">
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