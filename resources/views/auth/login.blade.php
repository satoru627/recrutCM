@extends('layouts.app')
@section('title','Connexion')
@section('content')
<div style="max-width:440px;margin:2rem auto">
<div class="card">
<div class="card-header"><span><i class="fas fa-sign-in-alt" style="color:var(--vert)"></i> Connexion</span></div>
<div class="card-body">
@if($errors->any())<div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login') }}">@csrf
<div class="form-group"><label>Email *</label><input type="email" name="email" value="{{ old('email') }}" placeholder="votre@email.cm" required autofocus></div>
<div class="form-group"><label>Mot de passe *</label><input type="password" name="password" placeholder="••••••" required></div>
<div style="display:flex;align-items:center;gap:.5rem;margin-bottom:1.2rem;font-size:.88rem"><input type="checkbox" name="remember" id="rem"><label for="rem" style="font-weight:400;margin:0">Se souvenir de moi</label></div>
<button type="submit" class="btn btn-vert" style="width:100%;justify-content:center;padding:.75rem"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
</form>
<div style="text-align:center;margin-top:1.2rem;font-size:.88rem;color:var(--gris)">
Pas encore de compte ? <a href="{{ route('register') }}" style="color:var(--vert);font-weight:600">S'inscrire</a>
</div>
<div style="margin-top:1.5rem;padding:1rem;background:var(--clair);border-radius:8px;font-size:.82rem;color:var(--gris)">
<strong style="color:var(--sombre)">Comptes de test :</strong><br>

Client : client@recrutcm.cm / client123
</div>
</div>
</div>
</div>
@endsection
