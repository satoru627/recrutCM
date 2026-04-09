<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>FWORK - Emplois au Cameroun</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
{{-- cdn tailwindcss --}}
<!-- Le lien CDN officiel de Tailwind CSS -->
<!-- https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css -->
<!--
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
-->

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --v:#15803d;--v2:#16a34a;--v3:#dcfce7;
  --r:#dc2626;--r2:#ef4444;--r3:#fee2e2;
  --j:#d97706;--j3:#fef3c7;
  --s:#0f172a;--g:#64748b;--g2:#94a3b8;
  --bg:#f8fafc;--w:#ffffff;--bd:#e2e8f0;
  --sh:0 1px 3px rgba(0,0,0,.08);
  --sh2:0 4px 16px rgba(0,0,0,.1);
}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--s);line-height:1.5}

/* NAV */
nav{background:rgba(15,23,42,.85);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,.08);padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:64px;position:fixed;top:0;left:0;right:0;z-index:100}
.nav-scrolled{background:var(--w);border-bottom:1px solid var(--bd);box-shadow:var(--sh)}
.nav-scrolled .logo{color:var(--s)}
.nav-scrolled .nav-link{color:var(--g)}
.nav-scrolled .nav-link:hover{color:var(--v)}
.logo{font-size:1.5rem;font-weight:800;color:#fff;text-decoration:none;letter-spacing:-1px;transition:color .3s}
.logo em{color:#4ade80;font-style:normal}
.nav-r{display:flex;align-items:center;gap:1rem}
.nav-link{text-decoration:none;font-size:.88rem;font-weight:600;color:rgba(255,255,255,.75);transition:color .2s}
.nav-link:hover{color:#fff}
.btn{display:inline-flex;align-items:center;gap:.4rem;padding:.5rem 1.2rem;border-radius:8px;font-weight:700;font-size:.88rem;cursor:pointer;border:none;text-decoration:none;transition:all .18s;font-family:inherit}
.btn-v{background:var(--v);color:#fff}.btn-v:hover{background:var(--v2);transform:translateY(-1px)}
.btn-r{background:var(--r);color:#fff}.btn-r:hover{background:var(--r2)}
.btn-ghost-w{background:transparent;color:#fff;border:1.5px solid rgba(255,255,255,.3)}.btn-ghost-w:hover{background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.6)}
.btn-ghost{background:transparent;color:var(--g);border:1.5px solid var(--bd)}.btn-ghost:hover{border-color:var(--v);color:var(--v)}

/* HERO avec image de fond */
.hero{position:relative;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;overflow:hidden;padding:8rem 2rem 0}

/* IMAGE DE FOND — ville africaine moderne, libre de droits Unsplash */
.hero-bg{
  position:absolute;inset:0;
  background-image:url('https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1600&q=80&auto=format&fit=crop');
  background-size:cover;
  background-position:center 30%;
  background-repeat:no-repeat;
  z-index:0;
}
/* Overlay sombre dégradé */
.hero-overlay{
  position:absolute;inset:0;
  background:linear-gradient(
    to bottom,
    rgba(10,15,30,.75) 0%,
    rgba(10,20,40,.65) 40%,
    rgba(10,15,30,.9) 80%,
    rgba(10,15,30,1) 100%
  );
  z-index:1;
}
/* Teinte verte subtile */
.hero-tint{
  position:absolute;inset:0;
  background:radial-gradient(ellipse at 70% 20%, rgba(21,128,61,.25) 0%, transparent 60%);
  z-index:2;
}

.hero-inner{position:relative;z-index:3;max-width:740px;margin:0 auto;color:#fff}
.hero-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(74,222,128,.12);border:1px solid rgba(74,222,128,.3);color:#4ade80;font-size:.78rem;font-weight:700;padding:.38rem 1rem;border-radius:20px;margin-bottom:1.8rem;letter-spacing:.05em}
.hero-badge .dot{width:7px;height:7px;border-radius:50%;background:#4ade80;animation:pulse 2s infinite}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.85)}}
.hero h1{font-size:3.2rem;font-weight:800;line-height:1.12;margin-bottom:1rem;letter-spacing:-2px;text-shadow:0 2px 20px rgba(0,0,0,.3)}
.hero h1 .hl{color:#4ade80}
.hero-sub{font-size:1.05rem;opacity:.78;max-width:480px;margin:0 auto 2.2rem;line-height:1.7}
.hero-btns{display:flex;gap:.8rem;justify-content:center;flex-wrap:wrap;margin-bottom:3.5rem}

/* SEARCH BOX flottant */
.search-wrap{position:relative;z-index:3;width:100%;max-width:860px;margin:0 auto}
.search-box{background:var(--w);border-radius:16px 16px 0 0;padding:1.6rem 1.8rem 2rem;box-shadow:0 -8px 40px rgba(0,0,0,.35)}
.search-title{font-size:.72rem;font-weight:700;color:var(--g);text-transform:uppercase;letter-spacing:.1em;margin-bottom:1rem}
.search-row{display:grid;grid-template-columns:1fr 1fr 1fr auto;gap:.75rem;align-items:end}
.sf{display:flex;flex-direction:column;gap:.3rem}
.sf label{font-size:.75rem;font-weight:700;color:var(--g);display:flex;align-items:center;gap:.3rem}
.sf input,.sf select{padding:.6rem .9rem;border:1.5px solid var(--bd);border-radius:8px;font-family:inherit;font-size:.88rem;color:var(--s);background:var(--bg);transition:border-color .2s;outline:none}
.sf input:focus,.sf select:focus{border-color:var(--v);background:var(--w);box-shadow:0 0 0 3px rgba(21,128,61,.1)}

/* STATS */
.stats-bar{background:var(--w);border-bottom:1px solid var(--bd);padding:.9rem 2rem}
.stats-inner{max-width:1100px;margin:0 auto;display:flex;justify-content:center;gap:3rem;flex-wrap:wrap}
.stat{text-align:center}
.stat strong{font-size:1.6rem;font-weight:800;color:var(--s);display:block;line-height:1}
.stat span{font-size:.72rem;color:var(--g);font-weight:600;text-transform:uppercase;letter-spacing:.05em}

/* MAIN */
.main{max-width:1100px;margin:2rem auto;padding:0 2rem}
.sec-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.2rem}
.sec-hd h2{font-size:1.2rem;font-weight:800;letter-spacing:-.3px}
.sec-hd h2 em{color:var(--v);font-style:normal}
.sec-hd a{font-size:.82rem;font-weight:700;color:var(--v);text-decoration:none}

/* CHIPS */
.chips{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1.2rem}
.chip{padding:.35rem .9rem;border-radius:20px;font-size:.8rem;font-weight:600;border:1.5px solid var(--bd);background:var(--w);cursor:pointer;transition:all .18s;color:var(--g);text-decoration:none;display:inline-block}
.chip:hover,.chip.active{background:var(--v);color:#fff;border-color:var(--v)}

/* GRID */
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1rem}

/* CARD */
.card{background:var(--w);border-radius:14px;border:1.5px solid var(--bd);padding:1.2rem 1.3rem;cursor:pointer;transition:all .22s;position:relative;overflow:hidden}
.card::before{content:'';position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--v);opacity:0;transition:opacity .2s;border-radius:0}
.card:hover{border-color:var(--v);box-shadow:var(--sh2);transform:translateY(-2px)}
.card:hover::before{opacity:1}
.card-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.7rem}
.card-logo{width:42px;height:42px;border-radius:10px;background:var(--v3);display:flex;align-items:center;justify-content:center;font-size:.85rem;font-weight:800;color:var(--v);flex-shrink:0}
.card-badges{display:flex;gap:.4rem;flex-wrap:wrap}
.badge{display:inline-block;padding:.2rem .65rem;border-radius:6px;font-size:.72rem;font-weight:700}
.b-v{background:var(--v3);color:#166534}
.b-g{background:#f1f5f9;color:var(--g)}
.card h3{font-size:.98rem;font-weight:700;margin-bottom:.25rem;color:var(--s)}
.card .ent{font-size:.82rem;color:var(--g);font-weight:600;margin-bottom:.7rem;display:flex;align-items:center;gap:.3rem}
.card-meta{display:flex;gap:.8rem;flex-wrap:wrap;font-size:.78rem;color:var(--g2);margin-bottom:.8rem}
.card-footer{display:flex;align-items:center;justify-content:space-between;padding-top:.75rem;border-top:1px solid var(--bd)}
.salaire{font-size:.95rem;font-weight:800;color:var(--v)}
.card-action{padding:.38rem .9rem;border-radius:7px;background:var(--v);color:#fff;font-size:.78rem;font-weight:700;border:none;cursor:pointer;transition:all .18s;font-family:inherit;text-decoration:none;display:inline-flex;align-items:center;gap:.3rem}
.card-action:hover{background:var(--v2)}
.new-badge{position:absolute;top:12px;right:12px;background:var(--v);color:#fff;font-size:.65rem;font-weight:700;padding:.2rem .5rem;border-radius:4px;letter-spacing:.06em}

/* SECTEURS */
.secteurs-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:.7rem;margin-bottom:2.5rem}
.secteur-card{background:var(--w);border:1.5px solid var(--bd);border-radius:12px;padding:1rem .8rem;text-align:center;cursor:pointer;transition:all .2s;text-decoration:none;display:block}
.secteur-card:hover{border-color:var(--v);background:var(--v3)}
.secteur-card:hover .s-icon{background:var(--v);color:#fff}
.secteur-card:hover .s-label{color:var(--v)}
.s-icon{width:40px;height:40px;border-radius:10px;background:var(--bg);display:flex;align-items:center;justify-content:center;font-size:.95rem;margin:0 auto .55rem;transition:all .2s;color:var(--g)}
.s-label{font-size:.78rem;font-weight:700;color:var(--g);transition:color .2s}
.s-count{font-size:.7rem;color:var(--g2);margin-top:.15rem}

/* HOW */
.how{background:var(--s);border-radius:20px;padding:2.5rem;margin:2.5rem 0;color:#fff}
.how-title{font-size:1.1rem;font-weight:800;margin-bottom:.3rem}
.how-sub{font-size:.85rem;opacity:.45;margin-bottom:2rem}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem}
.step{text-align:center}
.step-num{width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;font-size:1.2rem;font-weight:800;color:#4ade80;margin:0 auto .8rem}
.step h4{font-size:.88rem;font-weight:700;margin-bottom:.3rem}
.step p{font-size:.78rem;opacity:.45;line-height:1.6}

/* CTA */
.cta{background:linear-gradient(135deg,var(--v) 0%,#166534 100%);border-radius:20px;padding:2.5rem;margin:0 0 2.5rem;color:#fff;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap}
.cta h2{font-size:1.4rem;font-weight:800;margin-bottom:.4rem}
.cta p{font-size:.88rem;opacity:.75}
.btn-white{background:#fff;color:var(--v);font-weight:700;padding:.65rem 1.5rem;border-radius:10px;text-decoration:none;font-size:.9rem;transition:all .18s;display:inline-flex;align-items:center;gap:.4rem}
.btn-white:hover{transform:translateY(-2px);box-shadow:0 4px 16px rgba(0,0,0,.15)}

/* ALERT */
.alert{padding:.8rem 1.2rem;border-radius:8px;margin-bottom:1rem;font-size:.9rem;display:flex;align-items:center;gap:.6rem}
.alert-success{background:#dcfce7;color:#166534;border-left:4px solid var(--v)}
.alert-error{background:var(--r3);color:#991b1b;border-left:4px solid var(--r)}

/* TOAST */
.toast{position:fixed;bottom:1.5rem;right:1.5rem;background:var(--s);color:#fff;padding:.8rem 1.2rem;border-radius:10px;font-size:.85rem;font-weight:600;display:flex;align-items:center;gap:.6rem;box-shadow:0 8px 24px rgba(0,0,0,.25);transform:translateY(6rem);transition:transform .35s cubic-bezier(.34,1.56,.64,1);z-index:999}
.toast.show{transform:translateY(0)}
.toast-icon{width:28px;height:28px;border-radius:6px;background:var(--v);display:flex;align-items:center;justify-content:center;flex-shrink:0}

footer{background:var(--s);color:rgba(255,255,255,.35);text-align:center;padding:1.5rem;font-size:.82rem}
footer strong{color:#4ade80}

@media(max-width:768px){
  .hero{padding:7rem 1.5rem 0}
  .hero h1{font-size:2.1rem;letter-spacing:-1px}
  .search-row{grid-template-columns:1fr 1fr}
  .steps{grid-template-columns:1fr 1fr}
  .stats-inner{gap:1.5rem}
  .cta{flex-direction:column;text-align:center}
  nav{padding:0 1rem}
  .nav-link{display:none}
}
</style>
</head>
<body>

<!-- NAV -->
<nav id="main-nav">
  <a href="{{ route('home') }}" class="logo">F<em>WORK</em></a>
  <div class="nav-r">
    <a href="{{ route('client.emplois.index') }}" class="nav-link"><i class="fas fa-briefcase"></i> Offres</a>
    @auth
      @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      @else
        <a href="{{ route('client.candidatures.index') }}" class="nav-link">Mes candidatures</a>
        <a href="{{ route('client.demandes.create') }}" class="nav-link">Demander un poste</a>
      @endif
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" class="btn btn-r" style="padding:.42rem 1rem">
          <i class="fas fa-sign-out-alt"></i> Déconnexion
        </button>
      </form>
    @else
      <a href="{{ route('login') }}" class="btn btn-ghost-w" style="padding:.42rem 1rem">Connexion</a>
      <a href="{{ route('register') }}" class="btn btn-v" style="padding:.42rem 1rem">
        <i class="fas fa-user-plus"></i> S'inscrire
      </a>
    @endauth
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-tint"></div>
 <center>
  <div class="hero-inner">
    <div class="hero-badge">
      <span class="dot"></span>
      {{ \App\Models\Offre::active()->count() }} offres disponibles maintenant
    </div>
    <h1>Trouvez votre emploi<br>au <span class="hl">Cameroun</span></h1>
    <p class="hero-sub">Des offres vérifiées dans toutes les villes. Postulez en quelques clics sans frais.</p>
    <div class="hero-btns">
      <a href="{{ route('client.emplois.index') }}" class="btn btn-v" style="padding:.72rem 1.8rem;font-size:.97rem">
        <i class="fas fa-search"></i> Explorer les offres
      </a>
      @guest
      <a href="{{ route('register') }}" class="btn btn-ghost-w" style="padding:.72rem 1.8rem;font-size:.97rem">
        <i class="fas fa-user-plus"></i> Créer un compte
      </a>
      @endguest
    </div>
    </center>

    <!-- SEARCH BOX -->
    <div class="search-wrap">
      <div class="search-box">
        <div class="search-title"><i class="fas fa-sliders-h" style="font-size:.65rem"></i> Recherche rapide</div>
        <form method="GET" action="{{ route('client.emplois.index') }}">
          <div class="search-row">
            <div class="sf">
              <label><i class="fas fa-search" style="font-size:.6rem"></i> Mot-clé</label>
              <input type="text" name="recherche" placeholder="Poste, entreprise...">
            </div>
            <div class="sf">
              <label><i class="fas fa-map-marker-alt" style="font-size:.6rem"></i> Ville</label>
              <select name="ville">
                <option value="">Toutes les villes</option>
                @foreach(['Yaoundé','Douala','Bafoussam','Garoua','Bamenda','Maroua','Ngaoundéré','Bertoua','Ebolowa','Kribi','Limbé','Buea'] as $v)
                  <option value="{{ $v }}">{{ $v }}</option>
                @endforeach
              </select>
            </div>
            <div class="sf">
              <label><i class="fas fa-industry" style="font-size:.6rem"></i> Secteur</label>
              <select name="secteur">
                <option value="">Tous les secteurs</option>
                @foreach(['BTP','Informatique','Commerce','Agriculture','Santé','Éducation','Transport','Hôtellerie','Finance','Industrie'] as $s)
                  <option value="{{ $s }}">{{ $s }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-v" style="padding:.6rem 1.4rem;align-self:flex-end;white-space:nowrap">
              <i class="fas fa-search"></i> Chercher
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat">
      <strong id="cnt-offres">{{ \App\Models\Offre::active()->count() }}</strong>
      <span>Offres actives</span>
    </div>
    <div class="stat">
      <strong id="cnt-clients">{{ \App\Models\User::where('role','client')->count() }}</strong>
      <span>Candidats inscrits</span>
    </div>
    <div class="stat"><strong>12</strong><span>Villes couvertes</span></div>
    <div class="stat"><strong>10+</strong><span>Secteurs d'activité</span></div>
  </div>
</div>

<!-- MAIN -->
<div class="main">

  @if(session('success'))
    <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-error"><i class="fas fa-times-circle"></i> {{ session('error') }}</div>
  @endif

  <!-- SECTEURS -->
  <div class="sec-hd" style="margin-bottom:1rem">
    <h2>Parcourir par <em>secteur</em></h2>
  </div>
  <div class="secteurs-grid">
    @php
    $secteursList = [
      ['nom'=>'Informatique','icon'=>'fa-laptop-code'],
      ['nom'=>'BTP','icon'=>'fa-hard-hat'],
      ['nom'=>'Santé','icon'=>'fa-heartbeat'],
      ['nom'=>'Commerce','icon'=>'fa-store'],
      ['nom'=>'Finance','icon'=>'fa-chart-line'],
      ['nom'=>'Éducation','icon'=>'fa-graduation-cap'],
      ['nom'=>'Agriculture','icon'=>'fa-seedling'],
      ['nom'=>'Transport','icon'=>'fa-truck'],
      ['nom'=>'Hôtellerie','icon'=>'fa-hotel'],
      ['nom'=>'Industrie','icon'=>'fa-industry'],
      ['nom'=>'Artisanat','icon'=>'fa-hammer'],
      ['nom'=>'Autres','icon'=>'fa-question'],
    ];
    @endphp
    @foreach($secteursList as $sec)
    @php $cnt = \App\Models\Offre::active()->where('secteur',$sec['nom'])->count(); @endphp
    <a href="{{ route('client.emplois.index', ['secteur' => $sec['nom']]) }}" class="secteur-card">
      <div class="s-icon"><i class="fas {{ $sec['icon'] }}" style="font-size:1rem"></i></div>
      <div class="s-label">{{ $sec['nom'] }}</div>
      <div class="s-count">{{ $cnt }} offre(s)</div>
    </a>
    @endforeach
  </div>

  <!-- OFFRES -->
  <div class="sec-hd" id="offres-section">
    <h2>Dernières <em>offres d'emploi</em></h2>
    <a href="{{ route('client.emplois.index') }}">Voir tout <i class="fas fa-arrow-right" style="font-size:.7rem"></i></a>
  </div>

  <!-- CHIPS -->
  <div class="chips">
    <a href="{{ route('client.emplois.index') }}" class="chip {{ !request('contrat') ? 'active' : '' }}">Toutes</a>
    @foreach(['CDI','CDD','Stage','Journalier','Freelance'] as $c)
    <a href="{{ route('client.emplois.index', ['contrat'=>$c]) }}" class="chip {{ request('contrat')==$c ? 'active' : '' }}">{{ $c }}</a>
    @endforeach
  </div>

  <!-- GRILLE OFFRES -->
  <div class="grid">
    @forelse($offres as $offre)
    <div class="card" onclick="window.location='{{ route('client.emplois.show', $offre) }}'">
      @if($offre->created_at->diffInDays() < 3)
        <div class="new-badge">NOUVEAU</div>
      @endif
      <div class="card-top">
        <div class="card-logo">{{ strtoupper(substr($offre->entreprise,0,2)) }}</div>
        <div class="card-badges">
          <span class="badge b-v">{{ $offre->type_contrat }}</span>
          <span class="badge b-g">{{ $offre->secteur }}</span>
        </div>
      </div>
      <h3>{{ $offre->titre }}</h3>
      <div class="ent">
        <i class="fas fa-building" style="font-size:.7rem;color:var(--g2)"></i>
        {{ $offre->entreprise }}
      </div>
      <div class="card-meta">
        <span><i class="fas fa-map-marker-alt"></i> {{ $offre->ville }}</span>
        <span><i class="fas fa-clock"></i> {{ $offre->created_at->diffForHumans() }}</span>
      </div>
      <div class="card-footer">
        <div class="salaire">{{ $offre->salaireFormate() }}</div>
        <a href="{{ route('client.emplois.show', $offre) }}" class="card-action" onclick="event.stopPropagation()">
          Voir <i class="fas fa-arrow-right" style="font-size:.65rem"></i>
        </a>
      </div>
    </div>
    @empty
    <p style="grid-column:1/-1;text-align:center;padding:3rem;color:var(--g)">
      <i class="fas fa-search" style="display:block;font-size:2.5rem;opacity:.2;margin-bottom:.8rem"></i>
      Aucune offre disponible pour l'instant.
    </p>
    @endforelse
  </div>

  <!-- HOW IT WORKS -->
  <div class="how">
    <div class="how-title">Comment ça marche</div>
    <div class="how-sub">Simple, rapide, efficace — 4 étapes pour trouver votre emploi</div>
    <div class="steps">
      <div class="step">
        <div class="step-num">1</div>
        <h4>Inscription gratuite</h4>
        <p>Créez votre profil avec votre numéro camerounais en 2 minutes</p>
      </div>
      <div class="step">
        <div class="step-num">2</div>
        <h4>Parcourez les offres</h4>
        <p>Filtrez par ville, secteur et type de contrat</p>
      </div>
      <div class="step">
        <div class="step-num">3</div>
        <h4>Postulez en 1 clic</h4>
        <p>Envoyez votre CV et lettre de motivation en ligne</p>
      </div>
      <div class="step">
        <div class="step-num">4</div>
        <h4>Décrochez l'entretien</h4>
        <p>Recevez votre convocation et préparez-vous</p>
      </div>
    </div>
  </div>

  <!-- CTA -->
  @guest
  <div class="cta">
    <div>
      <h2>Prêt à trouver votre emploi ?</h2>
      <p>Rejoignez des milliers de candidats qui ont trouvé leur poste via FWORK</p>
    </div>
    <a href="{{ route('register') }}" class="btn-white">
      <i class="fas fa-rocket"></i> Créer mon compte gratuitement
    </a>
  </div>
  @endguest

</div>
{{-- testimonials --}}
<section class="max-w-5xl mx-auto w-full px-10 dark:bg-gray-800 dark:text-white">

  <div class="flex items-center justify-center flex-col gap-y-2 py-5">
    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold"><span class="text-green-500">Témoignages</span> de nos utilisateurs</h2>
    <p class="text-lg font-medium text-slate-700/70 dark:text-gray-400">
      Ils ont trouvé un emploi, un collaborateur, ou un accompagnement RH grâce à FWORK !
    </p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-4 gap-5 w-full">
    <!-- Candidat -->
    <div class="border p-7 rounded-xl bg-white dark:bg-gray-700 drop-shadow-md border-neutral-200/50 flex flex-col gap-y-10 justify-between">
      <div class="flex flex-col gap-y-3.5">
        <p class="font-bold text-xl">Trouvé un emploi en moins de 7 jours</p>
        <p class="font-medium text-slate-700/90 dark:text-gray-300">
          Grâce à FWORK, j'ai pu facilement postuler à plusieurs offres locales et décrocher un entretien rapidement. Service fluide et CV pris en compte instantanément !
        </p>
      </div>
      <div class="flex flex-col items-start">
        <img src="https://randomuser.me/api/portraits/men/34.jpg" alt="Témoignage candidat" class="h-10 w-10 rounded-full">
        <p class="pt-2 text-sm font-semibold">Arnaud N.</p>
        <p class="text-sm font-medium text-slate-700/70 dark:text-gray-400">Candidat à Douala</p>
      </div>
    </div>
      
    <!-- Recruteur -->
    <div class="border p-7 rounded-xl bg-white dark:bg-gray-700 drop-shadow-md border-neutral-200/50 flex flex-col gap-y-10 justify-between">
      <div class="flex flex-col gap-y-3.5">
        <p class="font-bold text-xl">Recrutement simplifié et ciblé</p>
        <p class="font-medium text-slate-700/90 dark:text-gray-300">
          J’ai publié une offre en 2 minutes et reçu rapidement des candidatures qualifiées. Le filtre par ville et secteur est parfait pour trouver des profils adaptés.
        </p>
      </div>
      <div class="flex flex-col items-start">
        <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="Témoignage recruteur" class="h-10 w-10 rounded-full">
        <p class="pt-2 text-sm font-semibold">Boris Foé</p>
        <p class="text-sm font-medium text-slate-700/70 dark:text-gray-400">Manager RH, Yaoundé</p>
      </div>
    </div>
    
    <!-- Accompagnement entretien -->
    <div class="border p-7 rounded-xl bg-white dark:bg-gray-700 drop-shadow-md border-neutral-200/50 flex flex-col gap-y-10 justify-between">
      <div class="flex flex-col gap-y-3.5">
        <p class="font-bold text-xl">Préparation à l'entretien réussie</p>
        <p class="font-medium text-slate-700/90 dark:text-gray-300">
          J’ai reçu un accompagnement personnalisé pour mon entretien. Les conseils FWORK m’ont permis d’être confiante et d’obtenir le poste souhaité.
        </p>
      </div>
      <div class="flex flex-col items-start">
        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="Témoignage accompagnement" class="h-10 w-10 rounded-full">
        <p class="pt-2 text-sm font-semibold">Fadimatou D.</p>
        <p class="text-sm font-medium text-slate-700/70 dark:text-gray-400">Assistante administrative, Douala</p>
      </div>
    </div>

    <!-- Entreprise PME -->
    <div class="border p-7 rounded-xl bg-white dark:bg-gray-700 drop-shadow-md border-neutral-200/50 flex flex-col gap-y-10 justify-between">
      <div class="flex flex-col gap-y-3.5">
        <p class="font-bold text-xl">Gain de temps pour les petites entreprises</p>
        <p class="font-medium text-slate-700/90 dark:text-gray-300">
          La gestion des candidats est très simple. L’interface permet de trier et contacter rapidement pour organiser des entretiens. Le must pour les PME !
        </p>
      </div>
      <div class="flex flex-col items-start">
        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Témoignage entreprise" class="h-10 w-10 rounded-full">
        <p class="pt-2 text-sm font-semibold">M. Onana</p>
        <p class="text-sm font-medium text-slate-700/70 dark:text-gray-400">Gérant PME, Bafoussam</p>
      </div>
    </div>
  </div>

</section>



<footer>
  <p>© {{ date('Y') }} <strong>FWORK</strong> — Plateforme de recrutement local au Cameroun 🇨🇲</p>
  <div class="flex items-center justify-center gap-x-4">
    <a href="#" class="text-slate-700/70 dark:text-gray-400">Politique de confidentialité</a>
    <a href="#" class="text-slate-700/70 dark:text-gray-400">Conditions d'utilisation</a>
    <a href="#" class="text-slate-700/70 dark:text-gray-400">Cookies</a>
  </div>
</footer>

<!-- TOAST -->
<div class="toast" id="toast">
  <div class="toast-icon"><i class="fas fa-check" id="toast-icon" style="font-size:.65rem"></i></div>
  <span id="toast-msg">Action effectuée</span>
</div>

<script>
// Nav scroll effect
const nav = document.getElementById('main-nav');
window.addEventListener('scroll', ()=>{
  if(window.scrollY > 60){
    nav.classList.add('nav-scrolled');
    nav.querySelectorAll('.nav-link').forEach(l=>l.style.color='');
  } else {
    nav.classList.remove('nav-scrolled');
  }
});

// Compteurs animés
function animCount(el){
  if(!el) return;
  const target = parseInt(el.textContent.replace(/\D/g,'')) || 0;
  if(target === 0) return;
  let cur = 0;
  const step = Math.max(1, Math.ceil(target/50));
  const iv = setInterval(()=>{
    cur = Math.min(cur+step, target);
    el.textContent = cur.toLocaleString();
    if(cur >= target) clearInterval(iv);
  }, 25);
}
animCount(document.getElementById('cnt-offres'));
animCount(document.getElementById('cnt-clients'));

// Toast
function showToast(msg, icon='fa-check'){
  const t = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  document.getElementById('toast-icon').className = 'fas '+icon;
  t.classList.add('show');
  clearTimeout(t._t);
  t._t = setTimeout(()=>t.classList.remove('show'), 2800);
}

// Flash auto-hide
@if(session('success') || session('error'))
  setTimeout(()=>{
    document.querySelectorAll('.alert').forEach(a=>{
      a.style.transition='opacity .5s';
      a.style.opacity='0';
      setTimeout(()=>a.remove(), 500);
    });
  }, 4000);
@endif
</script>
</body>
</html>