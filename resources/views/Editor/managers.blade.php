@extends('layouts.dashboard')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.editor')
@endsection

@section('contenu')
        <h1>Managers Management Panel</h1>
        <table>
            <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Role</th>
            <th></th>
            <th></th>
            </tr>
            @foreach($managers as $manager)
            <tr>
            <td>{{$manager->name}}</td>
            <td>{{$manager->email}}</td>
            <td id="role-{{$manager->id}}">{{$manager->role}}</td>
            <td><button id="update" onclick="update('{{$manager->id}}')">Update</button></td>
            <form method="post" action="{{route('deleteUser')}}">
            @csrf
            <input type="hidden" name="id" value="{{$manager->id}}">
            <td><input class="btn" type="submit" value="Delete"></td>
            </form>
            </tr>
            @endforeach
        </table>  
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('js/editor.js')}}"></script>
@endpush


