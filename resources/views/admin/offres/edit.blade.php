@extends('layouts.app')
@section('title',"Modifier l'offre")
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
<div class="card-header"><i class="fas fa-edit" style="color:var(--vert)"></i> Modifier l'offre</div>
<div class="card-body">
<form method="POST" action="{{ route('admin.offres.update',$offre) }}">@csrf @method('PUT')
<div class="form-group"><label>Titre *</label><input type="text" name="titre" value="{{ old('titre',$offre->titre) }}" required></div>
<div class="form-row">
<div class="form-group"><label>Entreprise *</label><input type="text" name="entreprise" value="{{ old('entreprise',$offre->entreprise) }}" required></div>
<div class="form-group"><label>Ville *</label><select name="ville" required>@foreach($villes as $v)<option value="{{ $v }}" {{ old('ville',$offre->ville)==$v?'selected':'' }}>{{ $v }}</option>@endforeach</select></div>
</div>
<div class="form-row">
<div class="form-group"><label>Secteur *</label><select name="secteur" required>@foreach($secteurs as $s)<option value="{{ $s }}" {{ old('secteur',$offre->secteur)==$s?'selected':'' }}>{{ $s }}</option>@endforeach</select></div>
<div class="form-group"><label>Contrat *</label><select name="type_contrat" required>@foreach(['CDI','CDD','Stage','Journalier','Freelance'] as $c)<option value="{{ $c }}" {{ old('type_contrat',$offre->type_contrat)==$c?'selected':'' }}>{{ $c }}</option>@endforeach</select></div>
</div>
<div class="form-row">
<div class="form-group"><label>Salaire min (FCFA)</label><input type="number" name="salaire_min" value="{{ old('salaire_min',$offre->salaire_min) }}" min="0"></div>
<div class="form-group"><label>Salaire max (FCFA)</label><input type="number" name="salaire_max" value="{{ old('salaire_max',$offre->salaire_max) }}" min="0"></div>
</div>
<div class="form-row">
<div class="form-group"><label>Date limite *</label><input type="date" name="date_limite" value="{{ old('date_limite',$offre->date_limite->format('Y-m-d')) }}" required></div>
<div class="form-group" style="display:flex;align-items:center;gap:.6rem;padding-top:1.8rem"><input type="checkbox" name="active" id="active" value="1" {{ $offre->active?'checked':'' }}><label for="active" style="margin:0;font-weight:400">Offre active</label></div>
</div>
<div class="form-group"><label>Description *</label><textarea name="description" rows="7">{{ old('description',$offre->description) }}</textarea></div>
<div style="display:flex;gap:1rem">
<button type="submit" class="btn btn-vert" style="flex:1;justify-content:center;padding:.8rem"><i class="fas fa-save"></i> Enregistrer</button>
<a href="{{ route('admin.offres.index') }}" class="btn" style="color:var(--gris);border:1.5px solid var(--border);background:transparent">Annuler</a>
</div>
</form>
</div>
</div>
</div>
@endsection