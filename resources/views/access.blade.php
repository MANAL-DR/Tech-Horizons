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
    <section class="left-section">
        <div class="content-wrapper">
            <h1>Tech Horizons</h1>
            <p class="slogan">By Tech Enthusiasts, For Tech Enthusiasts</p>
        </div>
    </section>
    <section class="right-section">
        <div class="buttons">
            <a href="{{ route('login') }}"><button class="btn btn-user">READER</button></a>
            <button class="btn btn-author">ADMIN</button>
        </div>
    </section>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>