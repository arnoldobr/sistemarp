<?php
include_once 'inicializacion.php';

$entrada=false;
if ( password_verify( $_POST['clave'], bd_usuarios_hash( $_POST['login'] ) ) ){
	$entrada=true;
 }

if ($entrada) {
	$_SESSION['usuario'] = bd_usuarios_datos($_POST['login']);
	ir("inicio.php");
} else {
	$_SESSION['usuario'] = NULL;
	ir("index.php");
}

