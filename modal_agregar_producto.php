<?php
include_once 'inicializacion.php';


$unidades = [
	"pza" => "Pieza (pza)",
	"m" => "Metro (m)",
];

$categorias = [
	"1" => "Computación",
	"2" => "Víveres",
];


$s->assign('f_codigo',f_input('codigo','key','Código del producto',1));
$s->assign('f_nombre',f_input('nombre','box-open','Nombre del producto',1));
$s->assign('f_unidad',f_select('unidad','ruler','Unidad',$unidades,1));
$s->assign('f_categoria',f_select('categoria','tags','Categoría',$categorias,1));
$s->assign('f_p_compra',f_input('p_compra','boxes','Precio de Compra',1));
$s->assign('f_p_venta',f_input('p_venta','shopping-cart','Precio de venta',1));
$s->assign('f_cantidad',f_input('cantidad','eye','Cantidad',1));
$s->assign('f_minimo',f_input('minimo','battery-quarter','Mínima existencia',1));
$s->display('modal_agregar_producto.tpl');
