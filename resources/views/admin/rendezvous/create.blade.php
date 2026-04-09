@extends('layouts.app')
@section('title','Planifier un rendez-vous')
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
<div style="max-width:600px;margin:0 auto">
<div class="card">
<div class="card-header"><i class="fas fa-calendar-plus" style="color:var(--vert)"></i> Planifier un rendez-vous</div>
<div class="card-body">
<div style="background:rgba(26,122,74,.07);border-radius:10px;padding:1rem 1.2rem;margin-bottom:1.5rem;border-left:3px solid var(--vert)">
<div style="font-weight:700">{{ $candidature->offre->titre }}</div>
<div style="color:var(--vert);font-size:.9rem;font-weight:600">{{ $candidature->user->nomComplet() }}</div>
<div style="font-size:.83rem;color:var(--gris);margin-top:.3rem"><i class="fas fa-phone"></i> {{ $candidature->user->telephone }} &nbsp; <i class="fas fa-map-marker-alt"></i> {{ $candidature->user->ville }}</div>
</div>
<form method="POST" action="{{ route('admin.rdv.store',$candidature) }}">@csrf
<div class="form-group"><label>Date et heure *</label><input type="datetime-local" name="date_heure" value="{{ old('date_heure') }}" min="{{ now()->addHour()->format('Y-m-d\TH:i') }}" required>@error('date_heure')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-group"><label>Lieu de l'entretien *</label><input type="text" name="lieu" value="{{ old('lieu') }}" placeholder="Ex: Rue de la Paix, Bastos, Yaounde" required>@error('lieu')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-group"><label>Notes pour le candidat</label><textarea name="notes" rows="4" placeholder="Ex: Apportez vos diplomes originaux...">{{ old('notes') }}</textarea></div>
<div style="display:flex;gap:1rem">
<button type="submit" class="btn btn-vert" style="flex:1;justify-content:center;padding:.8rem"><i class="fas fa-calendar-check"></i> Confirmer le rendez-vous</button>
<a href="{{ route('admin.candidatures.show',$candidature) }}" class="btn" style="color:var(--gris);border:1.5px solid var(--border);background:transparent">Annuler</a>
</div>
</form>
</div>
</div>
</div>
@endsection