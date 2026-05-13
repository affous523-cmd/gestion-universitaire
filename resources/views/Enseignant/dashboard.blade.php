html
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tableau de bord Enseignant</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Mes Cours</h5>
                    <a href="{{ route('cours.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Les Notes</h5>
                    <a href="{{ route('notes.index') }}" class="btn btn-light">Gérer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection