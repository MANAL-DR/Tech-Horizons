@extends('layouts.dashboard')

@section('title', 'Theme Statistics')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Statistic</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Articles</td>
                    <td>{{ $statistics->total_articles }}</td>
                </tr>
                <tr>
                    <td>Pending Proposals</td>
                    <td>{{ $statistics->proposals_pending }}</td>
                </tr>
                <tr>
                    <td>Approved Proposals</td>
                    <td>{{ $statistics->proposals_approved }}</td>
                </tr>
                <tr>
                    <td>Rejected Proposals</td>
                    <td>{{ $statistics->proposals_rejected }}</td>
                </tr>
                <tr>
                    <td>Total Subscribers</td>
                    <td>{{ $statistics->total_subscribers }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No statistics available for this theme.</p>
    @endif

    <!-- Bouton pour recalculer les statistiques -->
<div>
<!-- Liens utiles -->
<div style="margin-top: 20px;">
    <a href="{{ route('responsible.proposals') }}" class="btn">Manage Proposals</a>
    <a href="{{ route('responsible.articles') }}" class="btn">Manage Articles</a>
</div>

</div>
</div>

@endsection