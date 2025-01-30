@extends('layouts.dashboard')

@section('title','Tech Horizons | ARTICLES')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('navbar')
  @if(Auth::check())
      @if(Auth::user()->role==='subscriber')
         @include('profile.partials.navbars.subscriber')
      @elseif(Auth::user()->role==='manager')
        @include('profile.partials.navbars.manager')
      @elseif(Auth::user()->role==='editor')
        @include('profile.partials.navbars.meditor')
      @endif
  @else
     @include('profile.partials.navbars.meditor')
  @endif
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
 @push('scripts')
 <script type="text/javascript" src="{{asset('js/articlesSlider.js') }}"></script>
 @endpush