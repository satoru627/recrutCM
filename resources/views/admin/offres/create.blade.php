@extends('layouts.app')
@section('title','Nouvelle offre')
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
<div style="max-width:760px;margin:0 auto">
<div class="card">
<div class="card-header"><i class="fas fa-plus" style="color:var(--vert)"></i> Publier une nouvelle offre</div>
<div class="card-body">
<form method="POST" action="{{ route('admin.offres.store') }}">@csrf
<div class="form-group"><label>Titre *</label><input type="text" name="titre" value="{{ old('titre') }}" placeholder="Ex: Developpeur Web Laravel" required>@error('titre')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-row">
<div class="form-group"><label>Entreprise *</label><input type="text" name="entreprise" value="{{ old('entreprise') }}" placeholder="Nom de l'entreprise" required></div>
<div class="form-group"><label>Ville *</label><select name="ville" required><option value="">- Choisir -</option>@foreach($villes as $v)<option value="{{ $v }}" {{ old('ville')==$v?'selected':'' }}>{{ $v }}</option>@endforeach</select></div>
</div>
<div class="form-row">
<div class="form-group"><label>Secteur *</label><select name="secteur" required><option value="">- Choisir -</option>@foreach($secteurs as $s)<option value="{{ $s }}" {{ old('secteur')==$s?'selected':'' }}>{{ $s }}</option>@endforeach</select></div>
<div class="form-group"><label>Contrat *</label><select name="type_contrat" required>@foreach(['CDI','CDD','Stage','Journalier','Freelance'] as $c)<option value="{{ $c }}" {{ old('type_contrat')==$c?'selected':'' }}>{{ $c }}</option>@endforeach</select></div>
</div>
<div class="form-row">
<div class="form-group"><label>Salaire min (FCFA)</label><input type="number" name="salaire_min" value="{{ old('salaire_min') }}" placeholder="Ex: 150000" min="0"></div>
<div class="form-group"><label>Salaire max (FCFA)</label><input type="number" name="salaire_max" value="{{ old('salaire_max') }}" placeholder="Ex: 300000" min="0"></div>
</div>
<div class="form-group"><label>Date limite *</label><input type="date" name="date_limite" value="{{ old('date_limite') }}" min="{{ date('Y-m-d',strtotime('+1 day')) }}" required></div>
<div class="form-group"><label>Description *</label><textarea name="description" rows="7" placeholder="Decrivez le poste, les responsabilites, les exigences...">{{ old('description') }}</textarea>@error('description')<div class="error">{{ $message }}</div>@enderror</div>
<div style="display:flex;gap:1rem">
<button type="submit" class="btn btn-vert" style="flex:1;justify-content:center;padding:.8rem"><i class="fas fa-paper-plane"></i> Publier l'offre</button>
<a href="{{ route('admin.offres.index') }}" class="btn" style="color:var(--gris);border:1.5px solid var(--border);background:transparent">Annuler</a>
</div>
</form>
</div>
</div>
</div>
@endsection