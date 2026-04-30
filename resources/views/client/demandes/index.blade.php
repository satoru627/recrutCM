{{-- resources/views/client/demandes/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Mes demandes')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 space-y-6">

  {{-- ── Header ────────────────────────────────────────────────── --}}
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-xl bg-green-600 flex items-center justify-center shadow-sm">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
      </div>
      <div>
        <h1 class="text-xl font-extrabold text-slate-900 leading-tight tracking-tight">
          Mes demandes de poste
        </h1>
        @if($demandes->count())
          <p class="text-xs text-slate-400 mt-0.5">{{ $demandes->count() }} demande{{ $demandes->count() > 1 ? 's' : '' }}</p>
        @endif
      </div>
    </div>

    <a href="{{ route('client.demandes.create') }}"
      class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-sm transition-colors duration-200 whitespace-nowrap self-start sm:self-auto">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
      </svg>
      Nouvelle demande
    </a>
  </div>

  {{-- ── Contenu ─────────────────────────────────────────────────── --}}
  @if($demandes->count())

    {{-- Tableau — md et plus ──────────────────────────────────────── --}}
    <div class="hidden md:block bg-white rounded-2xl shadow-sm ring-1 ring-slate-100 overflow-hidden">
      <table class="w-full">
        <thead>
          <tr class="border-b border-slate-100 bg-slate-50/70">
            @foreach(['Poste','Secteur','Ville','Contrat','Statut','Date'] as $col)
              <th class="py-3.5 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider
                {{ $loop->first ? 'pl-6 pr-3' : ($loop->last ? 'pl-3 pr-6' : 'px-3') }}">
                {{ $col }}
              </th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($demandes as $d)
            <tr class="border-b border-slate-100 last:border-0 hover:bg-slate-50/60 transition-colors duration-150">
              {{-- Poste --}}
              <td class="py-4 pl-6 pr-3">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <span class="font-semibold text-slate-800 text-sm">{{ $d->poste_souhaite }}</span>
                </div>
              </td>
              {{-- Secteur --}}
              <td class="py-4 px-3 text-sm text-slate-600">{{ $d->secteur }}</td>
              {{-- Ville --}}
              <td class="py-4 px-3 text-sm text-slate-600">{{ $d->ville }}</td>
              {{-- Contrat --}}
              <td class="py-4 px-3">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-sky-50 text-sky-700 ring-1 ring-sky-200">
                  {{ $d->type_contrat }}
                </span>
              </td>
              {{-- Statut --}}
              <td class="py-4 px-3">
                @if($d->statut === 'accepte')
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Acceptée
                  </span>
                @elseif($d->statut === 'refuse')
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 ring-1 ring-red-200">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Refusée
                  </span>
                @else
                  <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 ring-1 ring-amber-200">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    En attente
                  </span>
                @endif
              </td>
              {{-- Date --}}
              <td class="py-4 pl-3 pr-6 text-xs text-slate-400 whitespace-nowrap">
                {{ $d->created_at->format('d/m/Y') }}
              </td>
            </tr>

            {{-- Réponse admin --}}
            @if($d->reponse_admin)
              <tr class="bg-slate-50/70">
                <td colspan="6" class="py-2.5 pl-[4.5rem] pr-6">
                  <div class="flex items-start gap-2 text-xs text-slate-500 italic">
                    <svg class="w-3.5 h-3.5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    {{ $d->reponse_admin }}
                  </div>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Cartes — mobile (< md) ─────────────────────────────────────── --}}
    <div class="md:hidden space-y-3">
      @foreach($demandes as $d)
        <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-100 p-5 space-y-4">

          {{-- En-tête --}}
          <div class="flex items-start justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
              <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                <svg class="w-4.5 h-4.5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div class="min-w-0">
                <p class="font-bold text-slate-800 truncate text-sm">{{ $d->poste_souhaite }}</p>
                <p class="text-xs text-slate-400 mt-0.5">{{ $d->secteur }}</p>
              </div>
            </div>
            {{-- Statut badge --}}
            @if($d->statut === 'accepte')
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200 shrink-0">Acceptée</span>
            @elseif($d->statut === 'refuse')
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 ring-1 ring-red-200 shrink-0">Refusée</span>
            @else
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 ring-1 ring-amber-200 shrink-0">En attente</span>
            @endif
          </div>

          {{-- Méta --}}
          <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-1.5 text-xs text-slate-500 bg-slate-50 px-2.5 py-1 rounded-lg">
              📍 {{ $d->ville }}
            </span>
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-sky-50 text-sky-700 ring-1 ring-sky-200">
              {{ $d->type_contrat }}
            </span>
            <span class="inline-flex items-center gap-1.5 text-xs text-slate-400 bg-slate-50 px-2.5 py-1 rounded-lg">
              📅 {{ $d->created_at->format('d/m/Y') }}
            </span>
          </div>

          {{-- Réponse admin --}}
          @if($d->reponse_admin)
            <div class="flex gap-2.5 bg-slate-50 rounded-xl px-3.5 py-3 ring-1 ring-slate-100">
              <p class="text-xs text-slate-500 italic leading-relaxed">💬 {{ $d->reponse_admin }}</p>
            </div>
          @endif

        </div>
      @endforeach
    </div>

  @else

    {{-- Empty state ────────────────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-100 overflow-hidden">
      <div class="flex flex-col items-center justify-center py-24 px-6 text-center">
        <div class="w-20 h-20 rounded-2xl bg-slate-100 flex items-center justify-center mb-6">
          <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-slate-700 mb-2">Aucune demande</h3>
        <p class="text-sm text-slate-400 max-w-xs mb-8">
          Vous n'avez pas encore soumis de demande de poste. Commencez dès maintenant.
        </p>
        <a href="{{ route('client.demandes.create') }}"
          class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm transition-colors duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
          </svg>
          Faire une demande
        </a>
      </div>
    </div>

  @endif

</div>
@endsection
