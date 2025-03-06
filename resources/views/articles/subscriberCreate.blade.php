@extends('layouts.dashboard')

@section('title','Tech-Horizons | Subscriber')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
@endpush

@section('navbar')
  @include('profile.partials.navbars.subscriber')
@endsection

@section('contenu')
<h1>Write, Refine, Publish: Your Articles Dashboard</h1>
<div class="new">
    <form action="{{route('article.store')}}" method="POST">
        @csrf
        <div class="form-wrapper">
        <div class="form-container">

            <label for="title">Title</label>
            <input class="txt" type="text" name="title">

        <div>
            <label for="theme_id">Theme</label>
            <select class='styled-select' name="theme_id" id="theme_id">
                @foreach ($themes as $theme)
                <option class='styled-option' value="{{$theme->id}}">
                    {{$theme->name}}
                </option>   
                @endforeach
            </select>
        </div>

        <div>
            <label for="contenu">Contenu</label>
            <input class="txt" type="text" name="content">
            <label for="imageInput" class="custom-file-input">Upload Image</label>
            <input type="file" name="image" accept="images/*" id="imageInput" style="display: none;">
            <img id="imagePreview" style="max-width: 300px; display: none;" alt="Image Preview">
        </div>
         
        <div>
            <button type="submit">Create</button>
        </div>
      </div>
     </div>     
    </form>
    
</div>  
<h1>Your Articles Hub</h1>

    <table>
        <tr>
            <th>Title</th>
            <th>Contenu</th>
            <th>Theme</th>
            <th>Status</th>
            <th colspan="2">Actions</th>

        </tr>
        @foreach($articles as $article)
        <tr>
            <td>{{$article->title}}</td>
            <td>{{$article->content}}</td>
            <td>{{$article->theme->name}}</td>
            <td>{{$article->status}}</td>
            @if($article->status==='pending' || $article->status==='rejected')
            <td><a href="/article/edit/{{$article->id}}"><button>Edit</button></a></td>
            <td>
                <form action="{{route('article.destroy',$article->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button >DELETE</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </table>

@endsection


    