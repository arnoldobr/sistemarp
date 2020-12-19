<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

v($_REQUEST);

if (isset $_GET['categoria']) {
	$s->assign('d', bd_productos_datos($_POST) );
} else {
	$s->assign('d', bd_productos_datos() );
}



$s->assign('categ', bd_categorias_datos() );
$s->display('inventario.tpl');
