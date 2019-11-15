<!doctype html>

<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link  rel="icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}" />

    <title>Arca-Rags</title>

    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body style="background:#fff;">
        <!-- <img src="./images/slider-header-1.jpg" alt=""> -->
        <div id="app">
            <app></app>
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>


