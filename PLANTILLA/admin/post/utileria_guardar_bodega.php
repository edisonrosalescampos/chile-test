<?php
	require_once('../../bd/utileria_BD.php');
	$respuesta = guardar_bodega($_POST);
	header('Content-type: application/json; charset=utf-8');
	echo json_encode(["estatus" => $respuesta]);
?>
