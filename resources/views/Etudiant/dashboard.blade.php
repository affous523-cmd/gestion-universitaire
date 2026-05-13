html
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tableau de bord Étudiant</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Mes Notes</h5>
                    <a href="{{ route('notes.index') }}" class="btn btn-light">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Emploi du Temps</h5>
                    <a href="{{ route('emplois.index') }}" class="btn btn-light">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Mes Résultats</h5>
                    <a href="{{ route('resultats.index') }}" class="btn btn-light">Consulter</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection