@extends('admin.layout')
@section('title', 'Contact Settings')
@section('heading', 'Contact Settings')

@section('content')

<form action="{{ route('admin.contact-settings.update') }}" method="POST"
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

    <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-5">Informasi Kontak Publik</p>
    <div class="grid gap-5 md:grid-cols-2">

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
            <input type="email" name="email" value="{{ old('email', $contactSetting->email) }}"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                   placeholder="email@contoh.com">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">WhatsApp</label>
            <input type="text" name="whatsapp" value="{{ old('whatsapp', $contactSetting->whatsapp) }}"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                   placeholder="+628xxxxxxxxxx">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">LinkedIn URL</label>
            <input type="text" name="linkedin" value="{{ old('linkedin', $contactSetting->linkedin) }}"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                   placeholder="https://linkedin.com/in/...">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Instagram URL</label>
            <input type="text" name="instagram" value="{{ old('instagram', $contactSetting->instagram) }}"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                   placeholder="https://instagram.com/...">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">GitHub URL</label>
            <input type="text" name="github" value="{{ old('github', $contactSetting->github) }}"
                   class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                   placeholder="https://github.com/...">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-slate-700 mb-1.5">CTA Text <span class="ml-1 text-xs font-normal text-slate-400">(teks di halaman Contact)</span></label>
            <textarea name="cta_text" rows="4"
                      class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 resize-none"
                      placeholder="Teks yang ditampilkan di halaman Contact...">{{ old('cta_text', $contactSetting->cta_text) }}</textarea>
        </div>
    </div>

    <div class="flex items-center gap-3 border-t border-slate-100 pt-6 mt-6">
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
