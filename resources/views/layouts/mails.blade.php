<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- Estilos de la aplicación -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/mails.css')}}">
</head>
<body>
    <style>
        /* Tipografías */
        @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
    </style>

    <div id="mail">
        @yield('content')
    </div>
</body>
</html>