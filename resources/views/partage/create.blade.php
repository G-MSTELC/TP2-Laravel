@extends('layouts.app')

@section('title', 'Partager un Fichier')

@section('content')
    <div class="container">
        <h1>Partager un Fichier</h1>
        <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title_en">Titre (en anglais)</label>
                <input type="text" name="title_en" id="title_en" class="form-control">
            </div>
            <div class="form-group">
                <label for="title_fr">Titre (en français)</label>
                <input type text" name="title_fr" id="title_fr" class="form-control">
            </div>
            <div class="form-group">
                <label for="file">Fichier</label>
                <input type="file" name="file" id="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Partager</button>
        </form>

        @if (isset($files))
            <!-- Section pour afficher la liste des fichiers partagés -->
            <h2>Liste des Fichiers Partagés</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre (en anglais)</th>
                        <th>Titre (en français)</th>
                        <th>Nom de l'Utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->title_en }}</td>
                            <td>{{ $file->title_fr }}</td>
                            <td>{{ $file->userName() }}</td> <!-- Utilisation de la méthode userName() -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $files->links() }} <!-- Affiche les liens de pagination -->
        @endif
    </div>
@endsection
