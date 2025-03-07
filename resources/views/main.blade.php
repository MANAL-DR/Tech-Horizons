<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Horizons @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @stack('styles')
</head>
<body>
    <div id="menu">
        <a href="/" id="logo">Tech Horizons</a>
        <ul>
            <a href="{{ route('home') }}"><li>Home</li></a>
            <a href="{{ route('showthemes') }}"><li>Themes</li></a>
            <!--<li class="dropdown">Catalogue
                <div class="dropdown-menu">
                    <a>Intelligence artificielle</a>
                    <a>Internet des objets</a>
                    <a>Cybersécurité</a>
                    <a>Réalité virtuelle</a>
                </div>
                </li>
            -->
            <a href="{{ route('register') }}"><button>Sign up</button></a>
            <a href="/access" target="_blank"><button>Sign in</button></a>
            
        </ul>
    </div>

     @yield('body')    
    
    @yield('script')
</body>
</html>