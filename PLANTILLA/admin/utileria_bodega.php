<?php
	include('../config/datos.php');
	session_start();
	if(!(isset($_SESSION["nombre_usuario_software"]))){
	  	session_destroy();
	    header('Location: ../index.php?cerrar_sesion=1');
	}else{
		$menu_actual="utileria";
		$submenu_actual="utileria_bodega";
		$seccion_comentarios = $comentarios['utileria_bodega'];//mis cuotas
		$demo_seccion = $demo['utileria_bodega'];
		$nombre_pestana_navegador='Utilería';
		
		$datetime_now = new DateTime();
		$date_hoy = new DateTime();
		$datetime_now = $datetime_now->format('Y-m-d H:i:s');
		$date_hoy = $date_hoy->format('Y-m-d');
		$data = explode(" ", $datetime_now);
		$ano_actual =  date("Y");
		$mes_actual =  date("m");
?> 

<!DOCTYPE html> 
<html lang="es"> 
<head> 
<title><?php echo $nombre_pestana_navegador;?> | Bodega</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="font-awesome_3.2.1/css/font-awesome.css" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link rel='stylesheet' href='css/font_googleapis.css' type='text/css'>
<link rel='stylesheet' href='css/comentarios.css' type='text/css'>
<link rel='stylesheet' href='../print_js/print.min.css' type='text/css'>
<link href="bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<style type="text/css">
	.sin_fondo:hover{
		background-color:transparent; 
	} 
	.boton_eliminar2{
		padding-left: 3px;
		padding-right: 3px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #fb973e; 
		color: #fb973e;
		border-radius:2px;
		cursor:pointer;
		margin-right:8px;
	}
	.boton_eliminar2:hover{
		padding-left: 3px;
		padding-right: 3px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #6e6d6c; 
		color: #6e6d6c;
		border-radius:2px;
		cursor:pointer;
		margin-right:8px;
	}
	.boton_refresh{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border:3px solid #e19830; 
		color: #e19830;
		border-radius:2px;
	} 
	.boton_refresh:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #8f5708; 
		color: #8f5708;
		border-radius:2px;
	} 
	.panel_seleccionar_serie:hover{ 
		background-color:#f7b48b; 
		color:white; 
	} 
	.panel_seleccionar_serie_inhabilitada{ 
		background-color:#ffa42d; 
		color:black; 
	} 
	.panel_seleccionar_serie{ 
		background-color:#ffa42d; 
		color:black; 
	} 
	
	.tabla_1_sin_efecto{
		border: 2px solid white; 
		color:white; 
		background-color:black; 
		opacity:0.5;
	}
	.tabla_1_sin_efecto:hover{
		border: 2px solid white; 
		color:white; 
		background-color:black; 
		opacity:0.5;
	}
	.tabla_2_sin_efecto{
		background-color:transparent;
		color:white; 
	}
	.tabla_2_sin_efecto:hover{
		background-color:transparent;
		color:white; 
	}

	.boton_informe_jugador{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #555555; 
		color: #555555;
		border-radius:5px;
	}
	.boton_informe_jugador:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #8f8f8f; 
		color: #8f8f8f;
		border-radius:5px;
	}
	.boton_menu_desactivado{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: #28b779;
		border: 3px solid black; 
		color: black;
		border-radius:5px;
	}
	.boton_menu{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #28b779; 
		color: #28b779;
		border-radius:5px;
	}
	.boton_menu:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: #28b779;
		border: 3px solid black; 
		color: black;
		border-radius:5px;
	}
	.boton_menu:disabled{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 5px solid black; 
		color: black;
		border-radius:2px;
	}
	.checkeado {
    	color: orange;
	}
	.panel_seleccionar_serie:hover .checkeado {
    	color: #28b779;
	}
	.panel_buscar:hover{
		background-color:#ffbb00;
		color:white;
	}
	.boton_volver{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 1px solid #28b779; 
		color: #28b779;
		border-radius:10px;
	}
	.boton_volver:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 1px solid black; 
		color: black;
		border-radius:10px;
	}
	
	
	.boton_eliminar{
		padding-left: 3px;
		padding-right: 3px;
		text-shadow: none; 
		background-color: transparent;
		border: 1px solid #28b779; 
		color: #28b779;
		border-radius:2px;
	}
	.boton_eliminar:hover{
		padding-left: 3px;
		padding-right: 3px;
		text-shadow: none; 
		background-color: white;
		border: 1px solid #D83F25; 
		color: #D83F25;
		border-radius:2px;
	}
	.boton_eliminar:disabled{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid rgba(0, 0, 0, .2);	
		color: rgba(0, 0, 0, .2);
		border-radius:2px;
	}
	
	.boton_editar{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #28b779; 
		color: #28b779;
		border-radius:2px;
	}
	.boton_editar:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #fda101; 
		color: #fda101;
		border-radius:2px;
	}
	.boton_editar:disabled{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid rgba(0, 0, 0, .2);	
		color: rgba(0, 0, 0, .2);
		border-radius:2px;
	}
	
	.boton_ver{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #28b779; 
		color: #28b779;
		border-radius:2px;
	}
	.boton_ver:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #1aa0d8; 
		color: #1aa0d8;
		border-radius:2px;
	}
	.boton_ver:disabled{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid rgba(0, 0, 0, .2);	
		color: rgba(0, 0, 0, .2);
		border-radius:2px;
	}
	
	.boton_add{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #28b779; 
		color: #28b779;
		border-radius:2px;
	}
	.boton_add:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid black; 
		color: black;
		border-radius:2px;
	}
	.boton_add:disabled{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid rgba(0, 0, 0, .2);	
		color: rgba(0, 0, 0, .2);
		border-radius:2px;
	}
	.boton_remove{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #f26027; 
		color: #f26027;
		border-radius:2px;
	}
	.boton_remove:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid black; 
		color: black;
		border-radius:2px;
	}
	.boton_modal{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid white; 
		color: white;
		border-radius:2px;
	}
	.boton_modal:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid black; 
		color: black;
		border-radius:2px;
	}
	
	.boton_gestionar_cargos{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #28b779; 
		color: #28b779;
		border-radius:2px;
	}
	.boton_gestionar_cargos:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid black; 
		color: black;
		border-radius:2px;
	}
	.boton_gestionar_cargos_eliminar{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #28b779; 
		color: #28b779;
		border-radius:2px;
	}
	.boton_gestionar_cargos_eliminar:hover{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid #D83F25; 
		color: #D83F25;
		border-radius:2px;
	}
	.boton_gestionar_cargos:disabled{
		padding-left: 7px;
		padding-right: 7px;
		text-shadow: none; 
		background-color: transparent;
		border: 3px solid rgba(0, 0, 0, .2);	
		color: rgba(0, 0, 0, .2);
		border-radius:2px;
	}
	input[type="text"] {
		width: 100% !important;
		display: inline-block !important;
		box-sizing: border-box;
		height: 20px;
		padding: 12px;
		margin: 0px !important;
	}	
	* {
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}
	.bootstrap-datetimepicker-widget table td.today:before {
    content: '';
    display: inline-block;
    border: solid transparent;
    border-width: 0 0 7px 7px;
    border-bottom-color: #337ab7;
    border-top-color: rgba(0, 0, 0, 0.2);
    position: absolute;
    bottom: 4px;
    right: 4px;
}
	
</style>
<script type="text/javascript">
	var imagen_cargando = new Image();
	imagen_cargando.src = "../config/cargando_final_2.gif";
</script>
<script src="../print_js/print.min.js"></script>
<script src="js/angular.min.js" type="application/javascript"></script>
<script type="text/javascript" src="graficos/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="graficos/highcharts-3d.js"></script>
<script type="text/javascript" src="graficos/highcharts.js"></script>
<script type="text/javascript" src="graficos/exporting.js"></script>
<!--<script type="text/javascript" src="graficos/highcharts-3d.js"></script>-->
<script type="text/javascript" src="graficos/highcharts-more.js"></script>
<script type="text/javascript" src="graficos/series-label.js"></script>
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<!--<script src="js/matrix.interface.js"></script> -->
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 
<script type="text/javascript">

var id_jugador = "";
var id_informe = "";
var cierra_ventana=0;

var id_matricula="";
var id_mensualidad="";
var edicion_informe = false;
var agregar_informe = true;
var linea_actual=0;
var pagina_actual=0;

var error_foto = 0;
var jugadores_scouting = {};
var ano_actual = '<?php echo $ano_actual;?>';
var mes_actual = parseInt('<?php echo $mes_actual;?>');

function goPage (newURL) {
	if (newURL != "") {
		if (newURL == "-" ) {
			resetMenu();            
		}   
		else {  
		  document.location.href = newURL;
		}
	}
}

function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}

function refrescar(){
	$("#search").load("post/consultar_datetime.php");
}

function colocar_icono_cargando(opcionMenu){
	var texto_opcion="<i class='icon-spinner icon-spin icon-large'></i> "+opcionMenu.innerHTML;
	opcionMenu.innerHTML = texto_opcion;
}

function mostrar_al_cargar_pagina(){
	$('#pagina').slideDown("slow");
	$('#cargando_pagina').hide();
}





//Angular//
/*
//////////////////////Expresiones regulares//////////////////////
?     0 o 1 vez
*     0 o muchas veces
+     1 o muchas veces
\s    espacio en blanco
{n}   n veces
{n,m} n a m veces
//////////////////////Angular JS//////////////////////////
ng-trim    false-->     elimina espacios en blanco al comienzo y al final
*/
var app= angular.module("App_Angular",[]);
app.controller("controlador_1",['$scope',function($scope){
	
	$scope.ER_alfaNumericoConEspacios=/^([a-zA-Z0-9\x7f-\xff](\s[a-zA-Z0-9\x7f-\xff])*)+$/;
	$scope.ER_email=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	$scope.ER_alfaNumericoSinEspacios=/^([a-zA-Z0-9])+$/;
	$scope.ER_numericoSinEspacios=/^[0-9]+$/;
	$scope.ER_caracteresConEspacios=/^([a-zA-Z\x7f-\xff](\s[a-zA-Z\x7f-\xff])*)+$/;
	$scope.ER_altura=/^([1-2]{1}[0-9]{2})$/;
	$scope.ER_peso=/^((([1]{1}[0-4]{1}[0-9]{1})|([3-9]{1}[0-9]{1}))(\.[1-9])?)$/;
	$scope.ER_telefono=/^[0-9]+$/;
	$scope.ER_rut=/^(([1-2]{1}[0-9]?)|([1-9]{1}))[0-9]{6}-([0-9]|k){1}$/;
	$scope.ER_rut_empresa=/^(([1-9]{1}[0-9]{1,2})|([1-9]{1}))[0-9]{6}-([0-9]|k){1}$/;
	
	$scope.ER_valorMonto=/^[1-9]{1}[0-9]*[0]{1}$/;
	
	$scope.ER_alfaNumericoConEspaciosAcentos=/^([a-zA-Z0-9\x7f-\xff](\s[a-zA-Z0-9])*)+$/;
	
	$scope.clickFunction = function() {
        $scope.buttonClicks=1;
    };
	
	$scope.aplicar = function() {
        $scope.ingresar_nombre = 'value here';
    }
	
	$scope.desactivarBoton = function() {
        $('#boton_comentario').attr('disabled', true);
        //$scope.isDisabled = true;
        return false;
    }
	
	$scope.activarBoton = function() {
        $('#boton_comentario').attr('disabled', false);
        //$scope.isDisabled = true;
        return false;
    }
	$scope.desactivarBoton2 = function() {
        $('#boton_agregar_Fertilizante').attr('disabled', true);	
        //$scope.isDisabled = true;
        return false;
    }
	
	
	$scope.desactivarBotonAgregarProveedor = function() {
        $('#boton_agregar_proveedor').attr('disabled', true);	
        //$scope.isDisabled = true;
        return false;
    }
	$scope.desactivarBotonEliminarProveedor = function() {
        $('#boton_eliminar_proveedor').attr('disabled', true);	
        //$scope.isDisabled = true;
        return false;
    }
}]);
</script>

</head>
<body onload="setInterval(refrescar, 1000)" ng-controller="controlador_1" ng-app="App_Angular" id="angularData">

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"><?php echo $abreviacion_dominio;?></a></h1>
</div>
<!--close-Header-part--> 
<!--start-top-serch-->
<div id="search" style="font-size:15px; font-weight: bold; color: white; padding-top:3px; padding-right:5px;">
	<?php 
	 	echo $data[0]."&nbsp;&nbsp;&nbsp;".$data[1];
	?>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon-truck"></i> Utileria <i class="icon-chevron-right"></i> Bodega</a>
  <?php include('../config/menu.php');?>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
   <div id="breadcrumb"> 
		<a title="Go to Home" class="tip-bottom">
			<i class="icon-home"></i> Inicio
		</a> 
		<a class="tip-bottom">
			<i class="icon-truck"></i> Utileria
		</a> 
		<a class="current">
			Ejercicios
		</a> 
  	
   	</div>
  </div>
<!--End-breadcrumbs-->
 
<div class="container-fluid" id="cargando_pagina">
    <center>
    <img src="" style="margin-top:100px;" id="cargando_final">
    <script>$('#cargando_final').attr('src',imagen_cargando.src);</script>
    </center>
</div>
<!--Action boxes-->


<div class="container-fluid" style="display:none;" id="pagina">
      
    
<?php if(($software_demo && $demo_seccion) || !$software_demo){?>


<div class="row-fluid">

     
<div class="row-fluid" style="margin-top: 0px; color:black; font-family:Arial, Helvetica, sans-serif;" id="cuadro_buscar"> 


<div class="cuadro_buscar_titulo">
<center>

<table style="color:black; font-family:Arial, Helvetica, sans-serif;">
  <tr class="sin_fondo">
    <td style="padding:12px; padding-top:15px;">
    <table>
  <tr class="sin_fondo">
    <td><center><img src="../config/logo_equipo.png" style="width:75px; height:75px; margin-top:5px;"></center></td>
  </tr>
</table>
    </td>
    <td>
    <div style="padding:0px; margin:0px; margin-top:-5px;">
    <h3 class="titulo_principal"><center>Kinesiología "Ejercicios"</center></h3>                   
    </div>
    </td>
  </tr>
</table>
<br>
</center>

<div style="width:100%; background-color:#28b779; height:20px;">

</div>

</div>

<div class="row-fluid cuadro_buscar_buscar" style="margin: 0px; padding:0px; margin-top:30px;">
    <center>
    	<div style="width: 100%; margin-bottom:10px;">
        
       		<table border="0" width="100%">
            <tr class="sin_fondo">
            	<td style="width:10%;"></td>
            	<td style="width:25%;">
            		<input name="buscar_nombre" type="text" style="background-color:white; border: 3px solid #555555; border-radius:2px; margin-bottom:0px; border-radius: 50px; height: 25px; text-align: center;" placeholder="Nombre del Ejercicio" maxlength="149" id="buscar_nombre" onKeyUp="buscador();" >
            	</td>
            	<td style="width:5%;"></td>
            	<td style="width:50%;">
            		<div class="span6">
            			<a class="btn btn-md btn-primary" style="width: 100%; border-bottom-left-radius:2px; border-top-left-radius:2px; margin-left: 0px !important; margin-right:0px !important;  margin-top:0px; background-color:#28b779; font-size: 12px; margin-bottom:0px;"> *Zonas Anatómicas
            			</a>
            		</div>
	            	<div class="span6" style="margin-left: 0px;">
	          	    <select name="buscar_zona" type="text" style=" border: 1px solid #28b779; margin-left: 0px; margin-right: 0px; text-transform: capitalize; border-bottom-right-radius:2px; border-top-right-radius:2px; margin-bottom:0px;width: 90%;" placeholder=""  id="buscar_zona" onChange="buscador();">
		          	    <?php 
		          	    	$zonas_anatomicas = [
		          	    		'Todos',
						            'Cara / Cabeza',
						            'Hombro derecho',
						            'Hombro izquierdo',
						            'Torax',
						            'Brazo Derecho',
						            'Brazo izquierdo',
						            'Antebrazo Derecho',
						            'Antebrazo izquierdo',
						            'Abdomen',
						            'Muñeca Derecha',
						            'Muñeca izquierda',
						            'Manos / Dedos Der',
						            'Manos / Dedos Izq',
						            'Cadera / Ingle/ Pelvis',
						            'Muslo Anterior Der',
						            'Muslo Anterior Izq',
						            'Rodilla Derecha',
						            'Rodilla Izquierda',
						            'Pierna Derecha',
						            'Pierna Izquierda',
						            'Tobillo Derecho',
						            'Tobillo Izquierdo',
						            'Pie Derecho',
						            'Pie Izquierdo',
						            'Cuello / Cervical',
						            'Dorsales',
						            'Lumbares',
						            'Codo Izquierdo',
						            'Codo Derecho',
						            'Gluteos',
						            'Muslo Posterior Izquierdo',
						            'Muslo Posterior Derecho',
						            'Pantorrilla Izquierda',
						            'Pantorrilla Derecha',            
						        	];
						        
						        	foreach ($zonas_anatomicas as $value) :
							    	?>
							    		<option value="<?php echo($value); ?>"><?php echo($value); ?></option>
							    	<?php 
							        endforeach;
			          	  ?>  	    	
									</select>
            		</div>
            	</td>
              <td style="width:10%; cursor:pointer;"> 
              	<button class="boton_refresh" onClick="buscador()"><i class="icon-refresh"></i></button>
              </td>
            </tr>
           </table>
          	   
       </div>
                
             <div style="margin:0px; height:20px;"><img src="img/cargando_buscar.gif" id="cargando_buscar" style=" display:none;">
             	<span style="color:#dc4e4e; display:none;" id="error_conexion"><b>Error:</b> conexión a internet deficiente.</span>
             	<span style="color:#28b779; display:none;" id="sin_resultados">Busqueda sin resultados.</span>
             </div>
             
     </center>
     
    	<div class="row-fluid" style="margin-top:0px;">
     
    	<button style="margin-bottom:10px; margin-top: 0px; float:right;" class="boton_informe_jugador" onClick="boton_agregar();"><b style="font-size:13px;"><i class="icon-plus"></i> Agregar Ejercicio</b></button>
     
            <div class="span12" style="margin: 0px;">
            
            <table style="border: 0px solid #8f8f8f; width:100%;" id="tabla_ver_informes">
     		<thead>
                <tr style="background-color:#555555; color:white;">
                  	<th scope="col" style="border-top-left-radius:5px; padding-top:5px; padding-bottom:5px; min-width:25px;"><center>#</center></th>
          			</th>
                    <th scope="col" style="cursor:pointer; padding:0px;">
                  	<div class="tip-top" data-original-title="Nombre del Ejercicio" style="width:100%;"><center>NOMBRE</center></div>
                 	</th>
          			<th scope="col" style="cursor:pointer; padding:0px;">
                  	<div class="tip-top" data-original-title="Objetivo" style="width:100%;"><center>OBJETIVO</center></div>
                  	</th>
                    <th scope="col" style="cursor:pointer; padding:0px;">
                  	<div class="tip-top" data-original-title="Zona Anatómica" style="width:100%;"><center>ZONA ANATÓMICA</center></div>
                  	</th>
                  	<th scope="col" style="cursor:pointer; padding:0px;">
                  	<div class="tip-top" data-original-title="Implementos Requeridos" style="width:100%;"><center>IMPLEMENTOS REQUERIDOS</center></div>
                  	</th>
                    <th scope="col" style="cursor:pointer; padding:0px;  border-top-right-radius:5px; width:30px;">
                  <th scope="col" style="cursor:pointer; padding:0px;  border-top-right-radius:5px; width:30px;">
                 
                  </th>
                </tr>
            </thead>
           <tbody>
                 <!--  AQUI SE INSERTARAN CON JAVASCRIPT -->
          	</tbody>
            </table>
           </center>
           
            </div>
    </div>
    

    
 
    
    </div>


     

</div>

<div style=" display:none;" id="cuadro_editar">

	<div class="row-fluid" style="margin: 0px; margin-bottom:10px; margin-top:37px;">
		<button class="boton_volver" onClick="boton_volver();" style="float:left; margin:0px;"><i class="icon-arrow-left"></i> volver</button>
	</div> 

	<div id="seccion_datos" style=" margin-bottom:25px; margin-top:10px;">		
 		<form method="post" ng-model="formulario_AgregarProveedor" name="formularioAgregarProveedor" id="formularioAgregarProveedor" novalidate>   
      <div class="row-fluid" style="margin-top:20px;">

				<div class="span12" style="margin: 0px;">
			    <div class="span9" style="margin: 0px;">
			      <div class="span5">
			        <a class="btn btn-md btn-primary" style="border-bottom-left-radius:2px; border-top-left-radius:2px; margin-left: 0px; margin-right: 0px; width: 100%; margin-top:0px; background-color:#28b779; font-size: 12px; margin-bottom:0px;"> *Nombre del Ejercicio</a>
			      </div>
			      <div class="span7" style="margin-left: 0px;">
			        <input name="ingresar_nombre" type="text" style="height: 29px; border: 1px solid #28b779; margin-left: 0px; margin-right: 0px; text-transform: capitalize; border-bottom-right-radius:2px; border-top-right-radius:2px; margin-bottom:0px;" placeholder="" maxlength="149" onKeyUp="chequear_datos();" id="ingresar_nombre">
			      </div>
			      <div class="span5" style="margin-left: 0px; margin-top: 20px;">
			        <a class="btn btn-md btn-primary" style="border-bottom-left-radius:2px; border-top-left-radius:2px; margin-left: 0px; margin-right: 0px; width: 100%; margin-top:0px; background-color:#28b779; font-size: 12px; margin-bottom:0px;"> *Objetivo</a>
			      </div>
			      <div class="span7" style="margin-left: 0px; margin-top: 20px;">
			        <input name="ingresar_objetivo" type="text" style="height: 29px; border: 1px solid #28b779; margin-left: 0px; margin-right: 0px; text-transform: capitalize; border-bottom-right-radius:2px; border-top-right-radius:2px; margin-bottom:0px;" placeholder="" maxlength="149" onKeyDown="chequear_datos();" onKeyUp="chequear_datos();" id="ingresar_objetivo">
			      </div>
			      <div class="span5" style="margin-left: 0px; margin-top: 20px;">
			        <a class="btn btn-md btn-primary" style="border-bottom-left-radius:2px; border-top-left-radius:2px; margin-left: 0px; margin-right: 0px; width: 100%; margin-top:0px; background-color:#28b779; font-size: 12px; margin-bottom:0px;"> *Implementos Requeridos</a>
			      </div>
			      <div class="span7" style="margin-left: 0px; margin-top: 20px;">
			        <input name="ingresar_implementos" type="text" style="height:29px; border: 1px solid #28b779; margin-left: 0px; margin-right: 0px; text-transform: capitalize; border-bottom-right-radius:2px; border-top-right-radius:2px; margin-bottom:0px;" placeholder="" maxlength="149" onKeyDown="chequear_datos();" onKeyUp="chequear_datos();" id="ingresar_implementos">
			      </div>
			      <div class="span5" style="margin-left: 0px; margin-top: 20px;">
			        <a class="btn btn-md btn-primary" style="border-bottom-left-radius:2px; border-top-left-radius:2px; margin-left: 0px; margin-right: 0px; width: 100%; margin-top:0px; background-color:#28b779; font-size: 12px; margin-bottom:0px;"> *Zonas Anatómicas</a>
			      </div>
			      <div class="span7" style="margin-left: 0px; margin-top: 20px;">
			        <select name="ingresar_zona" type="text" style="width:100%; border: 1px solid #28b779; margin-left: 0px; margin-right: 0px; text-transform: capitalize; border-bottom-right-radius:2px; border-top-right-radius:2px; margin-bottom:0px;" placeholder="" maxlength="149"  onChange="chequear_datos();" id="ingresar_zona">
			        	<option value="">Seleccione un valor...</option>
			          <?php 
			          	$zonas_anatomicas = [
							      'Cara / Cabeza',
							      'Hombro derecho',
							      'Hombro izquierdo',
							      'Torax',
							      'Brazo Derecho',
							      'Brazo izquierdo',
							      'Antebrazo Derecho',
							      'Antebrazo izquierdo',
							      'Abdomen',
							      'Muñeca Derecha',
							      'Muñeca izquierda',
							      'Manos / Dedos Der',
							      'Manos / Dedos Izq',
							      'Cadera / Ingle/ Pelvis',
							      'Muslo Anterior Der',
							      'Muslo Anterior Izq',
							      'Rodilla Derecha',
							      'Rodilla Izquierda',
							      'Pierna Derecha',
							      'Pierna Izquierda',
							      'Tobillo Derecho',
							      'Tobillo Izquierdo',
							      'Pie Derecho',
							      'Pie Izquierdo',
							      'Cuello / Cervical',
							      'Dorsales',
							      'Lumbares',
							      'Codo Izquierdo',
							      'Codo Derecho',
							      'Gluteos',
							      'Muslo Posterior Izquierdo',
							      'Muslo Posterior Derecho',
							      'Pantorrilla Izquierda',
							      'Pantorrilla Derecha',            
							    ];
							        
							    foreach ($zonas_anatomicas as $value) :
							  ?>
							   	<option value="<?php echo($value); ?>"><?php echo($value); ?></option>
							  <?php 
							    endforeach;
			          ?>  	    	
							</select>
			      </div>
			      <div class="span5" style="margin-left: 0px; margin-top: 20px;">
			        <a class="btn btn-md btn-primary" style="border-bottom-left-radius:2px; border-top-left-radius:2px; margin-left: 0px; margin-right: 0px; width: 100%; margin-top:0px; background-color:#28b779; font-size: 12px; margin-bottom:0px;"> *Descripción</a>
			      </div>
			      <div class="span7" style="margin-left: 0px; margin-top: 20px;">
			        <input name="ingresar_descripcion" type="text" style="height:29px; border: 1px solid #28b779; margin-left: 0px; margin-right: 0px; text-transform: capitalize; border-bottom-right-radius:2px; border-top-right-radius:2px; margin-bottom:0px;" placeholder="" maxlength="149" onKeyDown="chequear_datos();" onKeyUp="chequear_datos();" id="ingresar_descripcion">
			      </div>
			      <br>
						<div class="span11"  style=" margin-left: 0px; margin-top: 20px;">	
							<button style="float: right;" type="submit" ng-disabled="formularioAgregarProveedor.$invalid" class="boton_gestionar_cargos" onClick="boton_guardar();" id="boton_agregar_proveedor"><i class="icon-save"></i> GUARDAR EJERCICIO</button>
						</div>					
			    </div>
			  </div>
			</div>      
    </form>
        
    
	</div>
   
	<div class="row-fluid" style="margin: 0px; margin-bottom:10px;">
		<button class="boton_volver" onClick="boton_volver();" style="float:left; margin:0px;"><i class="icon-arrow-left"></i> volver</button>    
	</div>

  <center><h6 style="color:#28b779;" class="actualizado_por"></h6></center>  
        
</div>




  
<div id="myModalDescargarBoleta" class="modal hide" style="border-radius:10px;">
    <div class="modal-header" style="background-color: #28b779; border-top-right-radius: 5px; border-top-left-radius: 5px;">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><img src="img/logo3.png" style="height:30px; width:265px;"></h4></center>
    </div>
    <div class="modal-body" style="color:black; font-family:Arial, Helvetica, sans-serif;">
     <center>
            <br>
            <div id="mensaje_agregar_DescargarBoleta">
              <h5>¿Estás seguro que quieres generar un reporte excel?</h5>
              </div>
            <br>
     </center>
    </div>
      <div class="modal-footer" style="background-color:#28b779; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
          <center><button type="button" class="btn btn-default boton_modal" data-dismiss="modal" id="boton_cerrar_alerta" style="margin-right:20px; border-radius:5px;"><span class="icon"><i class="icon-remove"></i></span> No</button> <button type="button" class="btn btn-default boton_modal " onClick="guardar_bodega();" ng-click="desactivarBotonAgregarBoleta()" style="border-radius:5px;"><span class="icon"><i class="icon-ok"></i></span> Si</button> </center>
        
    </div>
</div>    

<div id="myModalDescargarExcel" class="modal hide" style="border-radius:10px;">
    <div class="modal-header" style="background-color: #28b779; border-top-right-radius: 5px; border-top-left-radius: 5px;">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><img src="img/logo3.png" style="height:30px; width:265px;"></h4></center>
    </div>
    <div class="modal-body">
     <center>
            <br>
            <div id="mensaje_agregar_DescargarExcel">
              <h5>¿Estás seguro que quieres generar un reporte excel?</h5>
              </div>
            <br>
     </center>
    </div>
      <div class="modal-footer" style="background-color:#28b779; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
          <center><button type="button" class="btn btn-default boton_modal" data-dismiss="modal" id="boton_cerrar_alerta" style="margin-right:20px; border-radius:5px;"><span class="icon"><i class="icon-remove"></i></span> No</button> <button type="button" class="btn btn-default boton_modal " onClick="boton_aceptar_excel();" ng-click="desactivarBotonAgregarProveedor()" style="border-radius:5px;"><span class="icon"><i class="icon-ok"></i></span> Si</button> </center>
        
    </div>
</div>

<div id="myModal2" class="modal hide" style="border-radius:10px;">
    <div class="modal-header" style="background-color: #28b779; border-top-right-radius: 5px; border-top-left-radius: 5px;">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><img src="img/logo3.png" style="height:30px; width:265px;"></h4></center>
    </div>
    <div class="modal-body">
     <center>
            <br>
            <div id="mensaje_eliminar_proveedor" style="color:black;">
              <h5><i class="icon-spinner icon-spin icon-large"></i> Cargando informes del jugador...</h5>
              <br>
              <img src="../config/ver_archivo_jugador.png">
              </div>
           
     </center>
    </div>
      <div class="modal-footer" style="background-color:#28b779; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
          <center><button type="button" class="btn btn-default boton_modal" data-dismiss="modal" id="boton_cerrar_alerta" style="margin-right:20px; border-radius:5px;"><span class="icon"><i class="icon-remove"></i></span> No</button> <button type="button" class="btn btn-default boton_modal" onClick="eliminar_bodega();" ng-click="desactivarBotonEliminarProveedor()" style="border-radius:5px;"><span class="icon"><i class="icon-ok"></i></span> Si</button> </center>
        
    </div>
</div>
      
<div id="myModal1" class="modal hide" style="border-radius:10px;">
    <div class="modal-header" style="background-color: #28b779; border-top-right-radius: 5px; border-top-left-radius: 5px;">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><img src="img/logo3.png" style="height:30px; width:265px;"></h4></center>
    </div>
    <div class="modal-body">
     <center>
            <br>
            <div id="mensaje_agregar_proveedor" style="color:black;">
              <h5>¿Estás seguro que quieres agregar este Proveedor?</h5>
              </div>
            <br>
     </center>
    </div>
      <div class="modal-footer" style="background-color:#28b779; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
          <center><button type="button" class="btn btn-default boton_modal" data-dismiss="modal" id="boton_cerrar_alerta" style="margin-right:20px; border-radius:5px;"><span class="icon"><i class="icon-remove"></i></span> No</button> <button type="button" class="btn btn-default boton_modal" onClick="guardar_bodega();" ng-click="desactivarBotonAgregarProveedor()" style="border-radius:5px;"><span class="icon"><i class="icon-ok"></i></span> Si</button> </center>
        
    </div>
</div>
      
      
<div id="myModalComentario" class="modal hide" style="border-radius:10px;">
    <div class="modal-header" style="background-color: #28AEB7; border-top-right-radius: 5px; border-top-left-radius: 5px;">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><img src="img/logo3.png" style="height:30px; width:265px;"></h4></center>
    </div>
    <div class="modal-body">
     <center>
            <br>
            <div id="mensaje_agregar_comentario">
              <h5>¿Estás seguro que quieres agregar este comentario?</h5>
              </div>
            <br>
     </center>
    </div>
      <div class="modal-footer" style="background-color:#28AEB7; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
          <center><button type="button" class="btn btn-default boton_modal" data-dismiss="modal" id="boton_cerrar_alerta" style="margin-right:20px; border-radius:5px;" ng-click="activarBoton()"><span class="icon"><i class="icon-remove"></i></span> No</button> <button type="button" class="btn btn-default boton_modal" onClick="enviar_comentario();" ng-click="desactivarBoton()" style="border-radius:5px;"><span class="icon"><i class="icon-ok"></i></span> Si</button> </center>
        
    </div>
</div>
      
      
  </div>
  
  <?php }?>
</div>
</div>





</div>
<!--end-main-container-part-->
<!--Footer-part-->
<div class="row-fluid" style="color: white;">
    <div id="footer" class="span12"> &copy; <?php echo date("Y"); ?> | <?php echo $abreviacion_dominio;?>&#x2122;. Todos los derechos reservados.</div>
</div>
<!--end-Footer-part-->
</body>
</html>

<?php 
	}
?>


<script>


function boton_agregar(){
	window.id_informe = '';
	$('.titulo_principal').eq(0).closest('tr').html(`
		<td>
			<h4 style="text-align: text-center;">NUEVO EJERCICIO</h4>
		</td>
	`);
	
	$('#ingresar_nombre').val('');
	$('#ingresar_objetivo').val('');
	$('#ingresar_zona').val('');
	$('#ingresar_implementos').val('');
	$('#ingresar_descripcion').val('');
	chequear_datos();
	
	$('#cuadro_de_comentarios').hide(); 
	$('.cuadro_buscar_buscar').hide(500);
	$('#cuadro_editar').show(500);
	$('.boton_add').prop("disabled", false);
}


function boton_editar(linea){
	window.id_informe=jugadores_scouting[linea]['idEjercicio'];
	$('.cuadro_titulo_agregar_editar').html("EDITAR EJERCICIO:");
	
	$('#ingresar_nombre').val(jugadores_scouting[linea]['nombre']);
	$('#ingresar_objetivo').val(jugadores_scouting[linea]['objetivo']);
	$('#ingresar_implementos').val(jugadores_scouting[linea]['implementos']);
	$('#ingresar_zona').val(jugadores_scouting[linea]['zona']);
	$('#ingresar_descripcion').val(jugadores_scouting[linea]['descripcion']);
	
	$('#cuadro_de_comentarios').hide(); 
	$('.cuadro_buscar_buscar').hide(500);
	$('#cuadro_editar').show(500);
	$('.boton_add').prop("disabled", false);
}





function chequear_datos(){
	var ER_caracteresConEspacios = /^([a-zA-Z\x7f-\xff](\s[a-zA-Z\x7f-\xff])*)+$/;
	var ER_alfaNumericoConEspacios=/^([a-zA-Z0-9\x7f-\xff](\s[a-zA-Z0-9\x7f-\xff])*)+$/;
	var flag = true; 
	var ingresar_nombre = $.trim($('#ingresar_nombre').val());
	var ingresar_objetivo = $.trim($('#ingresar_objetivo').val());
	var ingresar_implementos = $.trim($('#ingresar_implementos').val());
	var ingresar_zona = $.trim($('#ingresar_zona').val());
	var ingresar_descripcion = $.trim($('#ingresar_descripcion').val());

	if (ingresar_nombre == "" || ingresar_objetivo == "" || ingresar_implementos == "" || ingresar_zona == "" || ingresar_descripcion == "") {
		flag = false;
	}

		//alert("El campo nombre no puede quedar en blanco.");
	/*} else if (ingresar_objetivo == "") {
		//alert("El campo objetivo no puede quedar en blanco.");	
	} else if (ingresar_implementos == "") {
		//alert("El campo implementos requeridos no puede quedar en blanco.");	
	}  else if (ingresar_zona == "") {
		//alert("Debe seleccionar una zona anatómica");*/	

	/*if(ingresar_nombre!=''){
	  if(ingresar_nombre.match(ER_alfaNumericoConEspacios) && parseInt(ingresar_nombre.length)>2){
		  $('#ingresar_nombre').css("background-color", "#d4ffdc");
	  }else{
		  $('#ingresar_nombre').css("background-color", "#ffc6c6");
		  flag = false;
	  }
	}else{
		$('#ingresar_nombre').css("background-color", "white");
		flag = false;//false: solo si es obligatorio, sacar linea si no es obligatorio el campo
	}
	
	if(ingresar_ubicacion!=''){
	  if(ingresar_ubicacion.match(ER_alfaNumericoConEspacios)){
		  $('#ingresar_ubicacion').css("background-color", "#d4ffdc");
	  }else{
		  $('#ingresar_ubicacion').css("background-color", "#ffc6c6");
		  flag = false;
	  }
	}else{
		$('#ingresar_ubicacion').css("background-color", "white");
		flag = false; //false: solo si es obligatorio, sacar linea si no es obligatorio el campo
	}

	if(ingresar_encargado!=''){
	  if(ingresar_encargado.match(ER_alfaNumericoConEspacios)){
		  $('#ingresar_encargado').css("background-color", "#d4ffdc");
	  }else{
		  $('#ingresar_encargado').css("background-color", "#ffc6c6");
		  flag = false;
	  }
	}else{
		$('#ingresar_encargado').css("background-color", "white");
		flag = false; //false: solo si es obligatorio, sacar linea si no es obligatorio el campo
	}
	
	if(ingresar_descripcion!=''){
	  if(parseInt(ingresar_descripcion.length)>2){
		  $('#ingresar_descripcion').css("background-color", "#d4ffdc");
	  }else{
		  $('#ingresar_descripcion').css("background-color", "#ffc6c6");
		  flag = false;
	  }
	}else{
		$('#ingresar_descripcion').css("background-color", "white");
		//flag = false; //false: solo si es obligatorio, sacar linea si no es obligatorio el campo
	}*/
	
	if( flag == false ){
		$('#boton_agregar_proveedor').prop("disabled", true);
	}else{
		$('#boton_agregar_proveedor').prop("disabled", false);
	}	

}

function boton_eliminar(id){
	window.id_informe=id;//idprofe
	$('#myModal2').modal('show');
	$('#mensaje_eliminar_proveedor').html('<h5>¿Estás seguro que quieres eliminar éste ejercicio?</h5>*Al borrarlo se perderán todos los datos asociados!<br><img src="../config/remover_archivo.png">');
	$('.boton_modal').show();
	//alert(id);
}

function eliminar_bodega(){
	 $('.boton_modal').hide();
	 $.ajax({
		url: "post/utileria_eliminar_bodega.php",
		type: "post",
		dataType: "json",
		data: {
			'id': window.id_informe
		},
		beforeSend: function() {
			$('#mensaje_eliminar_proveedor').html('<h5><i class="icon-spinner icon-spin icon-large"></i> Eliminando ejercicio...</h5><br><img src="../config/remover_archivo.png">');
		},
		success: function(respuesta) {
			if(respuesta.estatus == 1){//eliminado correctamente
				$('#mensaje_eliminar_proveedor').html('<h5>Ejercicio eliminado correctamente!</h5>');
				boton_volver();
				buscador();
			}else{
				$('#mensaje_eliminar_proveedor').html("<h5><b style='color:#f26027;'>[Error al eliminar]:</b> contacte al administrador.</h5>");
			}
			//$('#myModal2').modal('hide');
		},error: function(){// will fire when timeout is reached
			$('#mensaje_eliminar_proveedor').html("<h5><b style='color:#f26027;'>[Error al eliminar]:</b> compruebe conexión a internet.</h5>");
    	}, timeout: 10000 // sets timeout to 3 seconds
	  }); 	  
}

function boton_guardar(){
	if(window.id_informe!=""){
		$('#mensaje_agregar_DescargarBoleta').html('<h5 style="color:black;">¿Estás seguro que quieres editar éste Ejercicio?</h5><br><img src="../config/agregar_archivo.png">');
	}else{
	    $('#mensaje_agregar_DescargarBoleta').html('<h5 style="color:black;">¿Estás seguro que quieres agregar éste Ejercicio?</h5><br><img src="../config/agregar_archivo.png">');
	}
	$('#myModalDescargarBoleta').modal('show');
	$('.boton_modal').css('display','');
}


function guardar_bodega(){
	$('.boton_modal').css('display','none');
	//console.log(window.id_informe);
	var data = $('#formularioAgregarProveedor').serializeArray();
	data.push({name: 'id_informe',  value: window.id_informe});
	data.push({name: 'nombre_usuario_software', value: '<?php  echo utf8_encode($_SESSION["nombre_usuario_software"]);?>'});
	//console.log(JSON.stringify(data));
	
	$.ajax({
		url: "post/utileria_guardar_bodega.php",
		type: "post",
		data: data,
		dataType: 'json',
		cache: false,
		beforeSend: function() {
			if(window.id_informe!=""){
				$('#mensaje_agregar_DescargarBoleta').html('<h5><i class="icon-spinner icon-spin icon-large"></i> Editando ejercicio...</h5><br><img src="../config/agregar_archivo.png">');
			}else{
				$('#mensaje_agregar_DescargarBoleta').html('<h5><i class="icon-spinner icon-spin icon-large"></i> Agregando ejercicio...</h5><br><img src="../config/agregar_archivo.png">');
			}
		},
		success: function(respuesta){
			if(respuesta.estatus==1){
			   	$('#mensaje_agregar_DescargarBoleta').html('<h4>Ejercicio ingresado correctamente!</h4>');
				boton_volver();
				buscador();
			}else if(respuesta.estatus==2){				
				$('#mensaje_agregar_DescargarBoleta').html('<h4>Ejercicio editado correctamente!</h4>');
				boton_volver();
				buscador();
			}else{
			  	$('#mensaje_agregar_DescargarBoleta').html('<h5>Error de conexión: los datos no se han podido insertar.</h5><br>');
			
			}			
		}, error : function(xhr, status) {// will fire when timeout is reached
		   $('#mensaje_agregar_DescargarBoleta').html('<h5 style="color: #dc4e4e;"><i class="icon-warning-sign"></i> <b>ERROR:</b> compruebe conexión a internet.</h5>');
		   // console.log(xhr + ':' + status);
		}, timeout: 15000 // sets timeout to 3 seconds
	});	
}



function buscador(){
	 var string = $("#buscar_nombre").val();
	 var zona = $("#buscar_zona").val();
	 $('#error_conexion').hide();
	 $('#sin_resultados').hide();
	 $('#cargando_buscar').show();
	$.ajax({
			url: "post/utileria_ver_bodegas.php",
			type: "post",
			dataType: 'json',
			cache: false,
			data: {
			'string': string,
			'zona': zona
		},success: function(respuesta){
			if(!respuesta.length){ //jugador sin informes
				$("#tabla_ver_informes tbody").empty();
				var markup = '<tr class="sin_fondo"><td colspan="7"><center><h5 style="color:#555555;"><i class="icon-file-alt"></i> Sin Ejercicios</h5></center></td></tr>';
				$("#tabla_ver_informes tbody").append(markup);
				$("#graficos_informes_resumen").hide();
				$('#cargando_buscar').hide();
				$('#sin_resultados').show();
				$('#boton_editar').hide();
				$('.boton_refresh').hide();
			}else{
				$('#boton_editar').prop("disabled",false);
				window.jugadores_scouting = respuesta; //se copian todos los profesores al cache
				$("#tabla_ver_informes tbody").empty();
				var count = 1;
				
				for(var i=0; i < respuesta.length; i++){ 
					
					var markup = '<tr class="panel_buscar" style="cursor:pointer; color:#555555; font-size:13px;" id="informe_'+respuesta[i]['idEjercicio']+'"><td onClick="boton_editar('+i+');"><center><b>'+count+'</b></center></td><td onClick="boton_editar('+i+');"><b>'+respuesta[i]['nombre']+'</b></center></td><td onClick="boton_editar('+i+');"><b>'+respuesta[i]['objetivo']+'</b></center></td><td onClick="boton_editar('+i+');"><b>'+respuesta[i]['zona']+'</b></center></td><td onClick="boton_editar('+i+');"><b>'+respuesta[i]['implementos']+'</b></center></td><td style="background-color: #eeeeee;"><center><a class="boton_eliminar" onClick="boton_editar('+i+');"><i class="icon-pencil"></i></a></center></td><td style="background-color: #eeeeee;"><center><a class="boton_eliminar" onClick="boton_eliminar('+respuesta[i]['idEjercicio']+');"><i class="icon-remove"></i></a></center></td></tr>';
					$("#tabla_ver_informes tbody").append(markup);
					count = count + 1;
				}
				$('#boton_editar').show();
				$('.boton_refresh').hide();
			} 
			$('#cargando_buscar').hide();
			$('#error_conexion').hide();
			$('#sin_resultados').hide();
			
		},error: function(){// will fire when timeout is reached
			$('#cargando_buscar').hide();
			$('#sin_resultados').hide();
			$('#error_conexion').show();
			$('#boton_editar').hide();
			$('.boton_refresh').show();
		}, timeout: 15000 // sets timeout to 3 seconds
	});
}



function boton_volver(){
	$('#cuadro_editar').hide(500);
	$('.cuadro_buscar_buscar').show(500);
}




</script>
<script type="text/javascript" src="bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript">
	$('.date_fechaNacimiento').datetimepicker({
        language:  'es',
		format: 'yyyy-mm-dd',
		//startDate: '2014-12-01',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		autoclose: true
    });

	buscador();
	mostrar_al_cargar_pagina();
</script>