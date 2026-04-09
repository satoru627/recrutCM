@extends('layouts.app')
@section('title','Demande de poste')
@section('content')
<div style="max-width:680px;margin:0 auto">
<h2 style="font-size:1.4rem;font-weight:800;margin-bottom:1.5rem"><i class="fas fa-plus-circle" style="color:var(--vert)"></i> Soumettre une demande de poste</h2>
<div class="card"><div class="card-body">
<form method="POST" action="{{ route('client.demandes.store') }}">@csrf
<div class="form-row">
<div class="form-group"><label>Poste souhaite *</label><input type="text" name="poste_souhaite" value="{{ old('poste_souhaite') }}" placeholder="Ex: Developpeur mobile" required>@error('poste_souhaite')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-group"><label>Secteur *</label><select name="secteur" required><option value="">- Choisir -</option>@foreach($secteurs as $s)<option value="{{ $s }}" {{ old('secteur')==$s?'selected':'' }}>{{ $s }}</option>@endforeach</select>@error('secteur')<div class="error">{{ $message }}</div>@enderror</div>
</div>
<div class="form-row">
<div class="form-group"><label>Ville souhaitee *</label><select name="ville" required><option value="">- Choisir -</option>@foreach($villes as $v)<option value="{{ $v }}" {{ old('ville')==$v?'selected':'' }}>{{ $v }}</option>@endforeach</select></div>
<div class="form-group"><label>Type de contrat *</label><select name="type_contrat" required><option value="">- Choisir -</option>@foreach(['CDI','CDD','Stage','Journalier','Freelance'] as $c)<option value="{{ $c }}" {{ old('type_contrat')==$c?'selected':'' }}>{{ $c }}</option>@endforeach</select></div>
</div>
<div class="form-group"><label>Competences *</label><textarea name="competences" rows="4" placeholder="Decrivez vos competences et experiences...">{{ old('competences') }}</textarea>@error('competences')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-row">
<div class="form-group"><label>Disponibilite *</label><input type="text" name="disponibilite" value="{{ old('disponibilite') }}" placeholder="Ex: Immediate, dans 1 mois..." required></div>
<div class="form-group"><label>Salaire souhaite (FCFA)</label><input type="number" name="salaire_souhaite" value="{{ old('salaire_souhaite') }}" placeholder="Ex: 200000" min="0"></div>
</div>
<button type="submit" class="btn btn-vert" style="width:100%;justify-content:center;padding:.8rem"><i class="fas fa-paper-plane"></i> Soumettre ma demande</button>
</form>
</div></div>
</div>
@endsection