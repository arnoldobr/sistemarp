<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

$s->display('inventario_lista.tpl');

