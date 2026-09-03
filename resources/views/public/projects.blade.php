@extends('public.layout')

@php
    use Illuminate\Support\Str;

    $projectCount = $projects->count();
@endphp

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Projects — Portfolio')
@section('seo_description', 'Kumpulan project ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — aplikasi web Laravel, sistem informasi, dan project IT yang menunjukkan kemampuan teknis sebagai Web Developer.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', project Laravel, portfolio web developer, project IT support')
@section('og_title', 'Projects Portfolio — ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('og_description', 'Lihat kumpulan project web development dan IT dari ' . ($about->name ?? 'Muhamad Ariel Saputra') . '.')

@section('content')

<section class="mx-auto max-w-7xl px-4 pt-20 pb-16 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <div class="mb-12 flex items-center gap-2 text-xs text-slate-400">

        <a
            href="{{ route('home') }}"
            class="transition-colors hover:text-indigo-600"
        >
            Home
        </a>

        <span class="text-slate-300">/</span>

        <span class="text-slate-500">
            Projects
        </span>

    </div>


    {{-- Header --}}
    <div class="mb-14 max-w-2xl">

        <p class="mb-4 text-xs font-bold uppercase tracking-widest text-indigo-500">
            Portfolio
        </p>

        <h1
            class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl"
            style="font-family:'Sora',sans-serif;"
        >
            Projects Saya
        </h1>

        <p class="mt-5 text-lg leading-8 text-slate-500">
            Setiap project menunjukkan cara saya menyusun fitur, memilih stack,
            dan membangun sistem yang terstruktur.
        </p>

    </div>


    @forelse ($projects as $project)

        @if ($loop->first)

            {{-- ============================================
                JUMLAH PROJECT = 1
            ============================================= --}}
            @if ($projectCount === 1)

                <div class="mx-auto max-w-xl">


            {{-- ============================================
                JUMLAH PROJECT = 2 ATAU 4
                Layout 2 Kolom
            ============================================= --}}
            @elseif ($projectCount === 2 || $projectCount === 4)

                <div class="grid gap-6 md:grid-cols-2">


            {{-- ============================================
                JUMLAH PROJECT = 3
                Layout 3 Kolom
            ============================================= --}}
            @elseif ($projectCount === 3)

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">


            {{-- ============================================
                JUMLAH PROJECT = 5
                Baris pertama 3 kolom
            ============================================= --}}
            @elseif ($projectCount === 5)

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">


            {{-- ============================================
                DEFAULT
                3 Kolom
            ============================================= --}}
            @else

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @endif

        @endif


        {{-- ============================================
            PROJECT CARD
        ============================================= --}}
        <div
            class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg"

            {{-- Untuk project ke-4 dan ke-5 jika total 5 --}}
            @if ($projectCount === 5 && $loop->iteration >= 4)
                style="grid-column: span 1 / span 1;"
            @endif
        >

            {{-- COVER --}}
            <a
                href="{{ route('projects.show', $project) }}"
                class="block"
            >

                @if ($project->cover_image)

                    <div class="h-52 overflow-hidden bg-slate-100">

                        <img
                            src="{{ asset($project->cover_image) }}"
                            alt="{{ $project->title }}"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                        >

                    </div>

                @else

                    <div class="flex h-52 flex-col justify-end bg-gradient-to-br from-indigo-50 via-slate-50 to-violet-50 p-6">

                        <p class="mb-2 text-xs font-bold uppercase tracking-widest text-indigo-300">
                            {{ $project->category ?: 'Project' }}
                        </p>

                        <p class="line-clamp-2 text-xl font-bold leading-tight text-slate-800">
                            {{ $project->title }}
                        </p>

                    </div>

                @endif

            </a>


            {{-- BODY --}}
            <div class="p-6">


                {{-- CATEGORY --}}
                <div class="mb-3 flex items-center justify-between gap-2">

                    <span class="text-xs font-bold uppercase tracking-wide text-slate-400">

                        {{ $project->category ?: 'Project' }}

                    </span>


                    @if ($project->is_featured)

                        <span class="rounded-full border border-indigo-200 bg-indigo-50 px-2.5 py-1 text-xs font-bold uppercase tracking-wide text-indigo-600">

                            Featured

                        </span>

                    @endif

                </div>


                {{-- TITLE --}}
                <a
                    href="{{ route('projects.show', $project) }}"
                    class="block"
                >

                    <h2
                        class="line-clamp-2 text-lg font-bold leading-snug text-slate-800 transition-colors hover:text-indigo-600"
                        style="font-family:'Sora',sans-serif;"
                    >

                        {{ $project->title }}

                    </h2>

                </a>


                {{-- DESCRIPTION --}}
                <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-slate-500">

                    {{ $project->description }}

                </p>


                {{-- TECH STACK --}}
                @if ($project->tech_stack)

                    <div class="mt-4 flex flex-wrap gap-2">

                        @foreach (array_slice(explode(',', $project->tech_stack), 0, 4) as $tech)

                            <span class="rounded-lg border border-slate-200 bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-500">

                                {{ trim($tech) }}

                            </span>

                        @endforeach

                    </div>

                @endif


                {{-- FOOTER --}}
                <div class="mt-5 flex items-center justify-between gap-2 border-t border-slate-100 pt-5">


                    {{-- DETAIL --}}
                    <a
                        href="{{ route('projects.show', $project) }}"
                        class="inline-flex items-center gap-1 text-sm font-bold text-indigo-600 transition-colors hover:text-indigo-800"
                    >

                        Lihat Detail

                        <svg
                            class="h-3.5 w-3.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2.5"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                            />

                        </svg>

                    </a>


                    {{-- DEMO + REPO --}}
                    <div class="flex items-center gap-2">

                        @if ($project->demo_url)

                            <a
                                href="{{ $project->demo_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="rounded-lg border border-slate-200 px-2.5 py-1.5 text-xs font-semibold text-slate-400 transition-all hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                            >

                                Demo

                            </a>

                        @endif


                        @if ($project->repo_url)

                            <a
                                href="{{ $project->repo_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="rounded-lg border border-slate-200 px-2.5 py-1.5 text-xs font-semibold text-slate-400 transition-all hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-600"
                            >

                                Repo

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- ============================================
            KHUSUS TOTAL 5 PROJECT

            Setelah project ke-3:
            Tutup grid 3 kolom
            Buka grid 2 kolom
        ============================================= --}}
        @if ($projectCount === 5 && $loop->iteration === 3)

                </div>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

        @endif


        {{-- ============================================
            TUTUP GRID
        ============================================= --}}
        @if ($loop->last)

                </div>

        @endif


    @empty


        {{-- EMPTY STATE --}}
        <div class="rounded-2xl border-2 border-dashed border-slate-200 bg-white px-8 py-16 text-center">

            <svg
                class="mx-auto mb-3 h-10 w-10 text-slate-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.5"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"
                />

            </svg>

            <p class="text-sm font-bold text-slate-500">
                Belum ada project yang dipublikasikan
            </p>

            <p class="mt-1 text-xs text-slate-400">
                Tambahkan dari admin panel.
            </p>

        </div>

    @endforelse


    {{-- PAGINATION --}}
    @if ($projects->hasPages())

        <div class="mt-12 flex justify-center">

            {{ $projects->links() }}

        </div>

    @endif

</section>

@endsection