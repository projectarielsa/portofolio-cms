@extends('public.layout')

@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;

    $photoPath = $about->photo ?? null;
    if ($photoPath) {
        if (Str::startsWith($photoPath, ['http://', 'https://'])) {
            $photoUrl = $photoPath;
        } elseif (Str::startsWith($photoPath, ['storage/', 'images/', 'uploads/'])) {
            $photoUrl = asset($photoPath);
        } else {
            $photoUrl = asset('storage/' . ltrim($photoPath, '/'));
        }
    } else {
        $photoUrl = null;
    }
@endphp

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'About — IT Support & Laravel Developer')
@section('seo_description', 'Tentang ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer. Lulusan S1 Teknik Informatika Universitas Pelita Bangsa, berpengalaman di troubleshooting, jaringan LAN/WAN, Linux server, dan Laravel.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', profil IT support, tentang Ariel Saputra, Universitas Pelita Bangsa, Teknik Informatika')
@section('og_title', 'About ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' | IT Support & Developer')
@section('og_description', ($about->short_bio ?? 'IT Support & Laravel Developer berpengalaman. Lulusan S1 Teknik Informatika. Open to Work.'))

@section('content')

<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-12">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">About</span>
    </div>

    <div class="grid gap-16 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">

        {{-- LEFT --}}
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-4">About Me</p>

            <div class="flex flex-col gap-6 sm:flex-row sm:items-center mb-8">
                @if ($photoUrl)
                    <div class="shrink-0 relative">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-indigo-300/40 to-violet-300/30 blur-xl"></div>
                        <img src="{{ $photoUrl }}" alt="{{ $about->name ?? 'Profile Photo' }}"
                             class="relative h-24 w-24 rounded-2xl border-2 border-white object-cover shadow-xl sm:h-28 sm:w-28">
                    </div>
                @endif
                <div>
                    <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                        {{ $about->name ?? 'Muhamad Ariel Saputra' }}
                    </h1>
                    <p class="mt-2 text-slate-500">{{ $about->headline ?? 'IT Support & Laravel Developer' }}</p>
                </div>
            </div>

            <div class="space-y-4 text-slate-500 leading-8 max-w-2xl">
                @php $bio = $about->full_bio ?? $about->short_bio ?? null; @endphp
                @if ($bio)
                    @foreach (preg_split("/\r\n|\n|\r/", trim($bio)) as $paragraph)
                        @if (trim($paragraph) !== '') <p>{{ $paragraph }}</p> @endif
                    @endforeach
                @else
                    <p>Saya memiliki pengalaman dalam IT Support dan Web Development, terbiasa menangani troubleshooting hardware, software, serta jaringan LAN/WAN.</p>
                    <p>Selain itu, saya juga berpengalaman dalam membangun dan men-deploy aplikasi web menggunakan Laravel di lingkungan server Linux.</p>
                    <p>Saya terbuka untuk peluang kerja di bidang IT Support maupun Web Development, dan siap berkontribusi dengan pendekatan yang terstruktur.</p>
                @endif
            </div>

            <div class="mt-10 grid gap-3 sm:grid-cols-2">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-[10px] uppercase tracking-widest text-slate-400 mb-2 font-semibold">Email</p>
                    <p class="text-sm font-semibold text-slate-700 break-all">{{ $about->email ?? 'muhamadarielsaputra11@gmail.com' }}</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-[10px] uppercase tracking-widest text-slate-400 mb-2 font-semibold">Location</p>
                    <p class="text-sm font-semibold text-slate-700">{{ $about->location ?? 'Indonesia' }}</p>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="lg:sticky lg:top-24 space-y-4">

            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl border border-indigo-100 bg-indigo-50 p-5 text-center">
                    <p class="font-display text-3xl font-bold text-indigo-700">{{ $experiences->count() }}</p>
                    <p class="mt-1 text-xs text-indigo-400 uppercase tracking-widest font-semibold">Pengalaman</p>
                </div>
                <div class="rounded-2xl border border-violet-100 bg-violet-50 p-5 text-center">
                    <p class="font-display text-3xl font-bold text-violet-700">{{ $skills->count() }}</p>
                    <p class="mt-1 text-xs text-violet-400 uppercase tracking-widest font-semibold">Skills</p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Core Strengths</p>
                <div class="space-y-3">
                    @foreach(['IT Support & Troubleshooting', 'Laravel Web Development', 'Linux Server Management', 'LAN/WAN Networking', 'Database MySQL', 'System Documentation'] as $strength)
                        <div class="flex items-center gap-3">
                            <div class="h-1.5 w-1.5 rounded-full bg-indigo-400 shrink-0"></div>
                            <span class="text-sm text-slate-600">{{ $strength }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Technologies</p>
                <div class="flex flex-wrap gap-2">
                    @forelse ($skills->take(12) as $skill)
                        <span class="rounded-full border border-indigo-100 bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-600">{{ $skill->name }}</span>
                    @empty
                        <span class="text-slate-400 text-sm">Tambahkan skills dari CMS.</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EXPERIENCE --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 border-t border-slate-100">
    <p class="text-xs font-bold uppercase tracking-widest text-violet-500 mb-3">Career</p>
    <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900 mb-10">Pengalaman Kerja</h2>

    <div class="relative">
        <div class="absolute top-2 bottom-2 hidden lg:block w-px bg-gradient-to-b from-indigo-300 via-violet-200 to-transparent" style="left: 11px;"></div>
        <div class="space-y-5">
            @forelse ($experiences as $experience)
                @php
                    $startDate = $experience->start_date ? Carbon::parse($experience->start_date)->format('M Y') : null;
                    $endDate   = $experience->end_date   ? Carbon::parse($experience->end_date)->format('M Y')   : null;
                @endphp
                <div class="relative lg:pl-10">
                    <div class="absolute hidden lg:flex h-5 w-5 items-center justify-center rounded-full border-2 border-indigo-300 bg-white shadow-sm" style="left: 3px; top: 20px;">
                        <div class="h-2 w-2 rounded-full bg-indigo-500"></div>
                    </div>
                    <div class="card-hover rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="font-display text-xl font-bold text-slate-800">{{ $experience->position }}</h3>
                                <p class="mt-1 text-sm font-semibold text-indigo-600">{{ $experience->company }}</p>
                            </div>
                            <span class="shrink-0 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-500">
                                {{ $startDate ?? '—' }} — {{ $endDate ?? 'Present' }}
                            </span>
                        </div>
                        <p class="mt-4 text-sm leading-7 text-slate-500">{{ $experience->description }}</p>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-200 p-8 text-center text-slate-400 bg-white">
                    Tambahkan pengalaman kerja dari CMS.
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- EDUCATION + CV --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 border-t border-slate-100">
    <div class="grid gap-16 lg:grid-cols-2">

        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-emerald-500 mb-3">Education</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900 mb-8">Latar Belakang Akademik</h2>
            <div class="space-y-4">
                <div class="card-hover rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="h-11 w-11 rounded-xl bg-violet-50 border border-violet-100 flex items-center justify-center shrink-0">
                            <span class="text-xs font-bold text-violet-600">UPB</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800">Universitas Pelita Bangsa</h3>
                            <p class="mt-1 text-sm text-slate-500">S1 Teknik Informatika · 2021 – 2025</p>
                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-emerald-50 border border-emerald-200 px-3 py-1">
                                <span class="text-xs font-bold text-emerald-700">IPK 3.52</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-hover rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="h-11 w-11 rounded-xl bg-sky-50 border border-sky-100 flex items-center justify-center shrink-0">
                            <span class="text-xs font-bold text-sky-600">SMK</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800">SMK Al-Mufti</h3>
                            <p class="mt-1 text-sm text-slate-500">Teknik Komputer dan Jaringan · 2018 – 2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-amber-500 mb-3">Resume</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900 mb-3">Download CV</h2>
            <p class="text-slate-500 mb-8 leading-7">Tersedia dua versi CV yang disesuaikan dengan posisi yang dilamar.</p>
            <div class="space-y-4">
                <div class="card-hover rounded-2xl border border-indigo-100 bg-indigo-50 p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="h-2 w-2 rounded-full bg-indigo-500"></div>
                                <span class="text-xs uppercase tracking-widest text-indigo-500 font-bold">IT Support</span>
                            </div>
                            <h3 class="font-semibold text-slate-800">CV IT Support</h3>
                            <p class="mt-1.5 text-sm text-slate-500">Troubleshooting, jaringan LAN/WAN, Mikrotik, Linux server.</p>
                        </div>
                        <a href="{{ asset('cv/cv-it-support.pdf') }}" target="_blank"
                           class="shrink-0 rounded-xl btn-primary px-4 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
                            Download
                        </a>
                    </div>
                </div>
                <div class="card-hover rounded-2xl border border-violet-100 bg-violet-50 p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="h-2 w-2 rounded-full bg-violet-500"></div>
                                <span class="text-xs uppercase tracking-widest text-violet-500 font-bold">Developer</span>
                            </div>
                            <h3 class="font-semibold text-slate-800">CV Programmer</h3>
                            <p class="mt-1.5 text-sm text-slate-500">Laravel, MySQL, API integration, deployment aplikasi web.</p>
                        </div>
                        <a href="{{ asset('cv/cv-programmer.pdf') }}" target="_blank"
                           class="shrink-0 rounded-xl border border-violet-200 bg-white px-4 py-2.5 text-sm font-bold text-violet-700 transition-all hover:bg-violet-100 shadow-sm">
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
