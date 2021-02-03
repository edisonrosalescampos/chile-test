<?php
	require_once('../../bd/utileria_BD.php');
	if($_POST['id']){
		$respuesta=eliminar_bodega($_POST['id']);
		header('Content-type: application/json; charset=utf-8');
		echo json_encode(["estatus" => $respuesta]);
	}
	         
?>
