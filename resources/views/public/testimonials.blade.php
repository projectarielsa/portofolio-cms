@extends('public.layout')

@section('seo_title', $about->name ?? 'Muhamad Ariel Saputra')
@section('seo_subtitle', 'Testimonials — Portfolio')
@section('seo_description', 'Testimoni dan feedback tentang cara kerja ' . ($about->name ?? 'Muhamad Ariel Saputra') . ' — IT Support & Laravel Developer yang profesional.')
@section('seo_keywords', ($about->name ?? 'Muhamad Ariel Saputra') . ', testimoni IT support, review web developer, feedback Laravel developer')

@section('content')
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-24">

    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">Testimonials</span>
    </div>

    <div class="max-w-3xl mb-14">
        <p class="text-xs font-bold uppercase tracking-widest text-amber-500 mb-4">Testimonials</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Feedback dari orang yang pernah bekerja sama</h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">Testimoni membantu memberi konteks tambahan tentang cara saya bekerja, berkomunikasi, dan menyelesaikan project secara profesional.</p>
    </div>

    <div class="grid gap-5 lg:grid-cols-3">
        @forelse ($testimonials as $testimonial)
            <div class="card-hover rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <svg class="h-8 w-8 text-indigo-200 mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
                <p class="text-base leading-7 text-slate-600">"{{ $testimonial->message }}"</p>
                <div class="mt-6 border-t border-slate-100 pt-5">
                    <p class="font-bold text-slate-800">{{ $testimonial->name }}</p>
                    <p class="mt-1 text-sm text-slate-400">{{ trim(($testimonial->role ? $testimonial->role.' · ' : '').($testimonial->company ?? '')) }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white px-8 py-14 text-center text-slate-400">
                Belum ada testimoni yang dipublikasikan.
            </div>
        @endforelse
    </div>

    @if ($testimonials->hasPages())
        <div class="mt-10">
            {{ $testimonials->links() }}
        </div>
    @endif
</section>
@endsection
