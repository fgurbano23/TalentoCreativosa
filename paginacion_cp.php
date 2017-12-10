<?php $numero_PCursos=numero_P(3,$conexion);   ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row"> 
			<div class="col-md-12 text-center">
				<br>
				<nav>
					<ul class="pagination pagination-lg text-center">
						<?php for($i=1;$i <= $numero_PCursos; $i++):?>
							<?php if(actual('cp')=== $i): ?>
								<li class="active"><a href="cursos.php?cp=<?php echo $i;?>"><?php echo $i;?></a></li>
							<?php else:?>
								<li><a href="cursos.php?cp=<?php echo $i;?>"><?php echo $i;?></a></li>
							<?php endif;?>
						<?php endfor;?>						
					</ul>
				</nav>
			</div>
		</div>
	</div>
</body>
</html>