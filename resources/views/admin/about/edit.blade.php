@extends('admin.layout')
@section('title', 'Edit About')
@section('heading', 'Edit About')

@section('content')

<form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data"
      class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4">
            <p class="text-sm font-bold text-rose-700 mb-1">Terdapat kesalahan:</p>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-rose-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-5">Identitas</p>
    <div class="grid gap-5 md:grid-cols-2 mb-8">

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

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto Profil</label>
            <input type="file" name="photo" accept="image/*"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-xs file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100">
            @if ($about->photo)
                <div class="mt-3 flex items-center gap-3">
                    <img src="{{ asset($about->photo) }}" alt="photo"
                         class="h-16 w-16 rounded-xl border border-slate-200 object-cover shadow-sm">
                    <p class="text-xs text-slate-400">Foto saat ini. Upload baru untuk mengganti.</p>
                </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Lokasi</label>
            <input type="text" name="location" value="{{ old('location', $about->location) }}"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                   placeholder="Indonesia">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Short Bio <span class="ml-1 text-xs font-normal text-slate-400">(ditampilkan di homepage)</span></label>
            <textarea name="short_bio" rows="3"
                      class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 resize-none"
                      placeholder="Deskripsi singkat tentang diri Anda...">{{ old('short_bio', $about->short_bio) }}</textarea>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Full Bio <span class="ml-1 text-xs font-normal text-slate-400">(ditampilkan di halaman About)</span></label>
            <textarea name="full_bio" rows="7"
                      class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                      placeholder="Bio lengkap Anda...">{{ old('full_bio', $about->full_bio) }}</textarea>
        </div>
    </div>

    <div class="border-t border-slate-100 pt-7 mb-8">
        <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-5">Kontak & Sosial Media</p>
        <div class="grid gap-5 md:grid-cols-2">

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email', $about->email) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="email@contoh.com">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $about->whatsapp) }}"
                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="+628xxxxxxxxxx">
            </div>

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
