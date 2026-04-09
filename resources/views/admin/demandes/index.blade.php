@extends('layouts.app')
@section('title','Demandes de poste')
@push('styles')<style>
.admin-nav{display:flex;gap:.6rem;margin-bottom:2rem;flex-wrap:wrap}
.admin-nav a{padding:.5rem 1rem;border-radius:8px;text-decoration:none;font-size:.88rem;font-weight:600;color:var(--gris);background:var(--blanc);box-shadow:var(--shadow);transition:all .2s}
.admin-nav a:hover,.admin-nav a.active{background:var(--vert);color:#fff}
</style>@endpush
@section('content')
<div class="admin-nav">
<a href="{{ route('admin.dashboard') }}"{{ request()->routeIs('admin.dashboard')?" class='active'":'' }}><i class="fas fa-tachometer-alt"></i> Dashboard</a>
<a href="{{ route('admin.offres.index') }}"{{ request()->routeIs('admin.offres*')?" class='active'":'' }}><i class="fas fa-briefcase"></i> Offres</a>
<a href="{{ route('admin.candidatures.index') }}"{{ request()->routeIs('admin.candidatures*')?" class='active'":'' }}><i class="fas fa-file-alt"></i> Candidatures</a>
<a href="{{ route('admin.demandes.index') }}"{{ request()->routeIs('admin.demandes*')?" class='active'":'' }}><i class="fas fa-clipboard-list"></i> Demandes</a>
<a href="{{ route('admin.rdv.index') }}"{{ request()->routeIs('admin.rdv*')?" class='active'":'' }}><i class="fas fa-calendar"></i> Rendez-vous</a>
<a href="{{ route('admin.offres.create') }}" class="btn btn-rouge btn-sm" style="margin-left:auto"><i class="fas fa-plus"></i> Nouvelle offre</a>
</div>
<div style="margin-bottom:1.5rem;display:flex;justify-content:space-between;align-items:center">
<h2 style="font-size:1.3rem;font-weight:800"><i class="fas fa-clipboard-list" style="color:var(--jaune)"></i> Demandes de poste</h2>
<span style="font-size:.85rem;color:var(--gris)">{{ $demandes->total() }}</span>
</div>
@if($demandes->count())
<div style="display:flex;flex-direction:column;gap:1rem">
@foreach($demandes as $d)
<div style="background:var(--blanc);border-radius:12px;box-shadow:var(--shadow);padding:1.3rem 1.5rem;border-left:4px solid {{ $d->statut==='accepte'?'var(--vert)':($d->statut==='refuse'?'var(--rouge)':'var(--jaune)') }};display:flex;gap:1.2rem;align-items:flex-start;flex-wrap:wrap">
<div style="flex:1;min-width:250px">
<div style="font-weight:700;font-size:1rem">{{ $d->poste_souhaite }}</div>
<div style="color:var(--vert);font-size:.88rem;font-weight:600;margin:.2rem 0">{{ $d->user->nomComplet() }} - {{ $d->user->telephone }}</div>
<div style="font-size:.82rem;color:var(--gris);margin-top:.4rem"><i class="fas fa-map-marker-alt"></i> {{ $d->ville }} &nbsp; <i class="fas fa-industry"></i> {{ $d->secteur }} &nbsp; <i class="fas fa-file-contract"></i> {{ $d->type_contrat }}</div>
<div style="margin-top:.7rem;font-size:.85rem;color:#374151;background:var(--clair);padding:.6rem .9rem;border-radius:8px">{{ Str::limit($d->competences,150) }}</div>
<div style="font-size:.8rem;color:var(--gris);margin-top:.5rem">Disponibilite : <strong>{{ $d->disponibilite }}</strong> &nbsp;·&nbsp; {{ $d->created_at->diffForHumans() }}</div>
</div>
<div style="min-width:220px">
<div style="margin-bottom:.8rem;text-align:right">
@if($d->statut==='accepte')<span class="badge badge-success">Acceptee</span>@elseif($d->statut==='refuse')<span class="badge badge-danger">Refusee</span>@else<span class="badge badge-warning">En attente</span>@endif
</div>
@if($d->statut==='en_attente')
<form method="POST" action="{{ route('admin.demandes.traiter',$d) }}">@csrf
<select name="statut" required style="width:100%;padding:.5rem .8rem;border:1.5px solid var(--border);border-radius:8px;font-family:'Outfit',sans-serif;font-size:.88rem;margin-bottom:.5rem"><option value="">- Decision -</option><option value="accepte">Accepter</option><option value="refuse">Refuser</option></select>
<textarea name="reponse_admin" rows="2" placeholder="Reponse (optionnel)..." style="width:100%;padding:.5rem .8rem;border:1.5px solid var(--border);border-radius:8px;font-family:'Outfit',sans-serif;font-size:.85rem;resize:vertical;margin-bottom:.5rem"></textarea>
<button type="submit" class="btn btn-vert btn-sm" style="width:100%;justify-content:center"><i class="fas fa-check"></i> Valider</button>
</form>
@else
@if($d->reponse_admin)<div style="font-size:.82rem;color:var(--gris);font-style:italic;padding:.6rem .8rem;background:var(--clair);border-radius:8px">{{ $d->reponse_admin }}</div>@endif
@endif
</div>
</div>
@endforeach
</div>
<div style="margin-top:1.5rem">{{ $demandes->links() }}</div>
@else
<div style="text-align:center;padding:4rem 2rem;color:var(--gris)">
<i class="fas fa-clipboard" style="font-size:3rem;opacity:.3;display:block;margin-bottom:1rem"></i>
<h3>Aucune demande de poste</h3>
</div>
@endif
@endsection