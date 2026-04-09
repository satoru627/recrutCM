@extends('layouts.app')
@section('title','Candidatures')
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
<div class="card">
<div class="card-header"><span><i class="fas fa-file-alt" style="color:var(--vert)"></i> Toutes les candidatures</span><span style="font-size:.85rem;color:var(--gris)">{{ $candidatures->total() }}</span></div>
<table class="table">
<thead><tr><th>Candidat</th><th>Offre</th><th>Ville</th><th>Statut</th><th>Date</th><th>Action</th></tr></thead>
<tbody>
@forelse($candidatures as $c)
<tr>
<td><strong>{{ $c->user->nomComplet() }}</strong><div style="font-size:.8rem;color:var(--gris)">{{ $c->user->telephone }}</div></td>
<td><div>{{ Str::limit($c->offre->titre,35) }}</div><div style="font-size:.8rem;color:var(--gris)">{{ $c->offre->entreprise }}</div></td>
<td>{{ $c->user->ville }}</td>
<td>{!! $c->badgeStatut() !!}</td>
<td style="font-size:.82rem;color:var(--gris)">{{ $c->created_at->format('d/m/Y') }}</td>
<td><a href="{{ route('admin.candidatures.show',$c) }}" class="btn btn-vert btn-sm"><i class="fas fa-eye"></i> Traiter</a></td>
</tr>
@empty
<tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--gris)">Aucune candidature recue.</td></tr>
@endforelse
</tbody>
</table>
<div style="padding:1rem">{{ $candidatures->links() }}</div>
</div>
@endsection