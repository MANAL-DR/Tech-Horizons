@extends('layouts.dashboard')

@section('title','Tech-Horizons | Editor')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.editor')
@endsection


@section('quote')
<div id="slogan">Good writing informs,<br> but great editing transforms.</div>
<div id="welcome">"Welcome,  {{Auth::user()->name}}!"<br>
Step into your creative command center, where words transform<br>
into stories and stories into legacies. Your keen eye and sharp <br>
decisions shape the voice of this magazine. Whether you're crafting <br>
a new issue, refining submissions, or curating the next big <br>
feature—this is your space to bring ideas to life. <br>
</div>
<span>Let’s make something extraordinary today!"</span>
@endsection