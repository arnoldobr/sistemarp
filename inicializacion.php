<?php
date_default_timezone_set('America/Caracas');
setlocale(LC_ALL,'es_ES');

$CFG = parse_ini_file('config/config.ini.php', true);

session_name($CFG['sesion']['nombre']);
session_start();

require_once 'libs/dBug/dBug.php';

require_once './bd/bd.php';

require_once './libs/funciones.php';
require_once ('./libs/smarty/Smarty.class.php');

$s = new smarty;
$s->assign('nombre', $CFG['nombre']);
