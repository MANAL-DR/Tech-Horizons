@extends('layouts.dashboard')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.editor')
@endsection

@section('contenu')
        <h1>Subscribers Management Panel</h1>
        <table>
            <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Role</th>
            <th></th>
            <th></th>
            </tr>
            @foreach($subscribers as $subscriber)
            <tr>
            <td>{{$subscriber->name}}</td>
            <td>{{$subscriber->email}}</td>
            <td id="role-{{$subscriber->id}}">{{$subscriber->role}}</td>
            <td><button id="update" onclick="update('{{$subscriber->id}}')">Update</button></td>
            <form method="post" action="{{route('deleteUser')}}">
            @csrf
            <input type="hidden" name="id" value="{{$subscriber->id}}">
            <td><input class="btn" type="submit" value="Delete"></td>
            </form>
            </tr>
            @endforeach
        </table>

    <script type="text/javascript" src="{{asset('js/editor.js')}}"></script>
</body>
</html>
@endsection


