@extends('layouts.dashboard')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.editor')
@endsection

@section('contenu')
        <h1>Control & Manage Issues</h1>
        <table>
            <tr>
                <td colspan="4" style="text-align:center;background-color:rgb(228, 91, 91);font-size:22px;">
                    Public Issues 
                </td>
            </tr>
            <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th></th>
            </tr>
            @foreach($numerospublics as $numero)
            <tr>
            <td>{{$numero->title}}</td>
            <td style="width:900px">{{$numero->description}}</td>
            <td>{{$numero->status}}</td>
            <td>
            <form action="{{ route('changeStatus') }}" method="post">
            @csrf
            <input type="hidden" name="numid" value="{{$numero->id}}">
            <input type="hidden" name="action" value="private">
            <input class="btn" type="submit" value="private">
            </form>
            </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="4" style="text-align: center; background-color:rgb(228, 91, 91); font-size:22px;">
                Private Issues
              </td>
            </tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th></th>
            </tr>
            @foreach($numerosprivates as $numero)
            <tr>
            <td>{{$numero->title}}</td>
            <td style="width:900px">{{$numero->description}}</td>
            <td>{{$numero->status}}</td>
            <td>
            <form action="{{ route('changeStatus') }}" method="post">
            @csrf
            <input type="hidden" name="numid" value="{{$numero->id}}">
            <input type="hidden" name="action" value="public">
            <input class="btn" type="submit" value="public">
            </form>
            </td>
            </tr>
            @endforeach
        </table>

        <script type="text/javascript" src="{{asset('js/editor.js')}}"></script>
@endsection


