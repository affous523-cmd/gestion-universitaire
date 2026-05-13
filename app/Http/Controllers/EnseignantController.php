
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

public function edit(Enseignant $enseignant)
{
    $departements = Departement::all();
    return view('enseignants.edit', compact('enseignant', 'departements'));
}