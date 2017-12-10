<!DOCTYPE html>
<html>
<head>
	<title>Talento Creativo Consultores</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_captacion.css">
	<link rel="stylesheet" type="text/css" href="css/style_contacto.css">
</head>
<body>
	<?php require_once("header.php"); ?>
	<div class="franja_contenedora center-block">
		<div class="fondo_titulo">
			<h2>¡Contáctenos!</h2>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="col-md-6 marco">
			<h2>Datos del solcitante</h2>
			<form>
				<input type="text"  name="nombre_cliente" placeholder="Nombre ">
				<hr>
				<input type="email"  name="correo_cliente" placeholder="Correo@algo.com">
				<hr>
				<h2>Contenido del mensaje</h2>
    			<input  name="asunto" type="text" placeholder="Asunto del mensaje">
    			<hr>
  				<textarea  name="mensaje" id="mensaje" placeholder="Contenido del mensaje"></textarea>
  				<hr>
  				<br>
				<button class="btn btn-lg btn-primary center-block">Enviar <span class="glyphicon glyphicon-send"></span></button>
				<br>
			</form>	
		</div>
		<div class="col-md-6" >
			<img src="img/general/logo.jpg" width="250px" class="img-responsive center-block">
			<div class="servicio_atencion_cliente">
				<h3>Servicio y Atención al Cliente</h3>
			</div>
			<br>
			<p align="center" class="correo">talentocreativoconsultores@gmail.com</p>
			<br>
			<div align="center">
				<h3 >Talento Creativo Consultores S.A.</h3>
				<p><i>- Porque el talento siempre cuenta -</i></p>
			</div>
		</div>
	</div>
<?php require_once("footer.php"); ?>
</body>
</html>