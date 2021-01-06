<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

$s->assign('unidades', bd_productos_unidades() );
$s->assign('categorias', bd_categorias_datos() );

$s->display('modal_agregar_producto.tpl');
