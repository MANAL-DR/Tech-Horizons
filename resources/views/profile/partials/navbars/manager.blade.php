<div id="menu">
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" id="logo">Tech Horizons</a>
    
    <!-- Navigation Links -->
    <ul>
        <li><a href="{{ route('responsible.articles') }}">Articles</a></li>
        <li><a href="{{ route('responsible.subscribers') }}">Subscriptions</a></li>
        <li><a href="{{ route('responsible.proposals') }}">Suggestions</a></li>
        <li><a href="{{ route('responsible.stats', ['theme_id' => $theme->id]) }}">Statistics</a></li>

        <!-- Dropdown for User -->
        <li class="dropdown">{{ Auth::user()->name }}
            <div class="dropdown-menu">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="Log out">
                </form>
            </div>
        </li>
       
    </ul>
</div>