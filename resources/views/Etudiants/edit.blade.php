html

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Modifier un Étudiant</h2>
            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $etudiant->nom }}" required>
                </div>
                <div class="mb-3">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ $etudiant->prenom }}" required>
                </div>
                <div class="mb-3">
                    <label>Matricule</label>
                    <input type="text" name="matricule" class="form-control" value="{{ $etudiant->matricule }}" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $etudiant->email }}" required>
                </div>
                <div class="mb-3">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ $etudiant->telephone }}">
                </div>
                <div class="mb-3">
                    <label>Niveau</label>
                    <select name="niveau" class="form-control" required>
                        <option value="L1" {{ $etudiant->niveau == 'L1' ? 'selected' : '' }}>Licence 1</option>
                        <option value="L2" {{ $etudiant->niveau == 'L2' ? 'selected' : '' }}>Licence 2</option>
                        <option value="L3" {{ $etudiant->niveau == 'L3' ? 'selected' : '' }}>Licence 3</option>
                        <option value="M1" {{ $etudiant->niveau == 'M1' ? 'selected' : '' }}>Master 1</option>
                        <option value="M2" {{ $etudiant->niveau == 'M2' ? 'selected' : '' }}>Master 2</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection