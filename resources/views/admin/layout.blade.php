<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') · Portfolio CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Sora', sans-serif; }

        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

        .sidebar-link {
            position: relative;
            transition: all 0.2s ease;
        }
        .sidebar-link.active {
            background: linear-gradient(135deg, #eef2ff, #ede9fe);
            color: #4f46e5;
            font-weight: 600;
        }
        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 60%;
            background: linear-gradient(180deg, #6366f1, #8b5cf6);
            border-radius: 0 99px 99px 0;
        }
        .sidebar-link:not(.active):hover {
            background: #f8fafc;
            color: #334155;
        }

        /* Form inputs */
        input[type="text"], input[type="email"], input[type="url"],
        input[type="number"], input[type="date"], textarea, select {
            border-color: #e2e8f0;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .page-content { animation: fadeIn 0.3s ease forwards; }

        .btn-primary-admin {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            transition: all 0.2s ease;
        }
        .btn-primary-admin:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(99,102,241,0.35);
        }
    </style>
</head>
<body class="h-full bg-slate-50 text-slate-700">

    <div class="flex h-full min-h-screen">

        {{-- SIDEBAR --}}
        <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/20 backdrop-blur-sm hidden lg:hidden"></div>
        @include('admin.partials.sidebar')

        {{-- MAIN --}}
        <div class="flex flex-1 flex-col min-w-0">

            {{-- Topbar --}}
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-6 lg:px-8 shadow-sm shadow-slate-100/80">
                <div class="flex items-center gap-4">
                    {{-- Mobile sidebar toggle --}}
                    <button id="sidebar-toggle" type="button"
                        class="lg:hidden flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 hover:bg-slate-50 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-400">Portfolio CMS</p>
                        <h1 class="font-display text-lg font-bold text-slate-900 leading-tight">@yield('heading', 'Dashboard')</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="hidden sm:block text-sm text-slate-400">{{ now()->translatedFormat('d F Y') }}</span>

                    <a href="{{ route('home') }}" target="_blank"
                       class="hidden sm:inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-50 hover:border-indigo-300 hover:text-indigo-600">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                        </svg>
                        Lihat Website
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-red-50 hover:border-red-200 hover:text-red-600">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-6 lg:p-8 page-content">
                <x-flash />
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebarToggle  = document.getElementById('sidebar-toggle');
        const sidebar        = document.getElementById('admin-sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function openSidebar()  { sidebar?.classList.remove('-translate-x-full'); sidebarOverlay?.classList.remove('hidden'); }
        function closeSidebar() { sidebar?.classList.add('-translate-x-full');    sidebarOverlay?.classList.add('hidden'); }

        sidebarToggle?.addEventListener('click', openSidebar);
        sidebarOverlay?.addEventListener('click', closeSidebar);
    </script>
</body>
</html>
