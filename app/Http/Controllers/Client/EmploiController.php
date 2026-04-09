<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Offre;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploiController extends Controller {
    const VILLES   = ['Yaounde','Douala','Bafoussam','Garoua','Bamenda','Maroua','Ngaoundere','Bertoua','Ebolowa','Kribi','Limbe','Buea'];
    const SECTEURS = ['BTP','Informatique','Commerce','Agriculture','Sante','Education','Transport','Hotellerie','Finance','Industrie','Telecommunications','Autre'];

    public function index(Request $request) {
        $offres = Offre::active()
            ->parVille($request->ville)->parSecteur($request->secteur)->parContrat($request->contrat)
            ->when($request->recherche, fn($q,$r) => $q->where('titre','like',"%$r%")->orWhere('entreprise','like',"%$r%"))
            ->latest()->paginate(9);
        return view('client.emplois.index', [
            'offres'=>$offres,'villes'=>self::VILLES,'secteurs'=>self::SECTEURS,
            'filtres'=>$request->only(['ville','secteur','contrat','recherche']),
        ]);
    }

    public function show(Offre $offre) {
        $dejaPostule = Auth::check() && Candidature::where('user_id',Auth::id())->where('offre_id',$offre->id)->exists();
        $offresLiees = Offre::active()->where('secteur',$offre->secteur)->where('id','!=',$offre->id)->limit(3)->get();
        return view('client.emplois.show', compact('offre','dejaPostule','offresLiees'));
    }

    public function postulerForm(Offre $offre) {
        if (Candidature::where('user_id',Auth::id())->where('offre_id',$offre->id)->exists())
            return redirect()->route('client.emplois.show',$offre)->with('error','Vous avez deja postule.');
        return view('client.emplois.postuler', compact('offre'));
    }

    public function postuler(Request $request, Offre $offre) {
        $request->validate([
            'lettre_motivation' => 'required|string|min:50',
            'cv'                => 'nullable|file|mimes:pdf|max:2048',
        ]);
        $cvPath = Auth::user()->cv;
        if ($request->hasFile('cv')) $cvPath = $request->file('cv')->store('cvs','public');
        Candidature::create([
            'user_id'=>Auth::id(),'offre_id'=>$offre->id,
            'lettre_motivation'=>$request->lettre_motivation,'cv'=>$cvPath,'statut'=>'en_attente',
        ]);
        return redirect()->route('client.candidatures.index')->with('success','Candidature envoyee !');
    }

    public function mesCandidatures() {
        $candidatures = Candidature::where('user_id',Auth::id())->with(['offre','rendezvous'])->latest()->get();
        return view('client.emplois.mes-candidatures', compact('candidatures'));
    }
}
