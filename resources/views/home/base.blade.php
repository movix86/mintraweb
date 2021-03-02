<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mintraweb</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Text Editor -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="{{ asset('js/src/jquery.richtext.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('js/src/site.css') }}">
        <link rel="stylesheet" href="{{ asset('js/src/richtext.min.css') }}">


        <!-- Externa -->
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @section('nav')
        @show
        <!-- Body es contenido -->
        @yield('contenido')
    </body>
</html>
