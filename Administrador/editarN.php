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
   	    $id=$_POST['id'];
   	    $contenido=$_POST['contenido'];
        $fecha=$_POST['fecha'];
   	    $consulta=$conexion->prepare('UPDATE noticias_bd SET titulo =:titulo,autor=:autor ,contenido=:contenido, abstracto=:abstracto, fecha=:fecha WHERE id=:id');
   	    $consulta->execute(array(':titulo'=>$titulo,':autor'=>$autor,':contenido'=>$contenido,':abstracto'=>$abstracto,':fecha'=>$fecha,':id'=>$id));
  	    $consulta=null;
   	    $conexion=null;
   	    header('Location:'.ruta.'/Administrador/noticias_admin.php');
   }else{
   	    $id=id_casteo($_GET['nid']);
   	    if (empty($id)) {
   		   header('Location:'.ruta.'/Administrador/noticias_admin.php');
   	    }
    	$noticia=obtener_Noticia($id,$conexion); 
   	    if (!$noticia) {
   		   header('Location:'.ruta.'/Administrador/noticias_admin.php');   		
   	    }
   	    $noticia=$noticia[0];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Noticia</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/Administrador.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 c1">
                <h2>
                    <a href=<?php echo ruta.'/Administrador/PanelDeControl.php';?>>Panel de Control</a> / <a href=<?php echo ruta.'/Administrador/noticias_admin.php';?>>Noticias</a> / Editar Noticia
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
                    <h2 class="h2">Editar Noticia</h2>
                    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <input type="hidden" value="<?php echo $noticia['id']; ?>" name="id">
                        <div class="form-group">
                            <input class="form-control" required="required" type="text" name="titulo" value="<?php echo $noticia['titulo']; ?> ">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="required" type="text" name="autor" value="<?php echo $noticia['autor']; ?> ">
                        </div>
                        <input type="hidden" value="<?php echo $noticia['fecha']; ?>" name="fecha">
                        <div class="form-group">
                            <textarea class="form-control" required="required" name="abstracto" ><?php echo $noticia['abstracto']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" required="required" name="contenido"><?php echo $noticia['contenido']; ?></textarea>
                        </div>
                        <input class="btn btn-lg btn-default" type="submit" value="Modificar Noticia">
                    </form>
                </article>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div> 
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>	
</div>
</body>
</html>