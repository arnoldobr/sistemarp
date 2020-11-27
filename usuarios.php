<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

$s->display('usuarios.tpl');
