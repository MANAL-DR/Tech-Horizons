@extends('layouts.dashboard')

@section('title','Tech-Horizons | ')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
@endpush

@section('navbar')
@auth
   @if(Auth::user()->role === 'subscriber')
      @include('profile.partials.navbars.subscriber')
    @elseif(Auth::user()->role === 'theme-manager')
      @include('profile.partials.navbars.manager')
    @else
      @include('profile.partials.navbars.editor')
    @endif
@else
 @include('profile.partials.navbars.guest')
@endauth
@endsection

@section('contenu')
    <div class="container">
        <img src="{{ asset($article->image_url) }}" style="max-width:1000px;">
        <h1 id="title">{{$article->title}}</h1>
        
        <p class="mainp">
        {{$article->content}}
        </p>
        <div class="box-rating rating">
        <p>How would you rate this article </p>
        <form method="POST" action="{{ route('rating', $article->id)}}">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <input id="rate" type="number" name="rate" min="0" max="5"><input type="submit" value="✔">
        </form>
        @if(session('rating_success'))
            <div class="session" style="color: green;">
                {{ session('rating_success') }}
            </div>
        @endif
        </div>
        <div class="box-comment  comment">
            <form method="post" action="{{ route('addcomment','$article->id') }}">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <input id="comment-field" type="text" placeholder="Leave a constructive comment ..." name="comment">
                <input class="btn" id="submit" type="submit" value="Send">
            </form>
        </div>
        @if(session('Register'))
        <div class="comments-wrapper register">
            {{session('Register')}}<br>
            <a href="{{route('register')}}"><button class="btn">Sign up</button></a>
        </div>
        @endif
        <div class="comments-wrapper">
            @foreach($article->commentaires as $commentaire)
            <div class="comment-box">
                <p style="font-weight: 900;">~ {{$commentaire->user->name}}</p>
                <p>{{$commentaire->content}}</p>
            </div>
            @endforeach
        </div>

    </div>
@endsection   