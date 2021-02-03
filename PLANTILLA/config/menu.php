
	<ul>
    <?php 
    if($menu_lateral['utileria']){?>
    <li class="submenu <?php if($menu_actual=='utileria'){?>active open<?php }?>" <?php if($menu_actual=='utileria'){?>style="border-bottom: 0px;"<?php }?>> <a href="#"><i class="icon-check"></i> <?php if(!$software_demo || ($software_demo && $demo['utileria'])){?>Utilería<?php }else{?><strike style="color:white;"><span>&nbsp;Utilería&nbsp;</span></strike><?php }?></a>
      <ul>
        <?php 
        if($menu_lateral['utileria_ejercicios']){
        ?>
        <li><a href="<?php echo $menu_link['utileria_ejercicios'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_ejercicios'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_ejercicios'])){?>Ejercicios<?php }else{?><strike style="color:white;"><span>&nbsp;Ejercicios&nbsp;</span></strike><?php }?></a></li>
      	<?php 
        }
        if($menu_lateral['utileria_bodega']){
		?>
        <li><a href="<?php echo $menu_link['utileria_bodega'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_bodega'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_bodega'])){?>Bodega<?php }else{?><strike style="color:white;"><span>&nbsp;Bodega&nbsp;</span></strike><?php }?></a></li>
        <?php 
		}
		if($menu_lateral['utileria_proveedores']){
		?>
        <li><a href="<?php echo $menu_link['utileria_proveedores'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_proveedores'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_proveedores'])){?>Proveedores<?php }else{?><strike style="color:white;"><span>&nbsp;Proveedores&nbsp;</span></strike><?php }?></a></li>
        <?php
        }
		if($menu_lateral['utileria_productos']){
		?>
        <li><a href="<?php echo $menu_link['utileria_productos'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_productos'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_productos'])){?>Productos<?php }else{?><strike style="color:white;"><span>&nbsp;Productos&nbsp;</span></strike><?php }?></a></li>
        <?php
        }
		if($menu_lateral['utileria_inventario']){
		?>
        <li><a href="<?php echo $menu_link['utileria_inventario'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_inventario'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_inventario'])){?>Inventario<?php }else{?><strike style="color:white;"><span>&nbsp;Inventario&nbsp;</span></strike><?php }?></a></li>
        <?php
        }
		if($menu_lateral['utileria_entrada']){
		?>
        <li><a href="<?php echo $menu_link['utileria_entrada'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_entrada'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_entrada'])){?>Entrada<?php }else{?><strike style="color:white;"><span>&nbsp;Entrada&nbsp;</span></strike><?php }?></a></li>
        <?php
        }
		if($menu_lateral['utileria_salida']){
		?>
        <li><a href="<?php echo $menu_link['utileria_salida'];?>" onClick="colocar_icono_cargando(this)"><?php if($submenu_actual=='utileria_salida'){?><i class="icon-chevron-right" style="text-decoration: none;"></i><?php }?> <?php if(!$software_demo || ($software_demo && $demo['utileria_salida'])){?>Salida<?php }else{?><strike style="color:white;"><span>&nbsp;Salida&nbsp;</span></strike><?php }?></a></li>
        <?php
        }
		?>
      </ul>
    </li>
    <?php }
	?>
  </ul>
	
