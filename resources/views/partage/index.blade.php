@extends('layouts.app')

@section('title', 'Fichiers Partagés')

@section('content')
    <div class="container">
        <h1>Fichiers Partagés</h1>
        @if (isset($files))
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre (en anglais)</th>
                        <th>Titre (en français)</th>
                        <th>Nom de l'Utilisateur</th>
                        <th>Actions</th> <!-- Ajout d'une colonne pour les actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->title_en }}</td>
                            <td>{{ $file->title_fr }}</td>
                            <td>{{ $file->userName() }}</td>
                            <td>
                                @if ($file->user_id == Auth::id())
                                    <a href="{{ route('editFile', $file->id) }}">Éditer</a>
                                    <a href="{{ route('deleteFile', $file->id) }}">Supprimer</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $files->links() }}
        @endif
    </div>
@endsection
