@extends('public.layout')

@section('seo_full_title', 'Pengalaman Kerja | Portofolio | ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('seo_description', 'Riwayat rekam jejak pengalaman kerja ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' sebagai IT Support dan Web Developer. Lihat pencapaian profesional dan tanggung jawab kerja.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', pengalaman kerja IT support, rekam jejak karier IT, riwayat kerja web developer Laravel')
@section('og_title', 'Pengalaman Kerja | Portofolio | ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('og_description', 'Riwayat pengalaman profesional ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' di bidang IT Support, infrastruktur jaringan, server Linux, dan Web Development.')

@section('content')
<section class="mx-auto max-w-5xl px-4 pt-16 pb-24 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <div class="mb-8 flex items-center gap-2 text-xs font-medium text-slate-500">
        <a href="{{ route('home') }}" class="transition-colors hover:text-indigo-600">Home</a>
        <span>/</span>
        <span class="text-slate-800">Experience</span>
    </div>

    {{-- Header --}}
    <div class="mb-12 max-w-3xl">
        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-indigo-100 bg-indigo-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-indigo-700">
            <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
            Rekam Jejak Profesional
        </div>

        <h1 class="font-display text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
            Pengalaman Kerja
        </h1>

        <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg">
            Riwayat perjalanan karier saya dalam mengelola infrastruktur IT, pemeliharaan perangkat, penanganan troubleshooting sistem dan jaringan, hingga pengembangan aplikasi web operasional berbasis Laravel.
        </p>
    </div>

    {{-- Career Timeline --}}
    <div class="relative ml-3 border-l-2 border-indigo-100 pl-6 sm:ml-6 sm:pl-10 space-y-10">
        @forelse ($experiences as $experience)
            @php
                $startDate = $experience->start_date;
                $endDate = $experience->end_date;
                $isCurrent = is_null($endDate);

                // Hitung durasi kerja
                $diffEnd = $endDate ?? now();
                $diff = $startDate ? $startDate->diff($diffEnd) : null;
                $duration = [];
                if ($diff && $diff->y > 0) {
                    $duration[] = $diff->y . ' thn';
                }
                if ($diff && $diff->m > 0) {
                    $duration[] = $diff->m . ' bln';
                }
                $durationStr = empty($duration) ? '< 1 bln' : implode(' ', $duration);
            @endphp

            <div class="relative group">
                {{-- Timeline Indicator Marker --}}
                @if ($isCurrent)
                    <div class="absolute -left-[37px] sm:-left-[53px] top-5 flex h-8 w-8 items-center justify-center rounded-full border-2 border-emerald-500 bg-emerald-50 shadow-xs">
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    </div>
                @else
                    <div class="absolute -left-[37px] sm:-left-[53px] top-5 flex h-8 w-8 items-center justify-center rounded-full border-2 border-slate-300 bg-white text-slate-400 shadow-xs transition group-hover:border-indigo-400 group-hover:text-indigo-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v1.069m7.5 0c.969.04 1.928.106 2.875.198m-13.25 0c.947-.092 1.906-.158 2.875-.198m0 0a48.108 48.108 0 016.5 0" />
                        </svg>
                    </div>
                @endif

                {{-- Experience Card --}}
                <div class="rounded-2xl border border-slate-200/90 bg-white p-6 shadow-xs transition hover:border-indigo-300 hover:shadow-md sm:p-7">
                    {{-- Position, Company & Period Header --}}
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h2 class="font-display text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">
                                {{ $experience->position }}
                            </h2>

                            <div class="mt-1.5 flex items-center gap-2">
                                <span class="flex h-5 w-5 items-center justify-center rounded-md bg-indigo-50 text-indigo-600 text-xs">
                                    🏢
                                </span>
                                <span class="font-semibold text-indigo-600 text-sm sm:text-base">
                                    {{ $experience->company }}
                                </span>
                            </div>
                        </div>

                        {{-- Badges: Status & Date --}}
                        <div class="flex flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                            @if ($isCurrent)
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 shadow-xs">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Saat Ini · Aktif
                                </span>
                            @endif

                            <div class="flex items-center gap-2">
                                <span class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-700">
                                    {{ optional($startDate)->format('M Y') ?? '—' }} — {{ $endDate ? optional($endDate)->format('M Y') : 'Present' }}
                                </span>

                                <span class="rounded-full border border-indigo-100 bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700">
                                    {{ $durationStr }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Description List --}}
                    @if ($experience->description)
                        <div class="mt-5 border-t border-slate-100 pt-5">
                            <p class="mb-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                                Tanggung Jawab & Kontribusi:
                            </p>
                            <ul class="space-y-2.5">
                                @foreach (preg_split('/\r\n|\r|\n/', $experience->description) as $item)
                                    @if (trim($item))
                                        <li class="flex items-start gap-3 text-sm leading-relaxed text-slate-600">
                                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 text-[11px] font-bold">
                                                ✓
                                            </span>
                                            <span class="text-justify flex-1">
                                                {{ trim($item) }}
                                            </span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white px-8 py-14 text-center text-slate-500">
                Belum ada data pengalaman yang ditambahkan dari CMS.
            </div>
        @endforelse
    </div>

    {{-- Bottom Action Box --}}
    <div class="mt-14 rounded-2xl border border-slate-200 bg-gradient-to-r from-slate-50 via-indigo-50/30 to-slate-50 p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
            <h3 class="font-display text-base font-bold text-slate-900">
                Tertarik mendiskusikan peluang kerja atau proyek?
            </h3>
            <p class="text-xs text-slate-600 mt-1">
                Saya selalu terbuka untuk berdiskusi mengenai kebutuhan IT Support atau Web Development di tim Anda.
            </p>
        </div>
        <a
            href="{{ route('contact') }}"
            class="shrink-0 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-xs font-bold text-white shadow-xs transition hover:bg-indigo-700 active:scale-[0.98]"
        >
            <span>Hubungi Saya</span>
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>

</section>
@endsection
