<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobantes</title>
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">
    <style>
    </style>
</head>

<body>
@yield('content')
</body>

</html>