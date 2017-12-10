<!DOCTYPE html>
<html>
<head>
	<title>Talento Creativo Consultores</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style_captacion.css">
	<link rel="stylesheet" type="text/css" href="css/style_captacion.css">
	<link rel="stylesheet" type="text/css" href="css/style_contacto.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php require_once("header.php"); ?>
	<div class="franja_contenedora center-block">
		<div class="fondo_titulo">
			<h2>¡Captación de talentos!</h2>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="col-md-6 marco">
			<h2>Captación de talentos</h2>
			<br>
			<form>
				<input type="text" name="nombre_cliente" placeholder="Nombre">
				<hr>
				<input type="email"  name="correo_cliente" placeholder="Correo.@algo.com">
				<hr>
				<label for="areas">Seleccione el area de captación:</label>
    			<select class="form-control" name="areas">
    				<option value="">Auxiliar Administrativo</option>
    				<option value="">Administración y Recursos Humanos</option>
    				<option value="">Dirección General</option>
    				<option value="">Finanzas y Contabilidad</option>
    				<option value="">Informática</option>
    				<option value="">Publicidad y Mercadotecnia</option>
    				<option value="">Otro</option>
    			</select>
    			<hr>
  				<textarea  name="mensaje" id="mensaje" placeholder="Especifique los requisitos solicitados"></textarea>
  				<br>
				<button class="btn btn-lg btn-primary center-block">Enviar <span class="glyphicon glyphicon-send"></span></button>
				<br>
			</form>	
		</div>
		<div class="col-md-6" >
			<img src="img/general/hiring.png" width="250px" class="img-responsive center-block">
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