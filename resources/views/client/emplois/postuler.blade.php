@extends('layouts.app')

@section('title', 'Postuler - ' . $offre->titre)

@section('content')
<div style="max-width:680px; margin:0 auto">
    <div style="margin-bottom:1.2rem; font-size:.88rem">
        <a href="{{ route('client.emplois.show', $offre) }}" style="color:var(--vert)">
            <i class="fas fa-arrow-left"></i> Retour à l'offre
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <div style="font-size:.82rem; color:var(--gris); font-weight:400">Candidature pour</div>
                <div style="font-size:1.1rem; font-weight:700">{{ $offre->titre }}</div>
                <div style="font-size:.88rem; color:var(--vert)">{{ $offre->entreprise }} - {{ $offre->ville }}</div>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('client.emplois.postuler', $offre) }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label>Lettre de motivation * <small style="font-weight:400; color:var(--gris)">(minimum 50 caractères)</small></label>
                    <textarea name="lettre_motivation" rows="8" placeholder="Expliquez pourquoi vous postulez à ce poste...">{{ old('lettre_motivation') }}</textarea>
                    @error('lettre_motivation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>CV (PDF) 
                        <small style="font-weight:400; color:var(--gris)">
                            @if(auth()->user()->cv)
                                - vous avez déjà un CV enregistré
                            @endif
                        </small>
                    </label>
                    <input type="file" name="cv" accept=".pdf">
                    
                    @if(auth()->user()->cv)
                        <div style="font-size:.82rem; color:var(--vert); margin-top:.3rem">
                            <i class="fas fa-check"></i> CV existant utilisé si aucun fichier sélectionné
                        </div>
                    @endif
                    
                    @error('cv')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display:flex; gap:1rem; margin-top:1.5rem">
                    <button type="submit" class="btn btn-vert" style="flex:1; justify-content:center; padding:.8rem">
                        <i class="fas fa-paper-plane"></i> Envoyer ma candidature
                    </button>
                    <a href="{{ route('client.emplois.show', $offre) }}" class="btn" style="color:var(--gris); border:1.5px solid var(--border); background:transparent">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


