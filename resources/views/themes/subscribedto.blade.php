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
        </li>
        @endforeach
    </ul>

</div>
@endsection