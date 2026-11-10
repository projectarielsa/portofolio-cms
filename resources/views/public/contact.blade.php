@extends('public.layout')

@section('seo_full_title', 'Kontak | Portofolio | ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('seo_description', 'Hubungi ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer di Cikarang/Bekasi. Tersedia untuk posisi full-time IT Support maupun Web Developer.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', kontak IT support, hire Laravel developer, rekrut web developer Bekasi, IT Support Cikarang')
@section('og_title', 'Kontak | Portofolio | ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('og_description', ($about->name ?? 'Muhamad Ariel Saputra') . ' sedang aktif mencari posisi IT Support atau Web Developer. Hubungi via WhatsApp, Email, atau LinkedIn.')

@section('content')

@php
    $rawWa = $about->whatsapp ?? '';
    $cleanWa = preg_replace('/[^0-9]/', '', $rawWa);
    if (str_starts_with($cleanWa, '0')) {
        $cleanWa = '62' . substr($cleanWa, 1);
    }

    $email = $about->email ?? 'muhamadarielsaputra11@gmail.com';
    $location = $about->location ?? 'Cikarang Selatan, Kab. Bekasi';

    $linkedin = $about->linkedin ?? 'arielsa';
    $linkedinUrl = str_starts_with($linkedin, 'http') ? $linkedin : 'https://linkedin.com/in/' . ltrim($linkedin, '@');

    $github = $about->github ?? 'arielsa13';
    $githubUrl = str_starts_with($github, 'http') ? $github : 'https://github.com/' . ltrim($github, '@');

    $instagram = $about->instagram ?? 'arielsa13';
    $instagramUrl = str_starts_with($instagram, 'http') ? $instagram : 'https://instagram.com/' . ltrim($instagram, '@');
@endphp

<section class="mx-auto max-w-6xl px-4 pt-16 pb-24 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <div class="mb-8 flex items-center gap-2 text-xs font-medium text-slate-500">
        <a href="{{ route('home') }}" class="transition-colors hover:text-indigo-600">Home</a>
        <span>/</span>
        <span class="text-slate-800">Contact</span>
    </div>

    {{-- Header --}}
    <div class="mb-12 max-w-3xl">
        @if ($about->open_to_work ?? true)
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3.5 py-1.5 shadow-xs">
                <span class="h-2 w-2 animate-pulse rounded-full bg-emerald-500"></span>
                <span class="text-xs font-semibold text-emerald-800">
                    Aktif Mencari Kerja · Siap Bergabung
                </span>
            </div>
        @else
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-100 px-3.5 py-1.5">
                <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                <span class="text-xs font-semibold text-slate-600">
                    Saat Ini Belum Membuka Peluang Baru
                </span>
            </div>
        @endif

        <p class="mb-2 text-xs font-bold uppercase tracking-widest text-indigo-700">
            Saluran Komunikasi
        </p>

        <h1 class="font-display text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
            Mari Terhubung & Berdiskusi
        </h1>

        <p class="mt-4 text-base leading-7 text-slate-600 sm:text-lg">
            {{ $about->cta_text ?? 'Saya terbuka untuk posisi full-time di bidang IT Support, Network & Infrastructure, maupun Web Developer Laravel. Jangan ragu menghubungi saya untuk mendiskusikan peluang kerja sama atau wawancara.' }}
        </p>
    </div>

    {{-- Interactive 4-Card Grid --}}
    <div class="grid gap-6 sm:grid-cols-2">

        {{-- KARTU 1: WHATSAPP --}}
        <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition hover:border-emerald-300 hover:shadow-md sm:p-7">
            <div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-emerald-100 bg-emerald-50 text-emerald-700 shadow-xs">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-bold text-emerald-800 border border-emerald-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-600 animate-ping"></span>
                        Respon Cepat
                    </span>
                </div>

                <h2 class="mt-5 font-display text-lg font-bold text-slate-900">
                    WhatsApp Messenger
                </h2>
                <p class="mt-1 text-xs text-slate-600">
                    Kanal tercepat untuk koordinasi langsung, perkenalan singkat, atau jadwal interview.
                </p>

                <div class="mt-4 rounded-xl border border-slate-100 bg-slate-50/80 p-3">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-600">Nomor Ponsel</p>
                    <p class="font-mono text-sm font-semibold text-slate-800">{{ $rawWa ?: '+62 851 7971 1302' }}</p>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap items-center gap-2.5 pt-2">
                <a
                    href="https://wa.me/{{ $cleanWa }}?text=Halo%20Ariel,%20saya%20menghubungi%20Anda%20dari%20website%20portofolio."
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-emerald-700 px-4 py-2.5 text-xs font-bold text-white shadow-xs transition hover:bg-emerald-800 active:scale-[0.98]"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    Chat Sekarang
                </a>
                <button
                    type="button"
                    onclick="copyToClipboard('{{ $rawWa ?: '+62 851 7971 1302' }}', 'Nomor WhatsApp')"
                    class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs transition hover:border-slate-300 hover:bg-slate-50 active:scale-[0.98]"
                    aria-label="Salin nomor WhatsApp"
                >
                    <svg class="h-4 w-4 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                    </svg>
                    Salin
                </button>
            </div>
        </div>

        {{-- KARTU 2: EMAIL --}}
        <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition hover:border-indigo-300 hover:shadow-md sm:p-7">
            <div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-indigo-100 bg-indigo-50 text-indigo-700 shadow-xs">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-2.5 py-0.5 text-[11px] font-bold text-indigo-800 border border-indigo-200">
                        Inquiry Resmi
                    </span>
                </div>

                <h2 class="mt-5 font-display text-lg font-bold text-slate-900">
                    Surat Elektronik (Email)
                </h2>
                <p class="mt-1 text-xs text-slate-600">
                    Ideal untuk penawaran kerja resmi, dokumen lampiran, job offer, atau undangan teknis.
                </p>

                <div class="mt-4 rounded-xl border border-slate-100 bg-slate-50/80 p-3">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-600">Alamat Email</p>
                    <p class="font-mono text-sm font-semibold text-slate-800 break-all">{{ $email }}</p>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap items-center gap-2.5 pt-2">
                <a
                    href="mailto:{{ $email }}?subject=Peluang%20Kerja%20/%20Diskusi%20dengan%20Ariel%20Saputra"
                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-indigo-700 px-4 py-2.5 text-xs font-bold text-white shadow-xs transition hover:bg-indigo-800 active:scale-[0.98]"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                    Kirim Email
                </a>
                <button
                    type="button"
                    onclick="copyToClipboard('{{ $email }}', 'Alamat email')"
                    class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-700 shadow-xs transition hover:border-slate-300 hover:bg-slate-50 active:scale-[0.98]"
                    aria-label="Salin alamat email"
                >
                    <svg class="h-4 w-4 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                    </svg>
                    Salin
                </button>
            </div>
        </div>

        {{-- KARTU 3: JEJARING PROFESIONAL --}}
        <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition hover:border-sky-300 hover:shadow-md sm:p-7">
            <div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-sky-100 bg-sky-50 text-sky-600 shadow-xs">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-sky-50 px-2.5 py-0.5 text-[11px] font-bold text-sky-800 border border-sky-200">
                        Professional Network
                    </span>
                </div>

                <h2 class="mt-5 font-display text-lg font-bold text-slate-900">
                    LinkedIn & GitHub
                </h2>
                <p class="mt-1 text-xs text-slate-600">
                    Lihat jejak karir profesional, rekomendasi, dan riwayat kode sumber proyek terbuka.
                </p>

                <div class="mt-4 space-y-2">
                    {{-- LinkedIn Row --}}
                    <a
                        href="{{ $linkedinUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group flex items-center justify-between rounded-xl border border-slate-100 bg-slate-50/80 p-3 transition hover:border-sky-200 hover:bg-sky-50/50"
                    >
                        <div class="flex items-center gap-3">
                            <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-sky-100 text-sky-800 font-bold text-xs">in</span>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-600">LinkedIn Profile</p>
                                <p class="text-xs font-semibold text-slate-800 group-hover:text-sky-800">linkedin.com/in/{{ ltrim($linkedin, '@') }}</p>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-slate-400 group-hover:text-sky-700 group-hover:translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>

                    {{-- GitHub Row --}}
                    <a
                        href="{{ $githubUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group flex items-center justify-between rounded-xl border border-slate-100 bg-slate-50/80 p-3 transition hover:border-slate-300 hover:bg-slate-100/60"
                    >
                        <div class="flex items-center gap-3">
                            <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-200 text-slate-800 font-bold text-xs">GH</span>
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-600">GitHub Repositories</p>
                                <p class="text-xs font-semibold text-slate-800 group-hover:text-indigo-700">github.com/{{ ltrim($github, '@') }}</p>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-slate-400 group-hover:text-indigo-700 group-hover:translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>

            @if ($instagram)
                <div class="mt-4 pt-2 text-right">
                    <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="text-[11px] font-semibold text-slate-600 hover:text-rose-700 transition">
                        Instagram: @ {{ ltrim($instagram, '@') }} &rarr;
                    </a>
                </div>
            @endif
        </div>

        {{-- KARTU 4: LOKASI & STATUS KERJA --}}
        <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition hover:border-violet-300 hover:shadow-md sm:p-7">
            <div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border border-violet-100 bg-violet-50 text-violet-700 shadow-xs">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-violet-50 px-2.5 py-0.5 text-[11px] font-bold text-violet-800 border border-violet-200">
                        Preferensi Kerja
                    </span>
                </div>

                <h2 class="mt-5 font-display text-lg font-bold text-slate-900">
                    Lokasi & Ketersediaan
                </h2>
                <p class="mt-1 text-xs text-slate-600">
                    Informasi domisili tempat tinggal dan preferensi penempatan kerja.
                </p>

                <div class="mt-4 space-y-2.5">
                    <div class="flex items-start gap-3 rounded-xl border border-slate-100 bg-slate-50/80 p-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-violet-100 text-violet-800 text-xs font-bold">
                            📍
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-600">Domisili Saat Ini</p>
                            <p class="text-xs font-semibold text-slate-800">{{ $location }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 rounded-xl border border-slate-100 bg-slate-50/80 p-3">
                        <div class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                            ✓
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-600">Tipe & Area Penempatan</p>
                            <p class="text-xs font-semibold text-slate-800">
                                On-Site (Jabodetabek / Cikarang / Karawang) · Hybrid · Remote
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 border-t border-slate-100 pt-3">
                <p class="text-[11px] text-slate-600">
                    Status: <span class="font-semibold text-emerald-800">Immediately Available (Siap Segera Bergabung)</span>
                </p>
            </div>
        </div>

    </div>

</section>

{{-- Toast Notification --}}
<div id="copyToast" class="pointer-events-none fixed bottom-6 right-6 z-50 flex items-center gap-2.5 rounded-2xl bg-slate-900 px-4 py-3 text-xs font-semibold text-white shadow-2xl opacity-0 translate-y-3 transition-all duration-300">
    <svg class="h-4 w-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
    </svg>
    <span id="toastMsg">Tersalin ke clipboard!</span>
</div>

<script>
    let toastTimeout;
    function copyToClipboard(text, label) {
        if (!navigator.clipboard) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
        } else {
            navigator.clipboard.writeText(text);
        }

        const toast = document.getElementById('copyToast');
        const msg = document.getElementById('toastMsg');
        msg.textContent = label + ' berhasil disalin!';

        toast.classList.remove('opacity-0', 'translate-y-3', 'pointer-events-none');
        toast.classList.add('opacity-100', 'translate-y-0');

        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'translate-y-3', 'pointer-events-none');
        }, 2200);
    }
</script>

@endsection
