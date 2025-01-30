<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @stack('styles')
</head>

<body>
   <header>
        
        @yield('navbar')

   </header>
   <main>
        @yield('quote')
        @yield('contenu')
   </main>
   <footer>

   </footer>
   @stack('scripts')
</body>
</html>
  
  

