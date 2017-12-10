<!DOCTYPE html>
<html>
<head>
	<title>Talento Creativo</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Italianno" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>
<?php require_once("header.php"); ?>


<div class="container-fluid ">
	<div class="row principal">
		<div class="col-md-12 fondo">
			<div class="container_banner">
				<br>
	<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/general/1.jpg"  style="width:100%;height: 400px;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="img/general/2.jpg"  style="width:100%;height: 400px;">
        <div class="carousel-caption">

        </div>
      </div>
    
      <div class="item">
        <img src="img/general/3.jpg" style="height: 400px;width: 100%">
        <div class="carousel-caption">

        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
			<br>
			<h1 class="titulo_presentacion">Talento Creativo Consultores s.a </h1>
			<h3 class="slogan_presentacion"> ~ ¡porque el talento siempre cuenta! ~ </h3>
			<br>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row fondo_cursos">
		<div class="col-md-6">
			<h2 class="titulo_propuesta_curso">¡ Desenvuélvete exitosamente en tu entorno laboral !</h2>
			<p class="contenido_propuesta_curso">Desarrolla tu inteligencia interpersonal para alcanzar el éxito profesional, permitete comprender a los demás y comunicarse con ellos, teniendo en cuenta sus diferentes estados de ánimo, temperamentos, motivaciones y habilidades. Aprende a hacer uso de tu inteligencia intrapersonal, Conócete y desarrolla la capacidad de tener una imagen individual precisa y objetiva</p>
			<br>
			<a href="cursos.php"><button class="btn btn-lg btn-primary center-block"> Cursos particulares</button></a>
			<br>
		</div>
		<div class="col-md-6">
			<h2 class="titulo_propuesta_curso">¡Desarrolla la eficiencia y rendimiento de tu empresa o negocio!</h2>
			<p class="contenido_propuesta_curso">Mejora las competencias de liderazgo y competencias funcionales de comerciales, y gestores de proyecto y otros colectivos críticos de la empresa.Consigue que las personas sean más empáticas y asertivas, mejorando así el clima laboral.Resuelve problemas internos o externos a la empresa que estén afectando a su rendimiento.Mejora la calidad del trabajo y la visión estratégica de tu empresa.</p>
			<br>
			<a href="cursos_emp.php"><button class="btn btn-lg btn-primary center-block">Cursos empresas</button></a>
			<br>	
		</div>
	</div>
</div>
<div class="container galeria">
	<h2 class="titulo_galeria">¡Bienvenidos a nuestra galeria!</h2>
	<hr>
	<div class="row">
		<div class="col-md-3" id="img1">
			<br>
			<img class="center-block img_src" src="img/general/1.jpg" alt="" width="200px" height="200px">
			<br>
		</div>
		<div class="col-md-3" id="img2">
			<br>
			<img class="center-block img_src" src="img/general/2.jpg" alt="" width="200px" height="200px">
			<br>
		</div>
		<div class="col-md-3" id="img3">
			<br>
			<img class="center-block img_src" src="img/general/3.jpg" alt="" width="200px" height="200px">
			<br>
		</div>
	</div>
<br>
	<div class="secundary row">
		<div class="col-md-3" id="img4">
			<br>
			<img class="center-block img_src" src="img/general/1.jpg" alt="" width="200px" height="200px">
			<br>
		</div>
		<div class="col-md-3" id="img5">
			<br>
			<img class="center-block img_src" src="img/general/2.jpg" alt="" width="200px" height="200px">
			<br>
		</div>
		<div class="col-md-3" id="img6">
			<br>
			<img class="center-block img_src" src="img/general/3.jpg" alt="" width="200px" height="200px">
			<br>
		</div>
	</div>
	<hr>
</div>

<div class="col-md-12 ventana_modal">
	<span class="close">&times;</span>
	<img class="center-block" src="img_modal.jpg">
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">
		</div>
		<div class="col-md-3">
			<h3 class="video_titulo">¡Compartiendo nuestra experiencia contigo!</h3>
			<p class="video_contenido"> --- </p>
		</div>
	</div>
</div>
<?php require_once("footer.php"); ?>
<script type="text/javascript">

$(".img_src").click(function(){


	var img_val_src = $(this).attr("src");

	$(".ventana_modal")
	.css("width","100%")
	.css("height","100%")
	.css("background","rgba(0,0,0,.6)")
	.css("padding","15px 15px 15px 15px")
	.css("position","fixed")
	.css("z-index","1")
	.css("left","0%")
	.css("top","0%")
	.css("overflow","scroll")
	.css("display","block");


	$(".ventana_modal img").attr("src",img_val_src).css('width','500px').css('height','500px');

	});

	$(".close").click(function(){
		$(".ventana_modal").css("display","none");
	});

</script>
</body>
</html>