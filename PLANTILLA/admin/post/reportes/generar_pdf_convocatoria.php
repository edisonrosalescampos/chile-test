<?php 
include('../../../bd/partidos_BD.php');
require_once('../../../dompdf/autoload.inc.php');
require_once ('../../../dompdf/lib/html5lib/Parser.php');
require_once ('../../../dompdf/lib/php-font-lib/src/FontLib/Autoloader.php');
require_once ('../../../dompdf/lib/php-svg-lib/src/autoload.php');
require_once ('../../../dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
/////////////////////////////// CONFIGURACION DEL DOCUMENTO /////////////////////////////

$pdf = new Dompdf();
$pdf->setPaper('letter', 'portrait');  //A4, letter  ;  portrait (posicion vertical)
$titulo_documento_salida = "Convocatoria.pdf";
$sello_agua = '&copy; '.date("Y").' | Software 11Analytics&#x2122; para el Fútbol Profesional.';
/////////////////////////////////////////////////////////////////////////////////////////
//Datos de entrada

//$id_abonado = $_POST['id_abonado'];
//$id_matricula=$_POST['id_matricula'];

/////////////////////////////////////////////////////////////////////////////////////////

$forma_pago[0]='Efectivo';
$forma_pago[1]='Cheque';
$forma_pago[2]='Crédito';
$forma_pago[3]='Débito';
$forma_pago[4]='Transferencia';

$tribuna[0]='Butaca';
$tribuna[1]='Preferencial';
$tribuna[2]='Pinto';
$tribuna[3]='Visitas';

$sexo[0]='';
$sexo[1]='Masculino';
$sexo[2]='Femenino';

$forma_abono[0]="Mensual (cuotas)";
$forma_abono[1]="Anual";
$forma_abono[2]="Abono gratuito";

$nombre_club = $_POST['nombre_club'];
$local = $_POST['local'];
$visita = $_POST['visita'];
$texto_campeonato = $_POST['texto_campeonato'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$observacion = $_POST['observacion'];
$idpartidoCampeonato = $_POST['idpartidoCampeonato'];
$serie = $_POST['serie'];

$jugadores_citados = obtener_jugadores_citados($idpartidoCampeonato);

if($serie == 99){
	$serieAux = 'Primer Equipo';
}else{
	$serieAux = 'Sub-'.$serie;
}



$html='<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
@font-face {
  font-family: "Helvetica";
  font-weight: normal;
  font-style: normal;
  font-variant: normal;
}
 footer {
	position: fixed; 
	bottom: -60px; 
	left: 0px; 
	right: 0px;
	height: 50px; 

	/** Extra personal styles **/
	border-top: 4px solid black;
	color: black;
	text-align: center;
	line-height: 25px;
}
 header {
	position: fixed;
	top: -60px;
	left: 0px;
	right: 0px;
	height: 50px;

	/** Extra personal styles **/
	background-color: #03a9f4;
	color: white;
	text-align: center;
	line-height: 35px;
}

</style>
<title>Title</title>
</head>
<body>


';
/*
$html.='
<header>
  Our Code World
</header>
';
*/

$html.='
<table style="width:100%;"><tr>
<td style="width:100px;">
<img src="../../../config/logo_11Analytics_informes.png" style="width:90px; height:90px;">
</td>
<td>
   <center>
   <b style="font-size:25px; color:#28b779;">'.strtoupper($nombre_club).'</b><br>
   <b style="font-size:16px;">CITACION OFICIAL</b>

   </center>
</td>
<td style="width:100px;">
<img src="../../../config/logo_11Analytics_informes.png" style="width:90px; height:90px;">
</td>
</tr>
</table>
<hr><br>
<table border="0" style="width:270px; margin-left:auto;  margin-right:auto;">
<tr class="sin_fondo">
<td style="width:70px;">
<center>
<img style="width:70px; height:70px;" src="../../../config/equipos/chile/'.$local.'.png">
</center>
</td>
<td>
<center>
<img style="width:55px; height:55px;" src="../../../config/vs.png">
</center>
</td>
<td style="width:70px;">
<center>
<img style="width:70px; height:70px;" src="../../../config/equipos/chile/'.$visita.'.png">
</center>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<br>
<center><b>'.$texto_campeonato.'</b></center>
<br>
<table  style="width:600px; margin-left:auto;  margin-right:auto; border: 1px solid black;">
<tr>
<td style="width:150px; background-color:#28b779; color:white; border: 1px solid black;"><center>FECHA</center></td>
<td style"border: 1px solid black; padding-left:10px;"><b style="margin-left:40px;">'.$hora.'</b></td>
</tr>
<tr>
<td style="width:150px; background-color:#28b779; color:white; border: 1px solid black;"><center>LUGAR</center></td>
<td style"border: 1px solid black; padding-left:10px;"><b style="margin-left:40px;">'.$lugar.'</b></td>
</tr>
<tr>
<td style="width:150px; background-color:#28b779; color:white; border: 1px solid black;"><center>COMENTARIO</center></td>
<td style"border: 1px solid black; padding-left:10px;"><b style="margin-left:40px;">'.$observacion.'</b></td>
</tr>
</table>
<br>
  <center>
  <b style="font-size:25px; color:#28b779;">LISTADO DE CONVOCADOS</b><br>
  <b style="font-size:16px; color:black;">'.strtoupper($serieAux).'</b>
  </center>
<br>
<table border="0" style="width:100%; margin-left:auto;  margin-right:auto;">
<tr>
<td style="width:35px; background-color:#28b779; color:white; border: 1px solid black;" ><center><b>#</b></center></td>
<td style="width:80px; background-color:#28b779; color:white; border: 1px solid black;"><center><b>AÑO</b></center></td>
<td style="width:350px; background-color:#28b779; color:white; border: 1px solid black;"><center><b>NOMBRE</b></center></td>
<td style="width:150px; background-color:#28b779; color:white; border: 1px solid black;"><center><b>RUT</b></center></td>
</tr>
';

$count = 1;
for($i=0; $i<count($jugadores_citados);$i++){
	
	if($serie == 99){
		$serieAux = 'P.E.';
	}else{
		$serieAux = $jugadores_citados[$i]['ano_serie'];
	}
	
	$html.='
		<tr>
		<td><b style="margin-left:10px;">'.$count.'</b></td>
		<td><b style="margin-left:10px;">'.$serieAux.'</b></td>
		<td><b style="margin-left:10px;">'.$jugadores_citados[$i]['nombre'].' '.$jugadores_citados[$i]['apellido1'].' '.$jugadores_citados[$i]['apellido2'].'</b></td>
		<td><b style="margin-left:10px;">'.substr(utf8_decode(formatear_rut_2(strtoupper($jugadores_citados[$i]['rut']))), 0, 44).'</b></td>
		</tr>
	';
	$count = $count + 1;
}

$html.='
</table>
';

 
$html.='
<footer>
  <center><b>'.$sello_agua.'</b></center>
</footer>
';
$html.='
</body>
</html>
';


$pdf->loadHtml($html);

//////////////////////////////////// EXPORTAR EL DOCUMENTO //////////////////////////////
$pdf->render();

/////////////////////////// GUARDAR PDF EN RUTA DEL SERVIDOR ////////////////////////////
$output = $pdf->output();
file_put_contents("../../reportes_pdf/".$titulo_documento_salida, $output);
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////// ABRIR PDF EN VENTANA ////////////////////////////
//$pdf->stream($titulo_documento_salida);
/////////////////////////////////////////////////////////////////////////////////////////
echo $titulo_documento_salida;

function formatear_rut_2( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}


?>