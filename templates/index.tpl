{include file="cabecera.tpl"}
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<form class="form-signin" action="index_proc.php" method="post">
			<img id="logo" class="mb-4" src="img/empresa/viral-shop.svg" alt="Viral SHOP">
			<h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>
			<label for="login" class="sr-only">Usuario</label>
			<input id="login" type="text" name="login" class="form-control" placeholder="Usuario" required autofocus>
			<label for="clave" class="sr-only">Clave</label>{literal}
			<input type="password" id="clave" name="clave" class="form-control" pattern=".{8,}" title="8 caracteres mínimo" placeholder="Clave" required>{/literal}
			<div class="checkbox mb-3">
				<!-- label>
				<input type="checkbox" value="remember-me"> Recuerdame
			</label -->
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2020 LRDTAB</p>
	</form>
</body>
</html>
