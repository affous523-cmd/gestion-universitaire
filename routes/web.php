<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EnseignantDashboardController;
use App\Http\Controllers\EtudiantDashboardController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EmploiDuTempsController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', function () {
    $role = auth()->user()->role ?? null;

    if ($role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($role === 'enseignant') {
        return redirect('/enseignant/dashboard');
    }

    if ($role === 'etudiant') {
        return redirect('/etudiant/dashboard');
    }

    return redirect('/');
})->middleware('auth');

// Routes Admin seulement
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('enseignants', EnseignantController::class);
    Route::resource('cours', CoursController::class);
    Route::resource('filieres', FiliereController::class);
    Route::resource('departements', DepartementController::class);
});

// Routes Enseignant seulement
Route::middleware(['auth', 'role:enseignant'])->prefix('enseignant')->group(function () {
    Route::get('/dashboard', [EnseignantDashboardController::class, 'index'])->name('enseignant.dashboard');
    Route::resource('notes', NoteController::class);
    Route::resource('cours', CoursController::class);
});

// Routes Etudiant seulement
Route::middleware(['auth', 'role:etudiant'])->prefix('etudiant')->group(function () {
    Route::get('/dashboard', [EtudiantDashboardController::class, 'index'])->name('etudiant.dashboard');
    Route::resource('notes', NoteController::class)->only(['index', 'show']);
    Route::resource('emplois', EmploiDuTempsController::class)->only(['index', 'show']);
});