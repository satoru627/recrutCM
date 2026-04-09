@extends('layouts.app')
@section('title','Mes candidatures')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem">
<h2 style="font-size:1.4rem;font-weight:800"><i class="fas fa-file-alt" style="color:var(--vert)"></i> Mes candidatures</h2>
<a href="{{ route('client.emplois.index') }}" class="btn btn-vert btn-sm"><i class="fas fa-plus"></i> Nouvelles offres</a>
</div>
@if($candidatures->count())
<div style="display:flex;flex-direction:column;gap:1rem">
@foreach($candidatures as $c)
<div class="card"><div class="card-body" style="display:flex;gap:1.2rem;align-items:flex-start;flex-wrap:wrap">
<div style="flex:1;min-width:200px">
<div style="font-weight:700;font-size:1rem">{{ $c->offre->titre }}</div>
<div style="color:var(--vert);font-size:.88rem;font-weight:600">{{ $c->offre->entreprise }}</div>
<div style="font-size:.82rem;color:var(--gris);margin-top:.3rem"><i class="fas fa-map-marker-alt"></i> {{ $c->offre->ville }} &nbsp;·&nbsp; Postule {{ $c->created_at->diffForHumans() }}</div>
</div>
<div style="text-align:right">
{!! $c->badgeStatut() !!}
@if($c->statut==='accepte' && $c->rendezvous)
<div style="margin-top:.5rem;padding:.6rem .9rem;background:#d1fae5;border-radius:8px;font-size:.83rem;color:#065f46">
<i class="fas fa-calendar-check"></i> RDV : {{ $c->rendezvous->date_heure->format('d/m/Y a H:i') }}<br>
<i class="fas fa-map-marker-alt"></i> {{ $c->rendezvous->lieu }}
</div>
@endif
@if($c->message_admin)<div style="margin-top:.5rem;font-size:.82rem;color:var(--gris);max-width:250px;text-align:left"><em>{{ $c->message_admin }}</em></div>@endif
</div>
</div></div>
@endforeach
</div>
@else
<div style="text-align:center;padding:4rem 2rem;color:var(--gris)">
<i class="fas fa-inbox" style="font-size:3rem;opacity:.3;display:block;margin-bottom:1rem"></i>
<h3>Aucune candidature</h3>
<p style="margin:.5rem 0 1.5rem">Parcourez les offres et postulez !</p>
<a href="{{ route('client.emplois.index') }}" class="btn btn-vert">Voir les offres</a>
</div>
@endif
@endsection