<?php 
include('../../../config/datos.php');
include('../../../bd/medico_BD.php');
require_once('../../../dompdf/autoload.inc.php');
require_once ('../../../dompdf/lib/html5lib/Parser.php');
require_once ('../../../dompdf/lib/php-font-lib/src/FontLib/Autoloader.php');
require_once ('../../../dompdf/lib/php-svg-lib/src/autoload.php');
require_once ('../../../dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
/////////////////////////////// CONFIGURACION DEL DOCUMENTO /////////////////////////////



if(isset($_POST['id_lesion'])){	
	
$pdf = new Dompdf();
$pdf->setPaper('letter', 'portrait');  //A4, letter  ;  portrait (posicion vertical)
$titulo_documento_salida = "reporte_medico.pdf";

/////////////////////////////////////////////////////////////////////////////////////////

	$data = obtener_lesion_de_convocatoria($_POST['id_lesion']);
	$modificacion = explode(" ", $data[0]['fecha_lesion']);
	$sello_agua = $nombre_club.' '.date("Y").' | Reporte médico ingresado el '.$modificacion[0].' a las '.$modificacion[1].'.';
	
	if($data[0]['serie']=='99'){
		$texto_serie='Primer Equipo';
	}else{
		$texto_serie='Sub-'.$data[0]['serie'];
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
<title>Informe Médico</title>
</head>
<body>
';
	
	$html.='
<table style="width:100%;"><tr>
<td style="width:100px;">
<img src="../../../config/logito.png" style="width:90px; height:90px;">
</td>
<td>
   <center>
   <b style="font-size:20px;">ÁREA MEDICA COBRELOA</b><br><br>
   <b style="font-size:17px;">INFORME MÉDICO</b>

   </center>
</td>
<td style="width:100px;">
<img src="../../foto_jugadores/'.$data[0]['idfichaJugador'].'.png" style="width:90px; height:90px;">
</td>
</tr>
</table>
<hr style="height:6px; background-color:black;"><br>

<table style="width:100%;" border="0">
    <tr>
          <td style="width:85%; height:20px;">
           <b style="font-size:17px; float:right;">Fecha: </b>
          </td>
 <td style="width:15%;">
          <div style="float:right;">'.$data[0]['fechaLesion'].'</div>
          </td>
</tr>
</table>

<br>
<center><b style="font-size:14px;">DATOS DEL MEDICO</b></center><br>
<table style="width:100%;" border="0">
    <tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Nombre y Apellido: </b>
          </td>
 <td style="width:80%;">
          <div>'.strtr($data[0]['nombre_medico'], "ÁÉÍÓÚ","áéíóú").'</div>
          </td>
</tr>
<tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Rut: </b>
          </td>
 <td style="width:80%;">
          <div>'.strtr($data[0]['rut_medico'], "ÁÉÍÓÚ","áéíóú").'</div>
          </td>
</tr>
<tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Email: </b>
          </td>
 <td style="width:80%;">
          <div>'.strtr($data[0]['email_medico'], "ÁÉÍÓÚ","áéíóú").'</div>
          </td>
</tr>
<tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Teléfono: </b>
          </td>
 <td style="width:80%;">
          <div>'.strtr($data[0]['telefono_medico'], "ÁÉÍÓÚ","áéíóú").'</div>
          </td>
</tr>

</table>
<br />
<hr style="height:1px; background-color:black;">
<br>
<center><b style="font-size:14px;">DATOS DEL PACIENTE</b></center><br>
<table style="width:100%;" border="0">
    <tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Nombre y Apellido: </b>
          </td>
 <td style="width:80%;">
          <div>'.strtr($data[0]['nombre'], "ÁÉÍÓÚ","áéíóú").' '.strtr($data[0]['apellido1'], "ÁÉÍÓÚ","áéíóú").' '.strtr($data[0]['apellido2'], "ÁÉÍÓÚ","áéíóú").'</div>
          </td>
</tr>
<tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Rut: </b>
          </td>
 <td style="width:80%;">
          <div>'.formatear_rut_2(strtr($data[0]['rut'], "ÁÉÍÓÚ","áéíóú")).'</div>
          </td>
</tr>
<tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Edad: </b>
          </td>
 <td style="width:80%;">
          <div>'.$data[0]['edad_jugador'].' años</div>
          </td>
</tr>
<tr>
          <td style="width:20%; height:20px;">
           <b style="font-size:14px;">Selección: </b>
          </td>
 <td style="width:80%;">
          <div>'.$texto_serie.'</div>
          </td>
</tr>
</table>
<br />
<hr style="height:1px; background-color:black;">
<br>
<center><b style="font-size:14px;">INFORME MÉDICO</b></center><br>
<div style="width:100%; height:270px;  border: 2px solid black; padding:10px;">
'.strtr($data[0]['informeMedico'], "ÁÉÍÓÚ","áéíóú").' 
</div>

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

}else{
echo '0';

}



function formatear_rut_2( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}


?>