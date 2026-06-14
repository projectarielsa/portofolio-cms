@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Projects — Portfolio')
@section('seo_description', 'Kumpulan project ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — aplikasi web Laravel, sistem informasi, dan project IT yang menunjukkan kemampuan teknis sebagai Web Developer.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', project Laravel, portfolio web developer, project IT support')
@section('og_title', 'Projects Portfolio — ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('og_description', 'Lihat kumpulan project web development dan IT dari ' . ($about->name ?? 'Muhamad Ariel Saputra') . '.')

@section('content')

<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-16">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span class="text-slate-300">/</span>
        <span class="text-slate-500">Projects</span>
    </div>

    {{-- Header --}}
    <div class="max-w-2xl mb-14">
        <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-4">Portfolio</p>
        <h1 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl" style="font-family:'Sora',sans-serif;">
            Projects saya
        </h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">
            Setiap project menunjukkan cara saya menyusun fitur, memilih stack, dan membangun sistem yang terstruktur.
        </p>
    </div>

    {{-- Grid --}}
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($projects as $project)

            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg hover:border-indigo-200 hover:-translate-y-1 transition-all duration-200">

                {{-- Cover Image --}}
                <a href="{{ route('projects.show', $project) }}" class="block">
                    @if ($project->cover_image)
                        <div class="h-48 overflow-hidden bg-slate-100">
                            <img src="{{ asset($project->cover_image) }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="h-48 bg-gradient-to-br from-indigo-50 via-slate-50 to-violet-50 flex flex-col justify-end p-5">
                            <p class="text-xs font-bold uppercase tracking-widest text-indigo-300 mb-1">{{ $project->category ?: 'Project' }}</p>
                            <p class="text-lg font-bold text-slate-800 leading-tight line-clamp-2">{{ $project->title }}</p>
                        </div>
                    @endif
                </a>

                {{-- Body --}}
                <div class="p-5">

                    {{-- Category + Badge --}}
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <span class="text-xs font-bold uppercase tracking-wide text-slate-400">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="text-xs font-bold uppercase tracking-wide text-indigo-600 bg-indigo-50 border border-indigo-200 px-2 py-0.5 rounded-full">Featured</span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <a href="{{ route('projects.show', $project) }}" class="block">
                        <h2 class="text-base font-bold text-slate-800 leading-snug line-clamp-2 hover:text-indigo-600 transition-colors" style="font-family:'Sora',sans-serif;">
                            {{ $project->title }}
                        </h2>
                    </a>

                    {{-- Description --}}
                    <p class="mt-2 text-sm text-slate-500 leading-relaxed line-clamp-3">
                        {{ $project->description }}
                    </p>

                    {{-- Tech tags --}}
                    @if ($project->tech_stack)
                        <div class="mt-3 flex flex-wrap gap-1.5">
                            @foreach (array_slice(explode(',', $project->tech_stack), 0, 4) as $tech)
                                <span class="text-xs font-medium text-slate-500 bg-slate-50 border border-slate-200 px-2 py-0.5 rounded">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Footer: CTA + Demo/Repo INSIDE card --}}
                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
                        <a href="{{ route('projects.show', $project) }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors inline-flex items-center gap-1">
                            Lihat Detail
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>

                        {{-- Demo & Repo buttons INSIDE card --}}
                        <div class="flex items-center gap-1.5">
                            @if ($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank"
                                   class="text-xs font-semibold text-slate-400 hover:text-indigo-600 border border-slate-200 hover:border-indigo-200 hover:bg-indigo-50 rounded-lg px-2.5 py-1 transition-all">
                                    Demo
                                </a>
                            @endif
                            @if ($project->repo_url)
                                <a href="{{ $project->repo_url }}" target="_blank"
                                   class="text-xs font-semibold text-slate-400 hover:text-indigo-600 border border-slate-200 hover:border-indigo-200 hover:bg-indigo-50 rounded-lg px-2.5 py-1 transition-all">
                                    Repo
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        @empty
            <div class="col-span-full bg-white border-2 border-dashed border-slate-200 rounded-2xl px-8 py-16 text-center">
                <svg class="w-10 h-10 text-slate-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                </svg>
                <p class="text-sm font-bold text-slate-500">Belum ada project yang dipublikasikan</p>
                <p class="mt-1 text-xs text-slate-400">Tambahkan dari admin panel.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $projects->links() }}
        </div>
    @endif

</section>

@endsection
