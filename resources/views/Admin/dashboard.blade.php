html
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tableau de bord Administrateur</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Étudiants</h5>
                    <a href="{{ route('etudiants.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Enseignants</h5>
                    <a href="{{ route('enseignants.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Cours</h5>
                    <a href="{{ route('cours.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Filières</h5>
                    <a href="{{ route('filieres.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title">Départements</h5>
                    <a href="{{ route('departements.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection