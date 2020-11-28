<?php
include_once 'inicializacion.php';

bd_notas_cancelar($_GET['id'], $_SESSION['usuario']['id']);
ir('inicio.php');
