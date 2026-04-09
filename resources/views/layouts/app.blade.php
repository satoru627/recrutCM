<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>@yield('title','RecrutCM') - Emplois au Cameroun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{--vert:#1a7a4a;--vert2:#25a362;--rouge:#c0392b;--rouge2:#e74c3c;--jaune:#f39c12;--sombre:#111827;--gris:#6b7280;--clair:#f9fafb;--blanc:#ffffff;--border:#e5e7eb;--shadow:0 2px 12px rgba(0,0,0,.08)}
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Outfit',sans-serif;background:var(--clair);color:var(--sombre);min-height:100vh;display:flex;flex-direction:column}
        .btn{display:inline-flex;align-items:center;gap:.4rem;padding:.5rem 1.2rem;border-radius:8px;font-weight:600;font-size:.9rem;cursor:pointer;border:none;text-decoration:none;transition:all .2s}
        .btn-vert{background:var(--vert);color:#fff}.btn-vert:hover{background:var(--vert2);color:#fff}
        .btn-rouge{background:var(--rouge);color:#fff}.btn-rouge:hover{background:var(--rouge2);color:#fff}
        .btn-outline{background:transparent;color:var(--vert);border:2px solid var(--vert)}.btn-outline:hover{background:var(--vert);color:#fff}
        .btn-sm{padding:.35rem .9rem;font-size:.82rem}
        .badge{display:inline-block;padding:.25rem .7rem;border-radius:20px;font-size:.78rem;font-weight:600}
        .badge-success{background:#d1fae5;color:#065f46}.badge-danger{background:#fee2e2;color:#991b1b}
        .badge-warning{background:#fef3c7;color:#92400e}.badge-info{background:#dbeafe;color:#1e40af}
        .badge-vert{background:var(--vert);color:#fff}
        .alert{padding:.8rem 1.2rem;border-radius:8px;margin-bottom:1rem;font-size:.9rem;display:flex;align-items:center;gap:.6rem;position:relative}
        .alert-success{background:#d1fae5;color:#065f46;border-left:4px solid var(--vert)}
        .alert-error{background:#fee2e2;color:#991b1b;border-left:4px solid var(--rouge)}
        .alert .close-btn{position:absolute;top:.85rem;right:.85rem;border:none;background:transparent;color:inherit;font-size:1rem;cursor:pointer;opacity:.7}
        .alert .close-btn:hover{opacity:1}
        nav{background:var(--blanc);border-bottom:3px solid var(--vert);padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:65px;position:sticky;top:0;z-index:100;box-shadow:var(--shadow)}
        .nav-logo{font-size:1.6rem;font-weight:800;color:var(--vert);text-decoration:none}.nav-logo span{color:var(--rouge)}
        .nav-links{display:flex;align-items:center;gap:1.5rem;list-style:none}
        .nav-links a{text-decoration:none;color:var(--sombre);font-weight:500;font-size:.95rem;transition:color .2s}
        .nav-links a:hover{color:var(--vert)}
        .nav-links li{display:flex;align-items:center}
        .menu-toggle{display:none;background:transparent;border:none;color:var(--sombre);font-size:1.2rem;cursor:pointer}
        .container{max-width:1200px;margin:0 auto;padding:0 1.5rem}
        .main{flex:1;padding:2rem 0}
        .card{background:var(--blanc);border-radius:12px;box-shadow:var(--shadow);overflow:hidden}
        .card-header{padding:1.2rem 1.5rem;border-bottom:1px solid var(--border);font-weight:700;font-size:1.05rem;display:flex;align-items:center;justify-content:space-between}
        .card-body{padding:1.5rem}
        .form-group{margin-bottom:1.2rem}
        .form-group label{display:block;font-weight:600;font-size:.9rem;margin-bottom:.4rem}
        .form-group input,.form-group select,.form-group textarea{width:100%;padding:.65rem .9rem;border:1.5px solid var(--border);border-radius:8px;font-family:'Outfit',sans-serif;font-size:.95rem;transition:border-color .2s;background:var(--blanc)}
        .form-group input:focus,.form-group select:focus,.form-group textarea:focus{outline:none;border-color:var(--vert)}
        .form-group .error{color:var(--rouge);font-size:.82rem;margin-top:.3rem}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
        .table{width:100%;border-collapse:collapse;font-size:.9rem}
        .table th{background:var(--clair);padding:.75rem 1rem;text-align:left;font-weight:700;border-bottom:2px solid var(--border);font-size:.83rem;color:var(--gris);text-transform:uppercase;letter-spacing:.05em}
        .table td{padding:.75rem 1rem;border-bottom:1px solid var(--border);vertical-align:middle}
        .table tr:last-child td{border-bottom:none}
        .table tr:hover td{background:#f8fafc}
        .page-header{background:linear-gradient(135deg,var(--vert) 0%,#0f5132 100%);color:#fff;padding:2rem 0;margin-bottom:2rem}
        .page-header h1{font-size:1.8rem;font-weight:800}
        .page-header p{opacity:.85;margin-top:.3rem}
        footer{background:var(--sombre);color:#9ca3af;text-align:center;padding:1.5rem;font-size:.88rem}
        footer strong{color:var(--vert2)}
        @media(max-width:992px){
            .nav-links{gap:1rem}
        }
        @media(max-width:768px){
            .menu-toggle{display:inline-flex}
            .nav-links{position:absolute;top:65px;right:0;left:0;background:var(--blanc);flex-direction:column;align-items:flex-start;padding:1rem 2rem;gap:1rem;box-shadow:0 16px 40px rgba(0,0,0,.08);display:none}
            .nav-links.open{display:flex}
            .nav-links li{width:100%}
            .nav-links a{width:100%}
            nav{padding:0 1rem}
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="nav-logo">FWORK</a>
        <button class="menu-toggle" id="menuToggle" aria-label="Afficher le menu">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-links" id="mobileMenu">
            <li><a href="{{ route('client.emplois.index') }}"><i class="fas fa-briefcase"></i> Offres</a></li>
            @auth
                @if(auth()->user()->isClient())
                    <li><a href="{{ route('client.candidatures.index') }}">Mes candidatures</a></li>
                    <li><a href="{{ route('client.demandes.index') }}">Mes demandes</a></li>
                @endif
                @if(auth()->user()->isAdmin())
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-rouge btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Deconnexion
                        </button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}" class="btn btn-vert btn-sm"><i class="fas fa-user-plus"></i> S'inscrire</a></li>
            @endauth
        </ul>
    </nav>

    <main class="main">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="close-btn" aria-label="Fermer">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error" role="alert">
                    <i class="fas fa-times-circle"></i> {{ session('error') }}
                    <button type="button" class="close-btn" aria-label="Fermer">&times;</button>
                </div>
            @endif
             
            @yield('content')
        </div>
    </main>

    <footer>
        <p>© {{ date('Y') }} <strong>FWORK</strong> — Plateforme de recrutement local au Cameroun 🇨🇲</p>
        <div class="flex items-center justify-center gap-x-4">
          <a href="#" class="text-slate-700/70 dark:text-gray-400">Politique de confidentialité</a>
          <a href="#" class="text-slate-700/70 dark:text-gray-400">Conditions d'utilisation</a>
          <a href="#" class="text-slate-700/70 dark:text-gray-400">Cookies</a>
        </div>
      </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const closeButtons = document.querySelectorAll('.alert .close-btn');

            menuToggle.addEventListener('click', function () {
                mobileMenu.classList.toggle('open');
                const expanded = mobileMenu.classList.contains('open');
                menuToggle.setAttribute('aria-expanded', expanded);
            });

            closeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const alert = button.closest('.alert');
                    if (alert) {
                        alert.style.opacity = '0';
                        setTimeout(function () {
                            alert.remove();
                        }, 200);
                    }
                });
            });

            setTimeout(function () {
                document.querySelectorAll('.alert').forEach(function (alert) {
                    alert.style.opacity = '0';
                    setTimeout(function () {
                        alert.remove();
                    }, 200);
                });
            }, 6000);

            const yearElement = document.getElementById('currentYear');
            if (yearElement) {
                yearElement.textContent = new Date().getFullYear();
            }
        });
        const age = 10
        
        
    </script>
    

    @stack('scripts')
</body>
</html>