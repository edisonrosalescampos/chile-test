<?php
function datetime_futbolJoven(){
     $datetime_now = new DateTime();
	 $datetime_now = $datetime_now->format('Y-m-d H:i:s');
	 return $datetime_now;
}

function date_futbolJoven(){
     $datetime_now = new DateTime();
	 $datetime_now = $datetime_now->format('Y-m-d');
	 return $datetime_now;
}

function utf8_converter($array){
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
        	$item = utf8_encode($item); 
		}
    });
    return $array;
}


/*===============================
=            BODEGAS            =
===============================*/

function ver_bodegas_v2(){
 	
	include("conexion.php");
	
	$resultado = $link->query("SELECT * FROM bodega");
	
	while($row = mysqli_fetch_array($resultado)){
		$dato[] = utf8_converter($row);
	}
	$link->close();
	return $dato;
}


function ver_bodegas($data){
 	require_once("conexion.php");
 	$datos = array();
	if(empty($data["string"])){
		if (!empty($data["zona"]) && strtolower($data["zona"]) != "todos") {
			$resultado = $link->query("SELECT * FROM ejercicios WHERE zona like '%{$data["zona"]}%';");
		} else {
			$resultado = $link->query("SELECT * FROM ejercicios");	
		}
	} else{
		$resultado = $link->query("SELECT * FROM ejercicios WHERE nombre like '%{$data["string"]}%' AND zona like '%{$data["zona"]}%';");
	}
	while($row = mysqli_fetch_array($resultado)){
		$datos[] = utf8_converter($row);
	}
	$link->close();
	return $datos;
	
}

function guardar_bodega($datos){
 	require_once("conexion.php");
 	$respuesta = 0;
  	if( $datos['id_informe'] == '' ){//agregar nuevo jugador
		$link->query("INSERT INTO ejercicios (
			nombre,
			zona,
			objetivo,
			implementos,
			nombre_usuario_software,
			fecha
			) VALUES (
			  '".utf8_decode($datos['ingresar_nombre'])."',
			  '".utf8_decode($datos['ingresar_zona'])."',
			  '".utf8_decode($datos['ingresar_objetivo'])."',
			  '".utf8_decode($datos['ingresar_implementos'])."',
			  '".utf8_decode(ucwords(strtolower($datos['nombre_usuario_software'])))."',
			  '".datetime_futbolJoven()."'
		)");
		$respuesta = 1;
	}else{
		$link->query("UPDATE ejercicios SET 
			nombre = '".utf8_decode(ucwords(strtolower($datos['ingresar_nombre'])))."',
			objetivo = '".utf8_decode(ucwords(strtolower($datos['ingresar_objetivo'])))."',
			zona = '".utf8_decode(ucwords(strtolower($datos['ingresar_zona'])))."',
			implementos = '".utf8_decode(ucwords(strtolower($datos['ingresar_implementos'])))."',
			nombre_usuario_software = '".utf8_decode(ucwords(strtolower($datos['nombre_usuario_software'])))."',
			fecha = '".datetime_futbolJoven()."' 
			WHERE idEjercicio like '".$datos['id_informe']."'
		"); 
		$respuesta = 2;
	}
	$link->close();
	return $respuesta;
}

function eliminar_bodega($id){
	require_once("conexion.php");
	$link->query("DELETE FROM ejercicios WHERE idEjercicio = '".$id."'");
	$link->close();
	return 1;
}

/*=====  End of BODEGAS  ======*/




?>