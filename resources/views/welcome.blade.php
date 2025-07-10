<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cliente</title>
    </head>
    <style>
        h1{
            font-family: Arial;
        }
    </style>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        {{-- <h1>{{$hola}}</h1> --}}
        <a href="http://127.0.0.1:8000/home"><button>Ir a home</button></a>
    </body>
</html>
