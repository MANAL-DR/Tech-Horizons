@extends('layouts.dashboard')

@section('title', 'Tableau de bord Responsable')
@push('styles')

@endpush
@section('navbar')
    @include('profile.partials.navbars.manager') <!-- Inclut la barre de navigation -->
@endsection

@section('quote')
<h2 style="margin-top:45px; text-align:center; font-size:34px; color:rgba(201, 66, 66, 0.96);">Leading Innovation in : {{ $theme->name }}</h2>
<div id="slogan">Fueling the minds of tech enthusiasts with<br>cutting-edge insights and ideas,<br>
one innovation at a time.</div>
<div id="welcome">" Welcome,  {{Auth::user()->name}} to your dashboard ! here is where your expertise<br>
 shapes the voice of our community. Review, refine, and approve<br>
 articles that inform and inspire!"<br>
</div>
@endsection

@section('contenu')   
@endsection
