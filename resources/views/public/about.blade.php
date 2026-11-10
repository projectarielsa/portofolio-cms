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

@section('seo_full_title', 'About | Portofolio | ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('seo_description',
    'Tentang ' .
    ($about->name ?? 'Muhamad Ariel Saputra') .
    ' — IT Support & Laravel Developer.
    Lulusan S1 Teknik Informatika, berpengalaman di troubleshooting, jaringan LAN/WAN, Linux server, dan Laravel.')
@section('seo_keywords',
    ($about->name ?? 'Muhamad Ariel Saputra') .
    ', profil IT support, tentang Ariel Saputra, Teknik
    Informatika')
@section('og_title', 'About | Portofolio | ' . ($about->name ?? 'Muhamad Ariel Saputra'))
@section('og_description',
    $about->short_bio ??
    'IT Support & Laravel Developer berpengalaman. Lulusan S1 Teknik
    Informatika. Open to Work.')

@section('content')

    {{-- ABOUT --}}
    <section class="mx-auto max-w-7xl px-4 pt-20 pb-12 sm:px-6 lg:px-8">

        {{-- BREADCRUMB --}}
        <div class="mb-12 flex items-center gap-2 text-xs text-slate-600">
            <a href="{{ route('home') }}" class="transition-colors hover:text-indigo-600">
                Home
            </a>

            <span>/</span>

            <span class="text-slate-600">
                About
            </span>
        </div>


        <div class="grid gap-16 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">

            {{-- LEFT --}}
            <div>

                <p class="mb-4 text-xs font-bold uppercase tracking-widest text-indigo-700">
                    About Me
                </p>


                {{-- PROFILE --}}
                <div class="mb-8 flex flex-col gap-6 sm:flex-row sm:items-center">

                    @if ($photoUrl)
                        {{-- PHOTO CLICKABLE --}}
                        <button type="button" onclick="openProfilePhoto()"
                            class="group relative shrink-0 cursor-pointer focus:outline-none"
                            aria-label="Lihat foto profil">

                            {{-- GLOW --}}
                            <div
                                class="absolute inset-0 rounded-2xl bg-gradient-to-br from-indigo-300/40 to-violet-300/30 blur-xl">
                            </div>


                            {{-- IMAGE --}}
                            <img src="{{ $photoUrl }}" alt="{{ $about->name ?? 'Profile Photo' }}"
                                class="relative h-24 w-24 rounded-2xl border-2 border-white object-cover shadow-xl transition duration-300 group-hover:scale-105 sm:h-28 sm:w-28">


                            {{-- ZOOM ICON --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center rounded-2xl bg-slate-900/0 opacity-0 transition duration-300 group-hover:bg-slate-900/40 group-hover:opacity-100">

                                <svg class="h-7 w-7 text-white drop-shadow-lg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 15l5 5m-9.5-3a6.5 6.5 0 1 0 0-13 6.5 6.5 0 0 0 0 13Z" />

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 7.5v6m-3-3h6" />
                                </svg>

                            </div>

                        </button>
                    @endif


                    {{-- NAME --}}
                    <div>

                        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                            {{ $about->name ?? 'Muhamad Ariel Saputra' }}
                        </h1>

                        <p class="mt-2 text-slate-600">
                            {{ $about->headline ?? 'IT Support & Laravel Developer' }}
                        </p>

                    </div>

                </div>


                {{-- BIO --}}
                <div class="max-w-2xl space-y-4 text-justify leading-8 text-slate-600">

                    @php
                        $bio = $about->full_bio ?? ($about->short_bio ?? null);
                    @endphp


                    @if ($bio)

                        @foreach (preg_split("/\r\n|\n|\r/", trim($bio)) as $paragraph)
                            @if (trim($paragraph) !== '')
                                <p>
                                    {{ $paragraph }}
                                </p>
                            @endif
                        @endforeach
                    @else
                        <p>
                            Saya memiliki pengalaman dalam IT Support dan Web Development,
                            terbiasa menangani troubleshooting hardware, software,
                            serta jaringan LAN/WAN.
                        </p>

                        <p>
                            Selain itu, saya juga berpengalaman dalam membangun dan
                            men-deploy aplikasi web menggunakan Laravel di lingkungan
                            server Linux.
                        </p>

                        <p>
                            Saya terbuka untuk peluang kerja di bidang IT Support maupun
                            Web Development, dan siap berkontribusi dengan pendekatan
                            yang terstruktur.
                        </p>

                    @endif

                </div>


                {{-- CONTACT --}}
                <div class="mt-10 grid gap-3 sm:grid-cols-2">

                    {{-- EMAIL --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-widest text-slate-600">
                            Email
                        </p>

                        <p class="break-all text-sm font-semibold text-slate-700">
                            {{ $about->email ?? 'muhamadarielsaputra11@gmail.com' }}
                        </p>

                    </div>


                    {{-- LOCATION --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        <p class="mb-2 text-[10px] font-semibold uppercase tracking-widest text-slate-600">
                            Location
                        </p>

                        <p class="text-sm font-semibold text-slate-700">
                            {{ $about->location ?? 'Indonesia' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="space-y-4 lg:sticky lg:top-24">


                {{-- STATS --}}
                <div class="grid grid-cols-2 gap-4">

                    {{-- EXPERIENCE --}}
                    <div class="rounded-2xl border border-indigo-100 bg-indigo-50 p-5 text-center">

                        <p class="font-display text-3xl font-bold text-indigo-700">
                            {{ $experiences->count() }}
                        </p>

                        <p class="mt-1 text-xs font-semibold uppercase tracking-widest text-indigo-700">
                            Pengalaman
                        </p>

                    </div>


                    {{-- SKILLS --}}
                    <div class="rounded-2xl border border-violet-100 bg-violet-50 p-5 text-center">

                        <p class="font-display text-3xl font-bold text-violet-700">
                            {{ $skills->count() }}
                        </p>

                        <p class="mt-1 text-xs font-semibold uppercase tracking-widest text-violet-700">
                            Skills
                        </p>

                    </div>

                </div>


                {{-- CORE STRENGTH --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-slate-600">
                        Core Strengths
                    </p>


                    <div class="space-y-3">

                        @foreach (['IT Support & Troubleshooting', 'Laravel Web Development', 'Linux Server Management', 'LAN/WAN Networking', 'Database MySQL', 'System Documentation'] as $strength)
                            <div class="flex items-center gap-3">

                                <div class="h-1.5 w-1.5 shrink-0 rounded-full bg-indigo-400"></div>

                                <span class="text-sm text-slate-600">
                                    {{ $strength }}
                                </span>

                            </div>
                        @endforeach

                    </div>

                </div>


                {{-- TECHNOLOGIES --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-slate-600">
                        Technologies
                    </p>


                    <div class="flex flex-wrap gap-2">

                        @forelse ($skills->take(12) as $skill)
                            <span
                                class="rounded-full border border-indigo-100 bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-600">
                                {{ $skill->name }}
                            </span>

                        @empty

                            <span class="text-sm text-slate-600">
                                Tambahkan skills dari CMS.
                            </span>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- EXPERIENCE --}}
    <section class="mx-auto max-w-7xl border-t border-slate-100 px-4 py-16 sm:px-6 lg:px-8">

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-2 text-xs font-bold uppercase tracking-widest text-violet-700">
                    Career Snapshot
                </p>
                <h2 class="font-display text-3xl font-bold tracking-tight text-slate-900">
                    Pengalaman Kerja
                </h2>
            </div>
            <a href="{{ route('experiences') }}" class="group inline-flex items-center gap-2 text-xs font-bold text-indigo-600 transition hover:text-indigo-800">
                <span>Lihat Timeline Lengkap</span>
                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            @forelse ($experiences as $experience)
                @php
                    $startDate = $experience->start_date ? Carbon::parse($experience->start_date) : null;
                    $endDate = $experience->end_date ? Carbon::parse($experience->end_date) : null;
                    $isCurrent = is_null($endDate);

                    $diffEnd = $endDate ?? now();
                    $diff = $startDate ? $startDate->diff($diffEnd) : null;
                    $duration = [];
                    if ($diff && $diff->y > 0) $duration[] = $diff->y . ' thn';
                    if ($diff && $diff->m > 0) $duration[] = $diff->m . ' bln';
                    $durStr = empty($duration) ? '< 1 bln' : implode(' ', $duration);

                    $lines = $experience->description ? preg_split('/\r\n|\r|\n/', trim($experience->description)) : [];
                    $topLines = array_slice(array_filter($lines, fn($l) => trim($l) !== ''), 0, 2);
                @endphp

                <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-white p-6 shadow-xs transition-all hover:border-indigo-300 hover:shadow-md">
                    <div>
                        <div class="mb-2 flex items-start justify-between gap-3">
                            <span class="text-xs font-semibold text-slate-500">
                                {{ optional($startDate)->format('M Y') ?? '—' }} — {{ $endDate ? optional($endDate)->format('M Y') : 'Present' }}
                            </span>
                            @if ($isCurrent)
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-[11px] font-bold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="rounded-full border border-indigo-100 bg-indigo-50 px-2.5 py-0.5 text-[11px] font-semibold text-indigo-700">
                                    {{ $durStr }}
                                </span>
                            @endif
                        </div>

                        <h3 class="font-display text-lg font-bold text-slate-900">
                            {{ $experience->position }}
                        </h3>

                        <p class="mt-1 text-sm font-semibold text-indigo-600">
                            {{ $experience->company }}
                        </p>

                        @if (!empty($topLines))
                            <ul class="mt-4 space-y-1.5 text-xs leading-relaxed text-slate-600">
                                @foreach ($topLines as $line)
                                    <li class="flex items-start gap-2">
                                        <span class="font-bold text-indigo-500">•</span>
                                        <span class="line-clamp-2">{{ preg_replace('/^[•\-\*]\s*/u', '', trim($line)) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                        <span class="text-[11px] text-slate-500">
                            {{ count($lines) }} poin tanggung jawab
                        </span>
                        <a href="{{ route('experiences') }}" class="inline-flex items-center gap-1 text-xs font-bold text-indigo-600 transition hover:text-indigo-800">
                            Detail &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white p-8 text-center text-slate-500">
                    Tambahkan pengalaman kerja dari CMS.
                </div>
            @endforelse
        </div>

    </section>


    {{-- EDUCATION + CV --}}
    <section class="mx-auto max-w-7xl border-t border-slate-100 px-4 py-16 sm:px-6 lg:px-8">

        <div class="grid gap-16 lg:grid-cols-2">


            {{-- EDUCATION --}}
            <div>

                <p class="mb-3 text-xs font-bold uppercase tracking-widest text-emerald-700">
                    Education
                </p>


                <h2 class="mb-8 font-display text-3xl font-bold tracking-tight text-slate-900">
                    Latar Belakang Akademik
                </h2>


                <div class="space-y-4">

                    @forelse ($educations as $education)

                        <div class="card-hover rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                            <div class="flex items-start gap-4">


                                {{-- ICON --}}
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-violet-100 bg-violet-50">

                                    <span class="text-xs font-bold text-violet-700">

                                        @if (Str::contains(strtolower($education->degree ?? ''), 'sarjana'))
                                            UNI
                                        @elseif (Str::contains(strtolower($education->degree ?? ''), 'smk'))
                                            SMK
                                        @else
                                            EDU
                                        @endif

                                    </span>

                                </div>


                                {{-- CONTENT --}}
                                <div class="flex-1">

                                    <h3 class="font-semibold text-slate-800">
                                        {{ $education->institution }}
                                    </h3>


                                    <p class="mt-1 text-sm text-slate-600">

                                        @if ($education->degree)
                                            {{ $education->degree }}
                                        @endif


                                        @if ($education->field_of_study)
                                            · {{ $education->field_of_study }}
                                        @endif


                                        @if ($education->start_year || $education->end_year)
                                            · {{ $education->start_year }} – {{ $education->end_year }}
                                        @endif

                                    </p>


                                    {{-- GPA --}}
                                    @if (!empty($education->gpa))
                                        <div
                                            class="mt-3 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1">

                                            <span class="text-xs font-bold text-emerald-700">

                                                @if (Str::contains(strtolower($education->degree ?? ''), 'sarjana'))
                                                    IPK {{ $education->gpa }}
                                                @else
                                                    Nilai {{ $education->gpa }}
                                                @endif

                                            </span>

                                        </div>
                                    @endif


                                    {{-- DESCRIPTION --}}
                                    @if ($education->description)
                                        <p class="mt-3 whitespace-pre-line text-sm leading-6 text-slate-600">
                                            {{ $education->description }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div
                            class="rounded-2xl border border-dashed border-slate-200 bg-white p-8 text-center text-slate-600">
                            Tambahkan riwayat pendidikan dari CMS.
                        </div>

                    @endforelse

                </div>

            </div>


            {{-- CV --}}
            <div>

                <p class="mb-3 text-xs font-bold uppercase tracking-widest text-amber-700">
                    Resume
                </p>


                <h2 class="mb-3 font-display text-3xl font-bold tracking-tight text-slate-900">
                    Daftar Riwayat Hidup
                </h2>


                <div class="space-y-4">

                    @forelse ($resumes as $resume)
                        <div
                            class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">


                                {{-- CV INFO --}}
                                <div class="flex min-w-0 items-center gap-4">


                                    {{-- PDF ICON --}}
                                    <div
                                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-red-100 bg-red-50">

                                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="1.8">

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.875 1.875 0 0 1 12.75 6.375v-1.5A3.375 3.375 0 0 0 9.375 1.5H6.75A3.75 3.75 0 0 0 3 5.25v13.5a3.75 3.75 0 0 0 3.75 3.75h5.625" />

                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 6.375h3.75" />

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 18.75h4.5m-2.25-2.25v4.5" />

                                        </svg>

                                    </div>


                                    {{-- TITLE --}}
                                    <div class="min-w-0">

                                        <h3 class="truncate font-semibold text-slate-800">
                                            {{ $resume->title }}
                                        </h3>


                                        @if ($resume->category)
                                            <p class="mt-1 text-xs font-medium text-indigo-700">
                                                {{ $resume->category }}
                                            </p>
                                        @endif

                                    </div>

                                </div>


                                {{-- ACTION --}}
                                <div class="flex shrink-0 items-center gap-2">


                                    {{-- PREVIEW --}}
                                    <a href="{{ asset($resume->file_path) }}" target="_blank" title="Preview CV"
                                        class="hidden h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:border-indigo-200 hover:text-indigo-600 sm:inline-flex">

                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12S5.25 6.75 12 6.75 21.75 12 21.75 12 18.75 17.25 12 17.25 2.25 12 2.25 12Z" />

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />

                                        </svg>

                                    </a>


                                    {{-- DOWNLOAD --}}
                                    <a href="{{ asset($resume->file_path) }}" download
                                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-md shadow-indigo-200 transition hover:bg-indigo-700 hover:shadow-lg">

                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3v12m0 0 4-4m-4 4-4-4m-3 9h14" />

                                        </svg>


                                        <span>
                                            Download
                                        </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-8 text-center">

                            <svg class="mx-auto mb-3 h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.875 1.875 0 0 1 12.75 6.375v-1.5A3.375 3.375 0 0 0 9.375 1.5H6.75A3.75 3.75 0 0 0 3 5.25v13.5a3.75 3.75 0 0 0 3.75 3.75h10.5a3.75 3.75 0 0 0 3.75-3.75" />

                            </svg>


                            <p class="text-sm text-slate-600">
                                CV belum tersedia.
                            </p>

                        </div>
                    @endforelse

                </div>

            </div>

        </div>

    </section>


    {{-- ============================================
     PROFILE PHOTO MODAL
============================================ --}}
    @if ($photoUrl)
        <div id="profilePhotoModal"
            class="fixed inset-0 z-[9999] hidden items-center justify-center bg-slate-950/80 p-4 opacity-0 backdrop-blur-sm transition-opacity duration-300"
            onclick="closeProfilePhoto(event)">

            {{-- CLOSE BUTTON --}}
            <button type="button" onclick="closeProfilePhoto()"
                class="absolute right-5 top-5 flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-white backdrop-blur transition hover:bg-white/20"
                aria-label="Tutup foto">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>


            {{-- IMAGE --}}
            <img src="{{ $photoUrl }}" alt="{{ $about->name ?? 'Profile Photo' }}"
                class="max-h-[85vh] max-w-full rounded-2xl object-contain shadow-2xl" onclick="event.stopPropagation()">
        </div>


        {{-- MODAL SCRIPT --}}
        <script>
            function openProfilePhoto() {
                const modal = document.getElementById('profilePhotoModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.classList.add('opacity-100');
                }, 10);
            }


            function closeProfilePhoto(event) {
                if (
                    event &&
                    event.target !== document.getElementById('profilePhotoModal')
                ) {
                    return;
                }
                const modal = document.getElementById('profilePhotoModal');
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0');
                document.body.style.overflow = '';
                setTimeout(() => {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }, 300);
            }

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeProfilePhoto();
                }
            });
        </script>
    @endif

@endsection
