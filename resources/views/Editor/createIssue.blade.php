@extends('layouts.dashboard')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.editor')
@endsection
@section('quote')

@endsection
@section('contenu')
<h1>Shape the Future : Create a New Issue</h1>
<div class="new">
    @if(session('success'))
      {{session('success')}}
    @endif
    <form method="post" action=" {{ route('newIssue')}} ">
    @csrf
        <div class="form-wrapper">
          <div class="form-container">
            <input class="txt" name="title" type="text" placeholder="Title"><br>
            <input class="txt" name="description" type="text" placeholder="Description"><br><hr>
            <h3 style="text-align: left; margin-top:10px;">Status :</h3>
            <input type="radio" name="status" value="public">Public
            <input class="radio" type="radio" name="status" value="private">Private<br>
            <input class="btn" type="submit" value="confirm">
          </div>
        </div>
        <h3 class="title" >Proposed articles to include :</h3>
        <table>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Thème</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        @foreach($proposals as $proposal)
        <tr>
            <td>{{ $proposal->title }}</td>
            <td>{{ $proposal->content }}</td>
            <td>{{ $proposal->theme->name }}</td>
            <td>{{ $proposal->user->name }} ({{ $proposal->user->email }})</td>
            <td><input  type="checkbox" name="articlesid[]" value="{{$proposal->id}}"></td> 
        </tr>
        @endforeach
        </table>
    </form>
</div>
@endsection