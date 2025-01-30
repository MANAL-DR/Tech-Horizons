@extends('layouts.dashboard')

@section('title', 'Tableau de bord Responsable')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush
@section('navbar')
    @include('profile.partials.navbars.manager') <!-- Inclut la barre de navigation -->
@endsection

@section('contenu')

<h1>Article Proposals for Theme: {{ $theme->name }}</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($proposals as $proposal)
            <tr>
                <td>{{ $proposal->title }}</td>
                <td>{{ $proposal->content }}</td>
                <td>{{ $proposal->user->name ?? 'Unknown User' }}</td>
                <td>{{ ucfirst($proposal->status) }}</td>
                <td>
                    @if ($proposal->status === 'pending')
                        <!-- Approve or Reject -->
                        <form action="{{ route('responsible.proposals.approve', $proposal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button>Approve</button>
                        </form>
                        
                        <form action="{{ route('responsible.proposals.reject', $proposal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button >Reject</button>
                        </form>
                    @elseif ($proposal->status === 'approved')
                        <!-- Propose to Editor -->
                        <form action="{{ route('responsible.proposals.propose', $proposal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button>Propose To Editor</button>
                        </form>

                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">No proposals found for this theme.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
