@extends('admin.layout')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')

@php
    $stats = [
        ['label' => 'Total Projects', 'value' => $projectCount,     'sub' => $featuredCount.' featured', 'color' => 'indigo',  'icon' => 'folder',    'href' => route('admin.projects.index')],
        ['label' => 'Services',       'value' => $serviceCount,     'sub' => 'focus areas',              'color' => 'violet',  'icon' => 'briefcase', 'href' => route('admin.services.index')],
        ['label' => 'Skills',         'value' => $skillCount,       'sub' => 'technologies',             'color' => 'sky',     'icon' => 'bolt',      'href' => route('admin.skills.index')],
        ['label' => 'Testimonials',   'value' => $testimonialCount, 'sub' => 'reviews',                  'color' => 'emerald', 'icon' => 'chat',      'href' => route('admin.testimonials.index')],
        ['label' => 'Experiences',    'value' => $experienceCount,  'sub' => 'work history',             'color' => 'amber',   'icon' => 'clock',     'href' => route('admin.experiences.index')],
        ['label' => 'Featured',       'value' => $featuredCount,    'sub' => 'of '.$projectCount.' total','color' => 'rose',   'icon' => 'star',      'href' => route('admin.projects.index')],
    ];

    $colorMap = [
        'indigo'  => ['bg' => 'bg-indigo-50',  'border' => 'border-indigo-100',  'icon' => 'bg-indigo-100 text-indigo-600',  'num' => 'text-indigo-700',  'sub' => 'text-indigo-500'],
        'violet'  => ['bg' => 'bg-violet-50',  'border' => 'border-violet-100',  'icon' => 'bg-violet-100 text-violet-600',  'num' => 'text-violet-700',  'sub' => 'text-violet-500'],
        'sky'     => ['bg' => 'bg-sky-50',     'border' => 'border-sky-100',     'icon' => 'bg-sky-100 text-sky-600',        'num' => 'text-sky-700',     'sub' => 'text-sky-500'],
        'emerald' => ['bg' => 'bg-emerald-50', 'border' => 'border-emerald-100', 'icon' => 'bg-emerald-100 text-emerald-600','num' => 'text-emerald-700', 'sub' => 'text-emerald-500'],
        'amber'   => ['bg' => 'bg-amber-50',   'border' => 'border-amber-100',   'icon' => 'bg-amber-100 text-amber-600',    'num' => 'text-amber-700',   'sub' => 'text-amber-500'],
        'rose'    => ['bg' => 'bg-rose-50',    'border' => 'border-rose-100',    'icon' => 'bg-rose-100 text-rose-500',      'num' => 'text-rose-700',    'sub' => 'text-rose-500'],
    ];

    $iconPaths = [
        'folder'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"/>',
        'briefcase' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0"/>',
        'bolt'      => '<path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/>',
        'chat'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>',
        'clock'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>',
        'star'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>',
    ];
@endphp

{{-- Stats --}}
<div class="grid grid-cols-2 gap-4 sm:grid-cols-3 xl:grid-cols-6">
    @foreach ($stats as $stat)
        @php $c = $colorMap[$stat['color']]; @endphp
        <a href="{{ $stat['href'] }}"
           class="group flex flex-col rounded-2xl border {{ $c['border'] }} {{ $c['bg'] }} p-5 transition-all hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-4">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl {{ $c['icon'] }} shadow-sm">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        {!! $iconPaths[$stat['icon']] !!}
                    </svg>
                </div>
                <svg class="h-3.5 w-3.5 text-slate-300 group-hover:text-slate-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </div>
            <p class="font-display text-3xl font-bold {{ $c['num'] }}">{{ $stat['value'] }}</p>
            <p class="mt-1 text-xs font-bold text-slate-600">{{ $stat['label'] }}</p>
            <p class="mt-0.5 text-[11px] {{ $c['sub'] }}">{{ $stat['sub'] }}</p>
        </a>
    @endforeach
</div>

{{-- Main grid --}}
<div class="mt-8 grid gap-6 lg:grid-cols-[1.5fr_1fr]">

    {{-- Recent projects --}}
    <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <div>
                <h2 class="font-display text-base font-bold text-slate-900">Project Terbaru</h2>
                <p class="text-xs text-slate-400 mt-0.5">{{ $projectCount }} total project</p>
            </div>
            <a href="{{ route('admin.projects.create') }}"
               class="inline-flex items-center gap-1.5 rounded-lg btn-primary-admin px-3.5 py-2 text-xs font-bold shadow-md shadow-indigo-200">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Tambah
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/30">
                        <th class="px-6 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Judul</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Kategori</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Status</th>
                        <th class="px-4 py-3 text-left text-[10px] font-bold uppercase tracking-widest text-slate-400">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($latestProjects as $project)
                        <tr class="group hover:bg-indigo-50/30 transition-colors">
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="font-semibold text-slate-700 group-hover:text-indigo-600 transition-colors">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td class="px-4 py-4 text-slate-400 text-xs">{{ $project->category ?: '—' }}</td>
                            <td class="px-4 py-4">
                                @if ($project->status === 'published')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 border border-emerald-200 px-2.5 py-1 text-[11px] font-bold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 border border-amber-200 px-2.5 py-1 text-[11px] font-bold text-amber-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-slate-400 text-xs">
                                {{ optional($project->published_at)->format('d M Y') ?: '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                                <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100">
                                    <svg class="h-5 w-5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"/>
                                    </svg>
                                </div>
                                Belum ada project.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($projectCount > 5)
            <div class="border-t border-slate-100 bg-slate-50/30 px-6 py-3">
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">
                    Lihat semua {{ $projectCount }} project →
                </a>
            </div>
        @endif
    </div>

    {{-- Right panel --}}
    <div class="space-y-5">

        {{-- Quick actions --}}
        <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
            <div class="border-b border-slate-100 bg-slate-50/50 px-6 py-4">
                <h2 class="font-display text-base font-bold text-slate-900">Quick Actions</h2>
                <p class="text-xs text-slate-400 mt-0.5">Akses cepat ke fungsi utama</p>
            </div>
            <div class="p-3 grid grid-cols-1 gap-1">
                @php
                    $quickActions = [
                        ['href' => route('admin.about.edit'),            'label' => 'Update About',      'desc' => 'Edit profil & bio',     'color' => 'indigo'],
                        ['href' => route('admin.projects.create'),       'label' => 'Tambah Project',    'desc' => 'Project baru',          'color' => 'violet'],
                        ['href' => route('admin.services.create'),       'label' => 'Tambah Service',    'desc' => 'Focus area baru',       'color' => 'sky'],
                        ['href' => route('admin.experiences.create'),    'label' => 'Tambah Experience', 'desc' => 'Riwayat kerja baru',    'color' => 'emerald'],
                        ['href' => route('admin.testimonials.create'),   'label' => 'Tambah Testimonial','desc' => 'Review baru',           'color' => 'amber'],
                        ['href' => route('admin.contact-settings.edit'), 'label' => 'Atur Contact',      'desc' => 'Info kontak & sosmed',  'color' => 'rose'],
                    ];
                    $qaC = [
                        'indigo'  => 'bg-indigo-50  text-indigo-600  border-indigo-100',
                        'violet'  => 'bg-violet-50  text-violet-600  border-violet-100',
                        'sky'     => 'bg-sky-50     text-sky-600     border-sky-100',
                        'emerald' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                        'amber'   => 'bg-amber-50   text-amber-600   border-amber-100',
                        'rose'    => 'bg-rose-50    text-rose-500    border-rose-100',
                    ];
                @endphp
                @foreach ($quickActions as $action)
                    <a href="{{ $action['href'] }}"
                       class="group flex items-center gap-3 rounded-xl border border-transparent px-4 py-3 transition-all hover:border-slate-200 hover:bg-slate-50">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border {{ $qaC[$action['color']] }} transition-transform group-hover:scale-110">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-700 group-hover:text-slate-900">{{ $action['label'] }}</p>
                            <p class="text-xs text-slate-400">{{ $action['desc'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Site status --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="font-display text-base font-bold text-slate-900 mb-5">Status Website</h2>
            <div class="space-y-3">
                <div class="flex items-center justify-between rounded-xl bg-slate-50 border border-slate-100 px-4 py-3">
                    <span class="text-sm font-medium text-slate-600">Portfolio</span>
                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        Live
                    </span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 border border-slate-100 px-4 py-3">
                    <span class="text-sm font-medium text-slate-600">Total Projects</span>
                    <span class="text-xs font-bold text-indigo-600">{{ $projectCount }}</span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 border border-slate-100 px-4 py-3">
                    <span class="text-sm font-medium text-slate-600">Featured</span>
                    <span class="text-xs font-bold text-violet-600">{{ $featuredCount }}</span>
                </div>
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center justify-center gap-2 rounded-xl btn-primary-admin px-4 py-3 text-sm font-bold shadow-md shadow-indigo-200 mt-1">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                    </svg>
                    Buka Website
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
