@extends('admin.layout')

@section('title', 'Tambah CV')

@section('content')
<div class="mx-auto max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('admin.resumes.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700">
            ← Kembali ke CV / Resume
        </a>

        <h1 class="mt-3 font-display text-2xl font-bold text-slate-900">
            Tambah CV
        </h1>
    </div>

    <form action="{{ route('admin.resumes.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        @csrf

        <div class="space-y-5">
            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Judul CV
                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="Contoh: CV IT Support"
                       class="w-full rounded-xl border border-slate-200 px-4 py-2.5 outline-none focus:border-indigo-500"
                       required>

                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Deskripsi
                </label>

                <textarea name="description"
                          rows="3"
                          placeholder="Contoh: Troubleshooting, jaringan LAN/WAN, Linux Server"
                          class="w-full rounded-xl border border-slate-200 px-4 py-2.5 outline-none focus:border-indigo-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    File CV
                </label>

                <input type="file"
                       name="file"
                       accept=".pdf,application/pdf"
                       class="w-full rounded-xl border border-slate-200 px-4 py-2.5"
                       required>

                <p class="mt-1 text-xs text-slate-400">
                    Format PDF, maksimal 10 MB.
                </p>

                @error('file')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Urutan
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', 0) }}"
                       min="0"
                       class="w-full rounded-xl border border-slate-200 px-4 py-2.5">
            </div>

            <label class="flex items-center gap-3">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       checked
                       class="h-4 w-4 rounded border-slate-300 text-indigo-600">

                <span class="text-sm font-medium text-slate-700">
                    Tampilkan CV di website
                </span>
            </label>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.resumes.index') }}"
               class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-600">
                Batal
            </a>

            <button type="submit"
                    class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700">
                Simpan CV
            </button>
        </div>
    </form>
</div>
@endsection