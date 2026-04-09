<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\EmploiController;
use App\Http\Controllers\Client\DemandePosteController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    $offres = \App\Models\Offre::active()->latest()->limit(6)->get();
    return view('welcome', compact('offres'));
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/inscription',  [AuthController::class, 'showRegister'])->name('register');
    Route::post('/inscription', [AuthController::class, 'register']);
    Route::get('/connexion',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/connexion',   [AuthController::class, 'login']);
});
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::get('/emplois',          [EmploiController::class, 'index'])->name('client.emplois.index');
Route::get('/emplois/{offre}',  [EmploiController::class, 'show'])->name('client.emplois.show');

Route::middleware(['auth','isClient'])->prefix('espace-client')->name('client.')->group(function () {
    Route::get('/', fn() => redirect()->route('client.emplois.index'))->name('home');
    Route::get('/postuler/{offre}',   [EmploiController::class, 'postulerForm'])->name('emplois.postuler');
    Route::post('/postuler/{offre}',  [EmploiController::class, 'postuler']);
    Route::get('/mes-candidatures',   [EmploiController::class, 'mesCandidatures'])->name('candidatures.index');
    Route::get('/demandes',           [DemandePosteController::class, 'index'])->name('demandes.index');
    Route::get('/demandes/creer',     [DemandePosteController::class, 'create'])->name('demandes.create');
    Route::post('/demandes',          [DemandePosteController::class, 'store'])->name('demandes.store');
});

Route::middleware(['auth','isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',                                    [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/offres',                              [AdminController::class, 'offresIndex'])->name('offres.index');
    Route::get('/offres/creer',                        [AdminController::class, 'offresCreate'])->name('offres.create');
    Route::post('/offres',                             [AdminController::class, 'offresStore'])->name('offres.store');
    Route::get('/offres/{offre}/modifier',             [AdminController::class, 'offresEdit'])->name('offres.edit');
    Route::put('/offres/{offre}',                      [AdminController::class, 'offresUpdate'])->name('offres.update');
    route::get('/offres/{offre}/delete',              [AdminController::class, 'offresDelete'])->name('offres.delete');
    Route::patch('/offres/{offre}/toggle',             [AdminController::class, 'offresToggle'])->name('offres.toggle');
    Route::get('/candidatures',                        [AdminController::class, 'candidaturesIndex'])->name('candidatures.index');
    Route::get('/candidatures/{candidature}',          [AdminController::class, 'candidaturesShow'])->name('candidatures.show');
    Route::post('/candidatures/{candidature}/traiter', [AdminController::class, 'candidaturesTraiter'])->name('candidatures.traiter');
    Route::get('/demandes',                            [AdminController::class, 'demandesIndex'])->name('demandes.index');
    Route::post('/demandes/{demande}/traiter',         [AdminController::class, 'demandesTraiter'])->name('demandes.traiter');
    Route::get('/rendezvous',                          [AdminController::class, 'rdvIndex'])->name('rdv.index');
    Route::get('/rendezvous/creer/{candidature}',      [AdminController::class, 'rdvCreate'])->name('rdv.create');
    Route::post('/rendezvous/{candidature}',           [AdminController::class, 'rdvStore'])->name('rdv.store');
    Route::patch('/rendezvous/{rdv}/annuler',          [AdminController::class, 'rdvAnnuler'])->name('rdv.annuler');

        
});
