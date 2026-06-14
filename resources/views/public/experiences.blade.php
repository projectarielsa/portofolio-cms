@extends('public.layout')

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Pengalaman Kerja — IT Support & Laravel Developer')
@section('seo_description', 'Riwayat pengalaman kerja ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' sebagai IT Support dan Web Developer. Lihat track record dan pencapaian profesional.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', pengalaman kerja IT support, riwayat kerja web developer')

@section('content')
<section class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-20 pb-24">

    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">Experience</span>
    </div>

    <div class="max-w-3xl mb-14">
        <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-4">Experience</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Timeline pengalaman kerja saya</h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">Halaman ini merangkum pengalaman yang relevan untuk menunjukkan perkembangan, tanggung jawab, dan konteks kerja saya.</p>
    </div>

    <div class="space-y-5">
        @forelse ($experiences as $experience)
            <div class="card-hover rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                    <div>
                        <h2 class="font-display text-xl font-bold text-slate-800">{{ $experience->position }}</h2>
                        <p class="mt-1 text-sm font-semibold text-indigo-600">{{ $experience->company }}</p>
                    </div>
                    <span class="shrink-0 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-500">
                        {{ optional($experience->start_date)->format('M Y') ?? '—' }}{{ $experience->end_date ? ' — '.optional($experience->end_date)->format('M Y') : ' — Present' }}
                    </span>
                </div>
                <p class="mt-5 leading-7 text-slate-500">{{ $experience->description }}</p>
            </div>
        @empty
            <div class="rounded-2xl border border-dashed border-slate-200 bg-white px-8 py-14 text-center text-slate-400">
                Belum ada pengalaman yang ditambahkan.
            </div>
        @endforelse
    </div>
</section>
@endsection
