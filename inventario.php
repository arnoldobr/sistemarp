<?php

include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

if (isset ($_POST['categoria']) ){
  $categoria = $_POST['categoria'];
  $texto = $_POST['texto'];
  $s->assign('d', bd_productos_datos((int)$categoria, (string)$texto ) );
} else {
  $categoria = null;
	$s->assign('d', bd_productos_datos() );
}

$s->assign('categ', bd_categorias_datos() );
$s->assign('categ_sel' , $categoria);
$s->display('inventario.tpl');
