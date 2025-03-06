@extends('main')

@section('title',' | Home')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('body')
    <h1>Dive into Innovation : Our Different Themes</h1>
    <ul class="themes-list">
        @foreach($themes as $theme)
        <li class="theme" style="text-align:center">
            {{ $theme->name }}
        </li>
        @endforeach
    </ul>
</body>
</html>
</div>

@endsection