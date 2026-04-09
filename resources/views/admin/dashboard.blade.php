@extends('layouts.app')
@section('title','Dashboard Admin')
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
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1rem;margin-bottom:2rem">
<div style="background:var(--blanc);border-radius:12px;padding:1.4rem;box-shadow:var(--shadow);border-top:4px solid var(--vert)"><div style="font-size:2.2rem;font-weight:800;color:var(--vert)">{{ $offresActives }}</div><div style="font-size:.82rem;color:var(--gris)">Offres actives / {{ $totalOffres }}</div></div>
<div style="background:var(--blanc);border-radius:12px;padding:1.4rem;box-shadow:var(--shadow);border-top:4px solid var(--rouge)"><div style="font-size:2.2rem;font-weight:800;color:var(--rouge)">{{ $enAttente }}</div><div style="font-size:.82rem;color:var(--gris)">Candidatures en attente</div></div>
<div style="background:var(--blanc);border-radius:12px;padding:1.4rem;box-shadow:var(--shadow);border-top:4px solid var(--jaune)"><div style="font-size:2.2rem;font-weight:800;color:var(--jaune)">{{ $totalCandidatures }}</div><div style="font-size:.82rem;color:var(--gris)">Total candidatures</div></div>
<div style="background:var(--blanc);border-radius:12px;padding:1.4rem;box-shadow:var(--shadow);border-top:4px solid #3b82f6"><div style="font-size:2.2rem;font-weight:800;color:#3b82f6">{{ $totalClients }}</div><div style="font-size:.82rem;color:var(--gris)">Clients inscrits</div></div>
<div style="background:var(--blanc);border-radius:12px;padding:1.4rem;box-shadow:var(--shadow);border-top:4px solid var(--sombre)"><div style="font-size:2.2rem;font-weight:800">{{ $rdvAujourdhui }}</div><div style="font-size:.82rem;color:var(--gris)">RDV aujourd'hui</div></div>
</div>
<div class="card">
<div class="card-header"><span><i class="fas fa-clock" style="color:var(--rouge)"></i> Dernieres candidatures</span><a href="{{ route('admin.candidatures.index') }}" class="btn btn-sm btn-outline" style="font-size:.82rem">Voir tout</a></div>
<table class="table">
<thead><tr><th>Candidat</th><th>Offre</th><th>Statut</th><th>Date</th><th>Action</th></tr></thead>
<tbody>
@foreach($dernieresCandidatures as $c)
<tr>
<td><strong>{{ $c->user->nomComplet() }}</strong><div style="font-size:.8rem;color:var(--gris)">{{ $c->user->ville }}</div></td>
<td>{{ Str::limit($c->offre->titre,40) }}</td>
<td>{!! $c->badgeStatut() !!}</td>
<td style="font-size:.82rem;color:var(--gris)">{{ $c->created_at->diffForHumans() }}</td>
<td><a href="{{ route('admin.candidatures.show',$c) }}" class="btn btn-vert btn-sm"><i class="fas fa-eye"></i> Voir</a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection