@extends('layouts.dashboard')

@section('title','Tech-Horizons | Subscriber')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.subscriber')
@endsection

@section('contenu')
    <h1>Dive into Innovation : Choose Your Favorite Themes</h1>
    <ul class="themes-list">
        @foreach($themes as $theme)
        <li class="theme">
            {{ $theme->name }}
            @if(Auth::user()->subscribedThemes->contains($theme))
                <form action="{{ route('theme.unsubscribe', $theme->id) }}" method="POST">
                    @csrf
                    <input class="btn" type="submit" value="Unsubscribe">
                </form>
            @else
                <form action="{{ route('theme.subscribe', $theme->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <input class="btn" type="submit" value="Subscribe">
                </form>
            @endif
        </li>
        @endforeach
    </ul>
</body>
</html>
</div>

@endsection