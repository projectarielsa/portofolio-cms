@extends('public.layout')

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Kontak — IT Support & Laravel Developer')
@section('seo_description', 'Hubungi ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer yang sedang aktif mencari kerja. Tersedia untuk posisi full-time di bidang IT Support maupun Web Developer.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', kontak IT support, hire Laravel developer, rekrut web developer Indonesia')
@section('og_title', 'Hubungi ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' | Open to Work')
@section('og_description', ($about->name ?? 'Muhamad Ariel Saputra') . ' sedang aktif mencari posisi IT Support atau Web Developer. Hubungi sekarang.')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | Helper Social URL
    |--------------------------------------------------------------------------
    | Otomatis menambahkan https:// jika user hanya memasukkan domain.
    |
    | Contoh:
    | github.com/arielsa
    | linkedin.com/in/arielsa
    | instagram.com/arielsa
    |
    */

    $normalizeUrl = function ($value) {

        if (!$value) {
            return null;
        }

        $value = trim($value);

        if (
            str_starts_with($value, 'http://') ||
            str_starts_with($value, 'https://')
        ) {
            return $value;
        }

        return 'https://' . $value;
    };


    /*
    |--------------------------------------------------------------------------
    | Instagram URL
    |--------------------------------------------------------------------------
    |
    | Jika input:
    | @arielsa
    |
    | Maka menjadi:
    | https://instagram.com/arielsa
    |
    */

    $instagramUrl = function ($value) {

        if (!$value) {
            return null;
        }

        $value = trim($value);

        if (str_starts_with($value, '@')) {
            return 'https://instagram.com/' . ltrim($value, '@');
        }

        if (
            str_starts_with($value, 'http://') ||
            str_starts_with($value, 'https://')
        ) {
            return $value;
        }

        if (
            !str_contains($value, '.') &&
            !str_contains($value, '/')
        ) {
            return 'https://instagram.com/' . $value;
        }

        return 'https://' . $value;
    };


    /*
    |--------------------------------------------------------------------------
    | LinkedIn URL
    |--------------------------------------------------------------------------
    |
    | Jika input username:
    | arielsa
    |
    | Akan menjadi:
    | https://linkedin.com/in/arielsa
    |
    */

    $linkedinUrl = function ($value) {

        if (!$value) {
            return null;
        }

        $value = trim($value);

        if (
            str_starts_with($value, 'http://') ||
            str_starts_with($value, 'https://')
        ) {
            return $value;
        }

        if (
            !str_contains($value, '.') &&
            !str_contains($value, '/')
        ) {
            return 'https://linkedin.com/in/' . ltrim($value, '@');
        }

        return 'https://' . $value;
    };


    /*
    |--------------------------------------------------------------------------
    | GitHub URL
    |--------------------------------------------------------------------------
    |
    | Jika input:
    | arielsa
    | @arielsa
    |
    | Akan menjadi:
    | https://github.com/arielsa
    |
    */

    $githubUrl = function ($value) {

        if (!$value) {
            return null;
        }

        $value = trim($value);

        if (
            str_starts_with($value, 'http://') ||
            str_starts_with($value, 'https://')
        ) {
            return $value;
        }

        if (
            !str_contains($value, '.') &&
            !str_contains($value, '/')
        ) {
            return 'https://github.com/' . ltrim($value, '@');
        }

        return 'https://' . $value;
    };


    /*
    |--------------------------------------------------------------------------
    | WhatsApp URL
    |--------------------------------------------------------------------------
    */

    $whatsappNumber = preg_replace(
        '/[^0-9]/',
        '',
        $about->whatsapp ?? ''
    );

    if (str_starts_with($whatsappNumber, '0')) {
        $whatsappNumber = '62' . substr($whatsappNumber, 1);
    }

@endphp


<section class="mx-auto max-w-6xl px-4 pt-20 pb-24 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <div class="mb-12 flex items-center gap-2 text-xs text-slate-400">
        <a
            href="{{ route('home') }}"
            class="transition-colors hover:text-indigo-600"
        >
            Home
        </a>

        <span>/</span>

        <span class="text-slate-500">
            Contact
        </span>
    </div>


    {{-- Header --}}
    <div class="mb-16 max-w-2xl">

        @if ($about->open_to_work ?? true)

            <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2">

                <span class="h-2 w-2 animate-pulse rounded-full bg-emerald-400"></span>

                <span class="text-xs font-semibold text-emerald-700">
                    Aktif mencari pekerjaan
                </span>

            </div>

        @endif


        <p class="mb-4 text-xs font-bold uppercase tracking-widest text-indigo-500">
            Kontak Saya
        </p>


        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
            Mari terhubung
        </h1>


        <p class="mt-5 text-lg leading-8 text-slate-500">

            Jika Anda adalah recruiter atau hiring manager yang mencari
            IT Support atau Web Developer, saya terbuka untuk berdiskusi
            mengenai posisi yang tersedia.

        </p>

    </div>


    {{-- Main Grid --}}
    <div class="grid gap-6 lg:grid-cols-[1fr_1.2fr]">


        {{-- ========================================================= --}}
        {{-- CONTACT INFORMATION --}}
        {{-- ========================================================= --}}

        <div class="space-y-4">

            <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">

                <p class="mb-6 text-xs font-bold uppercase tracking-widest text-slate-400">
                    Informasi Kontak
                </p>


                @php

                    $contactItems = [

                        [
                            'label' => 'Email',
                            'value' => $about->email ?? null,
                            'href'  => $about->email
                                ? 'mailto:' . $about->email
                                : null,
                            'external' => false,
                        ],

                        [
                            'label' => 'WhatsApp',
                            'value' => $about->whatsapp ?? null,
                            'href'  => $whatsappNumber
                                ? 'https://wa.me/' . $whatsappNumber
                                : null,
                            'external' => true,
                        ],

                        [
                            'label' => 'LinkedIn',
                            'value' => $about->linkedin ?? null,
                            'href'  => $linkedinUrl($about->linkedin ?? null),
                            'external' => true,
                        ],

                        [
                            'label' => 'GitHub',
                            'value' => $about->github ?? null,
                            'href'  => $githubUrl($about->github ?? null),
                            'external' => true,
                        ],

                        [
                            'label' => 'Instagram',
                            'value' => $about->instagram ?? null,
                            'href'  => $instagramUrl($about->instagram ?? null),
                            'external' => true,
                        ],

                    ];


                    $iconColors = [

                        'Email' => [
                            'bg' => 'bg-indigo-50 text-indigo-600',
                            'border' => 'border-indigo-100',
                        ],

                        'WhatsApp' => [
                            'bg' => 'bg-emerald-50 text-emerald-600',
                            'border' => 'border-emerald-100',
                        ],

                        'LinkedIn' => [
                            'bg' => 'bg-sky-50 text-sky-600',
                            'border' => 'border-sky-100',
                        ],

                        'GitHub' => [
                            'bg' => 'bg-slate-100 text-slate-700',
                            'border' => 'border-slate-200',
                        ],

                        'Instagram' => [
                            'bg' => 'bg-rose-50 text-rose-500',
                            'border' => 'border-rose-100',
                        ],

                    ];

                @endphp


                <div class="space-y-3">

                    @foreach ($contactItems as $item)

                        @if ($item['value'] && $item['href'])

                            @php
                                $ic = $iconColors[$item['label']];
                            @endphp


                            <a
                                href="{{ $item['href'] }}"

                                @if ($item['external'])
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif

                                class="group flex items-center gap-4 rounded-xl border border-slate-100 bg-slate-50/60 p-4 transition-all hover:border-indigo-200 hover:bg-indigo-50/50 hover:shadow-sm"
                            >


                                {{-- Icon --}}
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border {{ $ic['bg'] }} {{ $ic['border'] }}">

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        @if ($item['label'] === 'Email')

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                            />

                                        @elseif ($item['label'] === 'WhatsApp')

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
                                            />

                                        @elseif ($item['label'] === 'LinkedIn')

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6.75 8.25v9M6.75 5.25v.008M10.5 17.25v-5.25a3 3 0 016 0v5.25M10.5 10.5v6.75"
                                            />

                                        @elseif ($item['label'] === 'GitHub')

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 2.25a9.75 9.75 0 00-3.084 19.001c.488.09.666-.212.666-.47v-1.67c-2.71.589-3.282-1.15-3.282-1.15-.443-1.126-1.082-1.426-1.082-1.426-.884-.604.067-.592.067-.592.977.069 1.491 1.003 1.491 1.003.869 1.488 2.28 1.058 2.835.809.088-.629.34-1.058.618-1.302-2.164-.246-4.44-1.082-4.44-4.815 0-1.064.38-1.934 1.003-2.616-.101-.246-.435-1.239.095-2.583 0 0 .818-.262 2.678 1a9.327 9.327 0 014.876 0c1.86-1.262 2.678-1 2.678-1 .53 1.344.196 2.337.095 2.583.623.682 1.003 1.552 1.003 2.616 0 3.742-2.28 4.566-4.449 4.807.35.301.662.894.662 1.802v2.672c0 .26.176.564.671.468A9.75 9.75 0 0012 2.25z"
                                            />

                                        @elseif ($item['label'] === 'Instagram')

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M7.5 2.25h9A5.25 5.25 0 0121.75 7.5v9a5.25 5.25 0 01-5.25 5.25h-9a5.25 5.25 0 01-5.25-5.25v-9A5.25 5.25 0 017.5 2.25zm4.5 5.25a4.5 4.5 0 100 9 4.5 4.5 0 000-9zm5.625-.75h.008v.008h-.008V6.75z"
                                            />

                                        @endif

                                    </svg>

                                </div>


                                {{-- Content --}}
                                <div class="min-w-0 flex-1">

                                    <p class="mb-0.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">

                                        {{ $item['label'] }}

                                    </p>


                                    <p class="truncate text-sm font-semibold text-slate-700 transition-colors group-hover:text-indigo-700">

                                        {{ $item['value'] }}

                                    </p>

                                </div>


                                {{-- Arrow --}}
                                <svg
                                    class="h-4 w-4 text-slate-300 transition-all group-hover:translate-x-0.5 group-hover:text-indigo-400"
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

                        @endif

                    @endforeach

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- RIGHT SIDE --}}
        {{-- ========================================================= --}}

        <div class="space-y-4">


            {{-- Availability --}}
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 via-indigo-700 to-violet-700 p-8 shadow-xl shadow-indigo-200">

                <div class="pointer-events-none absolute -top-10 -right-10 h-40 w-40 rounded-full bg-white/5"></div>

                <div class="pointer-events-none absolute -bottom-8 -left-8 h-32 w-32 rounded-full bg-white/5"></div>


                <div class="relative">


                    {{-- Status --}}
                    <div class="mb-4 flex items-center gap-2">

                        <span
                            class="h-2 w-2 rounded-full {{ ($about->open_to_work ?? true) ? 'animate-pulse bg-emerald-300' : 'bg-slate-400' }}"
                        ></span>


                        <span
                            class="text-xs font-bold uppercase tracking-widest {{ ($about->open_to_work ?? true) ? 'text-emerald-200' : 'text-slate-300' }}"
                        >

                            {{ ($about->open_to_work ?? true) ? 'Open to Work' : 'Closed to Work' }}

                        </span>

                    </div>


                    <h2 class="mb-3 font-display text-2xl font-bold text-white">

                        {{ ($about->open_to_work ?? true)
                            ? 'Saya sedang mencari pekerjaan'
                            : 'Saat ini belum membuka kesempatan kerja'
                        }}

                    </h2>


                    <p class="text-sm leading-7 text-indigo-200">

                        {{ $about->cta_text
                            ?? 'Saya terbuka untuk posisi IT Support maupun Web Developer secara full-time. Siap berdiskusi mengenai pengalaman, kemampuan teknis, dan kontribusi yang bisa saya berikan.'
                        }}

                    </p>


                    {{-- Action --}}
                    <div class="mt-8 flex flex-wrap gap-3">


                        @if ($about->email)

                            <a
                                href="mailto:{{ $about->email }}"
                                class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-indigo-700 shadow-lg shadow-indigo-900/20 transition-all hover:-translate-y-0.5 hover:bg-indigo-50"
                            >

                                <svg
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2.5"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                    />

                                </svg>

                                Kirim Email

                            </a>

                        @endif


                        @if ($whatsappNumber)

                            <a
                                href="https://wa.me/{{ $whatsappNumber }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-white/20"
                            >

                                WhatsApp

                            </a>

                        @endif

                    </div>

                </div>

            </div>


            {{-- Target Position --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <p class="mb-5 text-xs font-bold uppercase tracking-widest text-slate-400">

                    Posisi yang saya cari

                </p>


                @php

                    $positions = [

                        [
                            'title' => 'IT Support',
                            'desc' => 'Troubleshooting, jaringan, server Linux',
                            'color' => 'emerald',
                        ],

                        [
                            'title' => 'Web Developer',
                            'desc' => 'Laravel, PHP, MySQL, full-stack',
                            'color' => 'indigo',
                        ],

                        [
                            'title' => 'Fresh Graduate',
                            'desc' => 'S1 Teknik Informatika',
                            'color' => 'violet',
                        ],

                    ];


                    $colors = [

                        'emerald' => 'bg-emerald-50 border-emerald-100',
                        'indigo' => 'bg-indigo-50 border-indigo-100',
                        'violet' => 'bg-violet-50 border-violet-100',

                    ];


                    $dots = [

                        'emerald' => 'bg-emerald-400',
                        'indigo' => 'bg-indigo-400',
                        'violet' => 'bg-violet-400',

                    ];

                @endphp


                <div class="space-y-3">

                    @foreach ($positions as $position)

                        <div
                            class="flex items-center gap-4 rounded-xl border px-4 py-3.5 {{ $colors[$position['color']] }}"
                        >

                            <div
                                class="h-2 w-2 shrink-0 rounded-full {{ $dots[$position['color']] }}"
                            ></div>


                            <div>

                                <p class="text-sm font-bold text-slate-800">

                                    {{ $position['title'] }}

                                </p>


                                <p class="mt-0.5 text-xs text-slate-400">

                                    {{ $position['desc'] }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


        </div>

    </div>

</section>

@endsection