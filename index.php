<?php require_once 'vendor/autoload.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema RP">
    <meta name="author" content="Arnoldo Bric">
    <title>Sistema RP</title>

   <!-- Bootstrap core CSS -->
<link href="libs/twbs/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">


<meta name="theme-color" content="#8002d5">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin">
  <img class="mb-4" src="img/empresa/viral-shop.svg" alt="Viral SHOP" height="72">
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
