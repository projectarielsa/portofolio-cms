@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'IT Support & Laravel Developer')
@section('seo_description', ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer berpengalaman di bidang pengelolaan sistem, jaringan LAN/WAN, server Linux, dan pengembangan aplikasi web berbasis Laravel. Aktif mencari kerja, open to work.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', Ariel Saputra, IT Support, Laravel Developer, Web Developer PHP, portfolio IT support Indonesia, developer Laravel Indonesia')
@section('og_title', ($about->name ?? 'Muhamad Ariel Saputra') . ' | IT Support & Laravel Developer')
@section('og_description', 'Portfolio ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer. Berpengalaman sistem, jaringan, dan web development. Open to Work.')

@section('content')

{{-- ══════════════════════════════════════════════
     HERO
══════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-16 lg:pt-28 lg:pb-24">
    <div class="grid gap-16 lg:grid-cols-2 lg:items-center">

        {{-- LEFT --}}
        <div class="animate-fadeup">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 mb-8">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs font-semibold text-emerald-700 tracking-wide">Aktif Mencari Kerja · Open to Work</span>
            </div>

            <h1 class="font-display text-4xl font-bold leading-[1.15] tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                {{ $about->headline ?? 'IT Support & Laravel Developer' }}
            </h1>

            <p class="mt-6 text-base leading-8 text-slate-500 max-w-lg sm:text-lg">
                {{ $about->short_bio ?? 'Berpengalaman dalam IT Support, pengelolaan server Linux, konfigurasi jaringan, dan pengembangan aplikasi web berbasis Laravel.' }}
            </p>

            {{-- CTA --}}
            <div class="mt-10 flex flex-wrap gap-3">
                <a href="{{ route('projects') }}"
                   class="inline-flex items-center gap-2 rounded-full btn-primary px-6 py-3 text-sm font-semibold shadow-lg shadow-indigo-200">
                    Lihat Projects
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition-all hover:border-indigo-300 hover:text-indigo-600 hover:bg-indigo-50 shadow-sm">
                    Tentang Saya
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-12 flex flex-wrap gap-8">
                <div>
                    <p class="font-display text-3xl font-bold text-slate-900">{{ $featuredProjects->count() }}+</p>
                    <p class="mt-1 text-xs text-slate-400 uppercase tracking-widest">Projects</p>
                </div>
                <div class="w-px bg-slate-200"></div>
                <div>
                    <p class="font-display text-3xl font-bold text-slate-900">{{ $services->count() }}</p>
                    <p class="mt-1 text-xs text-slate-400 uppercase tracking-widest">Focus Areas</p>
                </div>
                <div class="w-px bg-slate-200"></div>
                <div>
                    <p class="font-display text-3xl font-bold text-slate-900">{{ $skills->count() }}+</p>
                    <p class="mt-1 text-xs text-slate-400 uppercase tracking-widest">Skills</p>
                </div>
            </div>
        </div>

        {{-- RIGHT: Profile Card --}}
        <div class="animate-fadeup-delay">
            <div class="relative">
                {{-- Shadow glow --}}
                <div class="absolute inset-0 rounded-[2.5rem] bg-gradient-to-br from-indigo-200/60 via-violet-100/40 to-transparent blur-2xl scale-95"></div>

                <div class="relative rounded-[2.5rem] border border-slate-200 bg-white p-1 shadow-xl shadow-slate-200/60">
                    <div class="rounded-[2rem] bg-gradient-to-br from-slate-50 via-white to-indigo-50/40 border border-slate-100 p-7">

                        {{-- Header --}}
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center shadow-md shadow-indigo-200">
                                    <span class="text-sm font-bold text-white">{{ strtoupper(substr($about->name ?? 'A', 0, 1)) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">{{ $about->name ?? 'Muhamad Ariel Saputra' }}</p>
                                    <p class="text-xs text-slate-400">IT Support · Laravel Dev</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-1.5 rounded-full bg-emerald-50 border border-emerald-200 px-3 py-1.5">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="text-[11px] font-semibold text-emerald-700">Open to Work</span>
                            </div>
                        </div>

                        <div class="h-px bg-slate-100 mb-6"></div>

                        {{-- Info rows --}}
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-400 uppercase tracking-widest">Location</span>
                                <span class="text-sm font-medium text-slate-700">{{ $about->location ?? 'Indonesia' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-400 uppercase tracking-widest">Education</span>
                                <span class="text-sm font-medium text-slate-700">S1 Teknik Informatika</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-400 uppercase tracking-widest">Status</span>
                                <span class="text-sm font-semibold text-emerald-600">Open to Work</span>
                            </div>
                        </div>

                        <div class="h-px bg-slate-100 my-6"></div>

                        {{-- Tags --}}
                        <div class="flex flex-wrap gap-2">
                            @foreach(['IT Support', 'Laravel', 'Linux', 'Networking', 'MySQL', 'PHP'] as $tag)
                                <span class="rounded-full border border-indigo-100 bg-indigo-50 px-3 py-1.5 text-[11px] font-semibold text-indigo-600 tracking-wide">{{ $tag }}</span>
                            @endforeach
                        </div>

                        {{-- Bottom bar --}}
                        <div class="mt-6 flex items-center justify-between rounded-2xl bg-slate-50 border border-slate-100 px-5 py-4">
                            <div>
                                <p class="text-xs text-slate-400">Mencari posisi</p>
                                <p class="text-sm font-bold text-slate-800 mt-0.5">Full-time · IT Support / Web Dev</p>
                            </div>
                            <a href="{{ route('contact') }}" class="rounded-xl btn-primary px-4 py-2 text-xs font-bold shadow-md shadow-indigo-200">
                                Kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════
     FEATURED PROJECTS
══════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between mb-12">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-3">Selected Work</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Projects yang saya kerjakan
            </h2>
            <p class="mt-3 text-slate-500 max-w-xl">Kumpulan project yang mencerminkan cara saya membangun dan menyelesaikan masalah teknis.</p>
        </div>
        <a href="{{ route('projects') }}"
           class="inline-flex shrink-0 items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition-all hover:border-indigo-300 hover:text-indigo-600 hover:bg-indigo-50">
            Semua Projects
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
            </svg>
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($featuredProjects as $project)
            <a href="{{ route('projects.show', $project) }}"
               class="group card-hover flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="aspect-[16/10] overflow-hidden bg-slate-100 shrink-0">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}"
                             class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.04]">
                    @else
                        <div class="flex h-full w-full flex-col justify-end p-6 bg-gradient-to-br from-indigo-50 via-white to-violet-50">
                            <p class="text-[10px] uppercase tracking-widest text-indigo-400 mb-2 font-semibold">{{ $project->category ?: 'Project' }}</p>
                            <p class="font-display text-xl font-bold text-slate-800">{{ $project->title }}</p>
                        </div>
                    @endif
                </div>

                <div class="flex flex-col flex-1 p-6">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <span class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="rounded-full bg-indigo-50 border border-indigo-200 px-2.5 py-1 text-[10px] font-bold text-indigo-600 uppercase tracking-wide">Featured</span>
                        @endif
                    </div>

                    <h3 class="font-display text-lg font-bold text-slate-800 leading-snug group-hover:text-indigo-600 transition-colors">
                        {{ $project->title }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-500 flex-1">
                        {{ Str::limit($project->description, 110) }}
                    </p>

                    <div class="mt-5 flex items-center gap-2 text-sm font-semibold text-indigo-500 group-hover:text-indigo-700 transition-colors">
                        Lihat Detail
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-200 px-8 py-16 text-center bg-white">
                <p class="text-slate-400">Belum ada featured project.</p>
            </div>
        @endforelse
    </div>
</section>

{{-- ══════════════════════════════════════════════
     SERVICES
══════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-10 lg:p-14">
        <div class="grid gap-16 lg:grid-cols-[1fr_1.2fr] lg:items-start">

            <div class="lg:sticky lg:top-28">
                <p class="text-xs font-bold uppercase tracking-widest text-violet-500 mb-3">What I Do</p>
                <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Area yang saya kuasai
                </h2>
                <p class="mt-4 leading-8 text-slate-500 max-w-md">
                    Saya bekerja di persimpangan antara IT Support dan Web Development — dari troubleshooting sistem hingga membangun aplikasi Laravel untuk operasional kerja.
                </p>
                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 mt-8 text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">
                    Lebih lanjut tentang saya
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                @php
                    $serviceColors = [
                        ['bg' => 'bg-indigo-50', 'border' => 'border-indigo-100', 'dot' => 'bg-indigo-400', 'text' => 'text-indigo-600'],
                        ['bg' => 'bg-violet-50', 'border' => 'border-violet-100', 'dot' => 'bg-violet-400', 'text' => 'text-violet-600'],
                        ['bg' => 'bg-sky-50',    'border' => 'border-sky-100',    'dot' => 'bg-sky-400',    'text' => 'text-sky-600'],
                        ['bg' => 'bg-emerald-50','border' => 'border-emerald-100','dot' => 'bg-emerald-400','text' => 'text-emerald-600'],
                    ];
                @endphp
                @forelse ($services as $index => $service)
                    @php $sc = $serviceColors[$index % 4]; @endphp
                    <div class="card-hover group rounded-2xl border {{ $sc['border'] }} {{ $sc['bg'] }} p-6">
                        <div class="mb-5 flex h-10 w-10 items-center justify-center rounded-xl bg-white border {{ $sc['border'] }} shadow-sm">
                            <span class="text-sm font-bold {{ $sc['text'] }}">{{ strtoupper(substr($service->title, 0, 2)) }}</span>
                        </div>
                        <h3 class="font-display text-base font-bold text-slate-800 mb-3">{{ $service->title }}</h3>
                        <p class="text-sm leading-7 text-slate-500">{{ $service->description }}</p>
                    </div>
                @empty
                    <div class="col-span-2 rounded-2xl border border-dashed border-slate-200 p-8 text-center text-slate-400 bg-white">
                        Tambahkan focus area dari CMS.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════
     SKILLS
══════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8 pb-20">
    <div class="grid gap-16 lg:grid-cols-[1fr_1.5fr] lg:items-center">

        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-emerald-500 mb-3">Tech Stack</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Tools & teknologi yang saya gunakan
            </h2>
            <p class="mt-4 leading-8 text-slate-500 max-w-md">
                Dari server Linux hingga framework Laravel — semua yang saya pakai sehari-hari untuk support dan development.
            </p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
            <div class="flex flex-wrap gap-2.5">
                @forelse ($skills as $skill)
                    <span class="rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-600 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600 transition-all cursor-default">
                        {{ $skill->name }}
                    </span>
                @empty
                    <span class="text-slate-400">Tambahkan skills dari CMS.</span>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection
