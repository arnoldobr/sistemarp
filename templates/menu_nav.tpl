{* Smarty *}
<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigaton" >
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">
		<img src="./img/empresa/viral-shop.svg" alt="Viral Shop" height="30" loading="lazy">
	</a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="inicio.php">{"home"|fa} Inicio</a></li>
			<li class="nav-item"><a class="nav-link" href="inventario.php">{"clipboard"|fa} Inventario</a></li>
			<li class="nav-item"><a class="nav-link" href="ventas.php">{"shopping-cart"|fa} Ventas</a></li>
			<li class="nav-item"><a class="nav-link" href="compras.php">{"boxes"|fa} Compras</a></li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">{"database"|fa} Datos</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="clientes.php">{"user-tag"|fa} Clientes</a>
					<a class="dropdown-item" href="proveedores.php">{"id-badge"|fa} Proveedores</a>
					<a class="dropdown-item" href="respaldo.php">{"database"|fa} Respaldo</a>
					<a class="dropdown-item" href="usuarios.php">{"user"|fa} Usuarios</a>
				</div>
			</li>
		</ul>
		<span class="navbar-text">{$smarty.session.usuario.nombre}</span>
		<ul class="navbar-nav mr-0">
			<li class="nav-item"><a class="nav-link" href="index.php">{"sign-out-alt"|fa} Salir</a></li>
		</ul>
	</div>
</nav>
