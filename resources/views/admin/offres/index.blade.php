@extends('layouts.app')
@section('title','Gestion des offres')
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
<div class="card-header"><span><i class="fas fa-briefcase" style="color:var(--vert)"></i> Toutes les offres</span><span style="font-size:.85rem;color:var(--gris)">{{ $offres->total() }} offre(s)</span></div>
<table class="table">
<thead><tr><th>Titre</th><th>Ville</th><th>Secteur</th><th>Candidatures</th><th>Statut</th><th>Limite</th><th>Actions</th></tr></thead>
<tbody>
@foreach($offres as $offre)
<tr>
<td><strong>{{ $offre->titre }}</strong><div style="font-size:.8rem;color:var(--gris)">{{ $offre->entreprise }}</div></td>
<td>{{ $offre->ville }}</td>
<td><span class="badge badge-vert">{{ $offre->secteur }}</span></td>
<td style="text-align:center"><strong style="color:var(--rouge)">{{ $offre->candidatures_count }}</strong></td>
<td>@if($offre->active && !$offre->estExpiree())<span class="badge badge-success">Active</span>@elseif($offre->estExpiree())<span class="badge badge-danger">Expiree</span>@else<span class="badge badge-warning">Inactive</span>@endif</td>
<td style="font-size:.82rem;color:var(--gris)">{{ $offre->date_limite->format('d/m/Y') }}</td>
<td>
<div style="display:flex;gap:.4rem">
<a href="{{ route('admin.offres.edit',$offre) }}" class="btn btn-sm btn-outline" style="color:var(--vert);border-color:var(--vert)"><i class="fas fa-edit"></i></a>
<a href="{{route('admin.offres.delete',$offre)}}" class="btn btn-sm btn-outline" style="color:var(--vert);border-color:var(--vert)"><i class="fas fa-trash"></i></a>
<form method="POST" action="{{ route('admin.offres.toggle',$offre) }}">@csrf @method('PATCH')
<button class="btn btn-sm" style="background:{{ $offre->active?'#fef3c7':'#d1fae5' }};color:{{ $offre->active?'#92400e':'#065f46' }};border:none"><i class="fas fa-{{ $offre->active?'eye-slash':'eye' }}"></i></button>
</form>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
<div style="padding:1rem">{{ $offres->links() }}</div>
</div>
@endsection