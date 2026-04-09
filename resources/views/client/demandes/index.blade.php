@extends('layouts.app')
@section('title','Mes demandes')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem">
<h2 style="font-size:1.4rem;font-weight:800"><i class="fas fa-clipboard-list" style="color:var(--vert)"></i> Mes demandes de poste</h2>
<a href="{{ route('client.demandes.create') }}" class="btn btn-vert btn-sm"><i class="fas fa-plus"></i> Nouvelle demande</a>
</div>
@if($demandes->count())
<div class="card"><table class="table">
<thead><tr><th>Poste</th><th>Secteur</th><th>Ville</th><th>Contrat</th><th>Statut</th><th>Date</th></tr></thead>
<tbody>
@foreach($demandes as $d)
<tr>
<td><strong>{{ $d->poste_souhaite }}</strong></td>
<td>{{ $d->secteur }}</td>
<td>{{ $d->ville }}</td>
<td><span class="badge badge-info">{{ $d->type_contrat }}</span></td>
<td>@if($d->statut==='accepte')<span class="badge badge-success">Acceptee</span>@elseif($d->statut==='refuse')<span class="badge badge-danger">Refusee</span>@else<span class="badge badge-warning">En attente</span>@endif</td>
<td style="font-size:.82rem;color:var(--gris)">{{ $d->created_at->format('d/m/Y') }}</td>
</tr>
@if($d->reponse_admin)<tr><td colspan="6" style="background:#f8fafc;font-size:.83rem;color:var(--gris);font-style:italic"><i class="fas fa-comment"></i> {{ $d->reponse_admin }}</td></tr>@endif
@endforeach
</tbody>
</table></div>
@else
<div style="text-align:center;padding:4rem 2rem;color:var(--gris)">
<i class="fas fa-clipboard" style="font-size:3rem;opacity:.3;display:block;margin-bottom:1rem"></i>
<h3>Aucune demande</h3>
<a href="{{ route('client.demandes.create') }}" class="btn btn-vert" style="margin-top:1rem">Faire une demande</a>
</div>
@endif
@endsection