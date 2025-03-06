@extends('layouts.dashboard')

@section('title','Tech Horizons | ARTICLES')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
@endpush

@section('navbar')
  @if(Auth::check())
      @if(Auth::user()->role==='subscriber')
         @include('profile.partials.navbars.subscriber')
      @elseif(Auth::user()->role==='manager')
        @include('profile.partials.navbars.manager')
      @elseif(Auth::user()->role==='editor')
        @include('profile.partials.navbars.editor')
      @endif
  @else
     @include('profile.partials.navbars.guest')
  @endif
@endsection

@section('contenu')
<div class="boxcontainer">
    <div class="slider-container">
      
      <div id="right">＞</div>
      <div id="left">＜</div>

          <div class="slider">
              @foreach($articles as $article)
              <a href="/article/{{$article->id}}">
                <div class="box">
                  @if($article->image_url)
                  <img src="{{ asset($article->image_url)}}" alt="Article Image" style="width: 100%; max-height:55%;">
                  @endif
                  <h3>{{$article->title}}</h3>
                  <p>{{$article->content}}</p>
                </div>
              </a>
              @endforeach
          </div>
    </div>

</div>
@endsection
