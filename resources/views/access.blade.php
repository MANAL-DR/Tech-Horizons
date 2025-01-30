<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Technology Magazine</title>
    <link rel="stylesheet" href="https://use.typekit.net/[YOUR_KIT_CODE].css">
    <link href="https://fonts.googleapis.com/css2?family=Migra:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rugrat+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if(session('login_error'))
     <div id="warning">
        <p>{{session('login_error')}}</p>
     </div>
    @endif
    <section class="left-section">
        <div class="content-wrapper">
            <h1>Tech Horizons</h1>
            <p class="slogan">By Tech Enthusiasts, For Tech Enthusiasts</p>
        </div>
    </section>
    <section class="right-section">
     <div class="buttons">
            <a href="{{ route('login.subscriber') }}"><button class="btn btn-user">Subscriber</button></a>
            <a href="{{ route('login.responsable') }}"><button class="btn btn-author">Manager</button></a>
            <a href="{{ route('login.editor') }}"><button class="btn btn-user">Editor</button></a>
        </div>
    </section>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/home.js') }}"></script>
</body>
</html>