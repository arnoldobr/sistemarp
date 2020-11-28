<?php
include_once 'inicializacion.php';

bd_tasas_agregar($_POST['tasa']);

ir('tasa.php');
