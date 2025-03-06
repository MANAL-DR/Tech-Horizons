@extends('layouts.dashboard')

@section('title', 'Theme Statistics')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
  <link rel="stylesheet" href="{{ asset('css/statistics.css') }}">
@endpush

@section('navbar')
    @include('profile.partials.navbars.manager') <!-- Including the navigation bar -->
@endsection

@section('contenu')


<div class="container">
    <h1>Statistics for Theme: {{ $theme->name ?? 'Unknown Theme' }}</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Vérifier si les statistiques existent -->
    @if ($statistics)
    <div class="stats-container">
        
        <div class="stat-card">
            <a href="/responsible/showarticles">
            <h3>Total Articles</h3><br>
            <p>{{ $statistics->total_articles }}</p>
            </a>
        </div>
        
        <div class="stat-card">
            <h3>Pending Proposals</h3><br>
            <p>{{ $statistics->proposals_pending }}</p>
        </div>
        <div class="stat-card">
            <h3>Approved Proposals</h3><br>
            <p>{{ $statistics->proposals_approved }}</p>
        </div>

        <div class="stat-card">
            <a href="/responsible/subscribers">
            <h3>Total Subscribers</h3><br>
            <p>{{ $statistics->total_subscribers }}</p>
            </a>
        </div>
    </div>
    @else
        <p>No statistics available for this theme.</p>
    @endif

    <!-- Bouton pour recalculer les statistiques -->
</div>

@endsection