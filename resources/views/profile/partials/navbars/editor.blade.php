<div id="menu">
        <a href="{{route('dashboard')}}" id="logo">Tech Horizons</a>
        <ul>
            
            <li class="dropdown">Track users
              <ul class="dropdown-menu">
                 <li><a href="{{route('subscribers')}}">Subscribers</a></li>
                 <li><a href="{{route('managers')}}">Managers</a></li>
               </ul>
            </li>
            <a href="/newIssue"><li>Create +</li>
            <a href="{{route('allnum')}}"><li>Issues</li></a>
            <li class="dropdown">{{Auth::user()->name}} 
                <ul class="dropdown-menu">
                  <form method="post" action="{{route('logout')}}" > 
                   @csrf
                  <input type="submit" value="Log out">
                  </form>
                </ul>
            </li> 
        </ul>
  </div>