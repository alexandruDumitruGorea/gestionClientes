<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión Clientes</title>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/jumbotron.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/own.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
         <!-- CONTENIDO A RELLENAR -->
         @yield('contenido')
    </div>
    <script src="https://xcode.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{ url('assets/js/jquery-3.3.1.slim.min.js') }}"><\/script>')</script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>
</html>