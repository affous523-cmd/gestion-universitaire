<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::all();

        return view('enseignants.index', compact('enseignants'));
    }

    public function create()
    {
        $departements = Departement::all();

        return view('enseignants.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignants',
            'departement_id' => 'required|exists:departements,id',
        ]);

        Enseignant::create($request->all());

        return redirect()->route('enseignants.index');
    }

    public function show(Enseignant $enseignant)
    {
        return view('enseignants.show', compact('enseignant'));
    }

    public function edit(Enseignant $enseignant)
    {
        $departements = Departement::all();

        return view('enseignants.edit', compact('enseignant', 'departements'));
    }

    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignants,email,' . $enseignant->id,
            'departement_id' => 'required|exists:departements,id',
        ]);

        $enseignant->update($request->all());

        return redirect()->route('enseignants.index');
    }

    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();

        return redirect()->route('enseignants.index');
    }
}
