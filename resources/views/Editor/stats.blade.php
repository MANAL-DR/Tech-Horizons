@extends('layouts.dashboard')

@section('title', ' Statistics')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
  <link rel="stylesheet" href="{{ asset('css/statistics.css') }}">
@endpush

@section('navbar')
    @include('profile.partials.navbars.editor') <!-- Including the navigation bar -->
@endsection

@section('contenu')
<h1>Key Magazine Statistics & Insights</h1>
<div class="container">
    <div class="stats-container">
        <div class="stat-card">
            <h3>Total Articles</h3><br>
            <p>{{ $approvedAndPublishedArticlesCount }}</p>
        </div>
        
        <div class="stat-card">
            <h3>Private Issues</h3><br>
            <p>{{ $privateIssuesCount}}</p>
        </div>
        <div class="stat-card">
            <h3>Public Issues</h3><br>
            <p>{{ $publicIssuesCount }}</p>
        </div>

        <div class="stat-card">
            <a href="#">
            <h3>Pending Articles</h3><br>
            <p>{{ $pendingArticlesCount }}</p>
            </a>
        </div>

        <div class="stat-card">
            <h3>Themes</h3><br>
            <p>{{ $themesCount }}</p>
        </div>
        <div class="stat-card">
            <h3>Users</h3><br>
            <p>{{ $usersCount }}</p>
        </div>
        <div class="stat-card">
            <h3>Managers</h3><br>
            <p>{{ $managersCount }}</p>
        </div>
        <div class="stat-card">
            <h3>Subscribers</h3><br>
            <p>{{ $subscribersCount}}</p>
        </div>
    </div>
</div>

@endsection