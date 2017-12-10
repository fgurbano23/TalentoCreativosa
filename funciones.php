<?php
function conexion($tabla,$usuario,$pass){//conectarme a la base de datos
	try{
		$conexion=new PDO("mysql:host=localhost;dbname=$tabla",$usuario,$pass);
		return $conexion;
	}catch(PDOException $e){
		return false;
	}
}
function consultaUs($conexion,$usuario){//consultar usuario devuelve uno solo
	$consulta=$conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
    $consulta->execute(array(':usuario'=>$usuario));
    $consultas=$consulta->fetch();
    $consulta=null;
    return ($consultas)? $consultas : false;
}
function id_casteo($id){//casteo un id a entero
	return (int)trim(stripslashes(htmlspecialchars($id)));
}
function actual($tipo_elemento){ //tipo elemento es cp cursos persona ce curso empresa f foros n noticias c cursos
	return isset($_GET["$tipo_elemento"]) ? (int)$_GET["$tipo_elemento"]:1;
}
//obtener cursos
function obtener_C($cant_elem,$conexion){//curso
	$inicio=(actual("c")>1)? actual("c")*$cant_elem-$cant_elem :0;
	$consulta=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM cursos_bd LIMIT $inicio, $cant_elem");
	$consulta->execute();
	$consultas=$consulta->fetchALL();
	$consulta=null;
	return $consultas;
}
function numero_P($cursos_por_pagina,$conexion){//numero de paginas
	$total_cursos=$conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_cursos->execute();
	$total_curso=$total_cursos->fetch()['total'];
	$total_cursos=null;
	$numero_PCursos=ceil($total_curso/$cursos_por_pagina);
	return$numero_PCursos;
}
function obtener_CP($cant_elem,$conexion){//curso personas
	$inicio=(actual("cp")>1)? actual("cp")*$cant_elem-$cant_elem :0;
	$consulta=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM cursos_bd WHERE dirigido=:dirigido LIMIT $inicio, $cant_elem");
	$consulta->execute(array(':dirigido'=>"Particulares"));
	$consultas=$consulta->fetchALL();
	$consulta=null;
	return $consultas;
}
function obtener_CE($cant_elem,$conexion){//curso empresa
	$inicio=(actual("ce")>1)? actual("ce")*$cant_elem-$cant_elem :0;
	$consulta=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM cursos_bd WHERE dirigido=:dirigido LIMIT $inicio, $cant_elem");
	$consulta->execute(array(':dirigido'=>"Empresas"));
	$consultas=$consulta->fetchALL();
	$consulta=null;
	return $consultas;
}
function obtener_Curso($id,$conexion){//devuelvo un curso
	$resultado=$conexion->query("SELECT * FROM cursos_bd WHERE id=$id LIMIT 1");
	$resultados=$resultado->fetchALL();
	$resultado=null;
	return ($resultados)? $resultados : false;
}
function fecha($fecha){//devuelvo una fecha
	$timestamp=strtotime($fecha);
	$meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
	$dia=date('d',$timestamp);
	$mes=date('m',$timestamp)-1;
	$year=date('Y',$timestamp);
	$fecha="$dia de ".$meses[$mes]." del $year";
	return $fecha;
}
function obtener_N($cant_elem,$conexion){//noticia
	$inicio=(actual("n")>1)? actual("n")*$cant_elem-$cant_elem :0;
	$consulta=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM noticias_bd LIMIT $inicio, $cant_elem");
	$consulta->execute();
	$consultas=$consulta->fetchALL();
	$consulta=null;
	return $consultas;
}
function obtener_Noticia($id,$conexion){//devuelvo una noticia
	$resultado=$conexion->query("SELECT * FROM noticias_bd WHERE id=$id LIMIT 1");
	$resultados=$resultado->fetchALL();
	$resultado=null;
	return ($resultados)? $resultados : false;
}
function comprobarSession(){//no la uso pero es para verificar sesion iniciada
	if (!isset($_SESSION['admin'])) {
    	header('Location:http://localhost/sesion/login.php');
	}
}
function obtener_I($cant_elem,$conexion){//nimagenes
	$inicio=(actual("i")>1)? actual("i")*$cant_elem-$cant_elem :0;
	$consulta=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM imagenes_bd LIMIT $inicio, $cant_elem");
	$consulta->execute();
	$consultas=$consulta->fetchALL();
	$consulta=null;
	return $consultas;
}
function obtener_SI($cant_elem,$conexion){//n imagenes switch
	$inicio=(actual("i")>1)? actual("i")*$cant_elem-$cant_elem :0;
	$consulta=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM switch_bd LIMIT $inicio, $cant_elem");
	$consulta->execute();
	$consultas=$consulta->fetchALL();
	$consulta=null;
	return $consultas;
}
function numero_SI($conexion){//numero de paginas
	$total_cursos=$conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_cursos->execute();
	$total_curso=$total_cursos->fetch()['total'];
	$total_cursos=null;
	return$total_curso;
	}
?>