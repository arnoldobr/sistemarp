<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

$s->assign('d', bd_productos_datos() );
$s->assign('categ', bd_categorias_datos() );
$s->display('inventario.tpl');
