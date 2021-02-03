<?php 
session_start();
$_SESSION["nombre_usuario_software"]='Maiker Leon';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MODULO 1</title>
</head>
<body>

<?php 
if(isset($GET_['cerrar_sesion'])){
  echo "**Ha finalizado su sesion";
}
?>
<center>
  <h4>MODULO 1 (UTILERIA)</h4><br />
  <div style="width:400px; border: 2px solid black; padding:5px; border-radius:5px;">
      <a href="admin/utileria_bodega.php">Bodega</a><br />
      <a href="admin/utileria_proveedores.php">Proveedores</a><br />
      <a href="admin/utileria_productos.php">Productos</a><br />
      <a href="admin/utileria_inventario.php">Inventario</a><br />
      <a href="admin/utileria_salida.php">Salida</a><br />
      <a href="admin/utileria_entrada.php">Entrada</a><br />
      <a href="admin/subir_imagen.php">Subir imagenes</a><br />
      
  </div>
</center>

</body>
</html>