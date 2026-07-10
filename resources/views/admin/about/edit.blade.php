@extends('admin.layout')

@section('title', 'Edit Profil')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Edit Profil</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola informasi profil publik Anda</p>
    </div>
</div>

@if (session('success'))
    <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-3 text-sm text-emerald-700">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="rounded-2xl border border-slate-200 bg-white p-6 lg:p-8 space-y-5 shadow-sm">
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $about->name) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="Nama Anda">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Headline</label>
                <input type="text" name="headline" value="{{ old('headline', $about->headline) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="IT Support & Laravel Developer">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Short Bio</label>
            <textarea name="short_bio" rows="3"
                      class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 resize-none"
                      placeholder="Bio singkat untuk hero section...">{{ old('short_bio', $about->short_bio) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Full Bio</label>
            <textarea name="full_bio" rows="6"
                      class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 resize-none"
                      placeholder="Ceritakan tentang diri Anda secara lebih detail...">{{ old('full_bio', $about->full_bio) }}</textarea>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto Profil</label>
                <input type="file" name="photo" accept="image/*"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 file:mr-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100">
                @if ($about->photo)
                    <div class="mt-3">
                        <img src="{{ asset($about->photo) }}" alt="Photo" class="h-20 w-20 rounded-xl object-cover border border-slate-200">
                    </div>
                @endif
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $about->location) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="Indonesia">
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 lg:p-8 space-y-5 shadow-sm">
        <h2 class="text-base font-bold text-slate-800 mb-4">Status</h2>

        <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-5 py-4">
            <div>
                <p class="text-sm font-semibold text-slate-800">Open to Work</p>
                <p class="text-xs text-slate-500 mt-0.5">Tampilkan badge "Open to Work" di halaman utama</p>
            </div>
            <label class="relative inline-flex cursor-pointer items-center">
                <input type="checkbox" name="open_to_work" value="1" class="peer sr-only" {{ old('open_to_work', $about->open_to_work ?? true) ? 'checked' : '' }}>
                <div class="h-7 w-12 rounded-full bg-slate-300 transition-colors peer-checked:bg-emerald-500 after:absolute after:left-[2px] after:top-[2px] after:h-6 after:w-6 after:rounded-full after:bg-white after:shadow after:transition-all peer-checked:after:translate-x-5"></div>
            </label>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 lg:p-8 space-y-5 shadow-sm">
        <h2 class="text-base font-bold text-slate-800 mb-4">Kontak & Sosial Media</h2>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email', $about->email) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="email@domain.com">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $about->whatsapp) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="628xxxxxxxxxx">
            </div>
        </div>
        <div class="grid gap-5 sm:grid-cols-3">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">LinkedIn URL</label>
                <input type="text" name="linkedin" value="{{ old('linkedin', $about->linkedin) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="https://linkedin.com/in/...">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">GitHub URL</label>
                <input type="text" name="github" value="{{ old('github', $about->github) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="https://github.com/...">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Instagram URL</label>
                <input type="text" name="instagram" value="{{ old('instagram', $about->instagram) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="https://instagram.com/...">
            </div>
        </div>

        <div class="mt-5">
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">CTA Text <span class="ml-1 text-xs font-normal text-slate-400">(teks di halaman Contact)</span></label>
            <textarea name="cta_text" rows="4"
                      class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 resize-none"
                      placeholder="Teks yang ditampilkan di halaman Contact...">{{ old('cta_text', $about->cta_text) }}</textarea>
        </div>
    </div>

    <div class="flex items-center gap-3 border-t border-slate-100 pt-6">
        <button type="submit"
            class="inline-flex items-center gap-2 rounded-xl btn-primary-admin px-5 py-2.5 text-sm font-bold shadow-md shadow-indigo-200">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            </svg>
            Simpan Perubahan
        </button>
    </div>
</form>

@endsection
