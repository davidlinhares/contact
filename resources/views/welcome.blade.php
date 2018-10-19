<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
        
        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/materialize.css') }}"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/custom.css') }}"  media="screen,projection"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <navigation-bar></navigation-bar>
            <contacts></contacts>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
