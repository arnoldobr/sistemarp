<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);


$notas = bd_notas_sin_vencer();

$s->assign('d',$notas);
$s->display('inicio.tpl');

