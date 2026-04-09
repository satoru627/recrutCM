@extends('layouts.app')

@section('title', 'Traiter candidature')

@push('styles')
<style>
    .admin-nav{display:flex;gap:.6rem;margin-bottom:2rem;flex-wrap:wrap}
    .admin-nav a{padding:.5rem 1rem;border-radius:8px;text-decoration:none;font-size:.88rem;font-weight:600;color:var(--gris);background:var(--blanc);box-shadow:var(--shadow);transition:all .2s}
    .admin-nav a:hover, .admin-nav a.active{background:var(--vert);color:#fff}
</style>
@endpush

@section('content')
<div class="admin-nav">
    <a href="{{ route('admin.dashboard') }}"{{ request()->routeIs('admin.dashboard') ? " class='active'" : "" }}><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="{{ route('admin.offres.index') }}"{{ request()->routeIs('admin.offres*') ? " class='active'" : "" }}><i class="fas fa-briefcase"></i> Offres</a>
    <a href="{{ route('admin.candidatures.index') }}"{{ request()->routeIs('admin.candidatures*') ? " class='active'" : "" }}><i class="fas fa-file-alt"></i> Candidatures</a>
    <a href="{{ route('admin.demandes.index') }}"{{ request()->routeIs('admin.demandes*') ? " class='active'" : "" }}><i class="fas fa-clipboard-list"></i> Demandes</a>
    <a href="{{ route('admin.rdv.index') }}"{{ request()->routeIs('admin.rdv*') ? " class='active'" : "" }}><i class="fas fa-calendar"></i> Rendez-vous</a>
    <a href="{{ route('admin.offres.create') }}" class="btn btn-rouge btn-sm" style="margin-left:auto"><i class="fas fa-plus"></i> Nouvelle offre</a>
</div>

<div style="display:grid; grid-template-columns:1fr 340px; gap:1.5rem; align-items:start">
    <div style="display:flex; flex-direction:column; gap:1.2rem">
        <div class="card">
            <div class="card-header"><i class="fas fa-user" style="color:var(--vert)"></i> Profil du candidat</div>
            <div class="card-body">
                <div style="display:flex; gap:1rem; align-items:center; padding:1rem; background:var(--clair); border-radius:10px; margin-bottom:1rem">
                    <div style="width:56px; height:56px; border-radius:50%; background:var(--vert); color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.4rem; font-weight:800; flex-shrink:0">{{ strtoupper(substr($candidature->user->prenom, 0, 1)) }}</div>
                    <div>
                        <div style="font-size:1.1rem; font-weight:700">{{ $candidature->user->nomComplet() }}</div>
                        <div style="font-size:.88rem; color:var(--gris)">{{ $candidature->user->email }}</div>
                    </div>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem .8rem; font-size:.88rem">
                    <span style="color:var(--gris)">Téléphone</span><strong>{{ $candidature->user->telephone }}</strong>
                    <span style="color:var(--gris)">Ville</span><strong>{{ $candidature->user->ville }}</strong>
                    <span style="color:var(--gris)">Inscrit le</span><strong>{{ $candidature->user->created_at->format('d/m/Y') }}</strong>
                    <span style="color:var(--gris)">CV</span><strong>@if($candidature->cv)<a href="{{ asset('storage/'.$candidature->cv) }}" target="_blank" style="color:var(--vert)"><i class="fas fa-file-pdf"></i> Télécharger</a>@else Non fourni @endif</strong>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><i class="fas fa-briefcase" style="color:var(--vert)"></i> Offre ciblée</div>
            <div class="card-body">
                <div style="font-size:1.05rem; font-weight:700">{{ $candidature->offre->titre }}</div>
                <div style="color:var(--vert); font-weight:600; margin:.3rem 0">{{ $candidature->offre->entreprise }}</div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:.4rem .8rem; font-size:.88rem; margin-top:.8rem">
                    <span style="color:var(--gris)">Ville</span><strong>{{ $candidature->offre->ville }}</strong>
                    <span style="color:var(--gris)">Secteur</span><strong>{{ $candidature->offre->secteur }}</strong>
                    <span style="color:var(--gris)">Contrat</span><strong>{{ $candidature->offre->type_contrat }}</strong>
                    <span style="color:var(--gris)">Salaire</span><strong>{{ $candidature->offre->salaireFormate() }}</strong>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><i class="fas fa-envelope-open-text" style="color:var(--vert)"></i> Lettre de motivation</div>
            <div class="card-body" style="line-height:1.8; white-space:pre-line; color:#374151">{{ $candidature->lettre_motivation }}</div>
        </div>

        @if($candidature->rendezvous)
        <div class="card" style="border:2px solid var(--vert)">
            <div class="card-header"><i class="fas fa-calendar-check" style="color:var(--vert)"></i> Rendez-vous planifié <span class="badge badge-success">{{ $candidature->rendezvous->statut }}</span></div>
            <div class="card-body" style="font-size:.9rem">
                <div><strong>Date :</strong> {{ $candidature->rendezvous->date_heure->format('d/m/Y à H:i') }}</div>
                <div><strong>Lieu :</strong> {{ $candidature->rendezvous->lieu }}</div>
                @if($candidature->rendezvous->notes)
                    <div><strong>Notes :</strong> {{ $candidature->rendezvous->notes }}</div>
                @endif
            </div>
        </div>
        @endif
    </div>

    <div style="position:sticky; top:80px; display:flex; flex-direction:column; gap:1rem">
        <div class="card"><div class="card-body" style="text-align:center">
            <div style="font-size:.82rem; color:var(--gris); margin-bottom:.5rem">Statut actuel</div>
            {!! $candidature->badgeStatut() !!}
            <div style="font-size:.8rem; color:var(--gris); margin-top:.5rem">Reçue {{ $candidature->created_at->diffForHumans() }}</div>
        </div></div>

        @if($candidature->statut === 'en_attente')
        <div class="card">
            <div class="card-header"><i class="fas fa-gavel" style="color:var(--rouge)"></i> Traiter</div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.candidatures.traiter', $candidature) }}">
                    @csrf
                    <div class="form-group"><label>Décision *</label><select name="statut" required><option value="">- Choisir -</option><option value="accepte">Accepter</option><option value="refuse">Refuser</option></select></div>
                    <div class="form-group"><label>Message au candidat</label><textarea name="message_admin" rows="4" placeholder="Ex: Votre profil correspond..."></textarea></div>
                    <button type="submit" class="btn btn-vert" style="width:100%; justify-content:center"><i class="fas fa-check"></i> Valider</button>
                </form>
            </div>
        </div>
        @endif

        @if($candidature->statut === 'accepte' && !$candidature->rendezvous)
        <a href="{{ route('admin.rdv.create', $candidature) }}" class="btn btn-vert" style="width:100%; justify-content:center; padding:.8rem"><i class="fas fa-calendar-plus"></i> Planifier un rendez-vous</a>
        @endif

        <a href="{{ route('admin.candidatures.index') }}" style="text-align:center; font-size:.85rem; color:var(--gris); text-decoration:none"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
