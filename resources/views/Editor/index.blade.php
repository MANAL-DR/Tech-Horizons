@extends('dashboards.editor')

@section('contenu')
    <div class="container">
        
        <h1>Propositions d'articles pour l'éditeur</h1>

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        @if ($proposals->isEmpty())
            <p>Aucune proposition n'est disponible pour le moment.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Thème</th>
                        <th>Auteur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proposals as $proposal)
                        <tr>
                            <td>{{ $proposal->title }}</td>
                            <td>{{ $proposal->content }}</td>
                            <td>{{ $proposal->theme->name }}</td>
                            <td>{{ $proposal->user->name }} ({{ $proposal->user->email }})</td>
                            <td></td>
                           
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection