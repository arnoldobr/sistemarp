<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);


$s->assign('d', bd_tasas_datos() );
$s->display('tasa.tpl');

