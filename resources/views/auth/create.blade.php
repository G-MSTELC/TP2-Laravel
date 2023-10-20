@extends('layouts.app')

@section('title', trans('lang.text_registration'))
@section('titleHeader', trans('lang.text_registration'))
@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <form action="{{ route('etudiants.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <!-- Champ Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">@lang('lang.text_name')</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                        @if($errors->has('nom'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('nom') }}
                            </div>
                        @endif
                    </div>

                    <!-- Champ Adresse -->
                    <div class="mb-3">
                        <label for="adresse" class="form-label">@lang('lang.text_adress')</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                        @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse') }}
                            </div>
                        @endif
                    </div>

                    <!-- Champ Numéro de Téléphone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('lang.text_phone')</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        @if($errors->has('phone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>

                    <!-- Champ Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('lang.text_email')</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <!-- Champ Date de Naissance -->
                    <div class="mb-3">
                        <label for="date_de_naissance" class="form-label">@lang('lang.text_birthdate')</label>
                        <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance') }}" required>
                        @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance') }}
                            </div>
                        @endif
                    </div>

                    <!-- Champ Ville -->
                    <div class="mb-3">
                        <label for="ville_id" class="form-label">@lang('lang.text_city')</label>
                        <select class="form-control" id="ville_id" name="ville_id" required>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ville_id'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('ville_id') }}
                            </div>
                        @endif
                    </div>

                    <!-- Champ Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">@lang('lang.text_password')</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @if($errors->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-dark btn-block">@lang('lang.text_save')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
