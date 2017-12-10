<?php session_start();
require '../configuraciones.php';
require '../funciones.php';
if (isset($_SESSION['Administrador'])) {
    header('Location:'.ruta.'/Administrador/PanelDeControl.php');
}
$conexion=conexion($bd_conf['bd'],$bd_conf['user'],$bd_conf['pass']);
if(!$conexion){
    die();
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $password=hash('sha512',$password);
    $consulta=consultaUs($conexion,$usuario);
   // print_r($consulta);
   if (!$consulta) {
        header('Location:'.ruta.'/Administrador/Login.php');
    }
    if ($usuario==$consulta[0] && $password==$consulta[1]) {
        $_SESSION['Administrador']=$usuario;
        header('Location:'.ruta.'/Administrador/PanelDeControl.php');
    }else{
        header('Location:'.ruta.'/Administrador/Login.php');
    }
}
$conexion=null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/Login.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2"></div>
			<div class="col-md-8 col-sm-8">
				<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<h2>Inicia Sesión</h2>
					<div class="form-group input-group">
						<input type="text" class="form-control" required="required" name="usuario" placeholder="Usuario">
						<span class="input-group-btn">
                                <label class="btn btn-primary btn-no">
                                	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </label>
                            </span>
					</div>
					<div class="form-group input-group">
						<input type="password" class="form-control" required="required" name="password" placeholder="Contraseña">
						<span class="input-group-btn">
                            <label class="btn btn-primary btn-no">
                               	<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </label>
                        </span>
					</div>
                    <!--<php if ($error==true):?>
                    <div class="form-group input-group">
                        <p>error de usuario o contraseña</p>
                    </div>
                    ?php endif;?>-->
					<div class="form-group">
            	    	<input class="btn btn-block btn-lg btn-primary btn-azul" type="submit" value="Iniciar Sesion" >
            		</div>
            		<div class="form-group">
            			<a class="btn btn-block btn-lg btn-blanco" href="..">Regresar</a>
            		</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-2"></div>
		</div>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>