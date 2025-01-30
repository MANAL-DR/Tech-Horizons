@extends('layouts.dashboard')

@section('title','Tech-Horizons | Subscriber')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.subscriber')
@endsection


@section('quote')
<div id="slogan">The more you know,<br>  the more you realize there is to discover</div>
<div id="welcome">"Welcome,  {{Auth::user()->name}} to your exclusive space!"<br>
Each article is a gateway to knowledge and inspiration.<br>
Enjoy your privileged access to the fullest!
</div>
<span>Let’s make something extraordinary today!"</span>
@endsection

@section('contenu')
@foreach($themes as $theme)
    <div class="boxcontainer">
    <h1 class="box-title">{{$theme->name}}</h1>
    <div class="slider-container slider-1">
        <div id="right">＞</div>
        <div id="left">＜</div>
        <div class="slider">
            @foreach($theme->articles as $article)
                <a href="/article/{{$article->id}}">
                <div class="box">
                <h3>{{$article->title}}</h3>
                <p>{{$article->content}}</p>
                </div>
            </a>
            @endforeach
        </div>
        </div>
    </div>
    @endforeach 
@endsection



