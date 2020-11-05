<?php
include_once 'inicializacion.php';

$d=[
	[
		'id'=>'PK01',
		'nombre'=>'Pendrive 18Gb',
		'unidad'=>'pza',
		'cant'=>'17',
		'p_venta'=>'7.2',
		'min'=>'5'
	],
	[
		'id'=>'PK05',
		'nombre'=>'Disco duro portatil',
		'unidad'=>'pza',
		'cant'=>'2',
		'p_venta'=>'25.99',
		'min'=>'2'
	],
	[
		'id'=>'PER01',
		'nombre'=>'Perfume de flores 225ml',
		'unidad'=>'pza',
		'cant'=>'3',
		'p_venta'=>'17',
		'min'=>'4'
	],
	[
		'id'=>'',
		'nombre'=>'',
		'unidad'=>'',
		'cant'=>'',
		'p_venta'=>'',
		'min'=>''
	],
];
$s->assign('d',$d);
$s->display('inventario_lista.tpl');  

