@extends('layouts.dashboard')

@section('title', 'Tableau de bord Responsable')
@push('styles')
@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush
@endpush
@section('navbar')
    @include('profile.partials.navbars.manager') <!-- Inclut la barre de navigation -->
@endsection


@section('contenu')
<h1>Articles for Theme: {{ $theme->name }}</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($articles->isEmpty())
    <p>No articles are available for this theme.</p>
@else
    <table >
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td>
                    <!-- Delete -->
                    <form action="{{ route('responsible.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('responsible.articles.create') }}" ><button>Add a New Article</button></a>
@endsection
