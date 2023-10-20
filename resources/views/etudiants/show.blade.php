@extends('layouts.app')

@section('title', isset($article) ? $article->title : 'Article non trouvé')

@section('content')
    <div class="container">
        @if (isset($article))
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $article->title }}</h1>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Retour</a>
            </div>
            
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#english">View in English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#french">Voir en français</a>
                </li>
            </ul>

            <!-- Le reste du contenu de la vue -->
        @else
            <p>L'article n'existe pas.</p>
        @endif
    </div>
@endsection
