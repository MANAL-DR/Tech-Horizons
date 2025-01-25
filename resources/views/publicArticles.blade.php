@extends('main')

@section('title','| ARTICLES')

@section('body')
 <div class="boxcontainer">
   <div class="slider-container slider-1">
    <div id="right">＞</div>
    <div id="left">＜</div>
    <div class="slider">
      @foreach($Numero->articles as $article)
      <a href="/article/{{$article->id}}" target="_blank">
      <div class="box">
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