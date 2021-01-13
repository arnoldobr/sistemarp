<?php

include_once 'inicializacion.php';

verifica_nivel(['ADMIN', 'USUARIO']);







if (isset ($_POST['texto']) ){
  $d = bd_productos_datos( (string)$_POST['texto'] );
} else {
	$d = bd_productos_datos();
}
echo '{ "data":', json_encode($d), '}';
