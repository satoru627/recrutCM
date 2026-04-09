<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Offre;
use App\Models\Candidature;
use App\Models\DemandePoste;
use App\Models\Rendezvous;
use App\Models\User;
use App\Http\Controllers\Client\EmploiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    public function dashboard() {
        return view('admin.dashboard', [
            'totalOffres'           => Offre::count(),
            'offresActives'         => Offre::active()->count(),
            'totalCandidatures'     => Candidature::count(),
            'enAttente'             => Candidature::where('statut','en_attente')->count(),
            'totalClients'          => User::where('role','client')->count(),
            'rdvAujourdhui'         => Rendezvous::whereDate('date_heure',today())->count(),
            'dernieresCandidatures' => Candidature::with(['user','offre'])->latest()->limit(5)->get(),
        ]);
    }
    public function offresIndex() {
        return view('admin.offres.index', ['offres' => Offre::withCount('candidatures')->latest()->paginate(15)]);
    }
    public function offresCreate() {
        return view('admin.offres.create', ['villes'=>EmploiController::VILLES,'secteurs'=>EmploiController::SECTEURS]);
    }
    public function offresStore(Request $request) {
        $request->validate(['titre'=>'required|string|max:200','description'=>'required|string|min:50','ville'=>'required','secteur'=>'required','type_contrat'=>'required|in:CDI,CDD,Stage,Journalier,Freelance','entreprise'=>'required|string|max:150','date_limite'=>'required|date|after:today']);
        Offre::create([...$request->only(['titre','description','ville','secteur','type_contrat','salaire_min','salaire_max','entreprise','date_limite']),'admin_id'=>Auth::id(),'active'=>true]);
        return redirect()->route('admin.offres.index')->with('success','Offre publiee !');
    }
    public function offresEdit(Offre $offre) {
        return view('admin.offres.edit', ['offre'=>$offre,'villes'=>EmploiController::VILLES,'secteurs'=>EmploiController::SECTEURS]);
    }
    public function offresUpdate(Request $request, Offre $offre) {
        $request->validate(['titre'=>'required|string|max:200','description'=>'required|string|min:50','ville'=>'required','secteur'=>'required','type_contrat'=>'required|in:CDI,CDD,Stage,Journalier,Freelance','entreprise'=>'required|string|max:150','date_limite'=>'required|date']);
        $offre->update($request->only(['titre','description','ville','secteur','type_contrat','salaire_min','salaire_max','entreprise','date_limite','active']));
        return redirect()->route('admin.offres.index')->with('success','Offre mise a jour !');
    }
    public function offresToggle(Offre $offre) {
        $offre->update(['active'=>!$offre->active]);
        return back()->with('success', $offre->active ? 'Offre activee.' : 'Offre desactivee.');
    }
    public function offresDelete(Offre $offre) {
        $offre->delete();
        return back()->with('success','Offre supprimee !');
    }
    // public function offresToggle(Offre $offre) {
    //     $offre->update(['active'=>!$offre->active]);
    //     return back()->with('success', $offre->active ? 'Offre activee.' : 'Offre desactivee.');
    // }
    public function candidaturesIndex() {
        return view('admin.candidatures.index', ['candidatures'=>Candidature::with(['user','offre'])->latest()->paginate(20)]);
    }
    public function candidaturesShow(Candidature $candidature) {
        $candidature->load(['user','offre','rendezvous']);
        return view('admin.candidatures.show', compact('candidature'));
    }
    public function candidaturesTraiter(Request $request, Candidature $candidature) {
        $request->validate(['statut'=>'required|in:accepte,refuse','message_admin'=>'nullable|string|max:500']);
        $candidature->update(['statut'=>$request->statut,'message_admin'=>$request->message_admin]);
        return redirect()->route('admin.candidatures.show',$candidature)->with('success','Candidature traitee !');
    }
    public function demandesIndex() {
        return view('admin.demandes.index', ['demandes'=>DemandePoste::with('user')->latest()->paginate(20)]);
    }
    public function demandesTraiter(Request $request, DemandePoste $demande) {
        $request->validate(['statut'=>'required|in:accepte,refuse','reponse_admin'=>'nullable|string|max:500']);
        $demande->update(['statut'=>$request->statut,'reponse_admin'=>$request->reponse_admin]);
        return back()->with('success','Demande traitee !');
    }
    public function rdvIndex() {
        return view('admin.rendezvous.index', ['rdvs'=>Rendezvous::with(['client','candidature.offre'])->orderBy('date_heure')->paginate(20)]);
    }
    public function rdvCreate(Candidature $candidature) {
        return view('admin.rendezvous.create', compact('candidature'));
    }
    public function rdvStore(Request $request, Candidature $candidature) {
        $request->validate(['date_heure'=>'required|date|after:now','lieu'=>'required|string|max:300','notes'=>'nullable|string']);
        Rendezvous::create([
            'candidature_id'=>$candidature->id,'admin_id'=>Auth::id(),'client_id'=>$candidature->user_id,
            'date_heure'=>$request->date_heure,'lieu'=>$request->lieu,'notes'=>$request->notes,'statut'=>'planifie',
        ]);
        return redirect()->route('admin.rdv.index')->with('success','Rendez-vous planifie !');
    }
    public function rdvAnnuler(Rendezvous $rdv) {
        $rdv->update(['statut'=>'annule']);
        return back()->with('success','Rendez-vous annule.');
    }
}
