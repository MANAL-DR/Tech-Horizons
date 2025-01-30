@extends('layouts.dashboard')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.editor')
@endsection

@section('contenu')
   <div class="boxcontainer">
      <h1>Explore Our Exclusive Issues</h1>
      <div class="boxwrapper">
      @foreach($Numeros as $num)
      <div class="box">
         <a href="/numeros/{{$num->id}}" target="_blank"><h3>{{$num->title}}</h3></a>
         <p>{{$num->description}}</p>
      </div>
      @endforeach

@endsection