@extends('layouts.app')
@section('title',$offre->titre)
@section('content')

<style>
  .offre-grid {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 1.5rem;
    align-items: start;
  }
  .offre-sidebar {
    position: sticky;
    top: 80px;
  }
  @media (max-width: 768px) {
    .offre-grid {
      grid-template-columns: 1fr;
    }
    .offre-sidebar {
      position: static;
      order: -1; /* sidebar en premier sur mobile */
    }
    .offre-header-meta {
      flex-direction: column;
      gap: .6rem !important;
    }
    .offre-title {
      font-size: 1.25rem !important;
    }
  }
</style>

<div class="offre-grid">

  {{-- Colonne principale --}}
  <div>
    <div class="card">
      <div style="padding:1.8rem 1.5rem;border-bottom:1px solid var(--border)">
        <div style="display:flex;gap:.6rem;margin-bottom:.8rem;flex-wrap:wrap">
          <span class="badge badge-vert">{{ $offre->secteur }}</span>
          <span class="badge badge-info">{{ $offre->type_contrat }}</span>
          @if($offre->estExpiree())<span class="badge badge-danger">Expirée</span>@endif
        </div>
        <h1 class="offre-title" style="font-size:1.6rem;font-weight:800">{{ $offre->titre }}</h1>
        <p style="color:var(--vert);font-weight:600;margin-top:.4rem">
          <i class="fas fa-building"></i> {{ $offre->entreprise }}
        </p>
        <div class="offre-header-meta" style="display:flex;gap:1.5rem;flex-wrap:wrap;margin-top:1rem;font-size:.88rem;color:var(--gris)">
          <span><i class="fas fa-map-marker-alt" style="color:var(--vert)"></i> {{ $offre->ville }}</span>
          <span><i class="fas fa-calendar" style="color:var(--rouge)"></i> Limite : {{ $offre->date_limite->format('d/m/Y') }}</span>
          <span><i class="fas fa-users"></i> {{ $offre->candidatures->count() }} candidature(s)</span>
        </div>
      </div>
      <div class="card-body">
        <h3 style="font-weight:700;margin-bottom:1rem">Description du poste</h3>
        <div style="line-height:1.8;color:#374151;white-space:pre-line">{{ $offre->description }}</div>
      </div>
    </div>

    @if($offresLiees->count())
    <div style="margin-top:1.5rem">
      <h3 style="font-weight:700;margin-bottom:1rem">Offres similaires</h3>
      <div style="display:flex;flex-direction:column;gap:.8rem">
        @foreach($offresLiees as $lien)
        <a href="{{ route('client.emplois.show',$lien) }}"
           style="background:var(--blanc);padding:1rem;border-radius:10px;box-shadow:var(--shadow);
                  text-decoration:none;color:inherit;display:flex;justify-content:space-between;
                  align-items:center;flex-wrap:wrap;gap:.5rem;border-left:3px solid var(--vert)">
          <div>
            <div style="font-weight:600">{{ $lien->titre }}</div>
            <div style="font-size:.82rem;color:var(--gris)">{{ $lien->entreprise }} - {{ $lien->ville }}</div>
          </div>
          <span style="font-weight:700;color:var(--rouge);font-size:.88rem;white-space:nowrap">
            {{ $lien->salaireFormate() }}
          </span>
        </a>
        @endforeach
      </div>
    </div>
    @endif
  </div>

  {{-- Sidebar --}}
  <div class="offre-sidebar">
    <div class="card">
      <div class="card-body">
        @auth
          @if(auth()->user()->isClient())
            @if($dejaPostule)
              <div class="alert alert-success"><i class="fas fa-check-circle"></i> Vous avez déjà postulé</div>
            @elseif(!$offre->estExpiree())
              <a href="{{ route('client.emplois.postuler',$offre) }}"
                 class="btn btn-vert"
                 style="width:100%;justify-content:center;padding:.85rem;font-size:1rem">
                <i class="fas fa-paper-plane"></i> Postuler maintenant
              </a>
            @else
              <div class="alert alert-error">Cette offre a expiré.</div>
            @endif
          @endif
        @else
          <p style="text-align:center;font-size:.9rem;color:var(--gris);margin-bottom:1rem">
            Connectez-vous pour postuler
          </p>
          <a href="{{ route('login') }}" class="btn btn-outline"
             style="width:100%;justify-content:center;margin-bottom:.6rem">
            <i class="fas fa-sign-in-alt"></i> Se connecter
          </a>
          <a href="{{ route('register') }}" class="btn btn-vert"
             style="width:100%;justify-content:center">
            <i class="fas fa-user-plus"></i> S'inscrire
          </a>
        @endauth

        <hr style="margin:1.2rem 0;border:none;border-top:1px solid var(--border)">

        <div style="display:flex;flex-direction:column;gap:.7rem;font-size:.88rem">
          <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:.3rem">
            <span style="color:var(--gris)">Secteur</span>
            <strong>{{ $offre->secteur }}</strong>
          </div>
          <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:.3rem">
            <span style="color:var(--gris)">Contrat</span>
            <strong>{{ $offre->type_contrat }}</strong>
          </div>
          <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:.3rem">
            <span style="color:var(--gris)">Ville</span>
            <strong>{{ $offre->ville }}</strong>
          </div>
          <div style="display:flex;justify-content:space-between;flex-wrap:wrap;gap:.3rem">
            <span style="color:var(--gris)">Salaire</span>
            <strong style="color:var(--rouge)">{{ $offre->salaireFormate() }}</strong>
          </div>
        </div>
      </div>
    </div>

    <a href="{{ route('client.emplois.index') }}"
       style="display:block;text-align:center;margin-top:1rem;font-size:.88rem;color:var(--gris);text-decoration:none">
      <i class="fas fa-arrow-left"></i> Retour aux offres
    </a>
  </div>

</div>
@endsection
