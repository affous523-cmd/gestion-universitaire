html

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Ajouter un Étudiant</h2>
            <form action="{{ route('etudiants.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Matricule</label>
                    <input type="text" name="matricule" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Niveau</label>
                    <select name="niveau" class="form-control" required>
                        <option value="L1">Licence 1</option>
                        <option value="L2">Licence 2</option>
                        <option value="L3">Licence 3</option>
                        <option value="M1">Master 1</option>
                        <option value="M2">Master 2</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection