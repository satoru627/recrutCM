<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\DemandePoste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandePosteController extends Controller {
    public function index() {
        $demandes = DemandePoste::where('user_id',Auth::id())->latest()->get();
        return view('client.demandes.index', compact('demandes'));
    }
    public function create() {
        return view('client.demandes.create', [
            'villes'   => EmploiController::VILLES,
            'secteurs' => EmploiController::SECTEURS,
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'poste_souhaite'   => 'required|string|max:150',
            'secteur'          => 'required|string',
            'ville'            => 'required|string',
            'competences'      => 'required|string|min:30',
            'disponibilite'    => 'required|string',
            'type_contrat'     => 'required|in:CDI,CDD,Stage,Journalier,Freelance',
            'salaire_souhaite' => 'nullable|numeric|min:0',
        ]);
        DemandePoste::create([
            ...$request->only(['poste_souhaite','secteur','ville','competences','disponibilite','type_contrat','salaire_souhaite']),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('client.demandes.index')->with('success','Demande soumise !');
    }
}
