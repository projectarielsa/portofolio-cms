@extends('public.layout')

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Kontak — IT Support & Laravel Developer')
@section('seo_description', 'Hubungi ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer yang sedang aktif mencari kerja. Tersedia untuk posisi full-time di bidang IT Support maupun Web Developer.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', kontak IT support, hire Laravel developer, rekrut web developer Indonesia')
@section('og_title', 'Hubungi ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' | Open to Work')
@section('og_description', ($about->name ?? 'Muhamad Ariel Saputra') . ' sedang aktif mencari posisi IT Support atau Web Developer. Hubungi sekarang.')

@section('content')

<section class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-20 pb-24">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">Contact</span>
    </div>

    <div class="max-w-2xl mb-16">
        <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 mb-6">
            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="text-xs font-semibold text-emerald-700">Aktif mencari pekerjaan</span>
        </div>
        <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-4">Kontak Saya</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
            Mari terhubung
        </h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">
            Jika Anda adalah recruiter atau hiring manager yang mencari IT Support atau Web Developer — saya terbuka untuk berdiskusi mengenai posisi yang tersedia.
        </p>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1fr_1.2fr]">

        {{-- Contact info --}}
        <div class="space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-6">Informasi Kontak</p>

                <div class="space-y-3">
                    @php
                        $contactItems = [
                            ['label' => 'Email',     'value' => $contact->email     ?? $about->email     ?? null, 'href' => 'mailto:'.($contact->email ?? $about->email ?? '#')],
                            ['label' => 'WhatsApp',  'value' => $contact->whatsapp  ?? $about->whatsapp  ?? null, 'href' => 'https://wa.me/'.preg_replace('/[^0-9]/', '', $contact->whatsapp ?? $about->whatsapp ?? '')],
                            ['label' => 'LinkedIn',  'value' => $contact->linkedin  ?? $about->linkedin  ?? null, 'href' => $contact->linkedin  ?? $about->linkedin  ?? '#'],
                            ['label' => 'GitHub',    'value' => $contact->github    ?? $about->github    ?? null, 'href' => $contact->github    ?? $about->github    ?? '#'],
                            ['label' => 'Instagram', 'value' => $contact->instagram ?? $about->instagram ?? null, 'href' => $contact->instagram ?? $about->instagram ?? '#'],
                        ];
                        $iconColors = [
                            'Email'     => ['bg' => 'bg-indigo-50 text-indigo-600', 'border' => 'border-indigo-100'],
                            'WhatsApp'  => ['bg' => 'bg-emerald-50 text-emerald-600', 'border' => 'border-emerald-100'],
                            'LinkedIn'  => ['bg' => 'bg-sky-50 text-sky-600', 'border' => 'border-sky-100'],
                            'GitHub'    => ['bg' => 'bg-slate-100 text-slate-600', 'border' => 'border-slate-200'],
                            'Instagram' => ['bg' => 'bg-rose-50 text-rose-500', 'border' => 'border-rose-100'],
                        ];
                    @endphp

                    @foreach ($contactItems as $item)
                        @if ($item['value'])
                            @php $ic = $iconColors[$item['label']]; @endphp
                            <a href="{{ $item['href'] }}"
                               target="{{ in_array($item['label'], ['LinkedIn', 'GitHub', 'Instagram', 'WhatsApp']) ? '_blank' : '_self' }}"
                               class="group flex items-center gap-4 rounded-xl border border-slate-100 bg-slate-50/60 p-4 transition-all hover:border-indigo-200 hover:bg-indigo-50/50 hover:shadow-sm">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl {{ $ic['bg'] }} border {{ $ic['border'] }}">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        @if ($item['label'] == 'Email')
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                        @elseif ($item['label'] == 'WhatsApp')
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
                                        @endif
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-[10px] text-slate-400 uppercase tracking-widest font-semibold mb-0.5">{{ $item['label'] }}</p>
                                    <p class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700 truncate transition-colors">{{ $item['value'] }}</p>
                                </div>
                                <svg class="h-4 w-4 text-slate-300 group-hover:text-indigo-400 transition-all group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Availability --}}
        <div class="space-y-4">

            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 via-indigo-700 to-violet-700 p-8 shadow-xl shadow-indigo-200">
                <div class="absolute -top-10 -right-10 h-40 w-40 rounded-full bg-white/5 pointer-events-none"></div>
                <div class="absolute -bottom-8 -left-8 h-32 w-32 rounded-full bg-white/5 pointer-events-none"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="h-2 w-2 rounded-full bg-emerald-300 animate-pulse"></span>
                        <span class="text-xs font-bold text-emerald-200 uppercase tracking-widest">Open to Work</span>
                    </div>
                    <h2 class="font-display text-2xl font-bold text-white mb-3">Saya sedang mencari pekerjaan</h2>
                    <p class="text-indigo-200 leading-7 text-sm">
                        {{ $contact->cta_text ?? 'Saya terbuka untuk posisi IT Support maupun Web Developer secara full-time. Siap berdiskusi mengenai pengalaman, kemampuan teknis, dan kontribusi yang bisa saya berikan.' }}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="mailto:{{ $contact->email ?? $about->email ?? '#' }}"
                           class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-indigo-700 transition-all hover:bg-indigo-50 hover:-translate-y-0.5 shadow-lg shadow-indigo-900/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            Kirim Email
                        </a>
                        @if ($contact->whatsapp ?? $about->whatsapp ?? null)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? $about->whatsapp) }}"
                               target="_blank"
                               class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-white/20 hover:-translate-y-0.5">
                                WhatsApp
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-5">Posisi yang saya cari</p>
                <div class="space-y-3">
                    @foreach([
                        ['title' => 'IT Support',        'desc' => 'Troubleshooting, jaringan, server Linux',  'color' => 'emerald'],
                        ['title' => 'Web Developer',      'desc' => 'Laravel, PHP, MySQL, full-stack',          'color' => 'indigo'],
                        ['title' => 'Fresh Graduate',     'desc' => 'S1 Teknik Informatika, IPK 3.52',          'color' => 'violet'],
                    ] as $item)
                        @php
                            $colors = [
                                'emerald' => 'bg-emerald-50 border-emerald-100',
                                'indigo'  => 'bg-indigo-50 border-indigo-100',
                                'violet'  => 'bg-violet-50 border-violet-100',
                            ];
                            $dots = ['emerald' => 'bg-emerald-400', 'indigo' => 'bg-indigo-400', 'violet' => 'bg-violet-400'];
                        @endphp
                        <div class="flex items-center gap-4 rounded-xl border {{ $colors[$item['color']] }} px-4 py-3.5">
                            <div class="h-2 w-2 rounded-full {{ $dots[$item['color']] }} shrink-0"></div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">{{ $item['title'] }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
