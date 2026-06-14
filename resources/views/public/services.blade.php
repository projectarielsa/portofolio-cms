@extends('public.layout')

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Focus Areas — IT Support & Laravel Developer')
@section('seo_description', 'Area keahlian ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support, Web Development, Linux Server Management, dan jaringan LAN/WAN.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', focus area IT support, layanan web development, jaringan komputer')

@section('content')
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-24">

    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">Focus Areas</span>
    </div>

    <div class="max-w-3xl mb-14">
        <p class="text-xs font-bold uppercase tracking-widest text-violet-500 mb-4">Focus Areas</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Area yang saya fokuskan</h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">Area kerja utama yang saya bangun dan pelajari, sehingga recruiter bisa melihat kekuatan inti saya dengan cepat.</p>
    </div>

    @php
        $serviceColors = [
            ['bg' => 'bg-indigo-50', 'border' => 'border-indigo-100', 'icon' => 'bg-white border-indigo-100 text-indigo-600', 'link' => 'text-indigo-500'],
            ['bg' => 'bg-violet-50', 'border' => 'border-violet-100', 'icon' => 'bg-white border-violet-100 text-violet-600', 'link' => 'text-violet-500'],
            ['bg' => 'bg-sky-50',    'border' => 'border-sky-100',    'icon' => 'bg-white border-sky-100 text-sky-600',       'link' => 'text-sky-500'],
            ['bg' => 'bg-emerald-50','border' => 'border-emerald-100','icon' => 'bg-white border-emerald-100 text-emerald-600','link' => 'text-emerald-500'],
            ['bg' => 'bg-amber-50',  'border' => 'border-amber-100',  'icon' => 'bg-white border-amber-100 text-amber-600',   'link' => 'text-amber-500'],
            ['bg' => 'bg-rose-50',   'border' => 'border-rose-100',   'icon' => 'bg-white border-rose-100 text-rose-500',     'link' => 'text-rose-500'],
        ];
    @endphp

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($services as $index => $service)
            @php $sc = $serviceColors[$index % count($serviceColors)]; @endphp
            <div class="card-hover group rounded-2xl border {{ $sc['border'] }} {{ $sc['bg'] }} p-6">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl border {{ $sc['icon'] }} shadow-sm text-sm font-bold">
                    {{ strtoupper(substr($service->title, 0, 2)) }}
                </div>
                <h2 class="mt-5 font-display text-lg font-bold text-slate-800">{{ $service->title }}</h2>
                <p class="mt-3 text-sm leading-7 text-slate-500">{{ $service->description }}</p>
                <p class="mt-5 text-sm font-semibold {{ $sc['link'] }}">Relevant to my work →</p>
            </div>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white px-8 py-14 text-center text-slate-400">
                Belum ada fokus area. Tambahkan dari admin panel.
            </div>
        @endforelse
    </div>
</section>
@endsection
