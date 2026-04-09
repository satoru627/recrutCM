@extends('layouts.app')
@section('title','Inscription')
@section('content')
<div style="max-width:560px;margin:2rem auto">
<div class="card">
<div class="card-header"><span><i class="fas fa-user-plus" style="color:var(--vert)"></i> Creer un compte</span><a href="{{ route('login') }}" style="font-size:.85rem;color:var(--gris);font-weight:400">Deja inscrit ?</a></div>
<div class="card-body">
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">@csrf
<div class="form-row">
<div class="form-group"><label>Prenom *</label><input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Jean-Pierre" required>@error('prenom')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-group"><label>Nom *</label><input type="text" name="nom" value="{{ old('nom') }}" placeholder="Kamga" required>@error('nom')<div class="error">{{ $message }}</div>@enderror</div>
</div>
<div class="form-group"><label>Email *</label><input type="email" name="email" value="{{ old('email') }}" placeholder="jean@exemple.cm" required>@error('email')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-row">
<div class="form-group"><label>Telephone *</label><input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="+237 6XX XXX XXX" required>@error('telephone')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-group"><label>Ville *</label><select name="ville" required><option value="">- Choisir -</option>@foreach(['Yaounde','Douala','Bafoussam','Garoua','Bamenda','Maroua','Ngaoundere','Bertoua','Ebolowa','Kribi','Limbe','Buea'] as $v)<option value="{{ $v }}" {{ old('ville')==$v?'selected':'' }}>{{ $v }}</option>@endforeach</select>@error('ville')<div class="error">{{ $message }}</div>@enderror</div>
</div>
<div class="form-group"><label>CV (PDF, optionnel)</label><input type="file" name="cv" accept=".pdf">@error('cv')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-row">
<div class="form-group"><label>Mot de passe *</label><input type="password" name="password" placeholder="Min. 6 caracteres" required>@error('password')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-group"><label>Confirmer *</label><input type="password" name="password_confirmation" placeholder="Repeter" required></div>
</div>
<button type="submit" class="btn btn-vert" style="width:100%;justify-content:center;padding:.75rem"><i class="fas fa-user-plus"></i> Creer mon compte</button>
</form>
</div>
</div>
</div>
@endsection