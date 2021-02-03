<?PHP
	/////////////////////////////////////////////////////////////
	/////////////////////// CONFIGURACION //////////////////////
	/////////////////////////////////////////////////////////////
	$software_demo = 1; //1=activo 0=inactivo
	date_default_timezone_set('America/Santiago');
	$dominio                  = "www.11analytics.cl";
	$abreviacion_dominio      = "11Analytics";
	$nombre_pestana_navegador = "11A";
	////////////////////////////////////////////////////////////////
	/////////////////////// DATOS DEL CLIENTE //////////////////////
	////////////////////////////////////////////////////////////////
	$dominio_cliente         = " http://test11analytics.com/test11analytics.com/11analytics/";
	$nombre_club             = "11Analytics";
	$nombre_perfil           = "11Analytics";
	
	
	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	//////////////// HABILITACION MENU SOFTWARE ////////////////////
	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	////////////////////////// MODULO 1 ////////////////////////////
	////////////////////////////////////////////////////////////////
	$menu_lateral['utileria']              					= true;
	$menu_lateral['utileria_ejercicios']   				        = true;
	$menu_lateral['utileria_bodega']   				        = true;
	$menu_lateral['utileria_proveedores']   		        = true;
	$menu_lateral['utileria_productos']   			        = true;
	$menu_lateral['utileria_inventario']   			        = true;
	$menu_lateral['utileria_entrada']   			        = true;
	$menu_lateral['utileria_salida']   			  	        = true;
	/////////////////////////// DEMO /////////////////////////////
	$demo['utileria']  							    	    = true;
	$demo['utileria_ejercicios']   					    	    = true;
	$demo['utileria_bodega']   					    	    = true;
	$demo['utileria_proveedores']   				        = true;
	$demo['utileria_productos']   				    	    = true;
	$demo['utileria_inventario']   				    	    = true;
	$demo['utileria_entrada']   				    	    = true;
	$demo['utileria_salida']   				    	 	   = true;
	////////////////////////// URL //////////////////////////////
	$menu_link['utileria_ejercicios']           				= "utileria_ejercicios.php";
	$menu_link['utileria_bodega']           				= "utileria_bodega.php";
	$menu_link['utileria_proveedores']       			   	= "utileria_proveedores.php";
	$menu_link['utileria_productos']        				= "utileria_productos.php";
	$menu_link['utileria_inventario']        				= "utileria_inventario.php";
	$menu_link['utileria_entrada']        					= "utileria_entrada.php";
	$menu_link['utileria_salida']        					= "utileria_salida.php";
	////////////////////// COMENTARIOS //////////////////////////
	$comentarios['utileria_bodega']   				  		= 35;
	$comentarios['utileria_proveedores']   					= 36;
	$comentarios['utileria_productos']   					= 38;
	$comentarios['utileria_inventario']   					= 39;
	$comentarios['utileria_entrada']   						= 39;
	$comentarios['utileria_salida']   						= 39;
	////////////////////////////////////////////////////////////////
	////////////////////////// MODULO 2 ////////////////////////////
	////////////////////////////////////////////////////////////////
	
	
	
	
	

?>