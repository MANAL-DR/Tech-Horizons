@extends('layouts.dashboard')

@section('title', 'Tableau de bord Responsable')
@push('styles')

@endpush
@section('navbar')
    @include('profile.partials.navbars.manager') 
@endsection

@section('contenu')  
<h2 style="margin-top:45px; text-align:center; font-size:34px; color:rgba(201, 66, 66, 0.96);">Leading Innovation in : {{ $theme->name }}</h2>
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
@endsection