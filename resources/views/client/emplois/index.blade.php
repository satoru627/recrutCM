@extends('layouts.app')
@section('title','Offres emploi')
@push('styles')
<style>
.filters-bar{background:var(--blanc);padding:1.2rem;border-radius:12px;box-shadow:var(--shadow);margin-bottom:1.5rem}
.filters-form{display:flex;gap:.8rem;flex-wrap:wrap;align-items:flex-end}
.filters-form .fg{display:flex;flex-direction:column;gap:.3rem;flex:1;min-width:140px}
.filters-form label{font-size:.8rem;font-weight:600;color:var(--gris);text-transform:uppercase;letter-spacing:.04em}
.filters-form input,.filters-form select{padding:.55rem .9rem;border:1.5px solid var(--border);border-radius:8px;font-family:'Outfit',sans-serif;font-size:.9rem}
.offres-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(330px,1fr));gap:1.2rem}
.offre-card{background:var(--blanc);border-radius:12px;padding:1.4rem;box-shadow:var(--shadow);border-left:4px solid var(--vert);transition:transform .2s,box-shadow .2s;display:flex;flex-direction:column;gap:.6rem}
.offre-card:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(0,0,0,.1)}
.offre-card h3{font-size:1rem;font-weight:700}
.offre-card .ent{color:var(--vert);font-weight:600;font-size:.88rem}
.offre-card .meta{display:flex;gap:.6rem;flex-wrap:wrap;font-size:.82rem;color:var(--gris)}
.offre-card .footer-card{display:flex;align-items:center;justify-content:space-between;padding-top:.6rem;border-top:1px solid var(--border)}
.salaire{font-weight:700;color:var(--rouge);font-size:.9rem}
</style>
@endpush
@section('content')
<div class="page-header" style="margin:-2rem -1.5rem 2rem;padding:2rem 1.5rem">
<h1><i class="fas fa-briefcase"></i> Offres d'emploi</h1>
<p>Trouvez votre prochain poste au Cameroun</p>
</div>
<div class="filters-bar">
<form method="GET" action="{{ route('client.emplois.index') }}" class="filters-form">
<div class="fg" style="flex:2;min-width:200px"><label>Recherche</label><input type="text" name="recherche" value="{{ $filtres['recherche'] ?? '' }}" placeholder="Titre, entreprise..."></div>
<div class="fg"><label>Ville</label><select name="ville"><option value="">Toutes</option>@foreach($villes as $v)<option value="{{ $v }}" {{ ($filtres['ville']??'')==$v?'selected':'' }}>{{ $v }}</option>@endforeach</select></div>
<div class="fg"><label>Secteur</label><select name="secteur"><option value="">Tous</option>@foreach($secteurs as $s)<option value="{{ $s }}" {{ ($filtres['secteur']??'')==$s?'selected':'' }}>{{ $s }}</option>@endforeach</select></div>
<div class="fg"><label>Contrat</label><select name="contrat"><option value="">Tous</option>@foreach(['CDI','CDD','Stage','Journalier','Freelance'] as $c)<option value="{{ $c }}" {{ ($filtres['contrat']??'')==$c?'selected':'' }}>{{ $c }}</option>@endforeach</select></div>
<div style="display:flex;gap:.5rem">
<button type="submit" class="btn btn-vert"><i class="fas fa-search"></i> Filtrer</button>
<a href="{{ route('client.emplois.index') }}" class="btn" style="background:var(--clair);color:var(--gris);border:1.5px solid var(--border)">Reset</a>
</div>
</form>
</div>
<p style="font-size:.88rem;color:var(--gris);margin-bottom:1rem"><strong>{{ $offres->total() }}</strong> offre(s) trouvee(s)</p>
@if($offres->count())
<div class="offres-grid">
@foreach($offres as $offre)
<div class="offre-card">
<h3>{{ $offre->titre }}</h3>
<div class="ent"><i class="fas fa-building"></i> {{ $offre->entreprise }}</div>
<div class="meta">
<span><i class="fas fa-map-marker-alt"></i> {{ $offre->ville }}</span>
<span><i class="fas fa-industry"></i> {{ $offre->secteur }}</span>
<span><i class="fas fa-clock"></i> Expire {{ $offre->date_limite->diffForHumans() }}</span>
</div>
<p style="font-size:.85rem;color:var(--gris);line-height:1.5">{{ Str::limit($offre->description,100) }}</p>
<div class="footer-card">
<div><div class="salaire">{{ $offre->salaireFormate() }}</div><span class="badge badge-vert" style="font-size:.75rem">{{ $offre->type_contrat }}</span></div>
<a href="{{ route('client.emplois.show',$offre) }}" class="btn btn-vert" style="font-size:.85rem;padding:.45rem 1rem">Voir <i class="fas fa-arrow-right"></i></a>
</div>
</div>
@endforeach
</div>
<div style="display:flex;gap:.4rem;justify-content:center;margin-top:2rem;flex-wrap:wrap">{{ $offres->appends($filtres)->links() }}</div>
@else
<div style="text-align:center;padding:4rem 2rem;color:var(--gris)">
<i class="fas fa-search" style="font-size:3rem;opacity:.3;display:block;margin-bottom:1rem"></i>
<h3>Aucune offre trouvee</h3>
<a href="{{ route('client.emplois.index') }}" class="btn btn-vert" style="margin-top:1rem">Voir toutes les offres</a>
</div>
@endif
@auth
@if(auth()->user()->isClient())
<div style="margin-top:2rem;padding:1.2rem 1.5rem;background:rgba(192,57,43,.07);border-radius:12px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem">
<div><strong>Vous ne trouvez pas ce que vous cherchez ?</strong><p style="font-size:.88rem;color:var(--gris);margin-top:.2rem">Soumettez une demande personnalisee</p></div>
<a href="{{ route('client.demandes.create') }}" class="btn btn-rouge"><i class="fas fa-plus"></i> Faire une demande</a>
</div>
@endif
@endauth
@endsection