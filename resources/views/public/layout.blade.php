<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ============================================
        DATA FALLBACK
    ============================================ --}}
    @php
        $footerServices = $services ?? collect();

        /*
        |--------------------------------------------------------------------------
        | OPEN GRAPH IMAGE
        |--------------------------------------------------------------------------
        | Prioritas:
        | 1. Foto profile dari About
        | 2. Foto default public/images/og-default.jpg
        |
        | Pastikan $about->photo berisi path seperti:
        | storage/profile.jpg
        | atau
        | images/profile.jpg
        |--------------------------------------------------------------------------
        */

        $ogImage = isset($about) && !empty($about->photo)
            ? asset($about->photo)
            : asset('images/og-default.jpg');

        $personName = $about->name ?? 'Muhamad Ariel Saputra';
    @endphp


    {{-- ============================================
        SEO: BASIC
    ============================================ --}}
    <title>@yield('seo_full_title', 'Portofolio | ' . $personName)</title>

    <meta
        name="description"
        content="@yield(
            'seo_description',
            'Portfolio ' .
                $personName .
                ' — IT Support & Laravel Developer berpengalaman di bidang sistem, jaringan, dan pengembangan aplikasi web berbasis Laravel. Tersedia untuk posisi full-time.'
        )"
    >

    <meta
        name="keywords"
        content="@yield(
            'seo_keywords',
            $personName .
                ', IT Support, Laravel Developer, Web Developer, PHP Developer, Linux, Networking, Portfolio'
        )"
    >

    <meta
        name="author"
        content="{{ $personName }}"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <link
        rel="canonical"
        href="{{ url()->current() }}"
    >


    {{-- ============================================
        OPEN GRAPH
    ============================================ --}}
    <meta
        property="og:type"
        content="@yield('og_type', 'website')"
    >

    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >

    <meta
        property="og:site_name"
        content="{{ $personName }}"
    >

    <meta
        property="og:title"
        content="@yield(
            'og_title',
            'Portofolio | ' . $personName
        )"
    >

    <meta
        property="og:description"
        content="@yield(
            'og_description',
            'Portfolio ' .
                $personName .
                ' — IT Support & Laravel Developer berpengalaman. Open to Work.'
        )"
    >

    {{-- ============================================
        OPEN GRAPH IMAGE
    ============================================ --}}
    <meta
        property="og:image"
        content="@yield('og_image', $ogImage)"
    >

    <meta
        property="og:image:secure_url"
        content="@yield('og_image', $ogImage)"
    >

    <meta
        property="og:image:type"
        content="image/jpeg"
    >

    <meta
        property="og:image:width"
        content="1200"
    >

    <meta
        property="og:image:height"
        content="630"
    >

    <meta
        property="og:image:alt"
        content="Portofolio | {{ $personName }}"
    >

    <meta
        property="og:locale"
        content="id_ID"
    >


    {{-- ============================================
        TWITTER CARD
    ============================================ --}}
    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="@yield(
            'og_title',
            'Portofolio | ' . $personName
        )"
    >

    <meta
        name="twitter:description"
        content="@yield(
            'og_description',
            'Portfolio ' .
                $personName .
                ' — IT Support & Laravel Developer berpengalaman. Open to Work.'
        )"
    >

    <meta
        name="twitter:image"
        content="@yield('og_image', $ogImage)"
    >

    <meta
        name="twitter:image:alt"
        content="Portofolio | {{ $personName }}"
    >


    {{-- ============================================
        STRUCTURED DATA
    ============================================ --}}
    @yield('structured_data')

    @if (request()->routeIs('home'))
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": @json('Portofolio | ' . $personName),
            "alternateName": [
                @json('Portofolio ' . $personName),
                "Portofolio Ariel Saputra",
                "Muhamad Ariel Saputra Portfolio",
                "Ariel Saputra Portfolio"
            ],
            "url": "{{ url('/') }}"
        }
        </script>
    @endif

    @if (request()->routeIs('home') || !request()->routeIs('projects.show'))

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Person",

            "name": @json($about->name ?? 'Muhamad Ariel Saputra'),

            "jobTitle": @json(
                $about->headline ?? 'IT Support & Laravel Developer'
            ),

            "description": @json(
                $about->short_bio ??
                'IT Support dan Laravel Developer berpengalaman di bidang sistem, jaringan, dan pengembangan aplikasi web.'
            ),

            "url": @json(url('/')),

            "image": @json($ogImage),

            "email": @json($about->email ?? ''),

            "address": {
                "@type": "PostalAddress",
                "addressCountry": "ID",
                "addressLocality": @json($about->location ?? 'Indonesia')
            },

            "sameAs": [
                @if (!empty($about->linkedin))
                    @json($about->linkedin),
                @endif

                @if (!empty($about->github))
                    @json($about->github),
                @endif

                @if (!empty($about->instagram))
                    @json($about->instagram)
                @endif
            ],

            "knowsAbout": [
                "IT Support",
                "Laravel",
                "PHP",
                "MySQL",
                "Linux",
                "Networking",
                "Web Development"
            ],

            "alumniOf": {
                "@type": "CollegeOrUniversity",
                "name": "Universitas Pelita Bangsa"
            }
        }
        </script>

    @endif


    {{-- ============================================
        TAILWIND
    ============================================ --}}
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


    {{-- ============================================
        GOOGLE FONT
    ============================================ --}}
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@400;600;700&display=swap"
        rel="stylesheet"
    >


    {{-- ============================================
        CUSTOM STYLE
    ============================================ --}}
    <style>

        body {
            font-family: 'Inter', sans-serif;
        }


        h1,
        h2,
        h3,
        .font-display {
            font-family: 'Sora', sans-serif;
        }


        /* ============================================
            SCROLLBAR
        ============================================ */

        ::-webkit-scrollbar {
            width: 6px;
        }


        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }


        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 99px;
        }


        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }


        /* ============================================
            NAVIGATION
        ============================================ */

        .nav-link {
            position: relative;
        }


        .nav-link::after {
            content: '';

            position: absolute;

            bottom: -2px;
            left: 50%;

            width: 0;
            height: 2px;

            background: linear-gradient(
                90deg,
                #6366f1,
                #8b5cf6
            );

            transition: all 0.3s ease;

            transform: translateX(-50%);

            border-radius: 99px;
        }


        .nav-link:hover::after,
        .nav-link.active::after {
            width: 70%;
        }


        .nav-link.active {
            color: #4f46e5;
        }


        /* ============================================
            CARD HOVER
        ============================================ */

        .card-hover {
            transition: all 0.25s ease;
        }


        .card-hover:hover {

            box-shadow:
                0 8px 30px rgba(99, 102, 241, 0.1),
                0 2px 8px rgba(0, 0, 0, 0.06);

            transform: translateY(-3px);

            border-color:
                rgba(99, 102, 241, 0.25) !important;
        }


        /* ============================================
            GRADIENT TEXT
        ============================================ */

        .gradient-text {

            background:
                linear-gradient(
                    135deg,
                    #4f46e5 0%,
                    #7c3aed 100%
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

            background-clip: text;
        }


        /* ============================================
            NOISE BACKGROUND
        ============================================ */

        .noise-bg::before {

            content: '';

            position: fixed;

            inset: 0;

            background-image:
                url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.02'/%3E%3C/svg%3E");

            pointer-events: none;

            z-index: 0;
        }


        /* ============================================
            FADE UP
        ============================================ */

        @keyframes fadeUp {

            from {

                opacity: 0;

                transform:
                    translateY(16px);

            }

            to {

                opacity: 1;

                transform:
                    translateY(0);

            }

        }


        .animate-fadeup {

            animation:
                fadeUp 0.55s ease forwards;

        }


        .animate-fadeup-delay {

            animation:
                fadeUp 0.55s ease 0.15s forwards;

            opacity: 0;

        }


        /* ============================================
            BUTTON PRIMARY
        ============================================ */

        .btn-primary {

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );

            color: white;

            transition:
                all 0.25s ease;

        }


        .btn-primary:hover {

            transform:
                translateY(-1px);

            box-shadow:
                0 8px 25px rgba(99, 102, 241, 0.35);

        }

    </style>

</head>


<body class="min-h-screen bg-[#F8F9FB] text-slate-800 antialiased noise-bg">


    {{-- ============================================
        BACKGROUND
    ============================================ --}}
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">

        <div
            class="absolute left-[30%] top-[-15%] h-[500px] w-[500px] rounded-full bg-indigo-100/60 blur-[100px]"
        ></div>

        <div
            class="absolute right-[-5%] top-[20%] h-[350px] w-[350px] rounded-full bg-violet-100/50 blur-[100px]"
        ></div>

        <div
            class="absolute bottom-[-10%] left-[5%] h-[400px] w-[400px] rounded-full bg-sky-100/40 blur-[120px]"
        ></div>

    </div>


    <div class="relative z-10 flex min-h-screen flex-col">


        {{-- ============================================
            NAVBAR
        ============================================ --}}
        <header
            id="navbar"
            class="sticky top-0 z-50 border-b border-slate-200/60 bg-white/80 shadow-sm shadow-slate-100/50 backdrop-blur-xl transition-all duration-300"
        >

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="flex h-16 items-center justify-between gap-4">


                    {{-- LOGO --}}
                    <a
                        href="{{ route('home') }}"
                        class="group flex items-center gap-2.5"
                    >

                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-violet-600 shadow-md shadow-indigo-200"
                        >

                            <span class="text-xs font-bold text-white">

                                {{ strtoupper(substr($about->name ?? 'P', 0, 1)) }}

                            </span>

                        </div>


                        <span
                            class="text-sm font-semibold tracking-wide text-slate-800 transition-colors group-hover:text-indigo-600"
                        >

                            {{ $about->name ?? 'Portfolio' }}

                        </span>

                    </a>


                    {{-- NAV LINKS --}}
                    @php

                        $navLinks = [

                            [
                                'route' => 'home',
                                'label' => 'Home'
                            ],

                            [
                                'route' => 'about',
                                'label' => 'About'
                            ],

                            [
                                'route' => 'projects',
                                'label' => 'Projects'
                            ],

                            [
                                'route' => 'experiences',
                                'label' => 'Experience'
                            ],

                            [
                                'route' => 'contact',
                                'label' => 'Contact'
                            ],

                        ];

                    @endphp


                    {{-- DESKTOP NAV --}}
                    <nav class="hidden items-center gap-1 lg:flex">

                        @foreach ($navLinks as $link)

                            <a
                                href="{{ route($link['route']) }}"
                                class="nav-link rounded-lg px-4 py-2 text-sm font-medium transition-colors duration-200
                                {{
                                    request()->routeIs($link['route'])
                                        ? 'active bg-indigo-50 text-indigo-600'
                                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-800'
                                }}"
                            >

                                {{ $link['label'] }}

                            </a>

                        @endforeach

                    </nav>


                    {{-- CTA + MOBILE BUTTON --}}
                    <div class="flex items-center gap-3">


                        {{-- CTA --}}
                        <a
                            href="{{ route('contact') }}"
                            class="btn-primary hidden items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold lg:inline-flex"
                        >

                            <span
                                class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-300"
                            ></span>

                            Hubungi Saya

                        </a>


                        {{-- MOBILE MENU BUTTON --}}
                        <button
                            id="mobile-menu-button"
                            type="button"
                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-50 lg:hidden"
                            aria-label="Toggle navigation"
                            aria-expanded="false"
                        >

                            <svg
                                id="menu-open-icon"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />

                            </svg>


                            <svg
                                id="menu-close-icon"
                                class="hidden h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />

                            </svg>

                        </button>

                    </div>

                </div>

            </div>


            {{-- MOBILE MENU --}}
            <div
                id="mobile-menu"
                class="hidden border-t border-slate-100 bg-white lg:hidden"
            >

                <div class="mx-auto max-w-7xl space-y-0.5 px-4 py-3">

                    @foreach ($navLinks as $link)

                        <a
                            href="{{ route($link['route']) }}"
                            class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition-colors
                            {{
                                request()->routeIs($link['route'])
                                    ? 'bg-indigo-50 text-indigo-600'
                                    : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'
                            }}"
                        >

                            {{ $link['label'] }}

                        </a>

                    @endforeach


                    {{-- MOBILE CTA --}}
                    <div class="pb-1 pt-3">

                        <a
                            href="{{ route('contact') }}"
                            class="btn-primary flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-semibold"
                        >

                            <span
                                class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-300"
                            ></span>

                            Hubungi Saya

                        </a>

                    </div>

                </div>

            </div>

        </header>


        {{-- ============================================
            MAIN CONTENT
        ============================================ --}}
        <main class="flex-1">

            @yield('content')

        </main>


        {{-- ============================================
            FOOTER
        ============================================ --}}
        @php
            $footerWa = preg_replace('/[^0-9]/', '', $about->whatsapp ?? '');
            if (str_starts_with($footerWa, '0')) {
                $footerWa = '62' . substr($footerWa, 1);
            }
            $footerLinkedin = $about->linkedin ? (str_starts_with($about->linkedin, 'http') ? $about->linkedin : 'https://linkedin.com/in/' . ltrim($about->linkedin, '@')) : null;
            $footerGithub = $about->github ? (str_starts_with($about->github, 'http') ? $about->github : 'https://github.com/' . ltrim($about->github, '@')) : null;
            $footerInstagram = $about->instagram ? (str_starts_with($about->instagram, 'http') ? $about->instagram : 'https://instagram.com/' . ltrim($about->instagram, '@')) : null;
        @endphp

        <footer class="mt-20 border-t border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- BRAND / ABOUT --}}
                    <div class="space-y-3">
                        <a href="{{ route('home') }}" class="group inline-block">
                            <span class="font-display text-base font-bold text-slate-900 transition group-hover:text-indigo-600">
                                {{ $about->name ?? 'Muhamad Ariel Saputra' }}
                            </span>
                        </a>

                        <p class="text-xs leading-relaxed text-slate-600 text-justify">
                            {{ $about->short_bio ?? 'IT Support & Web Developer yang berfokus pada infrastruktur sistem, pemeliharaan jaringan Linux/Windows, dan pembuatan aplikasi web modern dengan Laravel.' }}
                        </p>

                        <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1">
                            <span class="h-2 w-2 rounded-full {{ ($about->open_to_work ?? true) ? 'bg-emerald-400 animate-pulse' : 'bg-slate-400' }}"></span>
                            <span class="text-[11px] font-semibold {{ ($about->open_to_work ?? true) ? 'text-emerald-700' : 'text-slate-600' }}">
                                {{ ($about->open_to_work ?? true) ? 'Open to Opportunities' : 'Closed to Work' }}
                            </span>
                        </div>
                    </div>

                    {{-- FOCUS AREAS --}}
                    <div>
                        <p class="mb-4 text-xs font-bold uppercase tracking-widest text-slate-600">
                            Focus Areas
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-600">
                            @forelse ($footerServices->take(5) as $service)
                                <li class="flex items-center gap-2">
                                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-indigo-500"></span>
                                    <span>{{ $service->title }}</span>
                                </li>
                            @empty
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span> IT Support & Hardware</li>
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span> Web Development Laravel</li>
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span> Linux & Server Deployment</li>
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span> Network LAN / WAN</li>
                            @endforelse
                        </ul>
                    </div>

                    {{-- CONTACT & SOCIAL MEDIA --}}
                    <div>
                        <p class="mb-4 text-xs font-bold uppercase tracking-widest text-slate-600">
                            Hubungi Saya
                        </p>
                        <div class="space-y-2 text-xs text-slate-600">
                            <p class="truncate">
                                <a href="mailto:{{ $about->email ?? 'muhamadarielsaputra11@gmail.com' }}" class="text-slate-600 transition hover:text-indigo-600">
                                    {{ $about->email ?? 'muhamadarielsaputra11@gmail.com' }}
                                </a>
                            </p>
                            <p class="text-slate-600">
                                {{ $about->location ?? 'Cikarang Selatan, Kab. Bekasi' }}
                            </p>
                        </div>

                        {{-- SOCIAL ICONS --}}
                        <div class="mt-5">
                            <p class="mb-2.5 text-[11px] font-semibold text-slate-600">
                                Media Sosial:
                            </p>
                            <div class="flex items-center gap-2">
                                @if ($footerWa)
                                    <a href="https://wa.me/{{ $footerWa }}" target="_blank" rel="noopener noreferrer"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-600"
                                       title="WhatsApp" aria-label="WhatsApp">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($footerLinkedin)
                                    <a href="{{ $footerLinkedin }}" target="_blank" rel="noopener noreferrer"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition hover:border-sky-300 hover:bg-sky-50 hover:text-sky-600"
                                       title="LinkedIn" aria-label="LinkedIn">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 8.25v9M6.75 5.25v.008M10.5 17.25v-5.25a3 3 0 016 0v5.25M10.5 10.5v6.75" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($footerGithub)
                                    <a href="{{ $footerGithub }}" target="_blank" rel="noopener noreferrer"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition hover:border-slate-400 hover:bg-slate-100 hover:text-slate-900"
                                       title="GitHub" aria-label="GitHub">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25a9.75 9.75 0 00-3.084 19.001c.488.09.666-.212.666-.47v-1.67c-2.71.589-3.282-1.15-3.282-1.15-.443-1.126-1.082-1.426-1.082-1.426-.884-.604.067-.592.067-.592.977.069 1.491 1.003 1.491 1.003.869 1.488 2.28 1.058 2.835.809.088-.629.34-1.058.618-1.302-2.164-.246-4.44-1.082-4.44-4.815 0-1.064.38-1.934 1.003-2.616-.101-.246-.435-1.239.095-2.583 0 0 .818-.262 2.678 1a9.327 9.327 0 014.876 0c1.86-1.262 2.678-1 2.678-1 .53 1.344.196 2.337.095 2.583.623.682 1.003 1.552 1.003 2.616 0 3.742-2.28 4.566-4.449 4.807.35.301.662.894.662 1.802v2.672c0 .26.176.564.671.468A9.75 9.75 0 0012 2.25z" />
                                        </svg>
                                    </a>
                                @endif

                                @if ($footerInstagram)
                                    <a href="{{ $footerInstagram }}" target="_blank" rel="noopener noreferrer"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition hover:border-rose-300 hover:bg-rose-50 hover:text-rose-600"
                                       title="Instagram" aria-label="Instagram">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 2.25h9A5.25 5.25 0 0121.75 7.5v9a5.25 5.25 0 01-5.25 5.25h-9a5.25 5.25 0 01-5.25-5.25v-9A5.25 5.25 0 017.5 2.25zm4.5 5.25a4.5 4.5 0 100 9 4.5 4.5 0 000-9zm5.625-.75h.008v.008h-.008V6.75z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                {{-- COPYRIGHT --}}
                <div class="mt-12 border-t border-slate-100 pt-6 text-center">
                    <p class="text-xs text-slate-600">
                        &copy; {{ date('Y') }} {{ $about->name ?? config('app.name') }}. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>

    </div>


    {{-- ============================================
        MOBILE MENU SCRIPT
    ============================================ --}}
    <script>

        const menuButton =
            document.getElementById(
                'mobile-menu-button'
            );


        const mobileMenu =
            document.getElementById(
                'mobile-menu'
            );


        const openIcon =
            document.getElementById(
                'menu-open-icon'
            );


        const closeIcon =
            document.getElementById(
                'menu-close-icon'
            );


        if (menuButton && mobileMenu) {

            menuButton.addEventListener(
                'click',
                function () {

                    const isHidden =
                        mobileMenu.classList.contains(
                            'hidden'
                        );


                    mobileMenu.classList.toggle(
                        'hidden'
                    );


                    openIcon.classList.toggle(
                        'hidden'
                    );


                    closeIcon.classList.toggle(
                        'hidden'
                    );


                    menuButton.setAttribute(
                        'aria-expanded',
                        isHidden ? 'true' : 'false'
                    );

                }
            );

        }

    </script>

</body>

</html>