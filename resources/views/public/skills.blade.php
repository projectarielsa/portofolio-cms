@extends('public.layout')

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Skills & Teknologi')
@section('seo_description', 'Skills dan teknologi yang dikuasai ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — Laravel, PHP, MySQL, Linux, Networking, dan tools lainnya.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', skills Laravel, PHP developer, Linux server, MySQL, IT support skills')

@section('content')
<section class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-20 pb-24">

    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">Skills</span>
    </div>

    <div class="max-w-3xl mb-14">
        <p class="text-xs font-bold uppercase tracking-widest text-emerald-500 mb-4">Skills</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Technologies & tools yang saya gunakan</h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">Stack utama yang saya gunakan untuk membangun aplikasi web, mulai dari backend, database, sampai tools pendukung workflow.</p>
    </div>

    <div class="space-y-6">
        @forelse ($skills as $category => $items)
            <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-5">{{ $category }}</p>
                <div class="flex flex-wrap gap-2.5">
                    @foreach ($items as $skill)
                        <span class="rounded-full border border-indigo-100 bg-indigo-50 px-4 py-2 text-sm font-semibold text-indigo-600">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white px-8 py-14 text-center text-slate-400">
                Belum ada skills yang ditambahkan.
            </div>
        @endforelse
    </div>
</section>
@endsection
