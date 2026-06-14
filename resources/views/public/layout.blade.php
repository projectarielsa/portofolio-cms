<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ═══ SEO: Basic ═══ --}}
    <title>@yield('seo_title', $about->name ?? 'Portfolio') — @yield('seo_subtitle', 'IT Support & Laravel Developer')</title>
    <meta name="description" content="@yield('seo_description', 'Portfolio ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer berpengalaman di bidang sistem, jaringan, dan pengembangan aplikasi web berbasis Laravel. Tersedia untuk posisi full-time.')">
    <meta name="keywords" content="@yield('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', IT Support, Laravel Developer, Web Developer, PHP Developer, Linux, Networking, Portfolio')">
    <meta name="author" content="{{ $about->name ?? 'Muhamad Ariel Saputra' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- ═══ SEO: Open Graph (Facebook, WhatsApp, LinkedIn) ═══ --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $about->name ?? config('app.name') }}">
    <meta property="og:title" content="@yield('og_title', ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer')">
    <meta property="og:description" content="@yield('og_description', 'Portfolio ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer berpengalaman. Open to Work.')">
    <meta property="og:image" content="@yield('og_image', $about->photo ? asset($about->photo) : asset('images/og-default.jpg'))">
    <meta property="og:locale" content="id_ID">

    {{-- ═══ SEO: Twitter Card ═══ --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer')">
    <meta name="twitter:description" content="@yield('og_description', 'Portfolio ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer berpengalaman. Open to Work.')">
    <meta name="twitter:image" content="@yield('og_image', $about->photo ? asset($about->photo) : asset('images/og-default.jpg'))">

    {{-- ═══ SEO: JSON-LD Structured Data (Person) ═══ --}}
    @yield('structured_data')
    @if(request()->routeIs('home') || !request()->routeIs('projects.show'))
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "{{ $about->name ?? 'Muhamad Ariel Saputra' }}",
        "jobTitle": "{{ $about->headline ?? 'IT Support & Laravel Developer' }}",
        "description": "{{ $about->short_bio ?? 'IT Support dan Laravel Developer berpengalaman di bidang sistem, jaringan, dan pengembangan aplikasi web.' }}",
        "url": "{{ url('/') }}",
        "email": "{{ $about->email ?? '' }}",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "ID",
            "addressLocality": "{{ $about->location ?? 'Indonesia' }}"
        },
        "sameAs": [
            {{ $about->linkedin ? '"' . $about->linkedin . '",' : '' }}
            {{ $about->github   ? '"' . $about->github   . '",' : '' }}
            {{ $about->instagram? '"' . $about->instagram . '"' : '""' }}
        ],
        "knowsAbout": ["IT Support", "Laravel", "PHP", "MySQL", "Linux", "Networking", "Web Development"],
        "alumniOf": {
            "@type": "CollegeOrUniversity",
            "name": "Universitas Pelita Bangsa"
        }
    }
    </script>
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Sora', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Sora', sans-serif; }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Nav active underline */
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 50%;
            width: 0; height: 2px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 99px;
        }
        .nav-link:hover::after,
        .nav-link.active::after { width: 70%; }
        .nav-link.active { color: #4f46e5; }

        /* Card hover */
        .card-hover {
            transition: all 0.25s ease;
        }
        .card-hover:hover {
            box-shadow: 0 8px 30px rgba(99,102,241,0.1), 0 2px 8px rgba(0,0,0,0.06);
            transform: translateY(-3px);
            border-color: rgba(99,102,241,0.25) !important;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Subtle noise texture */
        .noise-bg::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.02'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* Fade up */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeup { animation: fadeUp 0.55s ease forwards; }
        .animate-fadeup-delay { animation: fadeUp 0.55s ease 0.15s forwards; opacity: 0; }

        /* Button primary */
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            transition: all 0.25s ease;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(99,102,241,0.35);
        }
    </style>
</head>
<body class="min-h-screen bg-[#F8F9FB] text-slate-800 antialiased noise-bg">

    {{-- Subtle top gradient --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden z-0">
        <div class="absolute left-[30%] top-[-15%] h-[500px] w-[500px] rounded-full bg-indigo-100/60 blur-[100px]"></div>
        <div class="absolute right-[-5%] top-[20%] h-[350px] w-[350px] rounded-full bg-violet-100/50 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[5%] h-[400px] w-[400px] rounded-full bg-sky-100/40 blur-[120px]"></div>
    </div>

    <div class="relative z-10 min-h-screen flex flex-col">

        {{-- ══════════════ NAVBAR ══════════════ --}}
        <header id="navbar" class="sticky top-0 z-50 transition-all duration-300 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 shadow-sm shadow-slate-100/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between gap-4">

                    {{-- Logo --}}
                    <a href="{{ route('home') }}" class="group flex items-center gap-2.5">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-violet-600 shadow-md shadow-indigo-200">
                            <span class="text-xs font-bold text-white">
                                {{ strtoupper(substr($about->name ?? 'P', 0, 1)) }}
                            </span>
                        </div>
                        <span class="text-sm font-semibold text-slate-800 group-hover:text-indigo-600 transition-colors tracking-wide">
                            {{ $about->name ?? 'Portfolio' }}
                        </span>
                    </a>

                    {{-- Desktop Nav --}}
                    <nav class="hidden items-center gap-1 lg:flex">
                        @php
                            $navLinks = [
                                ['route' => 'home',        'label' => 'Home'],
                                ['route' => 'about',       'label' => 'About'],
                                ['route' => 'projects',    'label' => 'Projects'],
                                ['route' => 'experiences', 'label' => 'Experience'],
                                ['route' => 'contact',     'label' => 'Contact'],
                            ];
                        @endphp
                        @foreach ($navLinks as $link)
                            <a href="{{ route($link['route']) }}"
                               class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs($link['route']) ? 'active text-indigo-600 bg-indigo-50' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }}">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </nav>

                    {{-- CTA + Mobile button --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('contact') }}"
                           class="hidden lg:inline-flex items-center gap-2 rounded-full btn-primary px-4 py-2 text-sm font-semibold">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                            Hubungi Saya
                        </a>

                        <button id="mobile-menu-button" type="button"
                            class="lg:hidden flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-50"
                            aria-label="Toggle navigation" aria-expanded="false">
                            <svg id="menu-open-icon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg id="menu-close-icon" class="hidden h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-100 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-3 space-y-0.5">
                    @foreach ($navLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition-colors {{ request()->routeIs($link['route']) ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                    <div class="pt-3 pb-1">
                        <a href="{{ route('contact') }}" class="flex items-center justify-center gap-2 rounded-xl btn-primary px-4 py-3 text-sm font-semibold">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                            Hubungi Saya
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        {{-- ══════════════ FOOTER ══════════════ --}}
        <footer class="bg-white border-t border-slate-200 mt-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-14">
                <div class="grid gap-10 sm:grid-cols-[1.5fr_1fr_1fr]">

                    {{-- Brand --}}
                    <div>
                        <div class="flex items-center gap-2.5 mb-5">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-violet-600 shadow-md shadow-indigo-200">
                                <span class="text-xs font-bold text-white">{{ strtoupper(substr($about->name ?? 'P', 0, 1)) }}</span>
                            </div>
                            <span class="text-sm font-semibold text-slate-800">{{ $about->name ?? 'Portfolio' }}</span>
                        </div>
                        <p class="text-sm leading-7 text-slate-500 max-w-xs">
                            IT Support & Laravel Developer dengan pengalaman di bidang sistem, jaringan, dan pengembangan aplikasi web.
                        </p>
                        <div class="mt-5 flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-xs text-emerald-600 font-semibold">Open to Opportunities</span>
                        </div>
                    </div>

                    {{-- Focus --}}
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Focus Areas</p>
                        <ul class="space-y-3 text-sm text-slate-500">
                            <li>IT Support</li>
                            <li>Web Development</li>
                            <li>Laravel & PHP</li>
                            <li>Linux & Networking</li>
                        </ul>
                    </div>

                    {{-- Contact --}}
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Contact</p>
                        <ul class="space-y-3 text-sm text-slate-500">
                            <li>{{ $about->email ?? 'email@example.com' }}</li>
                            <li>{{ $about->location ?? 'Indonesia' }}</li>
                            <li class="pt-1">
                                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 text-indigo-600 hover:text-indigo-800 transition-colors font-semibold">
                                    Hubungi Saya
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-slate-400">© {{ date('Y') }} {{ $about->name ?? config('app.name') }}. Portfolio.</p>
                    <p class="text-xs text-slate-400">IT Support · Laravel Developer · Open to Work</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon   = document.getElementById('menu-open-icon');
        const closeIcon  = document.getElementById('menu-close-icon');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', function () {
                const isHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
                menuButton.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
            });
        }
    </script>
</body>
</html>
