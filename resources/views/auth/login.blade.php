<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Starmedia">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Escuela de Proyectistas | Gestor de contenido</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c"> -->


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
    <link href="{{asset('assets/css/signin.css')}}" rel="stylesheet">

    
  </head>
  <body class="text-center">

  <form action="/login" method="POST" class="form-signin">
  @csrf
  <img src="{{asset('assets/images/logo-bw.png')}}" class="mb-4" width="140" alt="">
  <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>

  <label for="email" class="sr-only">Correo electrónico</label>
  <input name="email" type="email" placeholder="Correo electrónico" class="form-control" id="email" required autofocus>
  <label for="pass" class="sr-only">Password</label>
  <input name="password" type="password" placeholder="Contraseña" class="form-control" id="pass" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recordarme
    </label>
  </div>
  <button type="submit"class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>

</form>

</body>
</html>
