<?php

include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

if (isset ($_POST['texto']) ){
  $s->assign('d', bd_productos_datos( (string)$_POST['texto'] ) );
} else {
	$s->assign('d', bd_productos_datos() );
}

$s->display('inventario.tpl');
