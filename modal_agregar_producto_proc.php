<?php
include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);

bd_productos_agregar($_POST);

ir('inventario.php');
