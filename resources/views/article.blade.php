<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Horizons @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
</head>
<body>
    <div class="container">
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
    
    
    
</body>
</html>