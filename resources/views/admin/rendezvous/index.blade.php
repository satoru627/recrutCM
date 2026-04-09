@extends('layouts.app')
@section('title','Rendez-vous')
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
<h2 style="font-size:1.3rem;font-weight:800"><i class="fas fa-calendar-alt" style="color:var(--vert)"></i> Rendez-vous</h2>
<span style="font-size:.85rem;color:var(--gris)">{{ $rdvs->total() }}</span>
</div>
@if($rdvs->count())
<div style="display:flex;flex-direction:column;gap:1rem">
@foreach($rdvs as $rdv)
<div style="background:var(--blanc);border-radius:12px;box-shadow:var(--shadow);padding:1.3rem 1.5rem;display:grid;grid-template-columns:auto 1fr auto;gap:1.2rem;align-items:center">
<div style="text-align:center;background:{{ $rdv->date_heure->isPast()?'var(--gris)':'var(--vert)' }};color:#fff;border-radius:10px;padding:.8rem 1rem;min-width:65px">
<div style="font-size:1.8rem;font-weight:800;line-height:1">{{ $rdv->date_heure->format('d') }}</div>
<div style="font-size:.75rem;text-transform:uppercase;opacity:.85">{{ $rdv->date_heure->isoFormat('MMM') }}</div>
<div style="font-size:.8rem;margin-top:.3rem;background:rgba(255,255,255,.2);border-radius:4px;padding:.15rem .4rem">{{ $rdv->date_heure->format('H:i') }}</div>
</div>
<div>
<div style="font-weight:700;font-size:1rem">{{ $rdv->candidature->offre->titre }}</div>
<div style="color:var(--vert);font-size:.88rem;font-weight:600">{{ $rdv->client->nomComplet() }}</div>
<div style="font-size:.82rem;color:var(--gris);margin-top:.4rem"><i class="fas fa-map-marker-alt"></i> {{ $rdv->lieu }} &nbsp; <i class="fas fa-phone"></i> {{ $rdv->client->telephone }}</div>
@if($rdv->notes)<div style="font-size:.82rem;color:var(--gris);margin-top:.3rem;font-style:italic">{{ $rdv->notes }}</div>@endif
</div>
<div style="text-align:right;display:flex;flex-direction:column;gap:.6rem;align-items:flex-end">
@if($rdv->statut==='planifie')<span class="badge badge-info">Planifie</span>
@elseif($rdv->statut==='confirme')<span class="badge badge-success">Confirme</span>
@elseif($rdv->statut==='annule')<span class="badge badge-danger">Annule</span>
@else<span class="badge badge-warning">Reporte</span>@endif
@if($rdv->statut==='planifie')
<form method="POST" action="{{ route('admin.rdv.annuler',$rdv) }}">@csrf @method('PATCH')
<button type="submit" class="btn btn-sm" style="background:#fee2e2;color:var(--rouge);border:none" onclick="return confirm('Annuler ce rendez-vous ?')"><i class="fas fa-times"></i> Annuler</button>
</form>
@endif
</div>
</div>
@endforeach
</div>
<div style="margin-top:1.5rem">{{ $rdvs->links() }}</div>
@else
<div style="text-align:center;padding:4rem 2rem;color:var(--gris)">
<i class="fas fa-calendar-times" style="font-size:3rem;opacity:.3;display:block;margin-bottom:1rem"></i>
<h3>Aucun rendez-vous planifie</h3>
<a href="{{ route('admin.candidatures.index') }}" class="btn btn-vert" style="margin-top:1rem">Voir les candidatures</a>
</div>
@endif
@endsection