@extends('layouts.dashboard')

@section('title', 'Subscribers to the theme')
@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
    @include('profile.partials.navbars.manager') <!-- Include the dynamic navbar -->
@endsection

@section('contenu')


<h1>Subscribers for the theme: {{ $theme->name ?? 'Unknown Theme' }}</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Vérifier s'il y a des abonnés -->
@if ($subscribers->isEmpty())
    <p>No subscribers yet for this theme.</p>
@else
<table >
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscribers as $subscriber)
        <tr>
            <td>{{ $subscriber->name }}</td>
            <td>{{ $subscriber->email }}</td>
            <td>
                <form action="{{ route('responsible.subscribers.unsubscribe', ['user_id' => $subscriber->id]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" >Unsubscribe</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection