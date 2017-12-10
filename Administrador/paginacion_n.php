<?php $numero_PNoticias=numero_P(4,$conexion);   ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row"> 
			<div class="col-md-12 text-center">
				<br>
				<nav>
					<ul class="pagination pagination-lg text-center">
						<?php for($i=1;$i <= $numero_PNoticias; $i++):?>
							<?php if(actual('n')=== $i): ?>
								<li class="active"><a href="noticias_admin.php?n=<?php echo $i;?>"><?php echo $i;?></a></li>
							<?php else:?>
								<li><a href="noticias_admin.php?n=<?php echo $i;?>"><?php echo $i;?></a></li>
							<?php endif;?>
						<?php endfor;?>						
					</ul>
				</nav>
			</div>
		</div>
	</div>
</body>
</html>