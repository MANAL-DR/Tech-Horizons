<div id="menu">
        <a href="{{route('dashboard')}}" id="logo">Tech Horizons</a>
        <ul>
            <a href="{{ route('dashboard')}}"><li>Home</li></a>
            <a href="{{ route('article.create')}}"><li>Create Article<li></a>
            <a href="{{ route('articlesTheme')}}"><li>Explore</li></a>
            <a href="{{ route('Subscribedthemes')}}"><li>Subscriptions</li></a>
            <a href="{{ route('articles')}}"><li>Archives</li></a>
            
            <li class="dropdown">{{Auth::user()->name}} 
                <div class="dropdown-menu">
                  <form method="post" action="{{route('logout')}}" > 
                   @csrf
                  <input type="submit" value="Log out">
                  </form>
                </div>
             </li>
            
        </ul>
  </div>