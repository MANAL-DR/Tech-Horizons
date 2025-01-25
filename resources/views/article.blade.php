<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Horizons @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <h1>{{$article->title}}</h1>
    <p>
    {{$article->content}}
    </p>

</body>