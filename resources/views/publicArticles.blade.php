@extends('layouts.dashboard')

@section('title','Tech Horizons | ARTICLES')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
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
   <div class="slider-container slider-1">
    <div id="right">＞</div>
    <div id="left">＜</div>
    <div class="slider">
      @foreach($Numero->Articles as $article)
      <a href="/article/{{$article->id}}" target="_blank">
      <div class="box">
          @if($article->image_url)
           <img src="{{ url($article->image_url)}}" alt="Article Image" style="width: 100%; max-height:55%;">
          @endif
         <h3>{{$article->title}}</h3>
         <p>{{$article->content}}</p>
      </div></a>
      @endforeach
    </div>
   </div>

 </div>
 @endsection
 
 @section('script')
 <script type="text/javascript" src="{{asset('js/articlesSlider.js') }}"></script>
 @endsection