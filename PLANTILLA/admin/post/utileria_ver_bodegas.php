<?php
	include('../../bd/utileria_BD.php');
	$respuesta=ver_bodegas($_POST);
	echo json_encode($respuesta);
?>
