@extends('admin.layout')

@section('title', 'CV / Resume')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-indigo-500">Profile</p>
            <h1 class="mt-1 font-display text-2xl font-bold text-slate-900">CV / Resume</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola file CV yang ditampilkan di portfolio.</p>
        </div>

        <a href="{{ route('admin.resumes.create') }}"
           class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
            + Tambah CV
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        @forelse($resumes as $resume)
            <div class="flex flex-col gap-4 border-b border-slate-100 p-5 last:border-0 md:flex-row md:items-center md:justify-between">
                <div class="min-w-0">
                    <div class="flex items-center gap-3">
                        <h3 class="font-semibold text-slate-800">{{ $resume->title }}</h3>

                        @if($resume->is_active)
                            <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-600">
                                Aktif
                            </span>
                        @else
                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                Nonaktif
                            </span>
                        @endif
                    </div>

                    @if($resume->description)
                        <p class="mt-1 text-sm text-slate-500">
                            {{ $resume->description }}
                        </p>
                    @endif

                    <a href="{{ asset('storage/' . $resume->file_path) }}"
                       target="_blank"
                       class="mt-2 inline-block text-xs font-medium text-indigo-600 hover:text-indigo-700">
                        Lihat file CV →
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.resumes.edit', $resume) }}"
                       class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
                        Edit
                    </a>

                    <form action="{{ route('admin.resumes.destroy', $resume) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus CV ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="rounded-lg border border-red-200 px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="p-10 text-center">
                <p class="text-sm text-slate-400">Belum ada CV.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection