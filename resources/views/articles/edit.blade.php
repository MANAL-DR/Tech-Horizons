@extends('layouts.dashboard')

@section('title','Tech-Horizons | Subscriber')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.subscriber')
@endsection

@section('contenu')
    <h1>Every masterpiece begins with a draft. Keep refining!</h1>
<div> 
    <form action="{{route('articles.update',$article->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-wrapper">
        <div class="form-container">
                <input type="hidden" name="id" value="{{$article->id}}">
                <label for="title">Title</label><br>
                <input class="txt" type="text" name="title" value="{{$article->title}}"><br>
                <label for="theme_id">Theme</label><br>
                <select class='styled-select' name="theme_id" id="theme_id">
                    @foreach ($themes as $theme)
                    <option class='styled-option' value="{{$theme->id}}">{{$theme->name}}</option>      
                    @endforeach
                </select><br>
                <label for="contenu">Content</label><br>
                <textarea name="content"> {{$article->content}}</textarea><br><br>
                <button type="submit">update</button>
            </div>
        </div>
    </form>
</div>    
@endsection
    