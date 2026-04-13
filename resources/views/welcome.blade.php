<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>FWORK - Emplois au Cameroun</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

/* ========== NAV ========== */
nav{
  background:rgba(15,23,42,.85);
  backdrop-filter:blur(12px);
  -webkit-backdrop-filter:blur(12px);
  border-bottom:1px solid rgba(255,255,255,.08);
  padding:0 2rem;
  display:flex;
  align-items:center;
  justify-content:space-between;
  height:64px;
  position:fixed;
  top:0;left:0;right:0;
  z-index:100;
}
.nav-scrolled{background:var(--w);border-bottom:1px solid var(--bd);box-shadow:var(--sh)}
.nav-scrolled .logo{color:var(--s)}
.nav-scrolled .nav-link{color:var(--g)}
.nav-scrolled .nav-link:hover{color:var(--v)}
.logo{font-size:1.5rem;font-weight:800;color:#fff;text-decoration:none;letter-spacing:-1px;transition:color .3s;flex-shrink:0}
.logo em{color:#4ade80;font-style:normal}

/* Nav right section */
.nav-r{display:flex;align-items:center;gap:.75rem}
.nav-link{text-decoration:none;font-size:.88rem;font-weight:600;color:rgba(255,255,255,.75);transition:color .2s;white-space:nowrap}
.nav-link:hover{color:#fff}

/* Hamburger menu (mobile) */
.nav-toggle{
  display:none;
  background:none;border:none;cursor:pointer;
  padding:.4rem;color:#fff;font-size:1.2rem;
  transition:color .2s;
}
.nav-scrolled .nav-toggle{color:var(--s)}

/* Mobile nav menu */
.nav-mobile{
  display:none;position:fixed;
  top:64px;left:0;right:0;
  background:var(--s);
  padding:1.2rem 1.5rem;
  flex-direction:column;gap:.8rem;
  z-index:99;
  border-top:1px solid rgba(255,255,255,.08);
  box-shadow:0 8px 24px rgba(0,0,0,.3);
}
.nav-mobile.open{display:flex}
.nav-mobile .nav-link{color:rgba(255,255,255,.8);font-size:.95rem;padding:.4rem 0;border-bottom:1px solid rgba(255,255,255,.06)}
.nav-mobile .btn{width:100%;justify-content:center;padding:.65rem 1rem}

/* ========== BUTTONS ========== */
.btn{display:inline-flex;align-items:center;gap:.4rem;padding:.5rem 1.2rem;border-radius:8px;font-weight:700;font-size:.88rem;cursor:pointer;border:none;text-decoration:none;transition:all .18s;font-family:inherit}
.btn-v{background:var(--v);color:#fff}.btn-v:hover{background:var(--v2);transform:translateY(-1px)}
.btn-r{background:var(--r);color:#fff}.btn-r:hover{background:var(--r2)}
.btn-ghost-w{background:transparent;color:#fff;border:1.5px solid rgba(255,255,255,.3)}.btn-ghost-w:hover{background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.6)}
.btn-ghost{background:transparent;color:var(--g);border:1.5px solid var(--bd)}.btn-ghost:hover{border-color:var(--v);color:var(--v)}

/* ========== HERO ========== */
.hero{
  position:relative;
  min-height:100vh;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  text-align:center;
  overflow:hidden;
  padding:7rem 1.5rem 0;
}
.hero-bg{
  position:absolute;inset:0;
  background-image:url('https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1600&q=80&auto=format&fit=crop');
  background-size:cover;
  background-position:center 30%;
  background-repeat:no-repeat;
  z-index:0;
}
.hero-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to bottom,rgba(10,15,30,.75) 0%,rgba(10,20,40,.65) 40%,rgba(10,15,30,.9) 80%,rgba(10,15,30,1) 100%);
  z-index:1;
}
.hero-tint{
  position:absolute;inset:0;
  background:radial-gradient(ellipse at 70% 20%,rgba(21,128,61,.25) 0%,transparent 60%);
  z-index:2;
}
.hero-inner{
  position:relative;z-index:3;
  width:100%;max-width:740px;
  margin:0 auto;color:#fff;
}
.hero-badge{
  display:inline-flex;align-items:center;gap:.5rem;
  background:rgba(74,222,128,.12);
  border:1px solid rgba(74,222,128,.3);
  color:#4ade80;
  font-size:.78rem;font-weight:700;
  padding:.38rem 1rem;border-radius:20px;
  margin-bottom:1.8rem;letter-spacing:.05em;
  flex-wrap:wrap;justify-content:center;
}
.hero-badge .dot{width:7px;height:7px;border-radius:50%;background:#4ade80;animation:pulse 2s infinite;flex-shrink:0}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.85)}}
.hero h1{font-size:clamp(1.9rem,5vw,3.2rem);font-weight:800;line-height:1.12;margin-bottom:1rem;letter-spacing:-1.5px;text-shadow:0 2px 20px rgba(0,0,0,.3)}
.hero h1 .hl{color:#4ade80}
.hero-sub{font-size:1rem;opacity:.78;max-width:480px;margin:0 auto 2.2rem;line-height:1.7}
.hero-btns{display:flex;gap:.8rem;justify-content:center;flex-wrap:wrap;margin-bottom:2.5rem}

/* SEARCH BOX */
.search-wrap{
  position:relative;z-index:3;
  width:100%;max-width:860px;
  margin:0 auto;
}
.search-box{
  background:var(--w);
  border-radius:16px 16px 0 0;
  padding:1.4rem 1.4rem 1.8rem;
  box-shadow:0 -8px 40px rgba(0,0,0,.35);
}
.search-title{font-size:.72rem;font-weight:700;color:var(--g);text-transform:uppercase;letter-spacing:.1em;margin-bottom:1rem}
.search-row{
  display:grid;
  grid-template-columns:1fr 1fr 1fr auto;
  gap:.75rem;
  align-items:end;
}
.sf{display:flex;flex-direction:column;gap:.3rem}
.sf label{font-size:.75rem;font-weight:700;color:var(--g);display:flex;align-items:center;gap:.3rem}
.sf input,.sf select{
  padding:.6rem .9rem;
  border:1.5px solid var(--bd);
  border-radius:8px;
  font-family:inherit;
  font-size:.88rem;
  color:var(--s);
  background:var(--bg);
  transition:border-color .2s;
  outline:none;
  width:100%;
}
.sf input:focus,.sf select:focus{border-color:var(--v);background:var(--w);box-shadow:0 0 0 3px rgba(21,128,61,.1)}
.search-btn-wrap{align-self:flex-end}
.search-btn-wrap .btn{width:100%;justify-content:center;white-space:nowrap;padding:.6rem 1.2rem}

/* ========== STATS ========== */
.stats-bar{background:var(--w);border-bottom:1px solid var(--bd);padding:.9rem 1.5rem}
.stats-inner{max-width:1100px;margin:0 auto;display:flex;justify-content:center;gap:2rem;flex-wrap:wrap}
.stat{text-align:center;min-width:80px}
.stat strong{font-size:1.6rem;font-weight:800;color:var(--s);display:block;line-height:1}
.stat span{font-size:.72rem;color:var(--g);font-weight:600;text-transform:uppercase;letter-spacing:.05em}

/* ========== MAIN ========== */
.main{max-width:1100px;margin:2rem auto;padding:0 1.25rem}
.sec-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.2rem;gap:.5rem;flex-wrap:wrap}
.sec-hd h2{font-size:1.2rem;font-weight:800;letter-spacing:-.3px}
.sec-hd h2 em{color:var(--v);font-style:normal}
.sec-hd a{font-size:.82rem;font-weight:700;color:var(--v);text-decoration:none;white-space:nowrap}

/* CHIPS */
.chips{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1.2rem}
.chip{padding:.35rem .9rem;border-radius:20px;font-size:.8rem;font-weight:600;border:1.5px solid var(--bd);background:var(--w);cursor:pointer;transition:all .18s;color:var(--g);text-decoration:none;display:inline-block;white-space:nowrap}
.chip:hover,.chip.active{background:var(--v);color:#fff;border-color:var(--v)}

/* GRID OFFRES */
.grid-offres{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1rem}

/* CARD */
.card{background:var(--w);border-radius:14px;border:1.5px solid var(--bd);padding:1.2rem 1.3rem;cursor:pointer;transition:all .22s;position:relative;overflow:hidden}
.card::before{content:'';position:absolute;left:0;top:0;bottom:0;width:3px;background:var(--v);opacity:0;transition:opacity .2s;border-radius:0}
.card:hover{border-color:var(--v);box-shadow:var(--sh2);transform:translateY(-2px)}
.card:hover::before{opacity:1}
.card-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.7rem;gap:.5rem}
.card-logo{width:42px;height:42px;border-radius:10px;background:var(--v3);display:flex;align-items:center;justify-content:center;font-size:.85rem;font-weight:800;color:var(--v);flex-shrink:0}
.card-badges{display:flex;gap:.4rem;flex-wrap:wrap}
.badge{display:inline-block;padding:.2rem .65rem;border-radius:6px;font-size:.72rem;font-weight:700}
.b-v{background:var(--v3);color:#166534}
.b-g{background:#f1f5f9;color:var(--g)}
.card h3{font-size:.98rem;font-weight:700;margin-bottom:.25rem;color:var(--s)}
.card .ent{font-size:.82rem;color:var(--g);font-weight:600;margin-bottom:.7rem;display:flex;align-items:center;gap:.3rem}
.card-meta{display:flex;gap:.8rem;flex-wrap:wrap;font-size:.78rem;color:var(--g2);margin-bottom:.8rem}
.card-footer{display:flex;align-items:center;justify-content:space-between;padding-top:.75rem;border-top:1px solid var(--bd);gap:.5rem}
.salaire{font-size:.95rem;font-weight:800;color:var(--v)}
.card-action{padding:.38rem .9rem;border-radius:7px;background:var(--v);color:#fff;font-size:.78rem;font-weight:700;border:none;cursor:pointer;transition:all .18s;font-family:inherit;text-decoration:none;display:inline-flex;align-items:center;gap:.3rem;white-space:nowrap}
.card-action:hover{background:var(--v2)}
.new-badge{position:absolute;top:12px;right:12px;background:var(--v);color:#fff;font-size:.65rem;font-weight:700;padding:.2rem .5rem;border-radius:4px;letter-spacing:.06em}

/* SECTEURS */
.secteurs-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(110px,1fr));gap:.7rem;margin-bottom:2.5rem}
.secteur-card{background:var(--w);border:1.5px solid var(--bd);border-radius:12px;padding:1rem .8rem;text-align:center;cursor:pointer;transition:all .2s;text-decoration:none;display:block}
.secteur-card:hover{border-color:var(--v);background:var(--v3)}
.secteur-card:hover .s-icon{background:var(--v);color:#fff}
.secteur-card:hover .s-label{color:var(--v)}
.s-icon{width:40px;height:40px;border-radius:10px;background:var(--bg);display:flex;align-items:center;justify-content:center;font-size:.95rem;margin:0 auto .55rem;transition:all .2s;color:var(--g)}
.s-label{font-size:.78rem;font-weight:700;color:var(--g);transition:color .2s}
.s-count{font-size:.7rem;color:var(--g2);margin-top:.15rem}

/* HOW */
.how{background:var(--s);border-radius:20px;padding:2.5rem 1.5rem;margin:2.5rem 0;color:#fff}
.how-title{font-size:1.1rem;font-weight:800;margin-bottom:.3rem}
.how-sub{font-size:.85rem;opacity:.45;margin-bottom:2rem}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem}
.step{text-align:center}
.step-num{width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;font-size:1.2rem;font-weight:800;color:#4ade80;margin:0 auto .8rem}
.step h4{font-size:.88rem;font-weight:700;margin-bottom:.3rem}
.step p{font-size:.78rem;opacity:.45;line-height:1.6}

/* CTA */
.cta{background:linear-gradient(135deg,var(--v) 0%,#166534 100%);border-radius:20px;padding:2.5rem 1.5rem;margin:0 0 2.5rem;color:#fff;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap}
.cta h2{font-size:1.4rem;font-weight:800;margin-bottom:.4rem}
.cta p{font-size:.88rem;opacity:.75}
.btn-white{background:#fff;color:var(--v);font-weight:700;padding:.65rem 1.5rem;border-radius:10px;text-decoration:none;font-size:.9rem;transition:all .18s;display:inline-flex;align-items:center;gap:.4rem;white-space:nowrap}
.btn-white:hover{transform:translateY(-2px);box-shadow:0 4px 16px rgba(0,0,0,.15)}

/* ALERT */
.alert{padding:.8rem 1.2rem;border-radius:8px;margin-bottom:1rem;font-size:.9rem;display:flex;align-items:center;gap:.6rem}
.alert-success{background:#dcfce7;color:#166534;border-left:4px solid var(--v)}
.alert-error{background:var(--r3);color:#991b1b;border-left:4px solid var(--r)}

/* TOAST */
.toast{position:fixed;bottom:1.5rem;right:1.5rem;background:var(--s);color:#fff;padding:.8rem 1.2rem;border-radius:10px;font-size:.85rem;font-weight:600;display:flex;align-items:center;gap:.6rem;box-shadow:0 8px 24px rgba(0,0,0,.25);transform:translateY(6rem);transition:transform .35s cubic-bezier(.34,1.56,.64,1);z-index:999;max-width:calc(100vw - 3rem)}
.toast.show{transform:translateY(0)}
.toast-icon{width:28px;height:28px;border-radius:6px;background:var(--v);display:flex;align-items:center;justify-content:center;flex-shrink:0}

/* FOOTER */
footer{
  background:var(--s);color:rgba(255,255,255,.35);
  text-align:center;padding:2rem 1.5rem;
  font-size:.82rem;
}
footer strong{color:#4ade80}
.footer-links{
  display:flex;align-items:center;justify-content:center;
  gap:1rem;flex-wrap:wrap;margin-top:.6rem;
}
.footer-links a{color:rgba(255,255,255,.35);text-decoration:none;transition:color .2s}
.footer-links a:hover{color:#4ade80}

/* ========== TÉMOIGNAGES ========== */
.testimonials-section{
  max-width:1100px;margin:0 auto 2.5rem;
  padding:0 1.25rem;
}
.testimonials-section .section-head{
  text-align:center;padding:2rem 0 1.5rem;
}
.testimonials-section .section-head h2{
  font-size:clamp(1.5rem,4vw,2rem);font-weight:800;margin-bottom:.5rem;
}
.testimonials-section .section-head p{
  font-size:.95rem;color:var(--g);
}
.testimonials-grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(240px,1fr));
  gap:1.2rem;
}
.tcard{
  background:var(--w);border:1.5px solid var(--bd);
  border-radius:16px;padding:1.5rem;
  display:flex;flex-direction:column;
  justify-content:space-between;gap:1.5rem;
  box-shadow:var(--sh);
  transition:all .22s;
}
.tcard:hover{border-color:var(--v);box-shadow:var(--sh2);transform:translateY(-2px)}
.tcard-title{font-size:1rem;font-weight:800;margin-bottom:.5rem;color:var(--s)}
.tcard-text{font-size:.88rem;color:var(--g);line-height:1.65}
.tcard-author{display:flex;align-items:center;gap:.75rem;margin-top:.5rem}
.tcard-author img{width:40px;height:40px;border-radius:50%;object-fit:cover;flex-shrink:0}
.tcard-author-name{font-size:.85rem;font-weight:700;color:var(--s)}
.tcard-author-role{font-size:.78rem;color:var(--g)}

/* ========== RESPONSIVE BREAKPOINTS ========== */

/* Tablette (≤1024px) */
@media(max-width:1024px){
  .search-row{grid-template-columns:1fr 1fr}
  .search-btn-wrap{grid-column:1/-1}
  .search-btn-wrap .btn{max-width:200px}
  .steps{grid-template-columns:repeat(2,1fr)}
}

/* Tablette portrait / grand mobile (≤768px) */
@media(max-width:768px){
  /* Nav */
  nav{padding:0 1rem}
  .nav-link{display:none}
  .nav-r .btn{display:none}
  .nav-toggle{display:block}

  /* Hero */
  .hero{padding:6rem 1rem 0;min-height:auto}
  .hero-inner{padding-bottom:0}
  .hero-btns{flex-direction:column;align-items:center}
  .hero-btns .btn{width:100%;max-width:320px;justify-content:center}

  /* Search */
  .search-box{padding:1.2rem 1rem 1.5rem;border-radius:12px 12px 0 0}
  .search-row{grid-template-columns:1fr;gap:.6rem}
  .search-btn-wrap{grid-column:auto}
  .search-btn-wrap .btn{max-width:100%}

  /* Stats */
  .stats-inner{gap:1rem}
  .stat strong{font-size:1.3rem}

  /* Secteurs — 3 colonnes sur mobile */
  .secteurs-grid{grid-template-columns:repeat(3,1fr)}

  /* How */
  .steps{grid-template-columns:repeat(2,1fr)}
  .how{padding:2rem 1.2rem}

  /* CTA */
  .cta{flex-direction:column;text-align:center}
  .cta .btn-white{width:100%;justify-content:center}

  /* Grid offres — 1 colonne */
  .grid-offres{grid-template-columns:1fr}
}

/* Petit mobile (≤480px) */
@media(max-width:480px){
  /* Nav */
  nav{height:56px}
  .nav-mobile{top:56px}
  .logo{font-size:1.25rem}

  /* Hero */
  .hero{padding:5rem .85rem 0}
  .hero-badge{font-size:.72rem;padding:.3rem .75rem}
  .hero-sub{font-size:.92rem}

  /* Secteurs — 2 colonnes sur très petit écran */
  .secteurs-grid{grid-template-columns:repeat(2,1fr)}

  /* Stats */
  .stats-inner{gap:.75rem}
  .stat{min-width:70px}
  .stat strong{font-size:1.15rem}

  /* Steps */
  .steps{grid-template-columns:1fr}

  /* Témoignages — 1 colonne */
  .testimonials-grid{grid-template-columns:1fr}

  /* Chips scroll horizontal */
  .chips{flex-wrap:nowrap;overflow-x:auto;padding-bottom:.4rem;-webkit-overflow-scrolling:touch}
  .chips::-webkit-scrollbar{height:3px}
  .chips::-webkit-scrollbar-thumb{background:var(--bd);border-radius:10px}
}
</style>
</head>
<body>

<!-- NAV DESKTOP -->
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
    <!-- Hamburger (visible mobile) -->
    <button class="nav-toggle" id="nav-toggle" aria-label="Menu">
      <i class="fas fa-bars" id="nav-icon"></i>
    </button>
  </div>
</nav>

<!-- NAV MOBILE MENU -->
<div class="nav-mobile" id="nav-mobile">
  <a href="{{ route('client.emplois.index') }}" class="nav-link"><i class="fas fa-briefcase"></i> Offres d'emploi</a>
  @auth
    @if(auth()->user()->isAdmin())
      <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a>
    @else
      <a href="{{ route('client.candidatures.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> Mes candidatures</a>
      <a href="{{ route('client.demandes.create') }}" class="nav-link"><i class="fas fa-plus-circle"></i> Demander un poste</a>
    @endif
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-r"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
    </form>
  @else
    <a href="{{ route('login') }}" class="btn btn-ghost-w"><i class="fas fa-sign-in-alt"></i> Connexion</a>
    <a href="{{ route('register') }}" class="btn btn-v"><i class="fas fa-user-plus"></i> S'inscrire gratuitement</a>
  @endauth
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-tint"></div>
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
            <div class="search-btn-wrap">
              <button type="submit" class="btn btn-v">
                <i class="fas fa-search"></i> Chercher
              </button>
            </div>
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
  <div class="grid-offres">
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

<!-- TÉMOIGNAGES -->
<div class="testimonials-section">
  <div class="section-head">
    <h2><span style="color:var(--v)">Témoignages</span> de nos utilisateurs</h2>
    <p>Ils ont trouvé un emploi, un collaborateur, ou un accompagnement RH grâce à FWORK !</p>
  </div>
  <div class="testimonials-grid">
    <div class="tcard">
      <div>
        <p class="tcard-title">Trouvé un emploi en moins de 7 jours</p>
        <p class="tcard-text">Grâce à FWORK, j'ai pu facilement postuler à plusieurs offres locales et décrocher un entretien rapidement. Service fluide et CV pris en compte instantanément !</p>
      </div>
      <div class="tcard-author">
        <img src="https://randomuser.me/api/portraits/men/34.jpg" alt="Arnaud N.">
        <div>
          <div class="tcard-author-name">Arnaud N.</div>
          <div class="tcard-author-role">Candidat à Douala</div>
        </div>
      </div>
    </div>
    <div class="tcard">
      <div>
        <p class="tcard-title">Recrutement simplifié et ciblé</p>
        <p class="tcard-text">J'ai publié une offre en 2 minutes et reçu rapidement des candidatures qualifiées. Le filtre par ville et secteur est parfait pour trouver des profils adaptés.</p>
      </div>
      <div class="tcard-author">
        <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="Boris Foé">
        <div>
          <div class="tcard-author-name">Boris Foé</div>
          <div class="tcard-author-role">Manager RH, Yaoundé</div>
        </div>
      </div>
    </div>
    <div class="tcard">
      <div>
        <p class="tcard-title">Préparation à l'entretien réussie</p>
        <p class="tcard-text">J'ai reçu un accompagnement personnalisé pour mon entretien. Les conseils FWORK m'ont permis d'être confiante et d'obtenir le poste souhaité.</p>
      </div>
      <div class="tcard-author">
        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="Fadimatou D.">
        <div>
          <div class="tcard-author-name">Fadimatou D.</div>
          <div class="tcard-author-role">Assistante administrative, Douala</div>
        </div>
      </div>
    </div>
    <div class="tcard">
      <div>
        <p class="tcard-title">Gain de temps pour les petites entreprises</p>
        <p class="tcard-text">La gestion des candidats est très simple. L'interface permet de trier et contacter rapidement pour organiser des entretiens. Le must pour les PME !</p>
      </div>
      <div class="tcard-author">
        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="M. Onana">
        <div>
          <div class="tcard-author-name">M. Onana</div>
          <div class="tcard-author-role">Gérant PME, Bafoussam</div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  <p>© {{ date('Y') }} <strong>FWORK</strong> — Plateforme de recrutement local au Cameroun 🇨🇲</p>
  <div class="footer-links">
    <a href="#">Politique de confidentialité</a>
    <a href="#">Conditions d'utilisation</a>
    <a href="#">Cookies</a>
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

// Menu hamburger mobile
const toggle = document.getElementById('nav-toggle');
const mobileMenu = document.getElementById('nav-mobile');
const icon = document.getElementById('nav-icon');
let menuOpen = false;
toggle.addEventListener('click', ()=>{
  menuOpen = !menuOpen;
  mobileMenu.classList.toggle('open', menuOpen);
  icon.className = menuOpen ? 'fas fa-times' : 'fas fa-bars';
});
// Fermer menu au clic lien
mobileMenu.querySelectorAll('a').forEach(a => {
  a.addEventListener('click', ()=>{
    menuOpen = false;
    mobileMenu.classList.remove('open');
    icon.className = 'fas fa-bars';
  });
});
// Fermer menu au scroll
window.addEventListener('scroll', ()=>{
  if(menuOpen && window.scrollY > 20){
    menuOpen = false;
    mobileMenu.classList.remove('open');
    icon.className = 'fas fa-bars';
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
