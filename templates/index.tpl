{include file="cabecera.tpl"}
		<!-- Custom styles for this template -->
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body class="text-center">
		<form class="form-signin">
			<img id="logo" class="mb-4" src="img/empresa/viral-shop.svg" alt="Viral SHOP">
			<h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>
			<label for="inputEmail" class="sr-only">Usuario</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
			<label for="inputPassword" class="sr-only">Clave</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Clave" required>
			<div class="checkbox mb-3">
				<!-- label>
				<input type="checkbox" value="remember-me"> Recuerdame
			</label -->
		</div>
		<!-- button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button -->
		<a href="inicio.php" class="btn btn-lg btn-primary btn-block">Ingresar</a>
		<p class="mt-5 mb-3 text-muted">&copy; 2020 LRDTAB</p>
	</form>
</body>
</html>
