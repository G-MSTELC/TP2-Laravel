@extends('layouts.app')

@section('title', 'Liste des utilisateurs')

@section('content')
<div class="card mt-3">
    <div class="card-body">
        <h2>Liste des utilisateurs</h2>
        @if ($users->count() > 0)
        <ul class="list-group">
            @foreach($users as $user)
            <li class="list-group-item">
                <div class="d-flex align-items-center justify-content-between">
                    <span>ID : {{ $user->id }}</span>
                    <span>Nom : {{ $user->name }}</span>
                    <span>Email : {{ $user->email }}</span>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <p>Aucun utilisateur trouvé.</p>
        @endif
    </div>
</div>

<div class="mt-3">
    {{ $users->links('pagination::simple-bootstrap-4') }}
</div>
@endsection
