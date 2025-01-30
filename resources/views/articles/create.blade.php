@extends('layouts.dashboard')

@section('title', 'Tableau de bord Responsable')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush
@section('navbar')
    @include('profile.partials.navbars.manager') <!-- Inclut la barre de navigation -->
@endsection

@section('contenu')
<h1>Add an Article for the Theme: {{ $theme->name }}</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<a style="text-align:center; font-size:22px;" href="{{ route('responsible.articles') }}"><button>Back to Articles</button></a><br>
<form action="{{ route('responsible.articles.store') }}" method="POST">
    @csrf
    <div class="form-wrapper" style="background-color:rgb(242, 242, 243);">
       <div class="form-container">
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" required><br><br>

            <label for="content">Content:</label><br>
            <textarea name="content" id="content" rows="5" required></textarea><br><br>

            <button type="submit">Add Article</button>
        </div>
        </div>
</form>

@endsection
